<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nomor Surat</th>
        <th>Data Aset Id</th>
        <th>Users Id</th>
        <th>Nama Pengguna Baru</th>
        <th>Posisi Pengguna Baru</th>
        <th>Jabatan Pengguna Baru</th>
        <th>Departemen Id</th>
        <th>Mengetahui</th>
        <th>Jabatan Mengetahui</th>
        <th>Diserahkan</th>
        <th>Jabatan Diserahkan</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($asetMutasis as $asetMutasi)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $asetMutasi->nomor_surat !!}</td>
            <td>{!! $asetMutasi->data_aset_id !!}</td>
            <td>{!! $asetMutasi->users_id !!}</td>
            <td>{!! $asetMutasi->nama_pengguna_baru !!}</td>
            <td>{!! $asetMutasi->posisi_pengguna_baru !!}</td>
            <td>{!! $asetMutasi->jabatan_pengguna_baru !!}</td>
            <td>{!! $asetMutasi->departemen_id !!}</td>
            <td>{!! $asetMutasi->mengetahui !!}</td>
            <td>{!! $asetMutasi->jabatan_mengetahui !!}</td>
            <td>{!! $asetMutasi->diserahkan !!}</td>
            <td>{!! $asetMutasi->jabatan_diserahkan !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['asetMutasis.destroy', $asetMutasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetMutasis.show', [$asetMutasi->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('asetMutasis.edit', [$asetMutasi->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
