<!-- Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('id', 'Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $departemen->id !!}</p>
    </div>
</div>

<!-- Kode Field -->
<div class="form-group row mb-1">
    {!! Form::label('kode', 'Kode',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $departemen->kode !!}</p>
    </div>
</div>

<!-- Nama Field -->
<div class="form-group row mb-1">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $departemen->nama !!}</p>
    </div>
</div>

<!-- Keterangan Field -->
<div class="form-group row mb-1">
    {!! Form::label('keterangan', 'Keterangan',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $departemen->keterangan !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $departemen->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $departemen->updated_at !!}</p>
    </div>
</div>

<!-- Deleted At Field -->
<div class="form-group row mb-1">
    {!! Form::label('deleted_at', 'Deleted At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $departemen->deleted_at !!}</p>
    </div>
</div>

<!-- Parent Departemen Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('parent_departemen_id', 'Parent Departemen Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $departemen->parent_departemen_id !!}</p>
    </div>
</div>

