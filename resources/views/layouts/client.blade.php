<!DOCTYPE html>
<html lang="es">

	{{-- Head --}}
	@include('client.general.head')

	<body>
		{{-- Analytics --}}
	    @include('client.general.analytics')


		{{-- Header --}}
		@include('client.general.header')

		<div class="main-wrap">

			@yield('content')

		</div>

		{{-- Alerts --}}
		@include('general._alerts')

		{{-- Footer --}}
		@include('client.general.footer')

		@include('client.general.modal')

		{{-- Scripts --}}
		@include('client.general.scripts')

	</body>
	 @yield('script')

</html>
