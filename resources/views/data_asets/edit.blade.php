@extends('layouts.app')

@section('content')

    <div class="content-body">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-success p-2 media-middle">
                                    <i class="fa fa-pencil-square-o font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-1">
                                    <h2 class="success">Data Aset</h2>
                                    <span style="margin-top: -5px">Pendaftaran Data Aset</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">

                    @include('adminlte-templates::common.errors')

                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">

                                {!! Form::model($dataAset, ['route' => ['dataAsets.update', $dataAset->id], 'method' => 'patch','files' => true,'class'=>'form form-horizontal']) !!}

                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-user"></i> Data Aset</h4>

                                    @include('data_asets.fields')
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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