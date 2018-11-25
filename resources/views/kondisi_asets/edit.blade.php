@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kondisi Aset
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kondisiAset, ['route' => ['kondisiAsets.update', $kondisiAset->id], 'method' => 'patch']) !!}

                        @include('kondisi_asets.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection