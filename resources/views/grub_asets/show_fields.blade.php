<!-- Field -->
<div class="form-group">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{!! $grubAset->kode !!}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $grubAset->nama !!}</p>
</div>

<!-- Parent Grub Aset Field -->
<div class="form-group">
    {!! Form::label('parent_grub_aset_kode', 'Parent Grub Aset:') !!}
    <p>{!! $grubAset->parent->nama or '' !!}</p>
</div>

<!-- Umur Ekonomis Field -->
<div class="form-group">
    {!! Form::label('umur_ekonomis_id', 'Umur Ekonomis:') !!}
    <p>{!! $grubAset->umurEkonomis->nama or '' !!}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{!! $grubAset->keterangan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $grubAset->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $grubAset->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $grubAset->deleted_at !!}</p>
</div>



