{{-- @include('client.general._menu', [
	'menu'	=> 'mobile',
	'class'	=> 'header__mobile--item',
]) --}}

	{{-- MENU PRELIMINAR --}}
	<div class="header__mobile mobile_JS">
		<a class="header__menu--item" href="{{ route('client::pages.show','somos') }}">Somos</a>
		<a class="header__menu--item" href="{{ route('client::collections.index') }}" >Catálogo</a>
		{{-- <a class="header__menu--item" href="{{ route('client::projects.index') }}" >Eventos</a>
		<a class="header__menu--item" href="{{ route('client::moodboards.index')}}" >Inspiración</a>
		<a class="header__menu--item" href="{{ route('client::pages.show','prensa')  }}" >Prensa</a> --}}
		<a class="header__menu--item" href="{{ route('client::pages.show','contacto')   }}" >Contacto</a>


		<div class="header__menu--item">
			@include('client.general._social', [ 'class' => '' ])
		</div>
	</div>
