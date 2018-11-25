@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Merek
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($merek, ['route' => ['mereks.update', $merek->id], 'method' => 'patch']) !!}

                        @include('mereks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection