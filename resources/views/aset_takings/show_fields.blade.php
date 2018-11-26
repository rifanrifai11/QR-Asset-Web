<!-- Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('id', 'Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $asetTaking->id !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $asetTaking->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $asetTaking->updated_at !!}</p>
    </div>
</div>

<!-- Deleted At Field -->
<div class="form-group row mb-1">
    {!! Form::label('deleted_at', 'Deleted At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $asetTaking->deleted_at !!}</p>
    </div>
</div>

<!-- Users Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('users_id', 'Users Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $asetTaking->users_id !!}</p>
    </div>
</div>

<!-- Data Aset Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('data_aset_id', 'Data Aset Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $asetTaking->data_aset_id !!}</p>
    </div>
</div>

<!-- Kondisi Aset Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('kondisi_aset_id', 'Kondisi Aset Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $asetTaking->kondisi_aset_id !!}</p>
    </div>
</div>

