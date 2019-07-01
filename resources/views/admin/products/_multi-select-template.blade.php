@extends('layouts.multi-select-image', [
	'select_plural'		=> 'products',
	'form_id' 			=> $form_id,
	'form_method'		=> $form_method,
	'form_route'		=> $form_route,
	'option_value'		=> 'id',
	'option_label'		=> 'title',
])

@section('select-title')
    Productos
@overwrite
