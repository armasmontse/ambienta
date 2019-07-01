<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

	<title>
        @if(View::hasSection('title'))
            @yield('title') &mdash;
        @endif

        {{ config('app.name') }}
    </title>

	@include('client.general.metadata')

	<link href="{{ asset('css/mazorca.css') }}" rel="stylesheet" type="text/css" />

	{{-- Favicon --}}
	@include('general.favicon')

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

	@if ( config('app.env') == "production" )
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-K2F2H6F');</script>
		<!-- End Google Tag Manager -->

	@endif
</head>
