<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Grub Aset Kode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_grub_aset_kode', 'Parent Grub Aset Kode:') !!}
    {!! Form::text('parent_grub_aset_kode', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Umur Ekonomis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('umur_ekonomis_id', 'Umur Ekonomis Id:') !!}
    {!! Form::number('umur_ekonomis_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Kategori Aset Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_aset_id', 'Kategori Aset Id:') !!}
    {!! Form::number('kategori_aset_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Persentase Sisa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('persentase_sisa', 'Persentase Sisa:') !!}
    {!! Form::number('persentase_sisa', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('grupAsets.index') !!}" class="btn btn-danger">
        <i class="fa fa-check-square-o"></i> Cancel
    </a>
    {!! Form::submit('Save', ['class' => 'btn btn-success mr-1']) !!}
</div>

