<table class="table table-responsive"="dataAsets-table">
    <thead>
        <tr>
            <th>Nama Aset</th>
        <th>Urut</th>
        <th>Kode Data Aset</th>
        <th>Tanggal Registrasi</th>
            <th>Lokasi</th>
            <th>Masa Pakai (Bln)</th>
            <th>Harga Sekarang</th>
            <th>Kondisi</th>
        {{--<th>Foto1</th>
        <th>Foto2</th>
        <th>Foto3</th>
        <th>Foto4</th>--}}
            <th colspan="3">Action</th>
            <th>Cetak Barcode</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dataAsets as $dataAset)
        <tr>
            <td>{{$dataAset->grub_asets->nama or ""}}</td>
            <td>{!! $dataAset->urut !!}</td>
            <td>{!! $dataAset->kode_data_aset !!}</td>
            <td>{!! \Carbon\Carbon::parse($dataAset->tanggal_registrasi)->format('d-m-Y') !!}</td>
            <td>{!! $dataAset->lokasi->nama !!}</td>
            <td>{!! $dataAset->masa_pakai_bulan !!}</td>
            <td>{!! number_format($dataAset->harga_sekarang_bulan) !!}</td>
            <td>{!! $dataAset->kondisi !!}</td>
            {{--
            <td>{!! $dataAset->foto1 !!}</td>
            <td>{!! $dataAset->foto2 !!}</td>
            <td>{!! $dataAset->foto3 !!}</td>
            <td>{!! $dataAset->foto4 !!}</td>--}}
            <td>
                {!! Form::open(['route' => ['dataAsets.destroy', $dataAset->id], 'method' => 'delete']) !!}
                <div class='btn-group'>

                    <a href="{!! route('dataAsets.show', [$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dataAsets.edit', [$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            <td>
                <a target="_blank" href="{!! url('download_double_barcode', [$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-print"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="pagination-wrapper"> {!! $dataAsets->setPath('/dataAsets')->appends(Request::except('page'))->render() !!} </div>