<html>
<head>
    <meta charset="UTF-8">
    <title>Manajemen Aset</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    @yield('css')
</head>
<body>

<div class="container-fluid" >
    <div class="row">
        @foreach($dataAsets as $dataAset)
            <div class="col-xs-6" style="border-style: solid; border-width: thin; ">
                <div class="row" >
                    <div class="col-xs-12" style="text-align: center; border-bottom-style: solid; border-width: thin;">
                        <h4><b>PT. RIUNG MITRA LESTARI</b></h4>
                    </div>
                    <div class="col-xs-4"  >
                        <img class="img-responsive" style="padding: 5px;" src="data:image/png;base64,{{DNS2D::getBarcodePNG($dataAset->kode_data_aset, 'QRCODE')}}" alt="barcode" />
                    </div>
                    <div class="col-xs-8" style="border-left-style: solid; border-width: thin;  ">
                        <h5>Kode : {{$dataAset->kode_data_aset or ""}}<br>
                        Nama : {{$dataAset->grub_asets->nama or ""}} <br>
                        Pembelian : {{\Carbon\Carbon::parse($dataAset->latestAsetPembelian()->first()->tanggal_pembelian)->year}} <br>
                            Lokasi : {{$dataAset->lokasi->nama or ""}}</h5>
                    </div>
                </div>
            </div>

            <div class="col-xs-6" style="border-style: solid; border-width: thin; ">
                <div class="row" >
                    <div class="col-xs-12" style="text-align: center; border-bottom-style: solid; border-width: thin;">
                        <h4><b>PT. RIUNG MITRA LESTARI</b></h4>
                    </div>
                    <div class="col-xs-4"  >
                        <img class="img-responsive" style="padding: 5px;" src="data:image/png;base64,{{DNS2D::getBarcodePNG($dataAset->kode_data_aset, 'QRCODE')}}" alt="barcode" />
                    </div>
                    <div class="col-xs-8" style="border-left-style: solid; border-width: thin;  ">
                        <h5>Kode : {{$dataAset->kode_data_aset or ""}}<br>
                            Nama : {{$dataAset->grub_asets->nama or ""}} <br>
                            Pembelian : {{\Carbon\Carbon::parse($dataAset->latestAsetPembelian()->first()->tanggal_pembelian)->year}} <br>
                            Lokasi : {{$dataAset->lokasi->nama or ""}}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{--<table border="1">
    <tr>
    @foreach($dataAsets as $dataAset)
            @if($loop->iteration%4==0)
                </tr><tr>
                    <td>
                        <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($dataAset->kode_data_aset, 'QRCODE')}}" alt="barcode" />
                    </td>
            @else
                <td>
                    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($dataAset->kode_data_aset, 'QRCODE')}}" alt="barcode" />
                </td>
            @endif
    @endforeach
    </tr>
</table>--}}


<!-- jQuery 3.1.1 -->

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>

<script type="text/javascript">
    window.onload = function() { window.print(); }
</script>

@yield('scripts')
</body>
</html>