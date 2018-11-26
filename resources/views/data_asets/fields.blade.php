
<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Data Barang</h3>
            </div>
            <div class="box-body">
                <div class="row">

                    <!-- Aset Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('grub_aset_kode', 'Grub Aset:') !!}
                        {!! Form::select('grub_aset_kode',$grub_aset, null, ['class' => 'grub_aset_kode form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('nomor_urut_label', 'Nomor Urut: (Akan mempengaruhi nomor aset)') !!}
                        {!! Form::number('urut', null, ['class' => 'form-control nomor_urut']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('aset_kode_baru_label', 'No. Aset:') !!}
                        {!! Form::text('kode_data_aset', null, ['readonly','class' => 'form-control aset_kode_baru']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('nama_merek', 'Merek:') !!}
                        {!! Form::text('nama_merek', isset($dataAset) && isset($dataAset->merek_id)?$dataAset->merek->nama:"", ['class' => 'form-control merek_autocomplete']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('nama_tipe', 'Tipe:') !!}
                        {!! Form::text('nama_tipe', isset($dataAset) && isset($dataAset->tipe_id)?$dataAset->tipe->nama:"", ['class' => 'form-control tipe_autocomplete']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('lokasi_id', 'Lokasi:') !!}
                        {!! Form::select('lokasi_id', $lokasi ,null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Data Pembelian</h3>
            </div>
            <div class="box-body">
                <div class="row">

                    <!-- Tanggal Registrasi Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('no_registrasi', 'Nomor Registrasi:') !!}
                        {!! Form::text('no_registrasi', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Tanggal Registrasi Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('tanggal_registrasi', 'Tanggal Registrasi:') !!}
                        {!! Form::text('tanggal_registrasi', isset($dataAset)?\Carbon\Carbon::parse($dataAset->tanggal_registrasi)->format('Y-m-d'):"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Users Field -->
                {!! Form::hidden('users_id', Auth::id(), ['class' => 'form-control']) !!}

                <!-- Nomor General Request Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('nomor_general_request', 'Nomor General Request:') !!}
                        {!! Form::text('nomor_general_request', isset($dataAset)?$dataAset->latestAsetPembelian()->first()->nomor_general_request:"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Nomor Purchase Order Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('nomor_purchase_order', 'Nomor Purchase Order:') !!}
                        {!! Form::text('nomor_purchase_order', isset($dataAset)?$dataAset->latestAsetPembelian()->first()->nomor_purchase_order:"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Tanggal Pembelian Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('tanggal_pembelian', 'Tanggal Pembelian:') !!}
                        {!! Form::text('tanggal_pembelian', isset($dataAset)?\Carbon\Carbon::parse($dataAset->latestAsetPembelian()->first()->tanggal_pembelian)->format('Y-m-d'):"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Harga Barang Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('harga_barang', 'Harga Barang:') !!}
                        {!! Form::number('harga_barang', isset($dataAset)?$dataAset->latestAsetPembelian()->first()->harga_barang:"0", ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Data BAST</h3>
            </div>
            <div class="box-body">
                <div class="row">

                    <!-- Nomor Surat Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('nomor_surat', 'Nomor Surat :') !!}
                        {!! Form::number('nomor_surat', isset($dataAset) && $dataAset->asetBasts->count()>0 ?$dataAset->latestAsetBasts()->nomor_surat:"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Tanggal Bast Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('tanggal_bast', 'Tanggal Bast:') !!}
                        {!! Form::text('tanggal_bast', isset($dataAset) && $dataAset->asetBasts->count()>0 ?   \Carbon\Carbon::parse($dataAset->latestAsetBasts()->tanggal_bast)->format('Y-m-d'):"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Nama Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('nama', 'Nama:') !!}
                        {!! Form::text('nama', isset($dataAset) && $dataAset->asetBasts->count()>0 ?$dataAset->latestAsetBasts()->nama:"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Nik Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('nik', 'Nik:') !!}
                        {!! Form::text('nik', isset($dataAset) && $dataAset->asetBasts->count()>0 ?$dataAset->latestAsetBasts()->nik:"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Departemen Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('departemen_id', 'Departemen:') !!}
                        {!! Form::select('departemen_id',$departemen, isset($dataAset) && $dataAset->asetBasts->count()>0 ?$dataAset->latestAsetBasts()->departemen->nama:null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Jabatan Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('jabatan', 'Jabatan:') !!}
                        {!! Form::text('jabatan', isset($dataAset) && $dataAset->asetBasts->count()>0 ?$dataAset->latestAsetBasts()->jabatan:"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Jobsite Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('jobsite_id', 'Jobsite:') !!}
                        {!! Form::select('jobsite_id', $jobsite,isset($dataAset) && $dataAset->asetBasts->count()>0 ?$dataAset->latestAsetBasts()->jobsite->nama:null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Data Vendor</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <!-- Nama Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('nama_vendor', 'Nama:') !!}
                        {!! Form::text('nama_vendor', isset($dataAset) && isset($dataAset->vendor)?$dataAset->vendor->nama:"", ['class' => 'form-control vendor_autocomplete']) !!}
                    </div>

                    <!-- Registrasi Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('kode_registrasi', 'Kode Registrasi:') !!}
                        {!! Form::text('kode_registrasi', isset($dataAset) && isset($dataAset->vendor)?$dataAset->vendor->kode_registrasi:"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Alamat Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('alamat', 'Alamat:') !!}
                        {!! Form::text('alamat', isset($dataAset) && isset($dataAset->vendor)?$dataAset->vendor->alamat:"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Kota Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('kota', 'Kota:') !!}
                        {!! Form::text('kota', isset($dataAset) && isset($dataAset->vendor)?$dataAset->vendor->kota:"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Fax Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('fax', 'Fax:') !!}
                        {!! Form::text('fax', isset($dataAset) && isset($dataAset->vendor)?$dataAset->vendor->fax:"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Email Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email', isset($dataAset) && isset($dataAset->vendor)?$dataAset->vendor->email:"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Attn Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('attn', 'Attn:') !!}
                        {!! Form::text('attn', isset($dataAset) && isset($dataAset->vendor)?$dataAset->vendor->attn:"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Telepon Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('telepon', 'Telepon:') !!}
                        {!! Form::text('telepon', isset($dataAset) && isset($dataAset->vendor)?$dataAset->vendor->telepon:"", ['class' => 'form-control']) !!}
                    </div>

                    <!-- Phone Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('phone', 'Phone:') !!}
                        {!! Form::text('phone', isset($dataAset) && isset($dataAset->vendor)?$dataAset->vendor->phone:"", ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Gambar Fisik Barang</h3>
            </div>
            <div class="box-body">
                <div class="row">

                    <!-- Foto1 Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('foto1', 'Foto 1:') !!}
                        {!! Form::file('foto1', null, ['class' => 'form-control']) !!}
                        <img id="cropfoto1" src="{{isset($dataAset->foto1)?file_exists( public_path() . '/storage/' . $dataAset->foto1)?asset('/storage/'.$dataAset->foto1):asset('images/no-image.png'):asset('images/no-image.png')}}" alt="your image"  width="337" height="213"  />
                        {{ Form::hidden('temp_foto1', isset($dataAset->foto1)?file_exists( public_path() . '/' . $dataAset->foto1)?$dataAset->foto1:'':'') }}

                        <script type="text/javascript">
                            function readFoto1(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#cropfoto1').attr('src', e.target.result);
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#foto1").change(function(){
                                readFoto1(this);
                            });
                        </script>
                    </div>

                    <!-- Foto2 Field -->
                    {{--<div class="form-group col-sm-12">
                        {!! Form::label('foto2', 'Foto 2:') !!}
                        {!! Form::file('foto2', null, ['class' => 'form-control']) !!}
                        <img id="cropfoto2" src="{{isset($dataAset->foto2)?file_exists( public_path() . '/' . $dataAset->foto2)?asset($dataAset->foto2):asset('images/no-image.png'):asset('images/no-image.png')}}" alt="your image"  width="337" height="213"  />
                        {{ Form::hidden('temp_foto2', isset($dataAset->foto2)?file_exists( public_path() . '/' . $dataAset->foto2)?$dataAset->foto2:'':'') }}

                        <script type="text/javascript">
                            function readfoto2(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#cropfoto2').attr('src', e.target.result);
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#foto2").change(function(){
                                readfoto2(this);
                            });
                        </script>
                    </div>

                    <!-- Foto3 Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('foto3', 'Foto 3:') !!}
                        {!! Form::file('foto3', null, ['class' => 'form-control']) !!}
                        <img id="cropfoto3" src="{{isset($dataAset->foto3)?file_exists( public_path() . '/' . $dataAset->foto3)?asset($dataAset->foto3):asset('images/no-image.png'):asset('images/no-image.png')}}" alt="your image"  width="337" height="213"  />
                        {{ Form::hidden('temp_foto3', isset($dataAset->foto3)?file_exists( public_path() . '/' . $dataAset->foto3)?$dataAset->foto3:'':'') }}

                        <script type="text/javascript">
                            function readfoto3(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#cropfoto3').attr('src', e.target.result);
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#foto3").change(function(){
                                readfoto3(this);
                            });
                        </script>
                    </div>

                    <!-- Foto4 Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('foto4', 'Foto 4:') !!}
                        {!! Form::file('foto4', null, ['class' => 'form-control']) !!}
                        <img id="cropfoto4" src="{{isset($dataAset->foto4)?file_exists( public_path() . '/' . $dataAset->foto4)?asset($dataAset->foto4):asset('images/no-image.png'):asset('images/no-image.png')}}" alt="your image"  width="337" height="213"  />
                        {{ Form::hidden('temp_foto4', isset($dataAset->foto4)?file_exists( public_path() . '/' . $dataAset->foto4)?$dataAset->foto4:'':'') }}

                        <script type="text/javascript">
                            function readfoto4(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#cropfoto4').attr('src', e.target.result);
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#foto4").change(function(){
                                readfoto4(this);
                            });
                        </script>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group col-sm-6">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Spesifikasi</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <!-- Spesifikasi Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('spesifikasi', 'Spesifikasi:') !!}
                        {!! Form::textarea('spesifikasi', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group col-sm-12">
    <div class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Tanda Tangan</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <!-- Mengetahui1 Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('mengetahui1', 'Mengetahui1:') !!}
                        {!! Form::text('mengetahui1', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Jabatan Mengetahui1 Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('jabatan_mengetahui1', 'Jabatan Mengetahui1:') !!}
                        {!! Form::text('jabatan_mengetahui1', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Mengetahui2 Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('mengetahui2', 'Mengetahui2:') !!}
                        {!! Form::text('mengetahui2', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Jabatan Mengetahui2 Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('jabatan_mengetahui2', 'Jabatan Mengetahui2:') !!}
                        {!! Form::text('jabatan_mengetahui2', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Check Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('check', 'Check:') !!}
                        {!! Form::text('check', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Jabatan Check Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('jabatan_check', 'Jabatan Check:') !!}
                        {!! Form::text('jabatan_check', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Raised By Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('raised_by', 'Raised By:') !!}
                        {!! Form::text('raised_by', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Jabatan Raised By Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('jabatan_raised_by', 'Jabatan Raised By:') !!}
                        {!! Form::text('jabatan_raised_by', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
        <a href="{!! route('dataAsets.index') !!}" class="btn btn-warning">Cancel</a>
    </div>
</div>


<script type="text/javascript">
    var path_tipe = "{{ route('tipe_autocomplete') }}";
    var path_merek="{{ route('merek_autocomplete') }}";
    var path_vendor="{{ route('vendor_autocomplete') }}";
    var prefix_aset_kode="";

    $('input.nomor_urut').on('change paste keyup', function() {
        var kode=("000"+$(this).val());

        $('input.aset_kode_baru').val(prefix_aset_kode+kode.substr(-3) );
    });

    $('select.grub_aset_kode').change(function () {
        var grub_aset_kode = this.value;
        var url= "{{url("aset_kode_baru")}}"+"/"+grub_aset_kode;
        $.get(url,
                function(myObject){
                    $('input.aset_kode_baru').val(myObject);
                    $('input.nomor_urut').val(parseInt(myObject.substr(myObject.length-3)));
                });
    });

    @if(strpos(Route::getCurrentRoute()->getActionName(), 'create') !== false)
    //Kondisi create
    $( 'select.grub_aset_kode' ).ready(function() {
        var grub_aset_kode =  "AB";
        var url= "{{url("aset_kode_baru")}}"+"/"+grub_aset_kode;
        $.get(url,
                function(myObject){
                    $('input.aset_kode_baru').val(myObject);
                    prefix_aset_kode=myObject.substr(0,myObject.length-3);
                    $('input.nomor_urut').val(parseInt(myObject.substr(myObject.length-3)));
                });
    });
    @else
    //Jika kondisi update
    $( document ).ready(function() {
        var prefix="{{$dataAset->kode_data_aset}}";
        prefix_aset_kode=prefix.substr(0,prefix.length-3);
    });

    @endif

    $('input.tipe_autocomplete').typeahead({
        source:  function (query, process) {
            return $.get(path_tipe, { query: query }, function (data) {
                return process(data);
            });
        }
    });

    $('input.merek_autocomplete').typeahead({
        source:  function (query, process) {
            return $.get(path_merek, { query: query }, function (data) {
                return process(data);
            });
        }
    });


    $('input.vendor_autocomplete').typeahead({
        source:  function (query, process) {
            return $.get(path_vendor, { query: query }, function (data) {
                return process(data);
            });
        },
        afterSelect:function ($item) {
            getVendor($item['name']);
        }
    });


    function getVendor(name){
        var site_url = "{{ route('api.get_vendor') }}";
        /*alert(site_url);*/
        $.post(site_url, {
                    name : name,
                    site_url : site_url
                },

                function(myObject){
                    $('#kode_registrasi').val(myObject.kode_registrasi);
                    $('#alamat').val(myObject.alamat);
                    $('#kota').val(myObject.kota);
                    $('#fax').val(myObject.fax);
                    $('#email').val(myObject.email);
                    $('#telepon').val(myObject.telepon);
                    $('#phone').val(myObject.phone);
                    $('#attn').val(myObject.attn);
                });
    }


    $( function() {
        $( "#tanggal_registrasi" ).datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    } );

    $( function() {
        $( "#tanggal_pembelian" ).datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    } );

    $( function() {
        $( "#tanggal_bast" ).datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    } );
</script>

{{--
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'spesifikasi' );
</script>--}}
