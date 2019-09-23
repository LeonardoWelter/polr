@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='css/navbar.css' />
<link rel='stylesheet' href='css/index.css' />
<link rel='stylesheet' href='css/fontsuergs.css' />
@endsection

@section('content')
<img src="/img/logo-uergs-vertical.png" height="30%" width="30%" />
<h1 class='title'
 style="font-family: Frutiger-Cn;
 font-weight: bolder; color:#066c47;"
>Encurtador de Links</h1>

<form method='POST' action='/shorten' role='form'>
    <input type='url' autocomplete='off'
        class='form-control long-link-input' placeholder='http://' name='link-url' />

    <div class='row' id='options' ng-cloak>
        <p>Customize seu link!</p>

        @if (!env('SETTING_PSEUDORANDOM_ENDING'))
        {{-- Show secret toggle only if using counter-based ending --}}
        <div class='btn-group btn-toggle visibility-toggler' data-toggle='buttons'>
            <label class='btn btn-primary btn-sm active'>
                <input type='radio' name='options' value='p' checked /> Publico
            </label>
            <label class='btn btn-sm btn-default'>
                <input type='radio' name='options' value='s' /> Privado
            </label>
        </div>
        @endif

        <div>
            <div class='custom-link-text'>
                <h2 class='site-url-field'>{{env('APP_ADDRESS')}}/</h2>
                <input type='text' autocomplete="off" class='form-control custom-url-field' name='custom-ending' />
            </div>
            <div>
                <a href='#' class='btn btn-success btn-xs check-btn' id='check-link-availability'>Verificar disponibilidade</a>
                <div id='link-availability-status'></div>
            </div>
        </div>
    </div>
    <input type='submit' class='btn btn-info' id='shorten' value='Encurtar' />
    <a href='#' class='btn btn-warning' id='show-link-options'>Opções avançadas</a>
    <input type="hidden" name='_token' value='{{csrf_token()}}' />
</form>

<div id='tips' class='text-muted tips'>
    <i class='fa fa-spinner'></i> Loading Tips...
</div>
@endsection

@section('js')
<script src='js/index.js'></script>
@endsection
