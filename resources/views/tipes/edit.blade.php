@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipe
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipe, ['route' => ['tipes.update', $tipe->id], 'method' => 'patch']) !!}

                        @include('tipes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection