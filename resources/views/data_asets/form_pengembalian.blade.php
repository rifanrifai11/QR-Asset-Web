<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h4 class="pull-left">Form Pengembalian Aset</h4>
                <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('asetPengembalians.create',['url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}">Add New</a>
        </h1>
            </div>
            <div class="box-body">
                <table class="table table-responsive"="asetPengembalians-table">
                <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Users</th>
                    <th>Nama</th>
                    <th>Nik</th>
                    <th>Jabatan</th>
                    <th>Departemen</th>
                    <th>Lokasi</th>
                    <th>Atasan Langsung</th>

                    <th colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataAset->asetPengembalians as $asetPengembalian)
                    <tr>
                        <td>{!! $asetPengembalian->nomor_surat !!}</td>
                        <td>{!! $asetPengembalian->user->name !!}</td>
                        <td>{!! $asetPengembalian->nama !!}</td>
                        <td>{!! $asetPengembalian->nik !!}</td>
                        <td>{!! $asetPengembalian->jabatan !!}</td>
                        <td>{!! $asetPengembalian->departemen_id !!}</td>
                        <td>{!! $asetPengembalian->lokasi !!}</td>
                        <td>{!! $asetPengembalian->atasan_langsung !!}</td>

                        <td>
                            {!! Form::open(['route' => ['asetPengembalians.destroy', $asetPengembalian->id,'url_callback'=>url()->current()], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('asetPengembalians.show', [$asetPengembalian->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('asetPengembalians.edit', [$asetPengembalian->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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