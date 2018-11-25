<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsetPeminjamanRequest;
use App\Http\Requests\UpdateAsetPeminjamanRequest;
use App\Models\Departemen;
use App\Repositories\AsetPeminjamanRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Maatwebsite\Excel\Facades\Excel;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AsetPeminjamanController extends AppBaseController
{
    /** @var  AsetPeminjamanRepository */
    private $asetPeminjamanRepository;

    public function __construct(AsetPeminjamanRepository $asetPeminjamanRepo)
    {
        $this->asetPeminjamanRepository = $asetPeminjamanRepo;
    }

    /**
     * Display a listing of the AsetPeminjaman.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetPeminjamanRepository->pushCriteria(new RequestCriteria($request));
        $asetPeminjamen = $this->asetPeminjamanRepository->all();

        return view('aset_peminjamen.index')
            ->with('asetPeminjamen', $asetPeminjamen);
    }

    /**
     * Show the form for creating a new AsetPeminjaman.
     *
     * @return Response
     */
    public function create()
    {
        $departemen=Departemen::pluck('nama','id');
        return view('aset_peminjamen.create',compact('departemen'));
    }

    /**
     * Store a newly created AsetPeminjaman in storage.
     *
     * @param CreateAsetPeminjamanRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetPeminjamanRequest $request)
    {
        $input = $request->all();

        $asetPeminjaman = $this->asetPeminjamanRepository->create($input);

        Flash::success('Aset Peminjaman saved successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetPeminjamen.index'));
        }
    }

    /**
     * Display the specified AsetPeminjaman.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asetPeminjaman = $this->asetPeminjamanRepository->findWithoutFail($id);

        if (empty($asetPeminjaman)) {
            Flash::error('Aset Peminjaman not found');

            return redirect(route('asetPeminjamen.index'));
        }

        return view('aset_peminjamen.show')->with('asetPeminjaman', $asetPeminjaman);
    }

    /**
     * Show the form for editing the specified AsetPeminjaman.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asetPeminjaman = $this->asetPeminjamanRepository->findWithoutFail($id);

        if (empty($asetPeminjaman)) {
            Flash::error('Aset Peminjaman not found');

            return redirect(route('asetPeminjamen.index'));
        }
        $departemen=Departemen::pluck('nama','id');
        return view('aset_peminjamen.edit',compact('departemen'))->with('asetPeminjaman', $asetPeminjaman);
    }

    /**
     * Update the specified AsetPeminjaman in storage.
     *
     * @param  int              $id
     * @param UpdateAsetPeminjamanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetPeminjamanRequest $request)
    {
        $asetPeminjaman = $this->asetPeminjamanRepository->findWithoutFail($id);
        $input=$request->all();
        if (empty($asetPeminjaman)) {
            Flash::error('Aset Peminjaman not found');

            return redirect(route('asetPeminjamen.index'));
        }

        $asetPeminjaman = $this->asetPeminjamanRepository->update($request->all(), $id);

        Flash::success('Aset Peminjaman updated successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetPeminjamen.index'));
        }
    }

    /**
     * Remove the specified AsetPeminjaman from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $asetPeminjaman = $this->asetPeminjamanRepository->findWithoutFail($id);
        $input=$request->all();
        if (empty($asetPeminjaman)) {
            Flash::error('Aset Peminjaman not found');

            return redirect(route('asetPeminjamen.index'));
        }

        $this->asetPeminjamanRepository->delete($id);

        Flash::success('Aset Peminjaman deleted successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetPeminjamen.index'));
        }
    }

    public function print_report($id,Request $request)
    {
        $asetPeminjaman = $this->asetPeminjamanRepository->findWithoutFail($id);
        $input=$request->all();

        if (empty($asetPeminjaman)) {
            Flash::error('Aset Bast not found');

            if(isset($input['url_callback'])){
                return redirect(url($input['url_callback']));
            }else {
                return redirect(route('asetPeminjamen.index'));
            }
        }

        $report = Excel::load('/storage/app/public/FRM-HGA-040_FORM_PERIJINAN_PEMINJAMAN_ASSET.xlsx', function ($excel) use($asetPeminjaman) {
            $excel->sheet('FRM-HGA-044', function($sheet) use($asetPeminjaman) {

                $sheet->cell('G8', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->nama_peminjam);
                });

                $sheet->cell('G9', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->nrp);
                });

                $sheet->cell('G10', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->departemen->nama);
                });

                $sheet->cell('G11', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->jabatan);
                });

                $sheet->cell('G12', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->alasan);
                });

                $sheet->cell('U7', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->dataAset->kode_data_aset);
                });

                $sheet->cell('U8', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->dataAset->lokasi->nama);
                });

                $sheet->cell('U9', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->dataAset->grub_asets->nama);
                });

                $sheet->cell('U10', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->dataAset->grub_asets->parent->nama);
                });

                $sheet->cell('U11', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->dataAset->merek->nama);
                });

                $sheet->cell('U12', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->dataAset->tipe->nama);
                });

                $sheet->cell('U13', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->dataAset->grub_asets->kategori_aset->nama);
                });

                $sheet->cell('G16', function($cell) use($asetPeminjaman) {
                    $cell->setValue(Carbon::parse($asetPeminjaman->tanggal_peminjaman)->format('d-m-Y'));
                });

                $sheet->cell('G17', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->waktu_peminjaman_awal);
                });

                $sheet->cell('K17', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->waktu_peminjaman_akhir);
                });

                $sheet->cell('G18', function($cell) use($asetPeminjaman) {
                    $waktu_awal=Carbon::parse($asetPeminjaman->waktu_peminjaman_awal);
                    $cell->setValue($waktu_awal);
                });

                $sheet->cell('U16', function($cell) use($asetPeminjaman) {
                    $cell->setValue(Carbon::parse($asetPeminjaman->tanggal_pengembalian)->format('d-m-Y'));
                });

                $sheet->cell('U17', function($cell) use($asetPeminjaman) {
                    $cell->setValue($asetPeminjaman->waktu_pengembalian);
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
