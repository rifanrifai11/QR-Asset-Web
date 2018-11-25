@extends('layouts.app')

@section('content')
<div class="content-body">
    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card overflow-hidden">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="bg-warning p-2 media-middle">
                                <i class="ft-edit font-large-2 text-white"></i>
                            </div>
                            <div class="media-body p-1">
                                <h2 class="dark">Perubahan Data Grup Aset</h2>
                                <span style="margin-top: -5px">Membuat perubahan data pada Grup Aset.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">

                @include('adminlte-templates::common.errors')

                <div class="card">
                    <div class="card-content collpase show">
                        <div class="card-body">

                            {!! Form::model($grupAset, ['route' => ['grupAsets.update', $grupAset->id], 'method' => 'patch','class'=>'form form-horizontal']) !!}

                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-settings"></i> Grup Aset</h4>

                                @include('grup_asets.fields')

                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection