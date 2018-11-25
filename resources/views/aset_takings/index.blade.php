@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Aset Takings</h1>
        <h1 class="pull-right">
            <a class="btn btn-success pull-right" target="_blank" style="margin-top: -10px;margin-bottom: 5px" href="{!! url('report/asetTakings') !!}">Cetak Report Aset Taking</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('aset_takings.table')
            </div>
        </div>
    </div>
@endsection

