@extends('layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">DataTables</a>
                        </li>
                        <li class="breadcrumb-item active">Advanced DataTable
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @include('flash::message')

    <div class="content-body">
        <!-- Row created callback -->
        <!-- File export table -->
        <section id="file-export">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card">File export</h2>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-content" style="margin-top: -50px">
                            <div class="card-body card-dashboard">
                                <p class="card-text">Exporting data from a table can often be a key part of a complex
                                    application. The Buttons extension for DataTables provides
                                    three plug-ins that provide overlapping functionality for data
                                    export.</p>

                                    <a href="{!! route('mereks.create') !!}" class="bg-blue p-1 media-middle text-center ">
                                                                <i class="fa fa-plus-square-o font-large-1 text-white"></i>
                                                                <h5 class="text-white">Tambah</h5>
                                                            </a>
                                <div class="table-responsive">

                                    @include('mereks.table')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- File export table -->
    </div>
@endsection



