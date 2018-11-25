@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Departemen
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($departemen, ['route' => ['departemens.update', $departemen->id], 'method' => 'patch']) !!}

                        @include('departemens.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection