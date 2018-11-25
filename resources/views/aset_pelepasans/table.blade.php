<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nomor Surat</th>
        <th>Data Aset Id</th>
        <th>Users Id</th>
        <th>Metode Pelepasan</th>
        <th>Catatan</th>
        <th>Foto Saat Ini</th>
        <th>Menyetujui</th>
        <th>Jabatan Menyetujui</th>
        <th>Mengetahui</th>
        <th>Jabatan Mengetahui</th>
        <th>Diajukan</th>
        <th>Jabatan Diajukan</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($asetPelepasans as $asetPelepasan)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $asetPelepasan->nomor_surat !!}</td>
            <td>{!! $asetPelepasan->data_aset_id !!}</td>
            <td>{!! $asetPelepasan->users_id !!}</td>
            <td>{!! $asetPelepasan->metode_pelepasan !!}</td>
            <td>{!! $asetPelepasan->catatan !!}</td>
            <td>{!! $asetPelepasan->foto_saat_ini !!}</td>
            <td>{!! $asetPelepasan->menyetujui !!}</td>
            <td>{!! $asetPelepasan->jabatan_menyetujui !!}</td>
            <td>{!! $asetPelepasan->mengetahui !!}</td>
            <td>{!! $asetPelepasan->jabatan_mengetahui !!}</td>
            <td>{!! $asetPelepasan->diajukan !!}</td>
            <td>{!! $asetPelepasan->jabatan_diajukan !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['asetPelepasans.destroy', $asetPelepasan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetPelepasans.show', [$asetPelepasan->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('asetPelepasans.edit', [$asetPelepasan->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
