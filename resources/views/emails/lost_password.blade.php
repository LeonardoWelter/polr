<div style="background-color: #fff; padding: 15px; text-align: center;">

    <h3>Olá, {{$username}}!</h3>

    <p>
        Você pode utilizar o botão abaixo para alterar a senha da sua conta do Encurtador de Links.
    </p>
    <br />
    <a href='{{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/reset_password/{{$username}}/{{$recovery_key}}'
        style='text-decoration: none; font-weight: bolder; border-radius: 8px; background-color: #066c47; color: white; padding: 8px 30px;'>
        Alterar senha
    </a>

    <br />
    <br />

    <p>Atenciosamente,<br>Equipe Encurtador de URLs.</p>

    --
    <br />
    Você recebeu esse email porque alguém com o IP {{$ip}} solicitou uma recuperação de senha em
    {{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}. Se não foi você, apenas ignore esse email.
</div>
