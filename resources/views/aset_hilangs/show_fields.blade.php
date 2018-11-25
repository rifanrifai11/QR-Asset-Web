<!-- Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $asetHilang->id !!}</p>
</div>

<!-- Nomor Surat Field -->
<div class="form-group">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    <p>{!! $asetHilang->nomor_surat !!}</p>
</div>

<!-- Data Aset Field -->
<div class="form-group">
    {!! Form::label('data_aset_id', 'Data Aset:') !!}
    <p>{!! $asetHilang->dataAset->grub_asets->nama !!}</p>
</div>

<!-- Users Field -->
<div class="form-group">
    {!! Form::label('users_id', 'Users:') !!}
    <p>{!! $asetHilang->user->name !!}</p>
</div>

<!-- Tanggal Kejadian Field -->
<div class="form-group">
    {!! Form::label('tanggal_kejadian', 'Tanggal Kejadian:') !!}
    <p>{!! \Carbon\Carbon::parse($asetHilang->tanggal_kejadian)->format('d-m-Y')  !!}</p>
</div>

<!-- Waktu Kejadian Field -->
<div class="form-group">
    {!! Form::label('waktu_kejadian', 'Waktu Kejadian:') !!}
    <p>{!! $asetHilang->waktu_kejadian !!}</p>
</div>

<!-- Lokasi Kejadian Field -->
<div class="form-group">
    {!! Form::label('lokasi_kejadian', 'Lokasi Kejadian:') !!}
    <p>{!! $asetHilang->lokasi_kejadian !!}</p>
</div>

<!-- Kronologis Kejadian Field -->
<div class="form-group">
    {!! Form::label('kronologis_kejadian', 'Kronologis Kejadian:') !!}
    <p>{!! $asetHilang->kronologis_kejadian !!}</p>
</div>

<!-- Mengetahui1 Field -->
<div class="form-group">
    {!! Form::label('mengetahui1', 'Mengetahui1:') !!}
    <p>{!! $asetHilang->mengetahui1 !!}</p>
</div>

<!-- Jabatan Mengetahui1 Field -->
<div class="form-group">
    {!! Form::label('jabatan_mengetahui1', 'Jabatan Mengetahui1:') !!}
    <p>{!! $asetHilang->jabatan_mengetahui1 !!}</p>
</div>

<!-- Mengetahui2 Field -->
<div class="form-group">
    {!! Form::label('mengetahui2', 'Mengetahui2:') !!}
    <p>{!! $asetHilang->mengetahui2 !!}</p>
</div>

<!-- Jabatan Mengetahui2 Field -->
<div class="form-group">
    {!! Form::label('jabatan_mengetahui2', 'Jabatan Mengetahui2:') !!}
    <p>{!! $asetHilang->jabatan_mengetahui2 !!}</p>
</div>

<!-- Check Field -->
<div class="form-group">
    {!! Form::label('check', 'Check:') !!}
    <p>{!! $asetHilang->check !!}</p>
</div>

<!-- Jabatan Check Field -->
<div class="form-group">
    {!! Form::label('jabatan_check', 'Jabatan Check:') !!}
    <p>{!! $asetHilang->jabatan_check !!}</p>
</div>

<!-- Raised By Field -->
<div class="form-group">
    {!! Form::label('raised_by', 'Raised By:') !!}
    <p>{!! $asetHilang->raised_by !!}</p>
</div>

<!-- Jabatan Raised By Field -->
<div class="form-group">
    {!! Form::label('jabatan_raised_by', 'Jabatan Raised By:') !!}
    <p>{!! $asetHilang->jabatan_raised_by !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $asetHilang->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $asetHilang->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $asetHilang->deleted_at !!}</p>
</div>

