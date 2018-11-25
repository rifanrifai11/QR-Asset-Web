<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsetPembelianRequest;
use App\Http\Requests\UpdateAsetPembelianRequest;
use App\Repositories\AsetPembelianRepository;
use App\Http\Controllers\AppBaseController;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Excel;
use Terbilang;

class AsetPembelianController extends AppBaseController
{
    /** @var  AsetPembelianRepository */
    private $asetPembelianRepository;

    public function __construct(AsetPembelianRepository $asetPembelianRepo)
    {
        $this->asetPembelianRepository = $asetPembelianRepo;
    }

    /**
     * Display a listing of the AsetPembelian.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetPembelianRepository->pushCriteria(new RequestCriteria($request));
        $asetPembelians = $this->asetPembelianRepository->all();

        return view('aset_pembelians.index')
            ->with('asetPembelians', $asetPembelians);
    }

    /**
     * Show the form for creating a new AsetPembelian.
     *
     * @return Response
     */
    public function create()
    {
        return view('aset_pembelians.create');
    }

    /**
     * Store a newly created AsetPembelian in storage.
     *
     * @param CreateAsetPembelianRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetPembelianRequest $request)
    {
        $input = $request->all();

        $asetPembelian = $this->asetPembelianRepository->create($input);

        Flash::success('Aset Pembelian saved successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetPembelians.index'));
        }
    }

    /**
     * Display the specified AsetPembelian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asetPembelian = $this->asetPembelianRepository->findWithoutFail($id);

        if (empty($asetPembelian)) {
            Flash::error('Aset Pembelian not found');

            return redirect(route('asetPembelians.index'));
        }

        return view('aset_pembelians.show')->with('asetPembelian', $asetPembelian);
    }

    /**
     * Show the form for editing the specified AsetPembelian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asetPembelian = $this->asetPembelianRepository->findWithoutFail($id);

        if (empty($asetPembelian)) {
            Flash::error('Aset Pembelian not found');

            return redirect(route('asetPembelians.index'));
        }

        return view('aset_pembelians.edit')->with('asetPembelian', $asetPembelian);
    }

    /**
     * Update the specified AsetPembelian in storage.
     *
     * @param  int              $id
     * @param UpdateAsetPembelianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetPembelianRequest $request)
    {
        $asetPembelian = $this->asetPembelianRepository->findWithoutFail($id);
        $input=$request->all();
        if (empty($asetPembelian)) {
            Flash::error('Aset Pembelian not found');

            return redirect(route('asetPembelians.index'));
        }

        $asetPembelian = $this->asetPembelianRepository->update($request->all(), $id);

        Flash::success('Aset Pembelian updated successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetPembelians.index'));
        }
    }

    /**
     * Remove the specified AsetPembelian from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $asetPembelian = $this->asetPembelianRepository->findWithoutFail($id);
        $input=$request->all();
        if (empty($asetPembelian)) {
            Flash::error('Aset Pembelian not found');

            return redirect(route('asetPembelians.index'));
        }

        $this->asetPembelianRepository->delete($id);

        Flash::success('Aset Pembelian deleted successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetPembelians.index'));
        }
    }

    public function print_report($id,Request $request)
    {
        $asetPembelian = $this->asetPembelianRepository->findWithoutFail($id);
        $input=$request->all();

        if (empty($asetPembelian)) {
            Flash::error('Aset Pembelian not found');

            if(isset($input['url_callback'])){
                return redirect(url($input['url_callback']));
            }else {
                return redirect(route('asetPembelians.index'));
            }
        }

/*        $pdf = PDF::loadView('report.FRM-HGA-027_FORM_PENDAFTARAN_ASSET_DAN_EXTRACOM',$asetPembelian);
        //return $pdf->download('invoice.pdf');

        return view('report.FRM-HGA-027_FORM_PENDAFTARAN_ASSET_DAN_EXTRACOM');*/
        $nomor_surat=$asetPembelian->id."/EMB-GA/FPAE/".Terbilang::roman((int)$asetPembelian->created_at->format("n"))."/".$asetPembelian->created_at->format("Y");

