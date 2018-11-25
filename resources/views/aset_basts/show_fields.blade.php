<!-- Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $asetBast->id !!}</p>
</div>

<!-- Nomor Surat Field -->
<div class="form-group">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    <p>{!! $asetBast->nomor_surat !!}</p>
</div>

<!-- Data Aset Field -->
<div class="form-group">
    {!! Form::label('data_aset_id', 'Data Aset:') !!}
    <p>{!! $asetBast->dataAset->grub_asets->nama !!}</p>
</div>

<!-- Users Field -->
<div class="form-group">
    {!! Form::label('users_id', 'Users:') !!}
    <p>{!! $asetBast->user->name !!}</p>
</div>

<!-- Tanggal Bast Field -->
<div class="form-group">
    {!! Form::label('tanggal_bast', 'Tanggal Bast:') !!}
    <p>{!! \Carbon\Carbon::parse( $asetBast->tanggal_bast)->format('d-m-Y') !!}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $asetBast->nama !!}</p>
</div>

<!-- Nik Field -->
<div class="form-group">
    {!! Form::label('nik', 'Nik:') !!}
    <p>{!! $asetBast->nik !!}</p>
</div>

<!-- Departemen Field -->
<div class="form-group">
    {!! Form::label('departemen_id', 'Departemen:') !!}
    <p>{!! $asetBast->departemen->nama !!}</p>
</div>

<!-- Jabatan Field -->
<div class="form-group">
    {!! Form::label('jabatan', 'Jabatan:') !!}
    <p>{!! $asetBast->jabatan !!}</p>
</div>

<!-- Jobsite Field -->
<div class="form-group">
    {!! Form::label('jobsite', 'Jobsite:') !!}
    <p>{!! $asetBast->jobsite->nama !!}</p>
</div>

<!-- Atasan Langsung Field -->
<div class="form-group">
    {!! Form::label('atasan_langsung', 'Atasan Langsung:') !!}
    <p>{!! $asetBast->atasan_langsung !!}</p>
</div>

<!-- Diserahkan Oleh Field -->
<div class="form-group">
    {!! Form::label('diserahkan_oleh', 'Diserahkan Oleh:') !!}
    <p>{!! $asetBast->diserahkan_oleh !!}</p>
</div>

<!-- Jabatan Diserahkan Field -->
<div class="form-group">
    {!! Form::label('jabatan_diserahkan', 'Jabatan Diserahkan:') !!}
    <p>{!! $asetBast->jabatan_diserahkan !!}</p>
</div>

<!-- Cek Oleh Field -->
<div class="form-group">
    {!! Form::label('cek_oleh', 'Cek Oleh:') !!}
    <p>{!! $asetBast->cek_oleh !!}</p>
</div>

<!-- Jabatan Cek Field -->
<div class="form-group">
    {!! Form::label('jabatan_cek', 'Jabatan Cek:') !!}
    <p>{!! $asetBast->jabatan_cek !!}</p>
</div>

<!-- Penerima Oleh Field -->
<div class="form-group">
    {!! Form::label('penerima_oleh', 'Penerima Oleh:') !!}
    <p>{!! $asetBast->penerima_oleh !!}</p>
</div>

<!-- Jabatan Penerima Field -->
<div class="form-group">
    {!! Form::label('jabatan_penerima', 'Jabatan Penerima:') !!}
    <p>{!! $asetBast->jabatan_penerima !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $asetBast->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $asetBast->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $asetBast->deleted_at !!}</p>
</div>

