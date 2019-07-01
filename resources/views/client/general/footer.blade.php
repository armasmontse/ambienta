<footer class="footer">
	<div class="footer--wrap wrap">

		<div class="footer__row">
			<span class="footer__row--label">Contacto &nbsp;&nbsp;&nbsp;<i style="font-size:18px;" class="fa fa-whatsapp "></i></span>
			<div class="footer__social">
				@if (array_get($social_networks,'facebook'))
					<a
					target="_blank"
					href="{{ array_get($social_networks,'facebook') }}"
					class="footer__social--item fa fa-facebook"></a>
				@endif
				@if (array_get($social_networks,'twitter'))
					<a
					target="_blank"
					href="{{ array_get($social_networks,'twitter') }}"
					class="footer__social--item fa fa-twitter"></a>
				@endif
				@if (array_get($social_networks,'pinterest'))
					<a
					target="_blank"
					href="{{ array_get($social_networks,'pinterest') }}"
					class="footer__social--item fa fa-pinterest"></a>
				@endif
				@if (array_get($social_networks,'instagram'))
					<a
					target="_blank"
					href="{{ array_get($social_networks,'instagram') }}"
					class="footer__social--item fa fa-instagram"></a>
				@endif
			</div>
		</div>

		<div id='footer'>
			@if (array_has($contact_address,'phone-2') || array_has($contact_address,'phone-1') )
				<div class="footer__row">
					<span class="footer__row--label">Teléfono.</span>
					@if (array_has($contact_address,'phone-2'))
						<span class="footer__row--spacer"></span>
						<span class="footer__row--data">{{  array_get($contact_address,'phone-2') }}</span>
					@endif

					@if (array_has($contact_address,'phone-1'))
						<span class="footer__row--spacer"></span>
						<span class="footer__row--data">{{  array_get($contact_address,'phone-1') }}</span>
					@endif
				</div>
			@endif
		</div>
		@if (array_has($contact_address,'whatsapp_phone'))
			<div class="footer__row">
				<span class="footer__row--label">Whatsapp.</span>
				<span class="footer__row--spacer"></span>
				<span class="footer__row--data">{{array_get($contact_address,'whatsapp_phone')}}</span>
			</div>
		@endif

		@if (array_has($contact_mail,'contact'))
			<div class="footer__row">
				<span class="footer__row--label">Email.</span>
				<span class="footer__row--spacer"></span>
				<span class="footer__row--data">{{  array_get($contact_mail,'contact') }}</span>
			</div>
		@endif

		{{-- @if (array_has($contact_address,'address'))
			<div class="footer__row">
				<span class="footer__row--label">D.</span>
				<span class="footer__row--spacer"></span>
				<span class="footer__row--data">{{ array_get($contact_address,'address') }}</span>
			</div>
		@endif --}}

		<div class="footer__row">
			<span class="footer__row--label">AMBIENTA <i class="fa fa-copyright" aria-hidden="true"></i></span>
			<span class="footer__row--spacer"></span>
			<a  class="footer__row--link" href="{{route("client::pages.show","aviso-de-privacidad")}}">AVISO DE PRIVACIDAD</a>
		</div>

		<div class="footer__row">
            <div class="footer__row--payment">
			<p class="pay">Reserva y paga tus eventos con tarjetas de crédito y débito.
				<div class="pay-flex">
					<img class="card" src="{{ asset('images/Visa.png') }}"/>
					<img class="card" src="{{ asset('images/mastercard.png') }}"/>
					<img class="card" src="{{ asset('images/american_express.png') }}" />
				</div>
			</p>


		</div>
		</div>
	</div>
</footer>
