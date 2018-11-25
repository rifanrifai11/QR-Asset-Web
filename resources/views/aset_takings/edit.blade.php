@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Aset Taking
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($asetTaking, ['route' => ['asetTakings.update', $asetTaking->id], 'method' => 'patch']) !!}

                        @include('aset_takings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection