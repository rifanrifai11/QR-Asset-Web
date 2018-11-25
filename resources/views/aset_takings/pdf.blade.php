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
<h2 style="text-align: center">Laporan Histori Aset Taking PT. RIUNG MITRA LESTARI</h2>
<table>
<thead>
<tr>
    <th>Nama </th>
    <th>Kode Aset</th>
    <th>Data Aset</th>
    <th>Kondisi Aset</th>
    <th>Lokasi Aset</th>
    <th>Tanggal</th>
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
    </tr>
@endforeach
</tbody>
</table>
</body>
</html>