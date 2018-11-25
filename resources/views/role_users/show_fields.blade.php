<!-- User Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('user_id', 'User Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $roleUser->user_id !!}</p>
    </div>
</div>

<!-- Role Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('role_id', 'Role Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $roleUser->role_id !!}</p>
    </div>
</div>

