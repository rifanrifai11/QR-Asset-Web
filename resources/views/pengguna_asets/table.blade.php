<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>No Bast</th>
        <th>Nama</th>
        <th>Nrp</th>
        <th>Lokasi Kerja</th>
        <th>Departemen Id</th>
        <th>Atasan Langsung</th>
        <th>Pic Aset</th>
        <th>Posisi</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($penggunaAsets as $penggunaAset)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $penggunaAset->no_bast !!}</td>
            <td>{!! $penggunaAset->nama !!}</td>
            <td>{!! $penggunaAset->nrp !!}</td>
            <td>{!! $penggunaAset->lokasi_kerja !!}</td>
            <td>{!! $penggunaAset->departemen_id !!}</td>
            <td>{!! $penggunaAset->atasan_langsung !!}</td>
            <td>{!! $penggunaAset->pic_aset !!}</td>
            <td>{!! $penggunaAset->posisi !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['penggunaAsets.destroy', $penggunaAset->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('penggunaAsets.show', [$penggunaAset->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('penggunaAsets.edit', [$penggunaAset->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
