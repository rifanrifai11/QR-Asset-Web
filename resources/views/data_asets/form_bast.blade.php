<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h4 class="pull-left">Form BAST</h4>
                <h1 class="pull-right">
                    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('asetBasts.create',['url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}">Add New</a>
                </h1>
            </div>
            <div class="box-body">
                <table class="table table-responsive"="asetBasts-table">
                <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Users</th>
                    <th>Tanggal Bast</th>
                    <th>Nama</th>
                    <th>Nik</th>
                    <th>Departemen</th>
                    <th>Jabatan</th>
                    <th>Jobsite</th>
                    <th>Atasan Langsung</th>
                    <th colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataAset->asetBasts as $asetBast)
                    <tr>
                        <td>{!! $asetBast->nomor_surat !!}</td>
                        <td>{!! $asetBast->user->name !!}</td>
                        <td>{!! \Carbon\Carbon::parse( $asetBast->tanggal_bast)->format('d-m-Y') !!}</td>
                        <td>{!! $asetBast->nama !!}</td>
                        <td>{!! $asetBast->nik !!}</td>
                        <td>{!! $asetBast->departemen->nama !!}</td>
                        <td>{!! $asetBast->jabatan !!}</td>
                        <td>{!! $asetBast->jobsite->nama !!}</td>
                        <td>{!! $asetBast->atasan_langsung !!}</td>
                        <td>
                            {!! Form::open(['route' => ['asetBasts.destroy', $asetBast->id,'url_callback'=>url()->current()], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! url('asetBasts/report/'.$asetBast->id.'?url_callback='.url()->current()) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-print"></i></a>
                                <a href="{!! route('asetBasts.show', [$asetBast->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('asetBasts.edit', [$asetBast->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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