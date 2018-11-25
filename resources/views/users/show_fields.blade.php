<!-- Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('id', 'Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->id !!}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row mb-1">
    {!! Form::label('name', 'Name',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->name !!}</p>
    </div>
</div>

<!-- Email Field -->
<div class="form-group row mb-1">
    {!! Form::label('email', 'Email',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->email !!}</p>
    </div>
</div>

<!-- Kontak Field -->
<div class="form-group row mb-1">
    {!! Form::label('kontak', 'Kontak',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->kontak !!}</p>
    </div>
</div>

<!-- Password Field -->
<div class="form-group row mb-1">
    {!! Form::label('password', 'Password',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->password !!}</p>
    </div>
</div>

<!-- Remember Token Field -->
<div class="form-group row mb-1">
    {!! Form::label('remember_token', 'Remember Token',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->remember_token !!}</p>
    </div>
</div>

<!-- Alamat Field -->
<div class="form-group row mb-1">
    {!! Form::label('alamat', 'Alamat',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->alamat !!}</p>
    </div>
</div>

<!-- Foto Field -->
<div class="form-group row mb-1">
    {!! Form::label('foto', 'Foto',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->foto !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->updated_at !!}</p>
    </div>
</div>

<!-- Deleted At Field -->
<div class="form-group row mb-1">
    {!! Form::label('deleted_at', 'Deleted At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->deleted_at !!}</p>
    </div>
</div>

<!-- Verified Field -->
<div class="form-group row mb-1">
    {!! Form::label('verified', 'Verified',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->verified !!}</p>
    </div>
</div>

<!-- Verification Token Field -->
<div class="form-group row mb-1">
    {!! Form::label('verification_token', 'Verification Token',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->verification_token !!}</p>
    </div>
</div>

<!-- Token Device Field -->
<div class="form-group row mb-1">
    {!! Form::label('token_device', 'Token Device',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $users->token_device !!}</p>
    </div>
</div>

