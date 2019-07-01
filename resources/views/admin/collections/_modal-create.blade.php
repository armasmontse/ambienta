@extends('layouts.modal',['modal_id' => 'collections-modal-create'])

@section('modal-title')
    Nueva colección
@overwrite

@section('modal-content')

{!! Form::open([
	'method'             	=> "post",
	'route'              	=> ['admin::collections.ajax.store'],
	'role'               	=> 'form' ,
	'id'                 	=> 'create_collection_form',
	'class'              	=> '',
	'v-on:submit.prevent'   => 'post'
]) !!}

    <div class="col s6  input-field">
        {!! Form::label('publish_id', "Estatus de publicación:", [
            'class' => 'input-label active '
            ]) !!}
        {!! Form::select('publish_id', $publishes_list, null, [
            'class'       => 'validate ',
            'required'    => 'required',
            'placeholder' => 'Seleccionar',
            'form'        => 'create_collection_form',
        ]) !!}
    </div>

    <div class="col s6 input-field">
        {!! Form::label('publish_at', "Fecha de publicación:", [
            'class' => 'input-label active'
        ]) !!}

        {!! Form::date('publish_at', date("Y-m-d"), [
            'class'        => 'validate  datepicker ',
            'required'     => 'required',
            'placeholder'  => date("Y-m-d"),
            'form'         => 'create_collection_form',
        ])  !!}
    </div>

    <!-- Título de la publicación -->
    <div class="input-field col s12">
        {!! Form::label('post_title',"Título de la colección:", [
            'class' => 'active',
        ]) !!}
        @foreach ($languages as $language)
            {!! Form::text('title['.$language->iso6391.']', null, [
                'class'         => 'validate',
                'required'      => 'required',
                'form'          => 'create_collection_form',
                'placeholder'   => ''
            ]) !!}
        @endforeach
    </div>

	<div class="input-field col s12">
		{!! Form::label('post_title',"Subtítulo de la colección:", [
			'class' => 'active',
		]) !!}
		@foreach ($languages as $language)
			{!! Form::text('subtitle['.$language->iso6391.']', null, [
				'class'         => 'validate',
				'form'          => 'create_collection_form',
				'placeholder'   => ""
			]) !!}
		@endforeach
	</div>

    <div class="col s12">
        <div class="pull-right">
            <label for="highlighted">
                ¿Será una colección destacada?
            </label>
            <div class="switch mt-5">
                No
                <label>
                    {!! Form::checkbox('highlighted', true ,null, [
                        'class' => 'input__checkbox',
                        'form'  => 'create_collection_form',
                    ]) !!}
                    <span class="lever black"></span>
                </label>
                Sí
            </div>
        </div>
    </div>

    <div class="input-field col s12">
        @foreach ($languages as $language)
           <cltvo-v-editor value=""
                           form='create_collection_form'
                           name="excerpt[{{ $language->iso6391 }}]"
                           label="Resumen"
           ></cltvo-v-editor>
       @endforeach
    </div>

    <div class="input-field col s12">
        @foreach ($languages as $language)
           <cltvo-v-editor value=""
                           form='create_collection_form'
                           name="content[{{ $language->iso6391 }}]"
                           label="Descripción"
           ></cltvo-v-editor>
       @endforeach
    </div>

    <div class="col s12">
		<br><br>
        <div class="pull-right">
            {!! Form::submit("Guardar", [
                'class' => 'btn waves-effect waves-light flex-collapsible black',
                'form'  => 'create_collection_form'
            ]) !!}
        </div>
    </div>

{!! Form::close() !!}

@overwrite
