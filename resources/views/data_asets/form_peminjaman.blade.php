<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h4 class="pull-left">Form Peminjaman Aset</h4>
                <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('asetPeminjamen.create',['url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}">Add New</a>
        </h1>
            </div>
            <div class="box-body">
                <table class="table table-responsive"="asetPeminjamen-table">
                <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Users</th>
                    <th>Nomor Peminjam</th>
                    <th>Nama Peminjam</th>
                    <th>Nrp</th>
                    <th>Departemen</th>
                    <th>Jabatan</th>
                    <th>Alasan</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Waktu Peminjaman Awal</th>
                    <th>Waktu Peminjaman Akhir</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Waktu Pengembalian</th>
                    <th>Jabatan Peminjam</th>

                     <th colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataAset->asetPeminjamen as $asetPeminjaman)
                    <tr>
                        <td>{!! $asetPeminjaman->nomor_surat !!}</td>
                        <td>{!! $asetPeminjaman->user->name !!}</td>
                        <td>{!! $asetPeminjaman->nomor_peminjam !!}</td>
                        <td>{!! $asetPeminjaman->nama_peminjam !!}</td>
                        <td>{!! $asetPeminjaman->nrp !!}</td>
                        <td>{!! $asetPeminjaman->departemen_id !!}</td>
                        <td>{!! $asetPeminjaman->jabatan !!}</td>
                        <td>{!! $asetPeminjaman->alasan !!}</td>
                        <td>{!! $asetPeminjaman->tanggal_peminjaman !!}</td>
                        <td>{!! $asetPeminjaman->waktu_peminjaman_awal !!}</td>
                        <td>{!! $asetPeminjaman->waktu_peminjaman_akhir !!}</td>
                        <td>{!! $asetPeminjaman->tanggal_pengembalian !!}</td>
                        <td>{!! $asetPeminjaman->waktu_pengembalian !!}</td>
                        <td>{!! $asetPeminjaman->jabatan_peminjam !!}</td>
                        <td>
                            {!! Form::open(['route' => ['asetPeminjamen.destroy', $asetPeminjaman->id,'url_callback'=>url()->current()], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! url('asetPeminjamen/report/'.$asetPeminjaman->id.'?url_callback='.url()->current()) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-print"></i></a>
                                <a href="{!! route('asetPeminjamen.show', [$asetPeminjaman->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('asetPeminjamen.edit', [$asetPeminjaman->id,'url_callback'=>url()->current(),'data_aset_id'=>$dataAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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