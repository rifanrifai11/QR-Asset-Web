@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Umur Ekonomis
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'umurEkonomis.store']) !!}

                        @include('umur_ekonomis.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
