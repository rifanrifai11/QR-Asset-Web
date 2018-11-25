<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Tahun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun', 'Tahun:') !!}
    {!! Form::number('tahun', null, ['class' => 'form-control']) !!}
</div>

<!-- Nilai Rumus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_rumus', 'Nilai Rumus:') !!}
    {!! Form::number('nilai_rumus', null, ['class' => 'form-control','step'=>".01"]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('umurEkonomis.index') !!}" class="btn btn-default">Cancel</a>
</div>
