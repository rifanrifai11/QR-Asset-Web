@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Grub Aset
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($grubAset, ['route' => ['grubAsets.update', $grubAset->kode], 'method' => 'patch']) !!}

                        @include('grub_asets.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection