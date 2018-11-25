<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nomor Surat</th>
        <th>Data Aset Id</th>
        <th>Users Id</th>
        <th>Nama</th>
        <th>Nik</th>
        <th>Jabatan</th>
        <th>Departemen Id</th>
        <th>Lokasi</th>
        <th>Atasan Langsung</th>
        <th>Diserahkan</th>
        <th>Jabatan Diserahkan</th>
        <th>Cek</th>
        <th>Jabatan Cek</th>
        <th>Penerima</th>
        <th>Jabatan Penerima</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($asetPengembalians as $asetPengembalian)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $asetPengembalian->nomor_surat !!}</td>
            <td>{!! $asetPengembalian->data_aset_id !!}</td>
            <td>{!! $asetPengembalian->users_id !!}</td>
            <td>{!! $asetPengembalian->nama !!}</td>
            <td>{!! $asetPengembalian->nik !!}</td>
            <td>{!! $asetPengembalian->jabatan !!}</td>
            <td>{!! $asetPengembalian->departemen_id !!}</td>
            <td>{!! $asetPengembalian->lokasi !!}</td>
            <td>{!! $asetPengembalian->atasan_langsung !!}</td>
            <td>{!! $asetPengembalian->diserahkan !!}</td>
            <td>{!! $asetPengembalian->jabatan_diserahkan !!}</td>
            <td>{!! $asetPengembalian->cek !!}</td>
            <td>{!! $asetPengembalian->jabatan_cek !!}</td>
            <td>{!! $asetPengembalian->penerima !!}</td>
            <td>{!! $asetPengembalian->jabatan_penerima !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['asetPengembalians.destroy', $asetPengembalian->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetPengembalians.show', [$asetPengembalian->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('asetPengembalians.edit', [$asetPengembalian->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
