<div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Grub Aset Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_grub_aset_kode', 'Parent Grub Aset:') !!}
    {!! Form::select('parent_grub_aset_kode', $parent_grub_aset,null, ['class' => 'form-control']) !!}
</div>

<!-- Umur Ekonomis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('umur_ekonomis_id', 'Umur Ekonomis:') !!}
    {!! Form::select('umur_ekonomis_id', $umur_ekonomis, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('persentase_sisa', 'Persentase Sisa Setelah Umur Ekonomis:') !!}
    {!! Form::number('persentase_sisa', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('kategori_aset_id', 'Kategori :') !!}
    {!! Form::select('kategori_aset_id', $kategori_aset, null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('grubAsets.index') !!}" class="btn btn-default">Cancel</a>
</div>
