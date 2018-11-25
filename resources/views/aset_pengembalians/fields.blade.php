@if(isset($_GET['url_callback']))
    {!! Form::hidden('url_callback', $_GET['url_callback']) !!}
@endif

@if(isset($_GET['data_aset_id']))
    {!! Form::hidden('data_aset_id', $_GET['data_aset_id']) !!}
@endif

<!-- Users Field -->
{!! Form::hidden('users_id', Auth::id()) !!}

<!-- Nomor Surat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    {!! Form::number('nomor_surat', null, ['class' => 'form-control']) !!}
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

<!-- Jabatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan', 'Jabatan:') !!}
    {!! Form::text('jabatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Departemen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departemen_id', 'Departemen:') !!}
    {!! Form::select('departemen_id',$departemen, null, ['class' => 'form-control']) !!}
</div>

<!-- Lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    {!! Form::text('lokasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Atasan Langsung Field -->
<div class="form-group col-sm-6">
    {!! Form::label('atasan_langsung', 'Atasan Langsung:') !!}
    {!! Form::text('atasan_langsung', null, ['class' => 'form-control']) !!}
</div>

<!-- Diserahkan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diserahkan', 'Diserahkan:') !!}
    {!! Form::text('diserahkan', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Diserahkan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_diserahkan', 'Jabatan Diserahkan:') !!}
    {!! Form::text('jabatan_diserahkan', null, ['class' => 'form-control']) !!}
</div>

<!-- Cek Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cek', 'Cek:') !!}
    {!! Form::text('cek', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Cek Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_cek', 'Jabatan Cek:') !!}
    {!! Form::text('jabatan_cek', null, ['class' => 'form-control']) !!}
</div>

<!-- Penerima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penerima', 'Penerima:') !!}
    {!! Form::text('penerima', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('asetPengembalians.index') !!}" class="btn btn-default">Cancel</a>
        @endif
</div>
