<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h4 class="pull-left">Form Pelepasan Aset</h4>
                <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('asetPelepasans.create',['url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}">Add New</a>
        </h1>
            </div>
            <div class="box-body">
                <table class="table table-responsive"="asetPelepasans-table">
                <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Users</th>
                    <th>Metode Pelepasan</th>
                    <th>Catatan</th>
                    <th>Foto Saat Ini</th>
                     <th colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataAset->asetPelepasans as $asetPelepasan)
                    <tr>
                        <td>{!! $asetPelepasan->nomor_surat !!}</td>
                        <td>{!! $asetPelepasan->user->name !!}</td>
                        <td>{!! $asetPelepasan->metode_pelepasan !!}</td>
                        <td>{!! $asetPelepasan->catatan !!}</td>
                        <td>{!! $asetPelepasan->foto_saat_ini !!}</td>
                        <td>
                            {!! Form::open(['route' => ['asetPelepasans.destroy', $asetPelepasan->id,'url_callback'=>url()->current()], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('asetPelepasans.show', [$asetPelepasan->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('asetPelepasans.edit', [$asetPelepasan->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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