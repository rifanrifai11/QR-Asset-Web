<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsetBastRequest;
use App\Http\Requests\UpdateAsetBastRequest;
use App\Models\Departemen;
use App\Models\Jobsite;
use App\Repositories\AsetBastRepository;
use App\Http\Controllers\AppBaseController;
use App\Traits\Utility;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Flash;
use Maatwebsite\Excel\Facades\Excel;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Terbilang;

class AsetBastController extends AppBaseController
{
    use Utility;
    /** @var  AsetBastRepository */
    private $asetBastRepository;

    public function __construct(AsetBastRepository $asetBastRepo)
    {
        $this->asetBastRepository = $asetBastRepo;
    }

    /**
     * Display a listing of the AsetBast.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetBastRepository->pushCriteria(new RequestCriteria($request));
        $asetBasts = $this->asetBastRepository->all();

        return view('aset_basts.index')
            ->with('asetBasts', $asetBasts);
    }

    /**
     * Show the form for creating a new AsetBast.
     *
     * @return Response
     */
    public function create()
    {
        $departemen=Departemen::pluck('nama','id');
        $jobsite=Jobsite::pluck('nama','id');
        return view('aset_basts.create',compact('departemen','jobsite'));
    }

    /**
     * Store a newly created AsetBast in storage.
     *
     * @param CreateAsetBastRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetBastRequest $request)
    {
        $input = $request->all();

        $asetBast = $this->asetBastRepository->create($input);
        /*$asetBast->nomor_surat=$asetBast->id."/EMB-GEA/BAST/".Terbilang::roman((int)$asetBast->created_at->format("n"))."/".$asetBast->created_at->format("Y");
        $asetBast->save();*/
        Flash::success('Aset Bast saved successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetBasts.index'));
        }

    }

    /**
     * Display the specified AsetBast.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asetBast = $this->asetBastRepository->findWithoutFail($id);

        if (empty($asetBast)) {
            Flash::error('Aset Bast not found');

            return redirect(route('asetBasts.index'));
        }

        return view('aset_basts.show')->with('asetBast', $asetBast);
    }

    /**
     * Show the form for editing the specified AsetBast.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asetBast = $this->asetBastRepository->findWithoutFail($id);

        if (empty($asetBast)) {
            Flash::error('Aset Bast not found');

            return redirect(route('asetBasts.index'));
        }
        $departemen=Departemen::pluck('nama','id');
        $jobsite=Jobsite::pluck('nama','id');

        return view('aset_basts.edit',compact('departemen','jobsite'))->with('asetBast', $asetBast);
    }

    /**
     * Update the specified AsetBast in storage.
     *
     * @param  int              $id
     * @param UpdateAsetBastRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetBastRequest $request)
    {
        $asetBast = $this->asetBastRepository->findWithoutFail($id);
        $input= $request->all();
        if (empty($asetBast)) {
            Flash::error('Aset Bast not found');

            return redirect(route('asetBasts.index'));
        }

        $asetBast = $this->asetBastRepository->update($request->all(), $id);

        Flash::success('Aset Bast updated successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetBasts.index'));
        }
    }

    /**
     * Remove the specified AsetBast from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $asetBast = $this->asetBastRepository->findWithoutFail($id);
        $input=$request->all();

        if (empty($asetBast)) {
            Flash::error('Aset Bast not found');

            return redirect(route('asetBasts.index'));
        }

        $this->asetBastRepository->delete($id);

        Flash::success('Aset Bast deleted successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetBasts.index'));
        }
    }

    public function print_report($id,Request $request)
    {
        $asetBast = $this->asetBastRepository->findWithoutFail($id);
        $input=$request->all();

        if (empty($asetBast)) {
            Flash::error('Aset Bast not found');

            if(isset($input['url_callback'])){
                return redirect(url($input['url_callback']));
            }else {
                return redirect(route('asetBasts.index'));
            }
        }

        $nomor_surat=$asetBast->id."/EMB-GEA/BAST/".Terbilang::roman((int)$asetBast->created_at->format("n"))."/".$asetBast->created_at->format("Y");

        $report = Excel::load('/storage/app/public/FRM_HGA_035_FORM_BAST.xlsx', function ($excel) use($asetBast,$nomor_surat) {
            $excel->sheet('FRM-HGA-039', function($sheet) use($asetBast,$nomor_surat) {

                $startRowStandar=5;
                $rowFirstStandar=[6,15,27,50,79,112,134];

                $sheet->cell('M7', function($cell) use($asetBast,$nomor_surat) {
                    $cell->setValue("NO : ".$nomor_surat);
                });

                $sheet->cell('H9', function($cell) use($asetBast) {
                    $cell->setValue($this->getNameOfDayInIndonesia(Carbon::now()->dayOfWeek));
                });

                $sheet->cell('P9', function($cell) use($asetBast) {
                    $cell->setValue(Carbon::now()->day);
                });

                $sheet->cell('AA9', function($cell) use($asetBast) {
                    $cell->setValue(Carbon::now()->month);
                });

                $sheet->cell('AL9', function($cell) use($asetBast) {
                    $cell->setValue(Carbon::now()->year);
                });

                $sheet->cell('K13', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->dataAset->grub_asets->nama);
                });

                $sheet->cell('K14', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->dataAset->merek->nama .'/'.$asetBast->dataAset->tipe->nama);
                });

                $sheet->cell('K15', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->serial_number);
                });

                $sheet->cell('K16', function($cell) use($asetBast) {
                    if(isset($asetBast->dataAset->latestAsetTakings()->kondisiAset->nama)){
                        $cell->setValue($asetBast->dataAset->latestAsetTakings()->kondisiAset->nama);
                    }else{
                        $cell->setValue("Belum ada informasi aset taking");
                    }
                });

                $sheet->cell('K17', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->dataAset->spesifikasi);
                });

                $sheet->cell('K21', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->nama);
                });

                $sheet->cell('K22', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->nik);
                });

                $sheet->cell('K23', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->departemen->nama);
                });

                $sheet->cell('K24', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->jabatan);
                });

                $sheet->cell('K25', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->jobsite->nama);
                });

                $sheet->cell('K26', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->atasan_langsung);
                });


                $sheet->cell('P57', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->nama_project_manager);
                });

                $sheet->cell('P61', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->jabatan_project_manager);
                });

                $sheet->cell('W57', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->diserahkan_oleh);
                });

                $sheet->cell('W57', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->diserahkan_oleh);
                });

                $sheet->cell('W61', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->jabatan_diserahkan);
                });

                $sheet->cell('AD57', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->cek_oleh);
                });

                $sheet->cell('AD61', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->jabatan_cek);
                });

                $sheet->cell('AK57', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->penerima_oleh);
                });

                $sheet->cell('AK61', function($cell) use($asetBast) {
                    $cell->setValue($asetBast->jabatan_penerima);
                });
            });
        });

        $report->export('xlsx');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetBasts.index'));
        }
    }
}
