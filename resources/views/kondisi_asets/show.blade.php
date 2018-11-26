@extends('layouts.app')

@section('content')
<div class="content-body">
    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card overflow-hidden">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="bg-success p-2 media-middle">
                                <i class="fa fa-align-left font-large-2 text-white"></i>
                            </div>
                            <div class="media-body p-1">
                                <h2 class="success">Kondisi Aset</h2>
                                <span style="margin-top: -5px">Membuat data Kondisi Aset baru.</span>
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

                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <h4 class="form-section">
                                        <a href="{!! route('kondisiAsets.index') !!}" class='btn btn-icon danger btn-lg '><i class="ft-arrow-left"></i> Kembali</a>
                                    </h4>

                                    @include('kondisi_asets.show_fields')

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

