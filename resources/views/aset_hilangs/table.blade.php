<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nomor Surat</th>
        <th>Data Aset Id</th>
        <th>Users Id</th>
        <th>Tanggal Kejadian</th>
        <th>Waktu Kejadian</th>
        <th>Lokasi Kejadian</th>
        <th>Kronologis Kejadian</th>
        <th>Mengetahui1</th>
        <th>Jabatan Mengetahui1</th>
        <th>Mengetahui2</th>
        <th>Jabatan Mengetahui2</th>
        <th>Check</th>
        <th>Jabatan Check</th>
        <th>Raised By</th>
        <th>Jabatan Raised By</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($asetHilangs as $asetHilang)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $asetHilang->nomor_surat !!}</td>
            <td>{!! $asetHilang->data_aset_id !!}</td>
            <td>{!! $asetHilang->users_id !!}</td>
            <td>{!! $asetHilang->tanggal_kejadian !!}</td>
            <td>{!! $asetHilang->waktu_kejadian !!}</td>
            <td>{!! $asetHilang->lokasi_kejadian !!}</td>
            <td>{!! $asetHilang->kronologis_kejadian !!}</td>
            <td>{!! $asetHilang->mengetahui1 !!}</td>
            <td>{!! $asetHilang->jabatan_mengetahui1 !!}</td>
            <td>{!! $asetHilang->mengetahui2 !!}</td>
            <td>{!! $asetHilang->jabatan_mengetahui2 !!}</td>
            <td>{!! $asetHilang->check !!}</td>
            <td>{!! $asetHilang->jabatan_check !!}</td>
            <td>{!! $asetHilang->raised_by !!}</td>
            <td>{!! $asetHilang->jabatan_raised_by !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['asetHilangs.destroy', $asetHilang->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetHilangs.show', [$asetHilang->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('asetHilangs.edit', [$asetHilang->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
