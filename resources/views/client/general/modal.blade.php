<div  id="my-modal" class="modal">
	<div class="" >
		<div class="modal-content">
			<div class="modal__header">
				<div class="row">
					<div class="col s11">
						<h5 id="closeM" class="modal-close"><a><img src="{{ asset('images/Recurso 1.svg') }}" /></a></h5>
					</div>

				</div>
			</div>

			<div class="modal__body">
				<div class="row">
					<div class="col s12">
						@if (array_has($contact_address,'whatsapp_phone'))

							<img src="{{ asset('images/whtas-app-1.png') }}" />

								<p >{{array_get($contact_address,'whatsapp_phone')}}</p>

						@endif
					</div>
				</div>
			</div>

		</div>

		{{--
		<div class="modal-footer">
			@include('admin.general.modals.partials._footer')
		</div>
		--}}
	</div>
</div>
