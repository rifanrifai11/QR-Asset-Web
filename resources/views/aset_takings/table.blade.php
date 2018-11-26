<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Users Id</th>
        <th>Data Aset Id</th>
        <th>Kondisi Aset Id</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($asetTakings as $asetTaking)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $asetTaking->users_id !!}</td>
            <td>{!! $asetTaking->data_aset_id !!}</td>
            <td>{!! $asetTaking->kondisi_aset_id !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['asetTakings.destroy', $asetTaking->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetTakings.show', [$asetTaking->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('asetTakings.edit', [$asetTaking->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
