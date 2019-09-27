<img src="https://drive.google.com/uc?export=view&id=1bHQzniyAes03CxVubpK9b-0E6_C897Tf" width="20%" height="20%" style="margin: 0 auto;">

<h3>Olá {{$username}}!</h3>

<p>Obrigado por realizar seu cadastro em {{env('APP_NAME')}}. Para usar sua conta,
você precisará ativar a mesma clicando no link a seguir:</p>

<br />

<a href='{{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/activate/{{$username}}/{{$recovery_key}}'>
    Clique aqui para ativar sua conta!
</a>

<br />

<p>Atenciosamente,</p>
<p>Equipe {{env('APP_NAME')}}.</p>

--
<br />
Você recebeu esse email porque alguém com o IP {{$ip}} realizou um cadastro de conta em
 {{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}. Se não foi você, apenas ignore esse email.

