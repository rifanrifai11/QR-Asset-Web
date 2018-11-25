<!-- Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $asetPelepasan->id !!}</p>
</div>

<!-- Nomor Surat Field -->
<div class="form-group">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    <p>{!! $asetPelepasan->nomor_surat !!}</p>
</div>

<!-- Data Aset Field -->
<div class="form-group">
    {!! Form::label('data_aset_id', 'Data Aset:') !!}
    <p>{!! $asetPelepasan->dataAset->grub_asets->nama !!}</p>
</div>

<!-- Users Field -->
<div class="form-group">
    {!! Form::label('users_id', 'Users:') !!}
    <p>{!! $asetPelepasan->user->name !!}</p>
</div>

<!-- Metode Pelepasan Field -->
<div class="form-group">
    {!! Form::label('metode_pelepasan', 'Metode Pelepasan:') !!}
    <p>{!! $asetPelepasan->metode_pelepasan !!}</p>
</div>

<!-- Catatan Field -->
<div class="form-group">
    {!! Form::label('catatan', 'Catatan:') !!}
    <p>{!! $asetPelepasan->catatan !!}</p>
</div>

<!-- Foto Saat Ini Field -->
<div class="form-group">
    {!! Form::label('foto_saat_ini', 'Foto Saat Ini:') !!}
    <p>{!! $asetPelepasan->foto_saat_ini !!}</p>
</div>

<!-- Menyetujui Field -->
<div class="form-group">
    {!! Form::label('menyetujui', 'Menyetujui:') !!}
    <p>{!! $asetPelepasan->menyetujui !!}</p>
</div>

<!-- Jabatan Menyetujui Field -->
<div class="form-group">
    {!! Form::label('jabatan_menyetujui', 'Jabatan Menyetujui:') !!}
    <p>{!! $asetPelepasan->jabatan_menyetujui !!}</p>
</div>

<!-- Mengetahui Field -->
<div class="form-group">
    {!! Form::label('mengetahui', 'Mengetahui:') !!}
    <p>{!! $asetPelepasan->mengetahui !!}</p>
</div>

<!-- Jabatan Mengetahui Field -->
<div class="form-group">
    {!! Form::label('jabatan_mengetahui', 'Jabatan Mengetahui:') !!}
    <p>{!! $asetPelepasan->jabatan_mengetahui !!}</p>
</div>

<!-- Diajukan Field -->
<div class="form-group">
    {!! Form::label('diajukan', 'Diajukan:') !!}
    <p>{!! $asetPelepasan->diajukan !!}</p>
</div>

<!-- Jabatan Diajukan Field -->
<div class="form-group">
    {!! Form::label('jabatan_diajukan', 'Jabatan Diajukan:') !!}
    <p>{!! $asetPelepasan->jabatan_diajukan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $asetPelepasan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $asetPelepasan->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $asetPelepasan->deleted_at !!}</p>
</div>

