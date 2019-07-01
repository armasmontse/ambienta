@extends('layouts.multi-select', [
	'select_plural'		=> 'collections',
	'form_id' 			=> $form_id,
	'form_method'		=> $form_method,
	'form_route'		=> $form_route,
	"add_label"			=> $add_label,
	'option_value'		=> 'id',
	'option_label'		=> 'title',
])

@section('select-title')
    Colecciones
@overwrite
