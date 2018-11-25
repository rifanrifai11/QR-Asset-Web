<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h4 class="pull-left">Histori Aset Taking</h4>
                {{--<h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('asetPengembalians.create',['url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}">Add New</a>
        </h1>--}}
            </div>
            <div class="box-body">
                <table class="table table-responsive"="asetTakings-table">
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
                @foreach($dataAset->asetTakings as $asetTaking)
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
            </div>
        </div>
    </div>
</div>