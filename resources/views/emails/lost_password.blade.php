<h3>Olá, {{$username}}!</h3>

<p>
    Você pode utilizar o link abaixo para alterar a senha da sua conta do {{env('APP_NAME')}}.
</p>

<a href='{{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/reset_password/{{$username}}/{{$recovery_key}}'>
    Clique aqui para recuperar sua senha!
</a>

<br />

<p>Atenciosamente,</p>
<p>Equipe {{env('APP_NAME')}}.</p>

--
<br />
Você recebeu esse email porque alguém com o IP {{$ip}} solicitou uma recuperação de senha em
 {{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}. Se não foi você, apenas ignore esse email.
