<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Urut</th>
        <th>Kode Data Aset</th>
        <th>Spesifikasi</th>
        <th>No Registrasi</th>
        <th>Tanggal Registrasi</th>
        <th>Lokasi Id</th>
        <th>Tipe Id</th>
        <th>Vendor Id</th>
        <th>Merek Id</th>
        <th>Foto1</th>
        <th>Foto2</th>
        <th>Foto3</th>
        <th>Foto4</th>
        <th>Grub Aset Kode</th>
        <th>Jobsite Id</th>
        <th>Serial Number</th>
        <th>Departemen Id</th>
        <th>Keterangan</th>
        <th>Nama</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($dataAsets as $dataAset)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $dataAset->urut !!}</td>
            <td>{!! $dataAset->kode_data_aset !!}</td>
            <td>{!! $dataAset->spesifikasi !!}</td>
            <td>{!! $dataAset->no_registrasi !!}</td>
            <td>{!! $dataAset->tanggal_registrasi !!}</td>
            <td>{!! $dataAset->lokasi_id !!}</td>
            <td>{!! $dataAset->tipe_id !!}</td>
            <td>{!! $dataAset->vendor_id !!}</td>
            <td>{!! $dataAset->merek_id !!}</td>
            <td>{!! $dataAset->foto1 !!}</td>
            <td>{!! $dataAset->foto2 !!}</td>
            <td>{!! $dataAset->foto3 !!}</td>
            <td>{!! $dataAset->foto4 !!}</td>
            <td>{!! $dataAset->grub_aset_kode !!}</td>
            <td>{!! $dataAset->jobsite_id !!}</td>
            <td>{!! $dataAset->serial_number !!}</td>
            <td>{!! $dataAset->departemen_id !!}</td>
            <td>{!! $dataAset->keterangan !!}</td>
            <td>{!! $dataAset->nama !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['dataAsets.destroy', $dataAset->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dataAsets.show', [$dataAset->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('dataAsets.edit', [$dataAset->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
