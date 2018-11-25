<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nomor Surat</th>
        <th>Data Aset Id</th>
        <th>Users Id</th>
        <th>Tanggal Bast</th>
        <th>Nama</th>
        <th>Nik</th>
        <th>Departemen Id</th>
        <th>Jobsite Id</th>
        <th>Jabatan</th>
        <th>Atasan Langsung</th>
        <th>Diserahkan Oleh</th>
        <th>Jabatan Diserahkan</th>
        <th>Cek Oleh</th>
        <th>Jabatan Cek</th>
        <th>Penerima Oleh</th>
        <th>Jabatan Penerima</th>
        <th>Jabatan Project Manager</th>
        <th>Nama Project Manager</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($asetBasts as $asetBast)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $asetBast->nomor_surat !!}</td>
            <td>{!! $asetBast->data_aset_id !!}</td>
            <td>{!! $asetBast->users_id !!}</td>
            <td>{!! $asetBast->tanggal_bast !!}</td>
            <td>{!! $asetBast->nama !!}</td>
            <td>{!! $asetBast->nik !!}</td>
            <td>{!! $asetBast->departemen_id !!}</td>
            <td>{!! $asetBast->jobsite_id !!}</td>
            <td>{!! $asetBast->jabatan !!}</td>
            <td>{!! $asetBast->atasan_langsung !!}</td>
            <td>{!! $asetBast->diserahkan_oleh !!}</td>
            <td>{!! $asetBast->jabatan_diserahkan !!}</td>
            <td>{!! $asetBast->cek_oleh !!}</td>
            <td>{!! $asetBast->jabatan_cek !!}</td>
            <td>{!! $asetBast->penerima_oleh !!}</td>
            <td>{!! $asetBast->jabatan_penerima !!}</td>
            <td>{!! $asetBast->jabatan_project_manager !!}</td>
            <td>{!! $asetBast->nama_project_manager !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['asetBasts.destroy', $asetBast->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetBasts.show', [$asetBast->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('asetBasts.edit', [$asetBast->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