        $report = Excel::load('/storage/app/public/FRM-HGA-027_FORM_PENDAFTARAN_ASSET_DAN_EXTRACOM.xlsx', function ($excel) use($nomor_surat,$asetPembelian) {
            $excel->sheet('FRM-HGA-027', function($sheet) use($asetPembelian,$nomor_surat) {

                $startRowStandar=5;
                $rowFirstStandar=[6,15,27,50,79,112,134];

                $sheet->cell('G6', function($cell) use($asetPembelian,$nomor_surat) {
                    $cell->setValue("NO : ".$nomor_surat);
                });

                $sheet->cell('H9', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->dataAset->no_registrasi);
                });

                $sheet->cell('H10', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->dataAset->tanggal_registrasi->format('d-m-Y'));
                });

                $sheet->cell('H11', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->nomor_general_request);
                });

                $sheet->cell('H12', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->nomor_purchase_order);
                });

                $sheet->cell('H13', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->tanggal_pembelian->format('d-m-Y'));
                });

                $sheet->cell('I14', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->harga_barang);
                });

                $sheet->cell('I15', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->dataAset->penyusutan_per_tahun);
                });

                $sheet->cell('U9', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->dataAset->kode_data_aset);
                });

                $sheet->cell('U11', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->dataAset->grub_asets->nama);
                });

                $sheet->cell('U12', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->dataAset->grub_asets->parent->nama);
                });

                $sheet->cell('U13', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->dataAset->grub_asets->nama);
                });

                $sheet->cell('U14', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->dataAset->merek->nama);
                });

                $sheet->cell('U15', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->dataAset->tipe->nama);
                });

                $sheet->cell('U16', function($cell) use($asetPembelian) {
                    $cell->setValue($asetPembelian->dataAset->grub_asets->kategori_aset->nama);
                });


                if(!empty($asetPembelian->dataAset->vendor) ){
                    $sheet->cell('H19', function($cell) use($asetPembelian) {
                        $cell->setValue($asetPembelian->dataAset->vendor->kode_registrasi);
                    });

                    $sheet->cell('H20', function($cell) use($asetPembelian) {
                        $cell->setValue($asetPembelian->dataAset->vendor->nama);
                    });

                    $sheet->cell('H21', function($cell) use($asetPembelian) {
                        $cell->setValue($asetPembelian->dataAset->vendor->alamat);
                    });

                    $sheet->cell('H23', function($cell) use($asetPembelian) {
                        $cell->setValue($asetPembelian->dataAset->vendor->kota);
                    });


                    $sheet->cell('H24', function($cell) use($asetPembelian) {
                        $cell->setValue($asetPembelian->dataAset->vendor->telepon);
                    });

                    $sheet->cell('H25', function($cell) use($asetPembelian) {
                        $cell->setValue($asetPembelian->dataAset->vendor->fax);
                    });

                    $sheet->cell('H26', function($cell) use($asetPembelian) {
                        $cell->setValue($asetPembelian->dataAset->vendor->email);
                    });

                    $sheet->cell('H27', function($cell) use($asetPembelian) {
                        $cell->setValue($asetPembelian->dataAset->vendor->attn);
                    });

                    $sheet->cell('H28', function($cell) use($asetPembelian) {
                        $cell->setValue($asetPembelian->dataAset->vendor->phone);
                    });
                }


                if(!empty($asetPembelian->dataAset->asetBasts) && count($asetPembelian->dataAset->asetBasts)>0){
                    $last_bast=$asetPembelian->dataAset->asetBasts->last();
                    $sheet->cell('H31', function($cell) use($last_bast) {
                        $cell->setValue($last_bast->nomor_surat);
                    });

                    $sheet->cell('H32', function($cell) use($last_bast) {
                        $cell->setValue($last_bast->nama);
                    });

                    $sheet->cell('H33', function($cell) use($last_bast) {
                        $cell->setValue($last_bast->jabatan);
                    });

                    $sheet->cell('H34', function($cell) use($last_bast) {
                        $cell->setValue(!is_null($last_bast->departemen->parent)?$last_bast->departemen->parent->nama: "");
                    });

                    $sheet->cell('H35', function($cell) use($last_bast) {
                        $cell->setValue($last_bast->departemen->nama);
                    });

                    $sheet->cell('H36', function($cell) use($last_bast) {
                        $cell->setValue($last_bast->jobsite->nama);
                    });
                }




            });
        });

        $report->export('xlsx');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetPembelians.index'));
        }
    }
}
