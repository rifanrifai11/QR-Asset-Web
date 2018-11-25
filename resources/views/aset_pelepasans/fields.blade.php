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

<!-- Metode Pelepasan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('metode_pelepasan', 'Metode Pelepasan:') !!}
    {!! Form::text('metode_pelepasan', null, ['class' => 'form-control']) !!}
</div>

<!-- Catatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('catatan', 'Catatan:') !!}
    {!! Form::text('catatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Saat Ini Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto_saat_ini', 'Foto Saat Ini:') !!}
    {!! Form::text('foto_saat_ini', null, ['class' => 'form-control']) !!}
</div>

<!-- Menyetujui Field -->
<div class="form-group col-sm-6">
    {!! Form::label('menyetujui', 'Menyetujui:') !!}
    {!! Form::text('menyetujui', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Menyetujui Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_menyetujui', 'Jabatan Menyetujui:') !!}
    {!! Form::text('jabatan_menyetujui', null, ['class' => 'form-control']) !!}
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

<!-- Diajukan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diajukan', 'Diajukan:') !!}
    {!! Form::text('diajukan', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Diajukan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_diajukan', 'Jabatan Diajukan:') !!}
    {!! Form::text('jabatan_diajukan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

    @if(isset($_GET['url_callback']))
        <a href="{!! url($_GET['url_callback']) !!}" class="btn btn-default">Cancel</a>
    @else
    <a href="{!! route('asetPelepasans.index') !!}" class="btn btn-default">Cancel</a>
        @endif
</div>
