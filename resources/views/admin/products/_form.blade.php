{!! Form::open([
    'method'             => $form_method,
    'route'              => $form_route,
    'role'               => 'form' ,
    'id'                 => $form_id,
    'class'              => '',
    ]) !!}
    <div class="col s3 offset-s5 input-field">
        {!! Form::select('publish_id', $publishes_list, $product->publish_id, [
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
        {!! Form::date('publish_at', $product->id ? $product->publish_at->format("Y-m-d") : date("Y-m-d"), [
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
        {!! Form::label('title',"Título:", [
            'class' => 'active',
        ]) !!}

        @foreach ($languages as $language)
            {!! Form::text('title['.$language->iso6391.']', $product->id ? $product->translation($language->iso6391)->title :null, [
                'class'         => 'validate',
                'required'      => 'required',
                'form'          => $form_id,
                'placeholder'   => ""
            ]) !!}
        @endforeach
    </div>

    <div class="input-field col s10 offset-s1">
        @foreach ($languages as $language)
           <cltvo-v-editor value="{{ $product->id ? $product->translation($language->iso6391)->description : null }}"
                           form={{$form_id}}
                           name="description[{{ $language->iso6391 }}]"
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
