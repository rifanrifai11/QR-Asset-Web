<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Kode Registrasi</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Fax</th>
        <th>Email</th>
        <th>Attn</th>
        <th>Telepon</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($vendors as $vendor)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $vendor->kode_registrasi !!}</td>
            <td>{!! $vendor->nama !!}</td>
            <td>{!! $vendor->alamat !!}</td>
            <td>{!! $vendor->kota !!}</td>
            <td>{!! $vendor->fax !!}</td>
            <td>{!! $vendor->email !!}</td>
            <td>{!! $vendor->attn !!}</td>
            <td>{!! $vendor->telepon !!}</td>
            <td>{!! $vendor->phone !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['vendors.destroy', $vendor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vendors.show', [$vendor->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('vendors.edit', [$vendor->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
