<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nama</th>
        <th>Parent Grub Aset Kode</th>
        <th>Keterangan</th>
        <th>Umur Ekonomis Id</th>
        <th>Kategori Aset Id</th>
        <th>Persentase Sisa</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($grubAsets as $grubAset)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $grubAset->nama !!}</td>
            <td>{!! $grubAset->parent_grub_aset_kode !!}</td>
            <td>{!! $grubAset->keterangan !!}</td>
            <td>{!! $grubAset->umur_ekonomis_id !!}</td>
            <td>{!! $grubAset->kategori_aset_id !!}</td>
            <td>{!! $grubAset->persentase_sisa !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['grubAsets.destroy', $grubAset->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('grubAsets.show', [$grubAset->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('grubAsets.edit', [$grubAset->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
