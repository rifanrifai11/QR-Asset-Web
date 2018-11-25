@if(isset($_GET['url_callback']))
    {!! Form::hidden('url_callback', $_GET['url_callback']) !!}
@endif

@if(isset($_GET['data_aset_id']))
    {!! Form::hidden('data_aset_id', $_GET['data_aset_id']) !!}
@endif

<!-- Users Field -->
{!! Form::hidden('users_id', Auth::id()) !!}

<!-- Nomor Surat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    {!! Form::number('nomor_surat', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Peminjam Field -->
{{--<div class="form-group col-sm-6">
    {!! Form::label('nomor_peminjam', 'Nomor Peminjam:') !!}
    {!! Form::text('nomor_peminjam', null, ['class' => 'form-control']) !!}
</div>--}}

<!-- Nama Peminjam Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_peminjam', 'Nama Peminjam:') !!}
    {!! Form::text('nama_peminjam', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nrp', 'NRP:') !!}
    {!! Form::text('nrp', null, ['class' => 'form-control']) !!}
</div>

<!-- Departemen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departemen_id', 'Departemen:') !!}
    {!! Form::select('departemen_id',$departemen, null, ['class' => 'form-control']) !!}
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
    {!! Form::text('tanggal_peminjaman', null, ['class' => 'form-control']) !!}
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
    {!! Form::text('tanggal_pengembalian', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Pengembalian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_pengembalian', 'Waktu Pengembalian:') !!}
    {!! Form::text('waktu_pengembalian', null, ['class' => 'form-control']) !!}
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
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

    @if(isset($_GET['url_callback']))
        <a href="{!! url($_GET['url_callback']) !!}" class="btn btn-default">Cancel</a>
    @else
    <a href="{!! route('asetPeminjamen.index') !!}" class="btn btn-default">Cancel</a>
        @endif
</div>

<script type="text/javascript">

    $( function() {
        $( "#tanggal_pengembalian" ).datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    } );

    $( function() {
        $( "#tanggal_peminjaman" ).datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    } );

    $( function() {
        $( "#waktu_peminjaman_awal" ).timepicker({
            format: "HH:mm",
            maxHours:24,
            showMeridian:false,
            /*autoclose: true,*/
            showInputs: false
        });
    } );

    $( function() {
        $( "#waktu_peminjaman_akhir" ).timepicker({
            format: "HH:mm",
            maxHours:24,
            showMeridian:false,
            /*autoclose: true,*/
            showInputs: false
        });
    } );

    $( function() {
        $( "#waktu_pengembalian" ).timepicker({
            format: "HH:mm",
            maxHours:24,
            showMeridian:false,
            /*autoclose: true,*/
            showInputs: false
        });
    } );
</script>
