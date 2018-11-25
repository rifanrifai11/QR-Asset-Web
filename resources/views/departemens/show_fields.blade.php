<!-- Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $departemen->id !!}</p>
</div>

<!-- Field -->
<div class="form-group">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{!! $departemen->kode !!}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $departemen->nama !!}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{!! $departemen->keterangan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $departemen->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $departemen->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $departemen->deleted_at !!}</p>
</div>

<!-- Parent Departemen Field -->
<div class="form-group">
    {!! Form::label('parent_departemen_id', 'Parent Departemen:') !!}
    <p>{!! $departemen->parent_departemen_id !!}</p>
</div>

