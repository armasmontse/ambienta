<header class="header">
	<div class="header--wrap wrap">

		@if (isset($user) && $user->hasPermission('admin_access'))
			<div class="header__admin">
				<a class="header__admin--link" href="{{ route("admin::index") }}">
					<i class="fa fa-gear"></i> Admin
				</a>
			</div>
		@endif

		<div class="header__social">
			@if (array_get($social_networks,'facebook'))
				<a
				target="_blank"
				href="{{ array_get($social_networks,'facebook') }}"
				class="header__social--item fa fa-facebook"></a>
			@endif
			@if (array_get($social_networks,'twitter'))
				<a
				target="_blank"
				href="{{ array_get($social_networks,'twitter') }}"
				class="header__social--item fa fa-twitter"></a>
			@endif
			@if (array_get($social_networks,'pinterest'))
				<a
				target="_blank"
				href="{{ array_get($social_networks,'pinterest') }}"
				class="header__social--item fa fa-pinterest"></a>
			@endif
			@if (array_get($social_networks,'instagram'))
				<a
				target="_blank"
				href="{{ array_get($social_networks,'instagram') }}"
				class="header__social--item fa fa-instagram"></a>
			@endif

			{{-- @if (array_has($contact_address,"phone-2"))
				<a
				href="tel:{{array_get($contact_address,"phone-2")}}"
				class="header__social--item fa fa-phone"></a>
			@elseif (array_has($contact_address,"phone-1"))
				<a
				href="tel:{{array_get($contact_address,"phone-1")}}"
				class="header__social--item fa fa-phone"></a>
			@endif --}}


			<a href="#footer"
			class="header__social--item fa fa-phone"></a>
			<a href="{{url('contacto')}}"
			class="header__social--item fa fa-whatsapp"></a>

				@if (array_has($contact_mail,'contact'))
				<a
				href="mailto:{{  array_get($contact_mail,'contact') }}"
				class="header__social--item fa fa-envelope-o"></a>
			@endif


		</div>

		<div class="header__logo--container {{ is_page('client::pages.index') ? 'header_JS open' : '' }}">
			<a class="header__logo header_logo_JS" href="/">
				<img class="header__logo--img" src="{{ asset('images/ambienta-logo.svg') }}">
			</a>
			@if (is_page('client::pages.index'))
				@include ('client.pages.sections.home.slider',['section'=>$home_slider,'class'=>true])
			@endif
		</div>

		<div class="header__mobile--btn mobile_btn_JS">&#9776;</div>

		{{-- MENU FULL --}}
		<div class="header__menu">
			<a id="somos" class="header__menu--item a_JS" href="{{ route('client::pages.show','somos') }}"><span style="font-size:27px">S</span>omos</a>
			<a id="colecciones" class="header__menu--item a_JS" href="{{ route('client::collections.index') }}"><span style="font-size:27px">C</span>atálogo</a>
			<a id="eventos" class="header__menu--item a_JS"href="{{ route('client::projects.index') }}" ><span style="font-size:27px">E</span>ventos</a>
			<a id="inspiracion" class="header__menu--item a_JS"  href="{{ route('client::moodboards.index') }}" ><span style="font-size:27px">I</span>nspiración</a>
			<a id="prensa" class=" header__menu--item a_JS"  href="{{ route('client::pages.show','prensa') }}"><span style="font-size:27px">P</span>rensa</a>
			<a id="contacto" class="header__menu--item a_JS" href="{{ route('client::pages.show','contacto') }}"><span style="font-size:27px">C</span>ontacto</a>

		</div>

	</div>
	@include('client.general._menu-mobile')
</header>
