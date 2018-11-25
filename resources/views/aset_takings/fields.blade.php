@if(isset($_GET['url_callback']))
    {!! Form::hidden('url_callback', $_GET['url_callback']) !!}
@endif

@if(isset($_GET['data_aset_id']))
    {!! Form::hidden('data_aset_id', $_GET['data_aset_id']) !!}
@endif

<!-- Users Field -->
{!! Form::hidden('users_id', Auth::id()) !!}

<!-- Kondisi Aset Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kondisi_aset_id', 'Kondisi Aset:') !!}
    {!! Form::text('kondisi_aset_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

    @if(isset($_GET['url_callback']))
        <a href="{!! url($_GET['url_callback']) !!}" class="btn btn-default">Cancel</a>
    @else
    <a href="{!! route('asetTakings.index') !!}" class="btn btn-default">Cancel</a>
        @endif
</div>
