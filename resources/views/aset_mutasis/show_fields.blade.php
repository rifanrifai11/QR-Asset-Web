<!-- Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $asetMutasi->id !!}</p>
</div>

<!-- Nomor Surat Field -->
<div class="form-group">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    <p>{!! $asetMutasi->nomor_surat !!}</p>
</div>

<!-- Data Aset Field -->
<div class="form-group">
    {!! Form::label('data_aset_id', 'Data Aset:') !!}
    <p>{!! $asetMutasi->dataAset->grub_asets->nama !!}</p>
</div>

<!-- Users Field -->
<div class="form-group">
    {!! Form::label('users_id', 'Users:') !!}
    <p>{!! $asetMutasi->user->name !!}</p>
</div>

<!-- Nama Pengguna Baru Field -->
<div class="form-group">
    {!! Form::label('nama_pengguna_baru', 'Nama Pengguna Baru:') !!}
    <p>{!! $asetMutasi->nama_pengguna_baru !!}</p>
</div>

<!-- Posisi Pengguna Baru Field -->
<div class="form-group">
    {!! Form::label('posisi_pengguna_baru', 'Posisi Pengguna Baru:') !!}
    <p>{!! $asetMutasi->posisi_pengguna_baru !!}</p>
</div>

<!-- Jabatan Pengguna Baru Field -->
<div class="form-group">
    {!! Form::label('jabatan_pengguna_baru', 'Jabatan Pengguna Baru:') !!}
    <p>{!! $asetMutasi->jabatan_pengguna_baru !!}</p>
</div>

<!-- Departemen Field -->
<div class="form-group">
    {!! Form::label('departemen_id', 'Departemen:') !!}
    <p>{!! $asetMutasi->departemen_id !!}</p>
</div>

<!-- Mengetahui Field -->
<div class="form-group">
    {!! Form::label('mengetahui', 'Mengetahui:') !!}
    <p>{!! $asetMutasi->mengetahui !!}</p>
</div>

<!-- Jabatan Mengetahui Field -->
<div class="form-group">
    {!! Form::label('jabatan_mengetahui', 'Jabatan Mengetahui:') !!}
    <p>{!! $asetMutasi->jabatan_mengetahui !!}</p>
</div>

<!-- Diserahkan Field -->
<div class="form-group">
    {!! Form::label('diserahkan', 'Diserahkan:') !!}
    <p>{!! $asetMutasi->diserahkan !!}</p>
</div>

<!-- Jabatan Diserahkan Field -->
<div class="form-group">
    {!! Form::label('jabatan_diserahkan', 'Jabatan Diserahkan:') !!}
    <p>{!! $asetMutasi->jabatan_diserahkan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $asetMutasi->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $asetMutasi->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $asetMutasi->deleted_at !!}</p>
</div>

