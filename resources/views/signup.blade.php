@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='/css/navbar.css' />
<link rel='stylesheet' href='/css/signup.css' />
@endsection

@section('content')
<div class='col-md-6'>
    <h2 class='title'>Cadastre-se</h2>

    <form action='/signup' method='POST'>
        Usuário: <input type='text' name='username' class='form-control form-field' placeholder='Usuário' />
        Senha: <input type='password' name='password' class='form-control form-field' placeholder='Senha' />
        Email: <input type='email' name='email' class='form-control form-field' placeholder='Email' />

        @if (env('POLR_ACCT_CREATION_RECAPTCHA'))
        <div class="g-recaptcha" data-sitekey="{{env('POLR_RECAPTCHA_SITE_KEY')}}"></div>
        @endif

        <input type="hidden" name='_token' value='{{csrf_token()}}' />
        <input type="submit" class="btn btn-default btn-uergs" value="Cadastrar"/>
        <p class='login-prompt'>
            <small>Já possui uma conta? <a href='{{route('login')}}' class="text-uergs">Entrar</a></small>
        </p>
    </form>
</div>
<div class='col-md-6 hidden-xs hidden-sm'>
    <div class='right-col-one'>
        <h4>Nome de usuário</h4>
        <p>Será usado para realizar seu login.</p>
    </p>
    <div class='right-col-next'>
        <div class='right-col'>
            <h4>Senha</h4>
            <p>Será usada para validar seu login.</p>
        </p>
    </div>
    <div class='right-col-next'>
        <h4>Email</h4>
        <p>Utilizado para verificar sua conta ou recuperar senha.</p>
    </p>
</div>
@endsection

@section('js')
    @if (env('POLR_ACCT_CREATION_RECAPTCHA'))
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif
@endsection
