<!-- Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $asetPengembalian->id !!}</p>
</div>

<!-- Nomor Surat Field -->
<div class="form-group">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    <p>{!! $asetPengembalian->nomor_surat !!}</p>
</div>

<!-- Data Aset Field -->
<div class="form-group">
    {!! Form::label('data_aset_id', 'Data Aset:') !!}
    <p>{!! $asetPengembalian->dataAset->grub_asets->nama !!}</p>
</div>

<!-- Users Field -->
<div class="form-group">
    {!! Form::label('users_id', 'Users:') !!}
    <p>{!! $asetPengembalian->user->name !!}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $asetPengembalian->nama !!}</p>
</div>

<!-- Nik Field -->
<div class="form-group">
    {!! Form::label('nik', 'Nik:') !!}
    <p>{!! $asetPengembalian->nik !!}</p>
</div>

<!-- Jabatan Field -->
<div class="form-group">
    {!! Form::label('jabatan', 'Jabatan:') !!}
    <p>{!! $asetPengembalian->jabatan !!}</p>
</div>

<!-- Departemen Field -->
<div class="form-group">
    {!! Form::label('departemen_id', 'Departemen:') !!}
    <p>{!! $asetPengembalian->departemen_id !!}</p>
</div>

<!-- Lokasi Field -->
<div class="form-group">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    <p>{!! $asetPengembalian->lokasi !!}</p>
</div>

<!-- Atasan Langsung Field -->
<div class="form-group">
    {!! Form::label('atasan_langsung', 'Atasan Langsung:') !!}
    <p>{!! $asetPengembalian->atasan_langsung !!}</p>
</div>

<!-- Diserahkan Field -->
<div class="form-group">
    {!! Form::label('diserahkan', 'Diserahkan:') !!}
    <p>{!! $asetPengembalian->diserahkan !!}</p>
</div>

<!-- Jabatan Diserahkan Field -->
<div class="form-group">
    {!! Form::label('jabatan_diserahkan', 'Jabatan Diserahkan:') !!}
    <p>{!! $asetPengembalian->jabatan_diserahkan !!}</p>
</div>

<!-- Cek Field -->
<div class="form-group">
    {!! Form::label('cek', 'Cek:') !!}
    <p>{!! $asetPengembalian->cek !!}</p>
</div>

<!-- Jabatan Cek Field -->
<div class="form-group">
    {!! Form::label('jabatan_cek', 'Jabatan Cek:') !!}
    <p>{!! $asetPengembalian->jabatan_cek !!}</p>
</div>

<!-- Penerima Field -->
<div class="form-group">
    {!! Form::label('penerima', 'Penerima:') !!}
    <p>{!! $asetPengembalian->penerima !!}</p>
</div>

<!-- Jabatan Penerima Field -->
<div class="form-group">
    {!! Form::label('jabatan_penerima', 'Jabatan Penerima:') !!}
    <p>{!! $asetPengembalian->jabatan_penerima !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $asetPengembalian->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $asetPengembalian->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $asetPengembalian->deleted_at !!}</p>
</div>

