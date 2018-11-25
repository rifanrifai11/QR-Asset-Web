<!-- Nomor Surat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    {!! Form::number('nomor_surat', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Aset Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_aset_id', 'Data Aset Id:') !!}
    {!! Form::number('data_aset_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
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

<!-- Departemen Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departemen_id', 'Departemen Id:') !!}
    {!! Form::number('departemen_id', null, ['class' => 'form-control']) !!}
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
<div class="form-actions">
    <a href="{!! route('asetPengembalians.index') !!}" class="btn btn-danger">
        <i class="fa fa-check-square-o"></i> Cancel
    </a>
    {!! Form::submit('Save', ['class' => 'btn btn-success mr-1']) !!}
</div>

