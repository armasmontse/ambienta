<?php

return [

	'success'	=>	[
		'create'	=>	'El usuario fue creado correctamente',

	],
	'create'	=>	[
		'first_name'	=>	[
			'max'		=>	'El nombre es un campo obligatorio',
			'required'	=>	'El nombre no puede exceder los 255 caracteres'
		],
		'last_name'	=>	[
			'max'		=>	'El apellido es un campo obligatorio',
			'required'	=>	'El apellido no puede exceder los 255 caracteres'
		],
		'email'		=>	[
			'required'	=>	'El email del usuario es obligatorio',
            'email'     =>	'El email del usuario no tiene un formato correcto',
            'max'     =>	'El formato del email del usuario no puede ser mayor a 255 caracteres',
            'unique'     =>	'El formato del email del usuario es incorrecto'
		],
		'roles'		=>	[
			'required'	=>	'Asignar un rol a un usuario, es obligatorio',
			'exist'		=>	'Asignar un rol a un usuario, es obligatorio'
		]
	],
	'update'	=>	[
		'first_name'	=>	[
			'max'		=>	'El nombre es un campo obligatorio',
			'required'	=>	'El nombre no puede exceder los 255 caracteres'
		],
		'last_name'	=>	[
			'max'		=>	'El apellido es un campo obligatorio',
			'required'	=>	'El apellido no puede exceder los 255 caracteres'
		],
		'email'		=>	[
			'required'	=>	'El email del usuario es obligatorio',
            'email'     =>	'El email del usuario no tiene un formato correcto',
            'max'     =>	'El formato del email del usuario no puede ser mayor a 255 caracteres',
            'unique'     =>	'El formato del email del usuario es incorrecto'
		],
		'roles'		=>	[
			'required'	=>	'Asignar un rol a un usuario, es obligatorio',
			'exist'		=>	'Asignar un rol a un usuario, es obligatorio'
		]
	],

];
