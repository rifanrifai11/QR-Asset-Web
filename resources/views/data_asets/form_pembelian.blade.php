<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h4 class="pull-left">Pembelian/Pendaftaran Aset</h4>
            </div>
            <div class="box-body">
                    <table class="table table-responsive"="asetPembelians-table">
                    <thead>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Users</th>
                        <th>Nomor General Request</th>
                        <th>Nomor Purchase Order</th>
                        <th>Tanggal Pembelian</th>
                        <th>Harga Barang</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataAset->asetPembelians as $asetPembelian)
                        <tr>
                            <td>{!! $asetPembelian->nomor_surat !!}</td>
                            <td>{!! $asetPembelian->user->name !!}</td>
                            <td>{!! $asetPembelian->nomor_general_request !!}</td>
                            <td>{!! $asetPembelian->nomor_purchase_order !!}</td>
                            <td>{!! \Carbon\Carbon::parse( $asetPembelian->tanggal_pembelian)->format('d-m-Y')  !!}</td>
                            <td>{!! number_format($asetPembelian->harga_barang) !!}</td>
                            <td>
                                {!! Form::open(['route' => ['asetPembelians.destroy', $asetPembelian->id,'url_callback'=>url()->current()], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! url('asetPembelians/report/'.$asetPembelian->id.'?url_callback='.url()->current()) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-print"></i></a>
                                    <a href="{!! route('asetPembelians.show', [$asetPembelian->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <a href="{!! route('asetPembelians.edit', [$asetPembelian->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>