{!! Form::open([
    'method'           => 'POST',
    'route'            => ['client::contact'],
    'role'             => 'form',
    'id'               => 'contact_form',
    'class'            => 'showroom__form form',
]) !!}

	<div class="showroom__form--ttl">Datos de Contacto:</div>
	<!-- Nombre -->
    <div class="form__row">
        {!! Form::label('full_name',"Nombre completo:", [
            'class' => 'form__row--label',
        ]) !!}

        {!! Form::text('full_name', null, [
            'class'         => 'form--input',
            'required'      => 'required',
            'form'          => 'contact_form',
            'placeholder'   => ""
        ]) !!}
    </div>

	<div class="form--half">
		<!-- Edad -->
		<div class="form__row">
			{!! Form::label('age',"Edad:", [
				'class' => 'form__row--label',
			]) !!}

			{!! Form::number('age', null, [
				'class'         => 'form--input',
				'required'      => 'required',
				'form'          => 'contact_form',
				'placeholder'   => ""
			]) !!}
		</div>

		{{-- sexo --}}
		<div class="form__row">
			{!! Form::label('example',"Sexo:", [
				'class' => 'form__row--label',
			 ]) !!}
			 <div class="showroom__checkbox-container">
				 {!! Form::label('mujer',"M", [
     				'class' => 'form__row--label',
     			 ]) !!}
    			 {{ Form::radio('sex', 'mujer' , false, [
    				 'class' =>	'showroom__form--checkbox showroom__checkbox-container--align-checkbox',
    			  ]) }}

    			 {!! Form::label('hombre',"H", [
     				'class' => 'form__row--label',
     			 ]) !!}
      	 		 {{ Form::radio('sex', 'hombre' , false, [
    				'class' =>	'showroom__form--checkbox showroom__checkbox-container--align-checkbox',
    			 ])}}
			 </div>
		</div>
	</div>

	<div class="form--half">
		<!-- teléfono -->
		<div class="form__row">
			{!! Form::label('phone',"Teléfono:", [
				'class' => 'form__row--label',
			]) !!}

			{!! Form::text('phone', null, [
				'class'         => 'form--input',
				'required'      => 'required',
				'form'          => 'contact_form',
				'placeholder'   => ""
			]) !!}
		</div>

		{{-- sexo --}}
		<div class="form__row">
			{!! Form::label('email',"Email:", [
				'class' => 'form__row--label',
			 ]) !!}

			 {!! Form::email('email', null, [
				 'class'         => 'form--input',
				 'required'      => 'required',
				 'form'          => 'contact_form',
				 'placeholder'   => ""
			 ]) !!}
		</div>
	</div>

	<div class="form--half">
		<!-- teléfono -->
		<div class="form__row">
			{!! Form::label('date',"Fecha:", [
				'class' => 'form__row--label',
			]) !!}

			{!! Form::date('date', null, [
				'class'         => 'form--input',
				'required'      => 'required',
				'form'          => 'contact_form',
				'placeholder'   => ""
			]) !!}
		</div>

		{{-- sexo --}}
		<div class="form__row">
			{!! Form::label('number_invites',"Invitados:", [
				'class' => 'form__row--label',
			 ]) !!}

			 {!! Form::select('number_invites',getInvitedNumberOptions(), null, [
				 'class'         => 'form--input',
				 'required'      => 'required',
				 'form'          => 'contact_form',
				 'style' 		=> 'width: 100%;background-color: transparent;'
			 ]) !!}
		</div>
	</div>

	<div class="form__row">
		{!! Form::label('type',"Tipo de evento:", [
			'class' => 'form__row--label',
		]) !!}

		{!! Form::text('type', null, [
			'class'         => 'form--input',
			'required'      => 'required',
			'form'          => 'contact_form',
			'placeholder'   => ""
		]) !!}
	</div>

	<div class="showroom__form--textarea">
		{!! Form::label('event',"Datos del evento:", [
			'class' => 'form__row--label',
		 ]) !!}

		 {!! Form::textarea('event', null, [
			 'class'         => 'form--textarea',
			 'required'      => 'required',
			 'form'          => 'contact_form',
			 'placeholder'   => "",
			 "rows"			=>5
		 ]) !!}
	</div>

	{!! Form::submit("Enviar", [
    	'class' => 'showroom__form--submit',
        'form'  => 'contact_form'
    ]) !!}

{!! Form::close() !!}

@section('script')

	<script>


	jQuery(document).ready(function(){
		jQuery("#my-modal").show();
		jQuery("#closeM").click(function(){
			
			jQuery("#my-modal").hide();
		});
	});

	</script>
@endsection
