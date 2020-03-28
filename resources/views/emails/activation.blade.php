<div style="background-color: #fff; padding: 15px; text-align: center;">

    <h3>Olá, {{$username}}!</h3>

    <p>
        Obrigado por realizar seu cadastro no Encurtador de Links. Para usar sua conta, você precisará ativar a mesma clicando no botão abaixo.
    </p>

    <br />

    <a href='{{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/activate/{{$username}}/{{$recovery_key}}' 
        style='text-decoration: none; font-weight: bolder; border-radius: 8px; background-color: #066c47; color: white; padding: 8px 30px;'>
        Ativar conta
    </a>

    <br />
    <br />

    <p>Atenciosamente,<br>Equipe Encurtador de URLs.</p>

    --
    <br />
    Você recebeu esse email porque alguém com o IP {{$ip}} realizou um cadastro de conta em
    {{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}. Se não foi você, apenas ignore esse email.

</div>

