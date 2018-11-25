@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Data Asets</h1>
        <h1 class="pull-right">
            <a target="_blank" class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! url('report/dataAsets'). (isset($_GET['search'])? '?'. http_build_query(['search' => $_GET['search']]):'')  !!}">Cetak Report</a>
            <a target="_blank" class="btn btn-warning pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! url('download_all_barcode').(isset($_GET['search'])? '?'. http_build_query(['search' => $_GET['search']]):'') !!}">Cetak Barcode</a>
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('dataAsets.create') !!}">Add New</a>

        </h1>
        <form action="" method="get">
        <div class="form-inline col-sm-6">
            {!! Form::label('kondisi', 'Kondisi Aset:') !!}
            {!! Form::select('kondisi', $kondisiAsets ,null, ['class' => 'form-control','placeholder'=>'Semua','onchange'=>'this.form.submit()']) !!}
        </div>
            <input type="hidden" name="search" value="<?php echo isset($_GET['search'])?$_GET['search']:'' ?>">
        </form>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('data_asets.table')
            </div>
        </div>
    </div>
@endsection

