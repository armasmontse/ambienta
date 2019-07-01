{!! Form::open([
    'method'             => $form_method,
    'route'              => $form_route,
    'role'               => 'form' ,
    'id'                 => $form_id,
    'class'              => '',
    ]) !!}



	<div class="col s10 offset-s1 mb-5">
		<div class="pull-right">
			<label for="">
				¿Será una colección destacada?
			</label>
			<div class="switch mt-5">
				No
				<label>
					{!! Form::checkbox("highlighted", true ,$collection_editable->highlighted, [
						'class'     => 'input__checkbox',
						'form'          => $form_id,
					]) !!}
					<span class="lever black"></span>
				</label>
				Sí
			</div>
		</div>
	</div>


    <div class="col s3 offset-s5 input-field">

        {!! Form::select('publish_id', $publishes_list, $collection_editable->publish_id, [
            'class'      => 'validate ',
            'required'    => 'required',
            'placeholder'   => "Seleccionar",
            'form'        => $form_id,
        ])  !!}
        {!! Form::label('publish_id', "Estatus de publicación:", [
            'class' => 'input-label active '
        ]) !!}


    </div>

    <div class="col s3 input-field">

            {!! Form::date('publish_at', $collection_editable->id ? $collection_editable->publish_at->format("Y-m-d") : date("Y-m-d"), [
                'class'        => 'validate  datepicker ',
                'required'     => 'required',
                'placeholder'  => date("Y-m-d"),
                'form'         => $form_id,
            ])  !!}
            {!! Form::label('publish_at', "Fecha de publicación:", [
                'class' => 'input-label active'
            ]) !!}

    </div>
      <!-- Título de la publicación -->
    <div class="input-field col s10 offset-s1">
        {!! Form::label('post_title',"Título de la colección:", [
            'class' => 'active',
            ]) !!}

        @foreach ($languages as $language)
            {!! Form::text('title['.$language->iso6391.']', $collection_editable->id ? $collection_editable->translation($language->iso6391)->title :null, [
                'class'         => 'validate',
                'required'      => 'required',
                'form'          => $form_id,
                'placeholder'   => ""
            ]) !!}
        @endforeach
    </div>

	<div class="input-field col s10 offset-s1">
		{!! Form::label('post_title',"Subtítulo de la colección:", [
			'class' => 'active',
			]) !!}

		@foreach ($languages as $language)
			{!! Form::text('subtitle['.$language->iso6391.']', $collection_editable->id ? $collection_editable->translation($language->iso6391)->subtitle :null, [
				'class'         => 'validate',
				'form'          => $form_id,
				'placeholder'   => ""
			]) !!}
		@endforeach
	</div>

    <div class="input-field col s10 offset-s1">
        @foreach ($languages as $language)
           <cltvo-v-editor value="{{ $collection_editable->id ? $collection_editable->translation($language->iso6391)->excerpt : null }}"
                           form={{$form_id}}
                           name="excerpt[{{ $language->iso6391 }}]"
                           label="Resumen"
           ></cltvo-v-editor>
       @endforeach
    </div>
    <div class="input-field col s10 offset-s1">
        @foreach ($languages as $language)
           <cltvo-v-editor value="{{ $collection_editable->id ? $collection_editable->translation($language->iso6391)->content : null }}"
                           form={{$form_id}}
                           name="content[{{ $language->iso6391 }}]"
                           label="Descripción"
           ></cltvo-v-editor>
       @endforeach
    </div>

    <div class="col s10 offset-s1">
		<br><br>
        <div class="pull-right">
            {!! Form::submit("Guardar", [
                'class' => 'btn waves-effect waves-light  flex-collapsible black',
                'form'  => $form_id
            ]) !!}
        </div>
    </div>
{!! Form::close() !!}
