<?php

return [

	'create'	=>	[
		'error'		=>	'La prensa no pudo ser creada',
		'success'	=>	'La prensa fue creada correctamente',
		'title'		=>	[
			'required'	=>	'El título de la prensa es un campo obligatorio',
			'max'		=>	'El título de la prensa debe tener máximo 400 caracteres',
			/*'es'		=>	[
				'required'	=>	'El título de la prensa es un campo obligatorio',
				'string'	=>	'El título de la prensa tiene un formato incorrecto',
				'max'		=>	'El título de la prensa no puede ser mayor a 255 caracteres'
			]*/
		],
		'content_pdf'		=>	[
			'required'	=>	'El contenido es un campo obligatorio',
			'file'		=> 	'El contenido debe ser un archivo',
			'mimes'		=> 	'El campo sólo acepta archivos en PDF'
		],
		'content_link'		=>	[
			'required'	=>	'El contenido es un campo obligatorio',
			'url' 		=>	'El contenido debe ser una liga de Youtube',
		],
		'publish_id' => [
			'required' => 'El tipo de publicación es un campo obligatorio',
			'exists' => 'El tipo de publicación no existe en nuestra base de datos'
		],
		'publish_at' => [
			'required' => 'La fecha de la publicación es un campo obligatorio',
			'date' => 'La fecha de la publicación no tiene el formato correcto'
		],
	],
	'update'	=>	[
		'error'		=>	'La prensa no pudo ser actualizada',
		'success'	=>	'La prensa fue actualizada correctamente',
		'title'		=>	[
			'required'	=>	'El título dLa prensa es un campo obligatorio',
			'array'		=>	'El título dLa prensa es un campo obligatorio',
			'es'		=>	[
				'required'	=>	'El título de la prensa es un campo obligatorio',
				'string'	=>	'El título de la prensa tiene un formato incorrecto',
				'max'		=>	'El título de la prensa no puede ser mayor a 255 caracteres'
			]
		],
		'content'		=>	[
			'required'	=>	'El contenido es un campo obligatorio',
			'string'	=>	'El contenido tiene un formato incorrecto',
			'url' 		=>	'El link de Youtube es un campo obligatorio',
			'mimes'		=> 	'El campo sólo acepta archivos en PDF'
		],
	],
    'delete'	=>	[
		'moodboards_error'	=>	'La prensa no pudo ser eliminada',
		'photos_error'		=>	'La prensa no pudo ser eliminada porque tiene fotos asociadas',
		'lang_error'		=>	'La prensa no pudo ser eliminada',
		'error'				=>	'La prensa no pudo ser eliminada',
		'success'			=>	'La prensa fue eliminado correctamente'
	]
];
