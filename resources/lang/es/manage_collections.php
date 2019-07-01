<?php

return [

    'create'	=> [
		'error'	=>	'La colección no pudo ser creada',
		'success'=>	'La colección fue creada correctamente',
        'title'	=> [
    		'required'	=>	'El título de la colección es un campo obligatorio',
    		'array'     =>	'El título de la colección tiene un formato incorrecto',
            'max'       =>	'El título de la colección no puede exceder los 255 caracteres',
            'es'    =>  [
                'required'	=>	'El título de la colección es un campo obligatorio',
                'max'       =>	'El título de la colección no puede exceder los 255 caracteres',
            ],
            'en'    =>  [
                'required'	=>	'El título de la colección es un campo obligatorio',
                'max'       =>	'El título de la colección no puede exceder los 255 caracteres',
            ]
    	],
        'subtitle'	=> [
    		'required'	=>	'El subtítulo de la colección es un campo obligatorio',
    		'array'     =>	'El subtítulo de la colección tiene un formato incorrecto',
            'max'       =>	'El subtítulo de la colección no puede exceder los 255 caracteres',
            'es'   =>    [
                'required'	=>	'El subtítulo de la colección es un campo obligatorio',
        		'string'     =>	'El subtítulo de la colección tiene un formato incorrecto',
                'max'       =>	'El subtítulo de la colección no puede exceder los 255 caracteres',
            ],
            'en'    =>  [
                'required'	=>	'El subtítulo de la colección es un campo obligatorio',
        		'string'     =>	'El subtítulo de la colección tiene un formato incorrecto',
                'max'       =>	'El subtítulo de la colección no puede exceder los 255 caracteres',
            ]
    	],
        'excerpt'	=> [
    		'required'	=>	'El resumen de la colección es un campo obligatorio',
    		'array'     =>	'El resumen de la colección tiene un formato incorrecto',
            'max'       =>	'El resumen de la colección no puede exceder los 255 caracteres',
            'es'    =>  [
                'required'	=>	'El resumen de la colección es un campo obligatoria',
        		'max'     =>	'El resumen de la colección no puede exceder los 255 caracteres',
            ],
            'en'    =>  [
                'required'	=>	'El resumen de la colección es un campo obligatoria',
        		'string'     =>	'El resumen de la colección tiene un formato incorrecto',
            ]
    	],
        'content'	=> [
    		'required'	=>	'La descripción de la colección es un campo obligatorio',
    		'array'     =>	'La descripción de la colección tiene un formato incorrecto',
            'max'       =>	'La descripción de la colección no puede exceder los 255 caracteres',
            'es'    =>  [
                'required'	=>	'La descripción de la colección es un campo obligatorio',
        		'string'     =>	'La descripción de la colección tiene un formato incorrecto',
                'max'       =>	'La descripción de la colección no puede exceder los 255 caracteres',
            ],
            'en'    =>  [
                'required'	=>	'La descripción de la colección es un campo obligatorio',
        		'string'     =>	'La descripción de la colección tiene un formato incorrecto',
                'max'       =>	'La descripción de la colección no puede exceder los 255 caracteres',
            ]
    	],
	],

	'update' => [
		'success' => 'La colección fue actualizada correctamente',
        'title'	=> [
    		'required'	=>	'El título de la colección es un campo obligatorio',
    		'array'     =>	'El título de la colección tiene un formato incorrecto',
            'max'       =>	'El título de la colección no puede exceder los 255 caracteres',
            'es'    =>  [
                'required'	=>	'El título de la colección es un campo obligatorio',
        		'string'     =>	'El título de la colección tiene un formato incorrecto',
                'max'       =>	'El título de la colección no puede exceder los 255 caracteres',
            ],
            'en'    =>  [
                'required'	=>	'El título de la colección es un campo obligatorio',
        		'string'     =>	'El título de la colección tiene un formato incorrecto',
                'max'       =>	'El título de la colección no puede exceder los 255 caracteres',
            ]
    	],
        'subtitle'	=> [
    		'required'	=>	'El subtítulo de la colección es un campo obligatorio',
    		'array'     =>	'El subtítulo de la colección tiene un formato incorrecto',
            'max'       =>	'El subtítulo de la colección no puede exceder los 255 caracteres',
            'es'   =>    [
                'required'	=>	'El subtítulo de la colección es un campo obligatorio',
        		'string'     =>	'El subtítulo de la colección tiene un formato incorrecto',
                'max'       =>	'El subtítulo de la colección no puede exceder los 255 caracteres',
            ],
            'en'    =>  [
                'required'	=>	'El subtítulo de la colección es un campo obligatorio',
        		'string'     =>	'El subtítulo de la colección tiene un formato incorrecto',
                'max'       =>	'El subtítulo de la colección no puede exceder los 255 caracteres',
            ]
    	],
        'excerpt'	=> [
    		'required'	=>	'El resumen de la colección es un campo obligatoria',
    		'array'     =>	'El resumen de la colección tiene un formato incorrecto',
            'max'       =>	'El resumen de la colección no puede exceder los 255 caracteres',
            'es'    =>  [
                'required'	=>	'El resumen de la colección es un campo obligatoria',
        		'string'     =>	'El resumen de la colección tiene un formato incorrecto',
            ],
            'en'    =>  [
                'required'	=>	'El resumen de la colección es un campo obligatoria',
        		'string'     =>	'El resumen de la colección tiene un formato incorrecto',
            ]
    	],
        'content'	=> [
    		'required'	=>	'La descripción de la colección es un campo obligatoria',
    		'array'     =>	'La descripción de la colección tiene un formato incorrecto',
            'max'       =>	'La descripción de la colección no puede exceder los 255 caracteres',
            'es'    =>  [
                'required'	=>	'La descripción de la colección es un campo obligatorio',
        		'string'     =>	'La descripción de la colección tiene un formato incorrecto',
            ],
            'en'    =>  [
                'required'	=>	'La descripción de la colección es un campo obligatorio',
        		'string'     =>	'La descripción de la colección tiene un formato incorrecto',
            ]
    	],
	],

	'deletable' =>	[
		'error'	=>	'La colección cuenta con productos asociados'
	],

	'delete' =>	[
		'error'	=>	'La colección no pudo ser borrada',
		'success'=>	'La colección fue borrada correctamente '
	],
    'associate' =>  [
        'types' =>  [
            'success'   =>  'Los tipos de colecciones se han asociado correctamente'
        ]
    ]
];
