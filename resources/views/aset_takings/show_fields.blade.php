<!-- Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $asetTaking->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $asetTaking->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $asetTaking->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $asetTaking->deleted_at !!}</p>
</div>

<!-- Users Field -->
<div class="form-group">
    {!! Form::label('users_id', 'Users:') !!}
    <p>{!! $asetTaking->user->name !!}</p>
</div>

<!-- Data Aset Field -->
<div class="form-group">
    {!! Form::label('data_aset_id', 'Data Aset:') !!}
    <p>{!! $asetTaking->dataAset->grub_asets->nama !!}</p>
</div>

<!-- Kondisi Aset Field -->
<div class="form-group">
    {!! Form::label('kondisi_aset_id', 'Kondisi Aset:') !!}
    <p>{!! $asetTaking->kondisi_aset_id !!}</p>
</div>

