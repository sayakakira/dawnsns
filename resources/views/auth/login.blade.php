@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p>DAWNSNSへようこそ</p>

{{ Form::label('e-mail','MailAddress') }}
{{ Form::text('mail',null,['class' => 'input']) }}

@if($errors->has('mail')))
<div class="error">
  <p>{{$errors->first('mail')}}</p>
</div>
@endif

{{ Form::label('password','Password') }}
{{ Form::password('password',['class' => 'input']) }}

@if($errors->has('password'))
<div class="error">
  <p>{{$errors->first('password')}}</p>
</div>
@endif

{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
