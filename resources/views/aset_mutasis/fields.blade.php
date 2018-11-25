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

<!-- Nama Pengguna Baru Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_pengguna_baru', 'Nama Pengguna Baru:') !!}
    {!! Form::text('nama_pengguna_baru', null, ['class' => 'form-control']) !!}
</div>

<!-- Posisi Pengguna Baru Field -->
<div class="form-group col-sm-6">
    {!! Form::label('posisi_pengguna_baru', 'Posisi Pengguna Baru:') !!}
    {!! Form::text('posisi_pengguna_baru', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Pengguna Baru Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_pengguna_baru', 'Jabatan Pengguna Baru:') !!}
    {!! Form::text('jabatan_pengguna_baru', null, ['class' => 'form-control']) !!}
</div>

<!-- Departemen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departemen_id', 'Departemen:') !!}
    {!! Form::select('departemen_id',$departemen, null, ['class' => 'form-control']) !!}
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

<!-- Diserahkan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diserahkan', 'Diserahkan:') !!}
    {!! Form::text('diserahkan', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Diserahkan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_diserahkan', 'Jabatan Diserahkan:') !!}
    {!! Form::text('jabatan_diserahkan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

    @if(isset($_GET['url_callback']))
        <a href="{!! url($_GET['url_callback']) !!}" class="btn btn-default">Cancel</a>
    @else
    <a href="{!! route('asetMutasis.index') !!}" class="btn btn-default">Cancel</a>
        @endif
</div>
