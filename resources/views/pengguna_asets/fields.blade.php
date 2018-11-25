<!-- No Bast Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_bast', 'No Bast:') !!}
    {!! Form::text('no_bast', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nrp', 'Nrp:') !!}
    {!! Form::text('nrp', null, ['class' => 'form-control']) !!}
</div>

<!-- Lokasi Kerja Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi_kerja', 'Lokasi Kerja:') !!}
    {!! Form::text('lokasi_kerja', null, ['class' => 'form-control']) !!}
</div>

<!-- Departemen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departemen_id', 'Departemen:') !!}
    {!! Form::number('departemen_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Atasan Langsung Field -->
<div class="form-group col-sm-6">
    {!! Form::label('atasan_langsung', 'Atasan Langsung:') !!}
    {!! Form::text('atasan_langsung', null, ['class' => 'form-control']) !!}
</div>

<!-- Pic Aset Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pic_aset', 'Pic Aset:') !!}
    {!! Form::text('pic_aset', null, ['class' => 'form-control']) !!}
</div>

<!-- Posisi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('posisi', 'Posisi:') !!}
    {!! Form::text('posisi', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('penggunaAsets.index') !!}" class="btn btn-default">Cancel</a>
</div>
