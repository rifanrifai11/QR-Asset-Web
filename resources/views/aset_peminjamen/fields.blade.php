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

<!-- Nomor Peminjam Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_peminjam', 'Nomor Peminjam:') !!}
    {!! Form::text('nomor_peminjam', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Peminjam Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_peminjam', 'Nama Peminjam:') !!}
    {!! Form::text('nama_peminjam', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nrp', 'Nrp:') !!}
    {!! Form::text('nrp', null, ['class' => 'form-control']) !!}
</div>

<!-- Departemen Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departemen_id', 'Departemen Id:') !!}
    {!! Form::number('departemen_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan', 'Jabatan:') !!}
    {!! Form::text('jabatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Alasan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alasan', 'Alasan:') !!}
    {!! Form::text('alasan', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Peminjaman Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_peminjaman', 'Tanggal Peminjaman:') !!}
    {!! Form::date('tanggal_peminjaman', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Peminjaman Awal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_peminjaman_awal', 'Waktu Peminjaman Awal:') !!}
    {!! Form::text('waktu_peminjaman_awal', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Peminjaman Akhir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_peminjaman_akhir', 'Waktu Peminjaman Akhir:') !!}
    {!! Form::text('waktu_peminjaman_akhir', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Pengembalian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_pengembalian', 'Tanggal Pengembalian:') !!}
    {!! Form::date('tanggal_pengembalian', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Pengembalian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_pengembalian', 'Waktu Pengembalian:') !!}
    {!! Form::date('waktu_pengembalian', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Peminjam Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_peminjam', 'Jabatan Peminjam:') !!}
    {!! Form::text('jabatan_peminjam', null, ['class' => 'form-control']) !!}
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

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('asetPeminjamen.index') !!}" class="btn btn-danger">
        <i class="fa fa-check-square-o"></i> Cancel
    </a>
    {!! Form::submit('Save', ['class' => 'btn btn-success mr-1']) !!}
</div>

