@if ($section->components)
	<div class="showroom__intro wrap">
	@foreach ($section->components as $intro)
		<div class="showroom__intro--ttl">{{ $intro->title }}</div>
		<div class="showroom__intro--txt">{!! $intro->content !!}</div>
		<div style="font-family: Roboto, sans-serif;font-size: 14px;" class="showroom__intro--txt">
            <i style="font-size:18px" class="fa fa-whatsapp "></i> &nbsp;&nbsp;Llena el formulario para recibir más información.
		</div>
	@endforeach
	</div>
@endif
