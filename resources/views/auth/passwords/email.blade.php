@extends('layouts.auth')

@section('content')
	<div class="auth page">

		<div class="auth--ttl">
			Restablecer Contraseña
		</div>

		<div class="auth--txt">
			Ingresa tu correo electrónico. <br>
			Te enviaremos un enlace para restablecer tu contraseña.
		</div>

		<form class="form" role="form" method="POST" action="{{ route('client::pass_reset_email') }}">
			{{ csrf_field() }}

			<div class="email__input-container">
				<input id="email" type="email" class="form--input" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" required>
			</div>

			<div class="auth__button-container">
				<button type="submit" class="form--submit">
					Enviar Enlace
				</button>
			</div>
		</form>

	</div>
@endsection