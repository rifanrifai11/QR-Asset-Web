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

<!-- Tanggal Kejadian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_kejadian', 'Tanggal Kejadian:') !!}
    {!! Form::text('tanggal_kejadian', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Kejadian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_kejadian', 'Waktu Kejadian:') !!}
    {!! Form::text('waktu_kejadian', null, ['class' => 'form-control']) !!}
</div>

<!-- Lokasi Kejadian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi_kejadian', 'Lokasi Kejadian:') !!}
    {!! Form::text('lokasi_kejadian', null, ['class' => 'form-control']) !!}
</div>

<!-- Kronologis Kejadian Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('kronologis_kejadian', 'Kronologis Kejadian:') !!}
    {!! Form::textarea('kronologis_kejadian', null, ['class' => 'form-control']) !!}
</div>

<!-- Langkah Perbaikan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('langkah_perbaikan', 'Langkah Perbaikan:') !!}
    {!! Form::textarea('langkah_perbaikan', null, ['class' => 'form-control']) !!}
</div>

<!-- Catatan Perbaikan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('catatan_perbaikan', 'Catatan Perbaikan:') !!}
    {!! Form::textarea('catatan_perbaikan', null, ['class' => 'form-control']) !!}
</div>

<!-- Rekomendasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rekomendasi', 'Rekomendasi:') !!}
    {!! Form::text('rekomendasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Mengetahui1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mengetahui1', 'Mengetahui1:') !!}
    {!! Form::text('mengetahui1', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Mengetahui1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_mengetahui1', 'Jabatan Mengetahui1:') !!}
    {!! Form::text('jabatan_mengetahui1', null, ['class' => 'form-control']) !!}
</div>

<!-- Mengetahui2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mengetahui2', 'Mengetahui2:') !!}
    {!! Form::text('mengetahui2', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Mengetahui2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_mengetahui2', 'Jabatan Mengetahui2:') !!}
    {!! Form::text('jabatan_mengetahui2', null, ['class' => 'form-control']) !!}
</div>

<!-- Check Field -->
<div class="form-group col-sm-6">
    {!! Form::label('check', 'Check:') !!}
    {!! Form::text('check', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Check Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_check', 'Jabatan Check:') !!}
    {!! Form::text('jabatan_check', null, ['class' => 'form-control']) !!}
</div>

<!-- Raised By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('raised_by', 'Raised By:') !!}
    {!! Form::text('raised_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Raised By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_raised_by', 'Jabatan Raised By:') !!}
    {!! Form::text('jabatan_raised_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

    @if(isset($_GET['url_callback']))
        <a href="{!! url($_GET['url_callback']) !!}" class="btn btn-default">Cancel</a>
    @else
    <a href="{!! route('asetRusaks.index') !!}" class="btn btn-default">Cancel</a>
        @endif
</div>

<script type="text/javascript">

    $( function() {
        $( "#tanggal_kejadian" ).datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    } );



    $( function() {
        $( "#waktu_kejadian" ).timepicker({
            format: "HH:mm",
            maxHours:24,
            showMeridian:false,
             /*autoclose: true,*/
            showInputs: false
        });
    } );
</script>