@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='/css/navbar.css' />
<link rel='stylesheet' href='/css/about.css' />
<link rel='stylesheet' href='/css/effects.css' />
@endsection

@section('content')
<div class='well logo-well'>
    <img class='logo-img' src='/img/logo.png' />
</div>

<div class='about-contents'>
    @if ($role == "admin")
    <dl>
        <p>Build Information</p>
        <dt>Versão: {{env('POLR_VERSION')}}</dt>
        <dt>Data de lançamento: {{env('POLR_RELDATE')}}</dt>
        <dt>Instalado em: {{env('APP_NAME')}} on {{env('APP_ADDRESS')}} on {{env('POLR_GENERATED_AT')}}<dt>
    </dl>
    <p>Você está vendo o texto acima porque está logado como Administrador.</p>
    @endif

    <p>{{env('APP_NAME')}} utiliza Polr 2, uma plataforma open source para encurtar links. <br />
       <br /> <br />Polr usa uma licença GNU GPL.
       <br /> Mais informações abaixo: 
    </p>
</div>
<a href='#' class='btn btn-uergs license-btn'>Mais informações</a>
<pre class="license" id="gpl-license">
Copyright (C) 2013-2017 Chaoyi Zha

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
</pre>
<br /> Traduzido e implementado por Leonardo Welter,
 Superintendência de Informática - Universidade Estadual do Rio Grande do Sul.

@endsection

@section('js')
<script src='/js/about.js'></script>
@endsection

