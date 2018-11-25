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

<!-- Nama Pengguna Baru Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_pengguna_baru', 'Nama Pengguna Baru:') !!}
    {!! Form::text('nama_pengguna_baru', null, ['class' => 'form-control']) !!}
</div>

<!-- Posisi Pengguna Baru Field -->
<div class="form-group col-sm-6">
    {!! Form::label('posisi_pengguna_baru', 'Posisi Pengguna Baru:') !!}
    {!! Form::text('posisi_pengguna_baru', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Pengguna Baru Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_pengguna_baru', 'Jabatan Pengguna Baru:') !!}
    {!! Form::text('jabatan_pengguna_baru', null, ['class' => 'form-control']) !!}
</div>

<!-- Departemen Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departemen_id', 'Departemen Id:') !!}
    {!! Form::number('departemen_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Mengetahui Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mengetahui', 'Mengetahui:') !!}
    {!! Form::text('mengetahui', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Mengetahui Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_mengetahui', 'Jabatan Mengetahui:') !!}
    {!! Form::text('jabatan_mengetahui', null, ['class' => 'form-control']) !!}
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

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('asetMutasis.index') !!}" class="btn btn-danger">
        <i class="fa fa-check-square-o"></i> Cancel
    </a>
    {!! Form::submit('Save', ['class' => 'btn btn-success mr-1']) !!}
</div>

