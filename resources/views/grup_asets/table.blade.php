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
    @foreach($grupAsets as $grupAset)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $grupAset->nama !!}</td>
            <td>{!! $grupAset->parent_grub_aset_kode !!}</td>
            <td>{!! $grupAset->keterangan !!}</td>
            <td>{!! $grupAset->umur_ekonomis_id !!}</td>
            <td>{!! $grupAset->kategori_aset_id !!}</td>
            <td>{!! $grupAset->persentase_sisa !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['grupAsets.destroy', $grupAset->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('grupAsets.show', [$grupAset->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('grupAsets.edit', [$grupAset->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
