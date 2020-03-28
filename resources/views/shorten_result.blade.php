@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='/css/shorten_result.css' />
@endsection

@section('content')
<h3>URL encurtada!</h3>
<div class="input-group">
    <input type='text' class='result-box form-control' value='{{$short_url}}' id='short_url' />
    <div class='input-group-addon' id='clipboard-copy' data-clipboard-target='#short_url' data-toggle='tooltip' data-placement='bottom' data-title='Copiado para a área de transfêrencia (CTRL + V)!'>
        <i class='fa fa-clipboard' aria-hidden='true' title='Copiar para área de transferência'></i>
    </div>
</div>
<a id="generate-qr-code" class='btn btn-primary'>Gerar QR Code</a>
<a href="{{route('index')}}" class='btn btn-warning'>Encurtar outra URL</a>

<div class="qr-code-container"></div>
<br>
<a id="download-qr-code" class="btn btn-warning text-center">Download QR Code</a>
@endsection


@section('js')
<script src='/js/qrcode.min.js'></script>
<script src='/js/clipboard.min.js'></script>
<script src='/js/shorten_result.js'></script>
@endsection
