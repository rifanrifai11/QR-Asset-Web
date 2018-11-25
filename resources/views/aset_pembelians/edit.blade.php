@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Aset Pembelian
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($asetPembelian, ['route' => ['asetPembelians.update', $asetPembelian->id], 'method' => 'patch']) !!}

                        @include('aset_pembelians.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection