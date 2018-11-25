@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Aset Mutasi
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'asetMutasis.store']) !!}

                        @include('aset_mutasis.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
