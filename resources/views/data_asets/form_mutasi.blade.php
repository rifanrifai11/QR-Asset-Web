<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h4 class="pull-left">Form Mutasi Aset</h4>
                <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('asetMutasis.create',['url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}">Add New</a>
        </h1>
            </div>
            <div class="box-body">
                <table class="table table-responsive"="asetMutasis-table">
                <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Users</th>
                    <th>Nama Pengguna Baru</th>
                    <th>Posisi Pengguna Baru</th>
                    <th>Jabatan Pengguna Baru</th>
                    <th>Departemen</th>
                    <th colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataAset->asetMutasis as $asetMutasi)
                    <tr>
                        <td>{!! $asetMutasi->nomor_surat !!}</td>
                        <td>{!! $asetMutasi->user->name !!}</td>
                        <td>{!! $asetMutasi->nama_pengguna_baru !!}</td>
                        <td>{!! $asetMutasi->posisi_pengguna_baru !!}</td>
                        <td>{!! $asetMutasi->jabatan_pengguna_baru !!}</td>
                        <td>{!! $asetMutasi->departemen_id !!}</td>
                        <td>
                            {!! Form::open(['route' => ['asetMutasis.destroy', $asetMutasi->id,'url_callback'=>url()->current()], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('asetMutasis.show', [$asetMutasi->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('asetMutasis.edit', [$asetMutasi->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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