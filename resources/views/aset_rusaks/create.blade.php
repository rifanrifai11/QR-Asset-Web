@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Aset Rusak
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'asetRusaks.store']) !!}

                        @include('aset_rusaks.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-timepicker.min.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap-timepicker.min.js')}}"></script>
@endsection