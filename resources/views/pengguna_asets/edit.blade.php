@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pengguna Aset
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($penggunaAset, ['route' => ['penggunaAsets.update', $penggunaAset->id], 'method' => 'patch']) !!}

                        @include('pengguna_asets.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection