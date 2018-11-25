<table class="table table-responsive"="asetTakings-table">
    <thead>
        <tr>
            <th>Nama </th>
            <th>Kode Aset</th>
            <th>Data Aset</th>
            <th>Kondisi Aset</th>
            <th>Lokasi Aset</th>
            <th>Tanggal</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($asetTakings as $asetTaking)
        <tr>
            <td>{!! $asetTaking->user->name !!}</td>
            <td>{!! $asetTaking->dataAset->kode_data_aset !!}</td>
            <td>{!! $asetTaking->dataAset->grub_asets->nama !!}</td>
            <td>{!! $asetTaking->kondisiAset->nama !!}</td>
            <td>{!! $asetTaking->dataAset->lokasi->nama !!}</td>
            <td>{!! \Carbon\Carbon::parse($asetTaking->created_at)->format('d-m-Y') !!}</td>
            <td>
                {!! Form::open(['route' => ['asetTakings.destroy', $asetTaking->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetTakings.show', [$asetTaking->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('asetTakings.edit', [$asetTaking->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>