<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nomor Surat</th>
        <th>Data Aset Id</th>
        <th>Users Id</th>
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
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($asetPembelians as $asetPembelian)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $asetPembelian->nomor_surat !!}</td>
            <td>{!! $asetPembelian->data_aset_id !!}</td>
            <td>{!! $asetPembelian->users_id !!}</td>
            <td>{!! $asetPembelian->nomor_general_request !!}</td>
            <td>{!! $asetPembelian->nomor_purchase_order !!}</td>
            <td>{!! $asetPembelian->tanggal_pembelian !!}</td>
            <td>{!! $asetPembelian->harga_barang !!}</td>
            <td>{!! $asetPembelian->mengetahui1 !!}</td>
            <td>{!! $asetPembelian->jabatan_mengetahui1 !!}</td>
            <td>{!! $asetPembelian->mengetahui2 !!}</td>
            <td>{!! $asetPembelian->jabatan_mengetahui2 !!}</td>
            <td>{!! $asetPembelian->check !!}</td>
            <td>{!! $asetPembelian->jabatan_check !!}</td>
            <td>{!! $asetPembelian->raised_by !!}</td>
            <td>{!! $asetPembelian->jabatan_raised_by !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['asetPembelians.destroy', $asetPembelian->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetPembelians.show', [$asetPembelian->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('asetPembelians.edit', [$asetPembelian->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
