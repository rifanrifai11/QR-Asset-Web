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

<!-- Nomor General Request Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_general_request', 'Nomor General Request:') !!}
    {!! Form::text('nomor_general_request', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Purchase Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_purchase_order', 'Nomor Purchase Order:') !!}
    {!! Form::text('nomor_purchase_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Pembelian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_pembelian', 'Tanggal Pembelian:') !!}
    {!! Form::date('tanggal_pembelian', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_barang', 'Harga Barang:') !!}
    {!! Form::number('harga_barang', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('asetPembelians.index') !!}" class="btn btn-default">Cancel</a>
        @endif
</div>
