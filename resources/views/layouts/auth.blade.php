<!DOCTYPE html>
<html lang="es">

	{{-- Head --}}
	@include('client.general.head')

	<body>
		{{-- Analytics --}}
	    @include('client.general.analytics')


		{{-- Header --}}
		@include('client.general.header-auth')

		<div class="main-wrap">

			@yield('content')

		</div>

		{{-- Alerts --}}
		@include('general._alerts')

		{{-- Footer --}}
		@include('client.general.footer')

		{{-- Scripts --}}
		@include('client.general.scripts')

	</body>

</html>
