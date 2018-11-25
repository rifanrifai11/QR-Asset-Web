<!-- Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $asetPeminjaman->id !!}</p>
</div>

<!-- Nomor Surat Field -->
<div class="form-group">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    <p>{!! $asetPeminjaman->nomor_surat !!}</p>
</div>

<!-- Data Aset Field -->
<div class="form-group">
    {!! Form::label('data_aset_id', 'Data Aset:') !!}
    <p>{!! $asetPeminjaman->dataAset->grub_asets->nama !!}</p>
</div>

<!-- Users Field -->
<div class="form-group">
    {!! Form::label('users_id', 'Users:') !!}
    <p>{!! $asetPeminjaman->user->name !!}</p>
</div>

<!-- Nomor Peminjam Field -->
<div class="form-group">
    {!! Form::label('nomor_peminjam', 'Nomor Peminjam:') !!}
    <p>{!! $asetPeminjaman->nomor_peminjam !!}</p>
</div>

<!-- Nama Peminjam Field -->
<div class="form-group">
    {!! Form::label('nama_peminjam', 'Nama Peminjam:') !!}
    <p>{!! $asetPeminjaman->nama_peminjam !!}</p>
</div>

<!-- Nrp Field -->
<div class="form-group">
    {!! Form::label('nrp', 'Nrp:') !!}
    <p>{!! $asetPeminjaman->nrp !!}</p>
</div>

<!-- Departemen Field -->
<div class="form-group">
    {!! Form::label('departemen_id', 'Departemen:') !!}
    <p>{!! $asetPeminjaman->departemen_id !!}</p>
</div>

<!-- Jabatan Field -->
<div class="form-group">
    {!! Form::label('jabatan', 'Jabatan:') !!}
    <p>{!! $asetPeminjaman->jabatan !!}</p>
</div>

<!-- Alasan Field -->
<div class="form-group">
    {!! Form::label('alasan', 'Alasan:') !!}
    <p>{!! $asetPeminjaman->alasan !!}</p>
</div>

<!-- Tanggal Peminjaman Field -->
<div class="form-group">
    {!! Form::label('tanggal_peminjaman', 'Tanggal Peminjaman:') !!}
    <p>{!! $asetPeminjaman->tanggal_peminjaman !!}</p>
</div>

<!-- Waktu Peminjaman Awal Field -->
<div class="form-group">
    {!! Form::label('waktu_peminjaman_awal', 'Waktu Peminjaman Awal:') !!}
    <p>{!! $asetPeminjaman->waktu_peminjaman_awal !!}</p>
</div>

<!-- Waktu Peminjaman Akhir Field -->
<div class="form-group">
    {!! Form::label('waktu_peminjaman_akhir', 'Waktu Peminjaman Akhir:') !!}
    <p>{!! $asetPeminjaman->waktu_peminjaman_akhir !!}</p>
</div>

<!-- Tanggal Pengembalian Field -->
<div class="form-group">
    {!! Form::label('tanggal_pengembalian', 'Tanggal Pengembalian:') !!}
    <p>{!! $asetPeminjaman->tanggal_pengembalian !!}</p>
</div>

<!-- Waktu Pengembalian Field -->
<div class="form-group">
    {!! Form::label('waktu_pengembalian', 'Waktu Pengembalian:') !!}
    <p>{!! $asetPeminjaman->waktu_pengembalian !!}</p>
</div>

<!-- Jabatan Peminjam Field -->
<div class="form-group">
    {!! Form::label('jabatan_peminjam', 'Jabatan Peminjam:') !!}
    <p>{!! $asetPeminjaman->jabatan_peminjam !!}</p>
</div>

<!-- Mengetahui Field -->
<div class="form-group">
    {!! Form::label('mengetahui', 'Mengetahui:') !!}
    <p>{!! $asetPeminjaman->mengetahui !!}</p>
</div>

<!-- Jabatan Mengetahui Field -->
<div class="form-group">
    {!! Form::label('jabatan_mengetahui', 'Jabatan Mengetahui:') !!}
    <p>{!! $asetPeminjaman->jabatan_mengetahui !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $asetPeminjaman->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $asetPeminjaman->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $asetPeminjaman->deleted_at !!}</p>
</div>

