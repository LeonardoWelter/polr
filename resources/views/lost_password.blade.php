@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='/css/navbar.css' />
<link rel='stylesheet' href='/css/lost_password.css' />
@endsection

@section('content')
<h1 class='header'>Recuperação de senha</h1>

<div class='col-md-6 col-md-offset-3'>
    <form action='/lost_password' method='POST'>
        <input type='email' name='email' placeholder='Email' class='form-control email-input-pd'>
        <input type="hidden" name='_token' value='{{csrf_token()}}' />
        <input type='submit' value='Enviar email de recuperação de senha' class='form-control'>
    </form>
</div>
@endsection
