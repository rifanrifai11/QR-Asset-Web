<!-- Kode Field -->
<div class="form-group row mb-1">
    {!! Form::label('kode', 'Kode',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $grubAset->kode !!}</p>
    </div>
</div>

<!-- Nama Field -->
<div class="form-group row mb-1">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $grubAset->nama !!}</p>
    </div>
</div>

<!-- Parent Grub Aset Kode Field -->
<div class="form-group row mb-1">
    {!! Form::label('parent_grub_aset_kode', 'Parent Grub Aset Kode',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $grubAset->parent_grub_aset_kode !!}</p>
    </div>
</div>

<!-- Keterangan Field -->
<div class="form-group row mb-1">
    {!! Form::label('keterangan', 'Keterangan',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $grubAset->keterangan !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $grubAset->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $grubAset->updated_at !!}</p>
    </div>
</div>

<!-- Deleted At Field -->
<div class="form-group row mb-1">
    {!! Form::label('deleted_at', 'Deleted At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $grubAset->deleted_at !!}</p>
    </div>
</div>

<!-- Umur Ekonomis Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('umur_ekonomis_id', 'Umur Ekonomis Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $grubAset->umur_ekonomis_id !!}</p>
    </div>
</div>

<!-- Kategori Aset Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('kategori_aset_id', 'Kategori Aset Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $grubAset->kategori_aset_id !!}</p>
    </div>
</div>

<!-- Persentase Sisa Field -->
<div class="form-group row mb-1">
    {!! Form::label('persentase_sisa', 'Persentase Sisa',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $grubAset->persentase_sisa !!}</p>
    </div>
</div>

