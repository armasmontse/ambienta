<?php

return [

    'create'	=> [
		'error'	=>	'La categoría no pudo ser creada',
		'success'=>	'La categoría fue creada correctamente',
        'label'	=> [
    		'required'	=>	'La categoría es un campo obligatoria',
    		'array'     =>	'La categoría tiene un formato incorrecto',
    	],
	],

	'update' => [
		'success' => 'La categoría fue actualizada correctamente',
        'label'	=> [
    		'required'	=>	'La categoría es un campo obligatoria',
    	],
	],
	'deletable' =>	[
		'error'	=>	'La categoría cuenta con noticias asociadas'
	],
	'delete' =>	[
		'error'	=>	'La categoría no pudo ser borrada',
		'success'=>	'La categoría fue borrada correctamente '
	],

];
