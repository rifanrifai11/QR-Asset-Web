<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h4 class="pull-left">Form Kerusakan Aset</h4>
                <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('asetRusaks.create',['url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}">Add New</a>
        </h1>
            </div>
            <div class="box-body">
                <table class="table table-responsive"="asetRusaks-table">
                <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Users</th>
                    <th>Tanggal Kejadian</th>
                    <th>Waktu Kejadian</th>
                    <th>Lokasi Kejadian</th>
                    <th>Kronologis Kejadian</th>
                    <th>Langkah Perbaikan</th>
                    <th>Catatan Perbaikan</th>
                    <th>Rekomendasi</th>

                    <th colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataAset->asetRusaks as $asetRusak)
                    <tr>
                        <td>{!! $asetRusak->nomor_surat !!}</td>
                        <td>{!! $asetRusak->user->name !!}</td>
                        <td>{!! $asetRusak->tanggal_kejadian !!}</td>
                        <td>{!! $asetRusak->waktu_kejadian !!}</td>
                        <td>{!! $asetRusak->lokasi_kejadian !!}</td>
                        <td>{!! $asetRusak->kronologis_kejadian !!}</td>
                        <td>{!! $asetRusak->langkah_perbaikan !!}</td>
                        <td>{!! $asetRusak->catatan_perbaikan !!}</td>
                        <td>{!! $asetRusak->rekomendasi !!}</td>

                        <td>
                            {!! Form::open(['route' => ['asetRusaks.destroy', $asetRusak->id,'url_callback'=>url()->current()], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('asetRusaks.show', [$asetRusak->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('asetRusaks.edit', [$asetRusak->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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