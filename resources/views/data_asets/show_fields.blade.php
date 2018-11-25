<!-- Aset Field -->
<div class="form-group col-md-3">
    {!! Form::label('aset_id', 'Nama Aset:') !!}
    <p>{!! $dataAset->grub_asets->nama or "" !!}</p>
</div>

<!-- Urut Field -->
<div class="form-group col-md-3">
    {!! Form::label('urut', 'Urut:') !!}
    <p>{!! $dataAset->urut !!}</p>
</div>

<!-- Data Aset Field -->
<div class="form-group col-md-3">
    {!! Form::label('kode_data_aset', 'Kode Data Aset:') !!}
    <p>{!! $dataAset->kode_data_aset !!}</p>
</div>

<div class="form-group col-md-3">
    {!! Form::label('nilai_sisa', 'Taksiran Nilai Sisa:') !!}
    <p>{!! number_format($dataAset->nilai_sisa) !!}</p>
</div>

<div class="form-group col-md-3">
    {!! Form::label('penyusutan_tahun', 'Penyusutan Per Tahun:') !!}
    <p>{!! number_format($dataAset->penyusutan_per_tahun) !!}</p>
</div>

<div class="form-group col-md-3">
    {!! Form::label('penyusutan_bulan', 'Penyusutan Per Bulan:') !!}
    <p>{!! number_format($dataAset->penyusutan_per_bulan) !!}</p>
</div>

<div class="form-group col-md-3">
    {!! Form::label('masa_pakai_bulan', 'Masa Pakai (Bulan):') !!}
    <p>{!! number_format($dataAset->masa_pakai_bulan) !!}</p>
</div>

<div class="form-group col-md-3">
    {!! Form::label('masa_pakai_tahun', 'Masa Pakai (Tahun):') !!}
    <p>{!! number_format($dataAset->masa_pakai_tahun) !!}</p>
</div>


<div class="form-group col-md-3">
    {!! Form::label('taksiran_bulan', 'Taksiran Harga Sekarang (Penyusutan Per Bulan):') !!}
    <p>{!! number_format($dataAset->harga_sekarang_bulan) !!}</p>
</div>


<!-- Spesifikasi Field -->
<div class="form-group col-md-3">
    {!! Form::label('spesifikasi', 'Spesifikasi:') !!}
    <p>{!! $dataAset->spesifikasi !!}</p>
</div>

<!-- Tanggal Registrasi Field -->
<div class="form-group col-md-3">
    {!! Form::label('tanggal_registrasi', 'Tanggal Registrasi:') !!}
    <p>{!! \Carbon\Carbon::parse( $dataAset->tanggal_registrasi)->format('d-m-Y') !!}</p>
</div>

<!-- Foto1 Field -->
<div class="form-group col-md-12">
    {!! Form::label('foto1', 'Foto1:') !!}
    <p><img id="cropfoto1" src="{{isset($dataAset->foto1)?file_exists( public_path() . '/storage/' . $dataAset->foto1)?asset('/storage/'.$dataAset->foto1):asset('images/no-image.png'):asset('images/no-image.png')}}" alt="your image"  width="337" height="213"  /></p>
</div>

<!-- Foto2 Field -->
{{--<div class="form-group col-md-3">
    {!! Form::label('foto2', 'Foto2:') !!}
    <p>{!! $dataAset->foto2 !!}</p>
</div>

<!-- Foto3 Field -->
<div class="form-group col-md-3">
    {!! Form::label('foto3', 'Foto3:') !!}
    <p>{!! $dataAset->foto3 !!}</p>
</div>

<!-- Foto4 Field -->
<div class="form-group col-md-3">
    {!! Form::label('foto4', 'Foto4:') !!}
    <p>{!! $dataAset->foto4 !!}</p>
</div>--}}

