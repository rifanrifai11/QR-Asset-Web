@if(isset($_GET['url_callback']))
    {!! Form::hidden('url_callback', $_GET['url_callback']) !!}
@endif

@if(isset($_GET['data_aset_id']))
    {!! Form::hidden('data_aset_id', $_GET['data_aset_id']) !!}
@endif

<!-- Users Field -->
{!! Form::hidden('users_id', Auth::id()) !!}

<!-- Nomor Surat Field -->
{{--<div class="form-group col-sm-6">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    {!! Form::number('nomor_surat', null, ['class' => 'form-control']) !!}
</div>--}}

<!-- Tanggal Bast Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_bast', 'Tanggal Bast:') !!}
    {!! Form::date('tanggal_bast', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik', 'Nik:') !!}
    {!! Form::text('nik', null, ['class' => 'form-control']) !!}
</div>

<!-- Departemen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departemen_id', 'Departemen:') !!}
    {!! Form::select('departemen_id', $departemen,null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan', 'Jabatan:') !!}
    {!! Form::text('jabatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Jobsite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jobsite_id', 'Jobsite:') !!}
    {!! Form::select('jobsite_id',$jobsite, null, ['class' => 'form-control']) !!}
</div>

<!-- Atasan Langsung Field -->
<div class="form-group col-sm-6">
    {!! Form::label('atasan_langsung', 'Atasan Langsung:') !!}
    {!! Form::text('atasan_langsung', null, ['class' => 'form-control']) !!}
</div>

<!-- Diserahkan Oleh Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_project_manager', 'Nama Project Manager:') !!}
    {!! Form::text('nama_project_manager', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Diserahkan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_project_manager', 'Jabatan Project Manager:') !!}
    {!! Form::text('jabatan_project_manager', null, ['class' => 'form-control']) !!}
</div>

<!-- Diserahkan Oleh Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diserahkan_oleh', 'Diserahkan Oleh:') !!}
    {!! Form::text('diserahkan_oleh', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Diserahkan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_diserahkan', 'Jabatan Diserahkan:') !!}
    {!! Form::text('jabatan_diserahkan', null, ['class' => 'form-control']) !!}
</div>

<!-- Cek Oleh Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cek_oleh', 'Cek Oleh:') !!}
    {!! Form::text('cek_oleh', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Cek Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_cek', 'Jabatan Cek:') !!}
    {!! Form::text('jabatan_cek', null, ['class' => 'form-control']) !!}
</div>

<!-- Penerima Oleh Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penerima_oleh', 'Penerima Oleh:') !!}
    {!! Form::text('penerima_oleh', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Penerima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_penerima', 'Jabatan Penerima:') !!}
    {!! Form::text('jabatan_penerima', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

    @if(isset($_GET['url_callback']))
        <a href="{!! url($_GET['url_callback']) !!}" class="btn btn-default">Cancel</a>
    @else
        <a href="{!! route('asetBasts.index') !!}" class="btn btn-default">Cancel</a>
    @endif

</div>
