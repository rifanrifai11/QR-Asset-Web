@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Aset
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataAset, ['route' => ['dataAsets.update', $dataAset->id], 'method' => 'patch','files' => true]) !!}

                        @include('data_asets.fields')

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