@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="mt-0">
                <div class="card overflow-hidden">
                    <div class="card-content">
                        <div class="media bg-white bg-lighten-4 align-items-stretch">
                            <div class="media-body p-2">
                                <div class="position-relative" id="filter_global">
                                    <form action="" method="get">
                                        <div class="form-inline col-sm-6">
                                            {!! Form::label('kondisi', 'Kondisi Aset: ') !!}
                                            {!! Form::select('kondisi', $kondisiAsets ,null, ['class' => 'form-control','placeholder'=>'Semua','onchange'=>'this.form.submit()']) !!}
                                        </div>
                                        <input type="hidden" name="search" value="<?php echo isset($_GET['search'])?$_GET['search']:'' ?>">
                                    </form>
                                </div>
                            </div>

                            <div class="position-relative p-2 media-middle text-center ">
                                <div class="row">
                                    <div class="breadcrumb-wrapper col-12">
                                        <h1 class="pull-right">
                                            <a target="_blank" class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! url('report/dataAsets'). (isset($_GET['search'])? '?'. http_build_query(['search' => $_GET['search']]):'')  !!}">Cetak Report</a>
                                            <a target="_blank" class="btn btn-warning pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! url('download_all_barcode').(isset($_GET['search'])? '?'. http_build_query(['search' => $_GET['search']]):'') !!}">Cetak Barcode</a>
                                            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('dataAsets.create') !!}">Add New</a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="content-body">
        <!-- Row created callback -->
        <!-- File export table -->
        <section id="file-export">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card">Data Aset</h2>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content" style="margin-top: -50px">
                            <div class="card-body card-dashboard">
                                <p class="card-text">Data asset yang terdata pada system QR asset saat ini.</p>
                                <div class="table-responsive">
                                    @include('data_asets.table')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- File export table -->
    </div>
@endsection
