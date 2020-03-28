@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='css/login.css' />
@endsection

@section('content')
<div class="center-text">
    <h1>Identifique-se</h1><br/>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="login" method="POST">
            <input type="text" placeholder="Nome de úsuario" name="username" class="form-control login-field" />
            <input type="password" placeholder="Senha" name="password" class="form-control login-field" />
            <input type="hidden" name='_token' value='{{csrf_token()}}' />
            <input type="submit" value="Login" class="login-submit btn btn-primary" />

            <p class='login-prompts'>
            @if (env('POLR_ALLOW_ACCT_CREATION') == true)
                <small>Não possui uma conta? <a href='{{route('signup')}}'>Cadastre-se</a></small>
            @endif

            @if (env('SETTING_PASSWORD_RECOV') == true)
                <small>Esqueceu sua senha? <a href='{{route('lost_password')}}'>Recuperar senha</a></small>
            @endif
            </p>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
@endsection
