@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Aset
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('data_asets.show_fields')

                </div>
                <a href="{!! route('dataAsets.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        @include('data_asets.form_pembelian')
        @include('data_asets.form_bast')
        @include('data_asets.form_aset_taking')
        @include('data_asets.form_peminjaman')
        @include('data_asets.form_pengembalian')
        @include('data_asets.form_mutasi')
        @include('data_asets.form_pelepasan')
        @include('data_asets.form_kerusakan')
        @include('data_asets.form_kehilangan')
    </div>

@endsection
