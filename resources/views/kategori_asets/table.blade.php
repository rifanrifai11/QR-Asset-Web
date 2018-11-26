<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Keterangan</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($kategoriAsets as $kategoriAset)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $kategoriAset->kode !!}</td>
            <td>{!! $kategoriAset->nama !!}</td>
            <td>{!! $kategoriAset->keterangan !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['kategoriAsets.destroy', $kategoriAset->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kategoriAsets.show', [$kategoriAset->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('kategoriAsets.edit', [$kategoriAset->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
