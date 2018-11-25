<html>
<head>
    <style type="text/css">
        table {
            border-collapse: collapse;
        }
        table td, table th{
            border:1px solid black;

        }

    </style>
</head>
<body onload="window.print()">
<h2 style="text-align: center">Laporan Data Aset PT. RIUNG MITRA LESTARI</h2>
<table class="table table-striped">
    <thead>
        <th>Nama Aset</th>
        {{--<th>Urut</th>--}}
        <th>Kode Data Aset</th>
        <th>Tanggal Registrasi</th>
        <th>Lokasi</th>
        <th>Masa Pakai (Bln)</th>
        <th>Harga Sekarang</th>
        <th>Kondisi</th>
    </thead>
    @foreach($dataAsets as $dataAset)
        <tr>
            <td>{{$dataAset->grub_asets->nama or ""}}</td>
            {{--<td>{!! $dataAset->urut !!}</td>--}}
            <td>{!! $dataAset->kode_data_aset !!}</td>
            <td>{!! \Carbon\Carbon::parse($dataAset->tanggal_registrasi)->format('d-m-Y') !!}</td>
            <td>{!! $dataAset->lokasi->nama or "" !!}</td>
            <td>{!! $dataAset->masa_pakai_bulan !!}</td>
            <td>{!! number_format($dataAset->harga_sekarang_bulan) !!}</td>
            <td>{!! $dataAset->kondisi !!}</td>
        </tr>
    @endforeach
</table>
</body>
</html>