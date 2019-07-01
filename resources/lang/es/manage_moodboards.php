<?php

return [

	'create'	=>	[
		'error'		=>	'El inspiración no pudo ser creado',
		'success'	=>	'El inspiración fue creado correctamente',
		'title'		=>	[
			'required'	=>	'El título del inspiración es un campo obligatorio',
			'array'		=>	'El título del inspiración es un campo obligatorio',
			'es'		=>	[
				'required'	=>	'El título del inspiración es un campo obligatorio',
				'string'	=>	'El título del inspiración tiene un formato incorrecto',
				'max'		=>	'El título del inspiración no puede ser mayor a 255 caracteres'
			]
		],
		'content'		=>	[
			'required'	=>	'El link de Pinterest es un campo obligatorio',
			'string'	=>	'El link de Pinterest tiene un formato incorrecto'
		],
	],
	'update'	=>	[
		'error'		=>	'El inspiración no pudo ser actualizado',
		'success'	=>	'El inspiración fue actualizado correctamente',
		'title'		=>	[
			'required'	=>	'El título del inspiración es un campo obligatorio',
			'array'		=>	'El título del inspiración es un campo obligatorio',
			'es'		=>	[
				'required'	=>	'El título del inspiración es un campo obligatorio',
				'string'	=>	'El título del inspiración tiene un formato incorrecto',
				'max'		=>	'El título del inspiración no puede ser mayor a 255 caracteres'
			]
		],
		'content'		=>	[
			'required'	=>	'El link de Pinterest es un campo obligatorio',
			'string'	=>	'El link de Pinterest tiene un formato incorrecto'
		],
	],
    'delete'	=>	[
		'moodboards_error'	=>	'El mooboard no pudo ser eliminado',
		'photos_error'		=>	'El inspiración no pudo ser eliminado porque tiene fotos asociadas',
		'lang_error'		=>	'El inspiración no pudo ser eliminado',
		'error'				=>	'El inspiración no pudo ser eliminado',
		'success'			=>	'El inspiración fue eliminado correctamente'
	]
];
