<!-- Urut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('urut', 'Urut:') !!}
    {!! Form::number('urut', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Data Aset Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_data_aset', 'Kode Data Aset:') !!}
    {!! Form::text('kode_data_aset', null, ['class' => 'form-control']) !!}
</div>

<!-- Spesifikasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('spesifikasi', 'Spesifikasi:') !!}
    {!! Form::text('spesifikasi', null, ['class' => 'form-control']) !!}
</div>

<!-- No Registrasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_registrasi', 'No Registrasi:') !!}
    {!! Form::text('no_registrasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Registrasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_registrasi', 'Tanggal Registrasi:') !!}
    {!! Form::date('tanggal_registrasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Lokasi Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi_id', 'Lokasi Id:') !!}
    {!! Form::number('lokasi_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipe Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipe_id', 'Tipe Id:') !!}
    {!! Form::number('tipe_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Vendor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_id', 'Vendor Id:') !!}
    {!! Form::number('vendor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Merek Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merek_id', 'Merek Id:') !!}
    {!! Form::number('merek_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto1', 'Foto1:') !!}
    {!! Form::text('foto1', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto2', 'Foto2:') !!}
    {!! Form::text('foto2', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto3', 'Foto3:') !!}
    {!! Form::text('foto3', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto4 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto4', 'Foto4:') !!}
    {!! Form::text('foto4', null, ['class' => 'form-control']) !!}
</div>

<!-- Grub Aset Kode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grub_aset_kode', 'Grub Aset Kode:') !!}
    {!! Form::text('grub_aset_kode', null, ['class' => 'form-control']) !!}
</div>

<!-- Jobsite Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jobsite_id', 'Jobsite Id:') !!}
    {!! Form::number('jobsite_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Serial Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('serial_number', 'Serial Number:') !!}
    {!! Form::text('serial_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Departemen Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departemen_id', 'Departemen Id:') !!}
    {!! Form::number('departemen_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('dataAsets.index') !!}" class="btn btn-danger">
        <i class="fa fa-check-square-o"></i> Cancel
    </a>
    {!! Form::submit('Save', ['class' => 'btn btn-success mr-1']) !!}
</div>

