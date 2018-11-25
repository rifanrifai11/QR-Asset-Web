<!-- Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $asetRusak->id !!}</p>
</div>

<!-- Nomor Surat Field -->
<div class="form-group">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    <p>{!! $asetRusak->nomor_surat !!}</p>
</div>

<!-- Data Aset Field -->
<div class="form-group">
    {!! Form::label('data_aset_id', 'Data Aset:') !!}
    <p>{!! $asetRusak->dataAset->grub_asets->nama !!}</p>
</div>

<!-- Users Field -->
<div class="form-group">
    {!! Form::label('users_id', 'Users:') !!}
    <p>{!! $asetRusak->user->name !!}</p>
</div>

<!-- Tanggal Kejadian Field -->
<div class="form-group">
    {!! Form::label('tanggal_kejadian', 'Tanggal Kejadian:') !!}
    <p>{!! $asetRusak->tanggal_kejadian !!}</p>
</div>

<!-- Waktu Kejadian Field -->
<div class="form-group">
    {!! Form::label('waktu_kejadian', 'Waktu Kejadian:') !!}
    <p>{!! $asetRusak->waktu_kejadian !!}</p>
</div>

<!-- Lokasi Kejadian Field -->
<div class="form-group">
    {!! Form::label('lokasi_kejadian', 'Lokasi Kejadian:') !!}
    <p>{!! $asetRusak->lokasi_kejadian !!}</p>
</div>

<!-- Kronologis Kejadian Field -->
<div class="form-group">
    {!! Form::label('kronologis_kejadian', 'Kronologis Kejadian:') !!}
    <p>{!! $asetRusak->kronologis_kejadian !!}</p>
</div>

<!-- Langkah Perbaikan Field -->
<div class="form-group">
    {!! Form::label('langkah_perbaikan', 'Langkah Perbaikan:') !!}
    <p>{!! $asetRusak->langkah_perbaikan !!}</p>
</div>

<!-- Catatan Perbaikan Field -->
<div class="form-group">
    {!! Form::label('catatan_perbaikan', 'Catatan Perbaikan:') !!}
    <p>{!! $asetRusak->catatan_perbaikan !!}</p>
</div>

<!-- Rekomendasi Field -->
<div class="form-group">
    {!! Form::label('rekomendasi', 'Rekomendasi:') !!}
    <p>{!! $asetRusak->rekomendasi !!}</p>
</div>

<!-- Mengetahui1 Field -->
<div class="form-group">
    {!! Form::label('mengetahui1', 'Mengetahui1:') !!}
    <p>{!! $asetRusak->mengetahui1 !!}</p>
</div>

<!-- Jabatan Mengetahui1 Field -->
<div class="form-group">
    {!! Form::label('jabatan_mengetahui1', 'Jabatan Mengetahui1:') !!}
    <p>{!! $asetRusak->jabatan_mengetahui1 !!}</p>
</div>

<!-- Mengetahui2 Field -->
<div class="form-group">
    {!! Form::label('mengetahui2', 'Mengetahui2:') !!}
    <p>{!! $asetRusak->mengetahui2 !!}</p>
</div>

<!-- Jabatan Mengetahui2 Field -->
<div class="form-group">
    {!! Form::label('jabatan_mengetahui2', 'Jabatan Mengetahui2:') !!}
    <p>{!! $asetRusak->jabatan_mengetahui2 !!}</p>
</div>

<!-- Check Field -->
<div class="form-group">
    {!! Form::label('check', 'Check:') !!}
    <p>{!! $asetRusak->check !!}</p>
</div>

<!-- Jabatan Check Field -->
<div class="form-group">
    {!! Form::label('jabatan_check', 'Jabatan Check:') !!}
    <p>{!! $asetRusak->jabatan_check !!}</p>
</div>

<!-- Raised By Field -->
<div class="form-group">
    {!! Form::label('raised_by', 'Raised By:') !!}
    <p>{!! $asetRusak->raised_by !!}</p>
</div>

<!-- Jabatan Raised By Field -->
<div class="form-group">
    {!! Form::label('jabatan_raised_by', 'Jabatan Raised By:') !!}
    <p>{!! $asetRusak->jabatan_raised_by !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $asetRusak->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $asetRusak->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $asetRusak->deleted_at !!}</p>
</div>

