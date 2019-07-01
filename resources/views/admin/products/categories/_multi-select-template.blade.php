@extends('layouts.multi-select', [
	'select_plural'		=> 'categories',
	'form_id' 			=> $form_id,
	'form_method'		=> $form_method,
	'form_route'		=> $form_route,

	"add_label"			=> $add_label,

	'option_value'		=> 'id',
	'option_label'		=> 'label',
])

@section('select-title')
    Categorías
@overwrite
