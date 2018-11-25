@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Aset Mutasi
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('aset_mutasis.show_fields')

                    @if(isset($_GET['url_callback']))
                        <a href="{!! url($_GET['url_callback']) !!}" class="btn btn-default">Back</a>
                    @else
                    <a href="{!! route('asetMutasis.index') !!}" class="btn btn-default">Back</a>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection
