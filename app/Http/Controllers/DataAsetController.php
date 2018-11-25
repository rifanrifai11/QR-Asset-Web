<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataAsetRequest;
use App\Http\Requests\UpdateDataAsetRequest;
use App\Models\AsetBast;
use App\Models\AsetPembelian;
use App\Models\DataAset;
use App\Models\Departemen;
use App\Models\GrubAset;
use App\Models\Jobsite;
use App\Models\KondisiAset;
use App\Models\Lokasi;
use App\Models\Merek;
use App\Models\Tipe;
use App\Models\Vendor;
use App\Repositories\DataAsetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Mockery\Exception;
use PDF;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DataAsetController extends AppBaseController
{
    /** @var  DataAsetRepository */
    private $dataAsetRepository;

    public function __construct(DataAsetRepository $dataAsetRepo)
    {
        $this->dataAsetRepository = $dataAsetRepo;
    }

    /**
     * Display a listing of the DataAset.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataAsetRepository->pushCriteria(new RequestCriteria($request));
        if($request->kondisi==''){
            $dataAsets = $this->dataAsetRepository->all();
        }else{
            $dataAsets = $this->dataAsetRepository->all()->where('kondisi',$request->kondisi);
        }


        $currentPage = Paginator::resolveCurrentPage() - 1;
        $perPage = 30;
        $currentPageSearchResults = $dataAsets->slice($currentPage * $perPage, $perPage)->all();
        $dataAsets = new LengthAwarePaginator($currentPageSearchResults, count($dataAsets), $perPage);

        $kondisiAsets=KondisiAset::pluck('nama','nama');

        return view('data_asets.index',compact('kondisiAsets'))
            ->with('dataAsets', $dataAsets);
    }

    /**
     * Show the form for creating a new DataAset.
     *
     * @return Response
     */
    public function create()
    {
        $grub_aset=GrubAset::whereNotNull('parent_grub_aset_kode')->get()->pluck('kode_nama','kode');
        $departemen=Departemen::pluck('nama','id');
        $jobsite=Jobsite::pluck('nama','id');
        $lokasi=Lokasi::pluck('nama','id');
        return view('data_asets.create',compact('grub_aset','departemen','jobsite','lokasi'));
    }

    /**
     * Store a newly created DataAset in storage.
     *
     * @param CreateDataAsetRequest $request
     *
     * @return Response
     */
    public function store(CreateDataAsetRequest $request)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();

            $merek=Merek::where('nama',$input['nama_merek'])->first();
            if (empty($merek)) {
                $merek=Merek::create(['nama'=>$input['nama_merek']]);
            }

            $tipe=Tipe::where('nama',$input['nama_tipe'])->first();
            if (empty($tipe)) {
                $tipe=Tipe::create(['nama'=>$input['nama_tipe']]);
            }

            $vendor=Vendor::where('nama',$input['nama_vendor'])->first();
            if (empty($vendor)) {
                $vendor=Vendor::create([
                    'kode_registrasi'=>$input['kode_registrasi'],
                    'nama'=>$input['nama_vendor'],
                    'alamat'=>$input['alamat'],
                    'kota'=>$input['kota'],
                    'fax'=>$input['fax'],
                    'email'=>$input['email'],
                    'attn'=>$input['attn'],
                    'telepon'=>$input['telepon'],
                    'phone'=>$input['phone']
                ]);
            }

            $input['merek_id']=$merek->id;
            $input['tipe_id']=$tipe->id;
            $input['vendor_id']=$vendor->id;

            $grubAset=GrubAset::where('kode',$input['grub_aset_kode'])->first();

            $input['urut']=$grubAset->kode_urut_baru;
            $input['kode_data_aset']=$grubAset->kode_data_aset_baru;


            $dataAset = $this->dataAsetRepository->create($input);

            if( $request->hasFile('foto1')) {
                $path = $request->foto1->storeAs('upload_foto_aset',str_replace("/","-",$dataAset->kode_data_aset).".".$request->foto1->extension(),'public');
                $dataAset->foto1=$path;
                $dataAset->save();
            }

            $input['data_aset_id']=$dataAset->id;

            AsetPembelian::create($input);

            AsetBast::create($input);

            /*if( $request->hasFile('foto2')) {
                $path = $request->foto2->storeAs('upload_foto_aset', $dataAset->id.'-2.'.$request->foto2->extension(),'local_public');
                $dataAset->foto2=$path;
                $dataAset->save();
            }

            if( $request->hasFile('foto3')) {
                $path = $request->foto3->storeAs('upload_foto_aset', $dataAset->id.'-3.'.$request->foto3->extension(),'local_public');
                $dataAset->foto3=$path;
                $dataAset->save();
            }

            if( $request->hasFile('foto4')) {
                $path = $request->foto4->storeAs('upload_foto_aset', $dataAset->id.'-4.'.$request->foto4->extension(),'local_public');
                $dataAset->foto4=$path;
                $dataAset->save();
            }*/
            DB::commit();
            Flash::success('Data Aset saved successfully.');

        }catch (\Exception $e){
            DB::rollback();
            Flash::error ('Data gagal ditambah! karena '.$e->getMessage());
        }

        return redirect(route('dataAsets.index'));
    }

    /**
     * Display the specified DataAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataAset = $this->dataAsetRepository->findWithoutFail($id);

        if (empty($dataAset)) {
            Flash::error('Data Aset not found');

            return redirect(route('dataAsets.index'));
        }

        return view('data_asets.show')->with('dataAset', $dataAset);
    }

    /**
     * Show the form for editing the specified DataAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataAset = $this->dataAsetRepository->findWithoutFail($id);

        if (empty($dataAset)) {
            Flash::error('Data Aset not found');

            return redirect(route('dataAsets.index'));
        }

        $departemen=Departemen::pluck('nama','id');
        $jobsite=Jobsite::pluck('nama','id');
        //$grub_aset=GrubAset::whereNotNull('parent_grub_aset_kode')->where('kode',$dataAset->grub_aset_kode)->get()->pluck('kode_nama','kode');
        $grub_aset=GrubAset::whereNotNull('parent_grub_aset_kode')->get()->pluck('kode_nama','kode');

        $lokasi=Lokasi::pluck('nama','id');
        return view('data_asets.edit',compact('grub_aset','departemen','jobsite','lokasi'))->with('dataAset', $dataAset);
    }

    /**
     * Update the specified DataAset in storage.
     *
     * @param  int              $id
     * @param UpdateDataAsetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataAsetRequest $request)
    {

        $dataAset = $this->dataAsetRepository->findWithoutFail($id);
        $input=$request->except(['urut','kode_data_aset','grub_aset_kode']);
        if (empty($dataAset)) {
            Flash::error('Data Aset not found');

            return redirect(route('dataAsets.index'));
        }

        try {
            DB::beginTransaction();

            $merek=Merek::where('nama',$input['nama_merek'])->first();
            if (empty($merek)) {
                $merek=Merek::create(['nama'=>$input['nama_merek']]);
            }

            $tipe=Tipe::where('nama',$input['nama_tipe'])->first();
            if (empty($tipe)) {
                $tipe=Tipe::create(['nama'=>$input['nama_tipe']]);
            }

            $vendor=Vendor::where('nama',$input['nama_tipe'])->first();
            if (empty($vendor)) {
                $vendor=Vendor::create([
                    'kode_registrasi'=>$input['kode_registrasi'],
                    'nama'=>$input['nama_vendor'],
                    'alamat'=>$input['alamat'],
                    'kota'=>$input['kota'],
                    'fax'=>$input['fax'],
                    'email'=>$input['email'],
                    'attn'=>$input['attn'],
                    'telepon'=>$input['telepon'],
                    'phone'=>$input['phone']
                ]);
            }

            $input['merek_id']=$merek->id;
            $input['tipe_id']=$tipe->id;
            $input['vendor_id']=$vendor->id;

            if($request->grub_aset_kode!==$dataAset->grub_aset_kode){
                $input['urut']=$request->urut;
                $input['kode_data_aset']=$request->kode_data_aset;
                $input['grub_aset_kode']=$request->grub_aset_kode;
            }

            $dataAset = $this->dataAsetRepository->update($input, $id);

            if( $request->hasFile('foto1')) {
                $path = $request->foto1->storeAs('upload_foto_aset', str_replace("/","-",$dataAset->kode_data_aset).$request->foto1->extension(),'public');
                $dataAset->foto1=$path;
                $dataAset->save();
            }

            $asetPembelian=AsetPembelian::where('data_aset_id',$dataAset->id)->first();
            $asetPembelian->update($input);

            DB::commit();
            Flash::success('Data Aset updated successfully.');
        }catch (Exception $e){
            DB::rollback();
            Flash::error ('Data Aset gagal diubah! karena '.$e->getMessage());
        }

        return redirect(route('dataAsets.index'));
    }

    /**
     * Remove the specified DataAset from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataAset = $this->dataAsetRepository->findWithoutFail($id);

        if (empty($dataAset)) {
            Flash::error('Data Aset not found');

            return redirect(route('dataAsets.index'));
        }

        $this->dataAsetRepository->delete($id);

        Flash::success('Data Aset deleted successfully.');

        return redirect(route('dataAsets.index'));
    }

    public function downloadAllBarcode(Request $request){
        $this->dataAsetRepository->pushCriteria(new RequestCriteria($request));
        $dataAsets = $this->dataAsetRepository->orderBy('kode_data_aset')->all();
        return view('data_asets.all_barcode', compact('dataAsets'));
    }

    public function downloadDoubleBarcode($id){
        $dataAsets=DataAset::where('id',$id)->get();
        return view('data_asets.double_barcode', compact('dataAsets'));
    }

    public function getKodeUrutDataAset($grub_aset_kode){
        $grubAset=GrubAset::where('kode',$grub_aset_kode)->first();
        if (empty($grubAset)) {
            return "{}";
        }
        return $grubAset->kode_data_aset_baru;

        /*$kode_data_aset="EMB/".$grubAset->parent->kode."/".$grubAset->kode."/".substr("000".$grubAset->kode_urut_baru, -3);
        return $kode_data_aset;*/
    }

    public function downloadPDF(Request $request){
        $this->dataAsetRepository->pushCriteria(new RequestCriteria($request));
        $dataAsets = $this->dataAsetRepository->orderBy('kode_data_aset')->all();

        return view('data_asets.pdf', compact('dataAsets'));
/*
        $pdf = PDF::loadView('data_asets.pdf', compact('dataAsets'));
        return $pdf->download('report_data_aset.pdf');*/

    }
}
