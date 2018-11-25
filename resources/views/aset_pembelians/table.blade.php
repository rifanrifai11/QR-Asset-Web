<table class="table table-responsive"="asetPembelians-table">
    <thead>
        <tr>
            <th>Nomor Surat</th>
        <th>Data Aset</th>
        <th>Users</th>
        <th>Nomor General Request</th>
        <th>Nomor Purchase Order</th>
        <th>Tanggal Pembelian</th>
        <th>Harga Barang</th>
        <th>Mengetahui1</th>
        <th>Jabatan Mengetahui1</th>
        <th>Mengetahui2</th>
        <th>Jabatan Mengetahui2</th>
        <th>Check</th>
        <th>Jabatan Check</th>
        <th>Raised By</th>
        <th>Jabatan Raised By</th>
            {{--<th colspan="3">Action</th>--}}
        </tr>
    </thead>
    <tbody>
    @foreach($asetPembelians as $asetPembelian)
        <tr>
            <td>{!! $asetPembelian->nomor_surat !!}</td>
            <td>{!! $asetPembelian->dataAset->grub_asets->nama or ""!!}</td>
            <td>{!! $asetPembelian->user->name or "" !!}</td>
            <td>{!! $asetPembelian->nomor_general_request !!}</td>
            <td>{!! $asetPembelian->nomor_purchase_order !!}</td>
            <td>{!! \Carbon\Carbon::parse( $asetPembelian->tanggal_pembelian)->format('d-m-Y')  !!}</td>
            <td>{!! number_format($asetPembelian->harga_barang) !!}</td>
            <td>{!! $asetPembelian->mengetahui1 !!}</td>
            <td>{!! $asetPembelian->jabatan_mengetahui1 !!}</td>
            <td>{!! $asetPembelian->mengetahui2 !!}</td>
            <td>{!! $asetPembelian->jabatan_mengetahui2 !!}</td>
            <td>{!! $asetPembelian->check !!}</td>
            <td>{!! $asetPembelian->jabatan_check !!}</td>
            <td>{!! $asetPembelian->raised_by !!}</td>
            <td>{!! $asetPembelian->jabatan_raised_by !!}</td>
            {{--<td>
                {!! Form::open(['route' => ['asetPembelians.destroy', $asetPembelian->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetPembelians.show', [$asetPembelian->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('asetPembelians.edit', [$asetPembelian->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>--}}
        </tr>
    @endforeach
    </tbody>
</table>