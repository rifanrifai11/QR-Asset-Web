@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kategori Aset
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kategoriAset, ['route' => ['kategoriAsets.update', $kategoriAset->id], 'method' => 'patch']) !!}

                        @include('kategori_asets.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection