<?php

return [

    'delete'    =>  [
        'error'         =>  'El evento no pudo ser eliminado',
        'photos_error'  =>  'El evento no pudo ser eliminado porque tiene imágenes asociadas',
        'lang_error'    =>  'El evento no pudo ser eliminado',
        'success'       =>  'El evento se ha eliminado correctamente'
    ],

    'create'    =>  [
        'success'   =>  'El evento se ha creado correctamente',
        'error'     =>  'El evento no ha podido ser creado',
        'title'     =>  [
            'required'  =>  'El título del evento es un campo obligatorio',
            'array'     =>  'El título del evento es un campo obligatorio',
            'es'        =>  [
                'required'  =>  'El título del evento es un campo obligatorio',
                'string'    =>  'El título del evento tiene un formato incorrecto',
                'max'       =>  'El título del evento no puede ser mayor a 255 caracteres'
            ]
        ],
        'subtitle'     =>  [
            'required'  =>  'El subtítulo del evento es un campo obligatorio',
            'array'     =>  'El subtítulo del evento es un campo obligatorio',
            'es'        =>  [
                'required'  =>  'El subtítulo del evento es un campo obligatorio',
                'string'    =>  'El subtítulo del evento tiene un formato incorrecto',
                'max'       =>  'El subtítulo del evento no puede ser mayor a 255 caracteres'
            ]
        ],
        'content'     =>  [
            'required'  =>  'La descripción del evento es un campo obligatorio',
            'array'     =>  'La descripción del evento es un campo obligatorio',
            'es'        =>  [
                'required'  =>  'La descripción del evento es un campo obligatorio',
                'string'    =>  'La descripción del evento tiene un formato incorrecto',
            ]
        ],
    ],

    'update'    =>  [
        'success'   =>  'El evento se ha creado correctamente',
        'error'     =>  'El evento no ha podido ser creado',
        'title'     =>  [
            'required'  =>  'El título del evento es un campo obligatorio',
            'array'     =>  'El título del evento es un campo obligatorio',
            'es'        =>  [
                'required'  =>  'El título del evento es un campo obligatorio',
                'string'    =>  'El título del evento tiene un formato incorrecto',
                'max'       =>  'El título del evento no puede ser mayor a 255 caracteres'
            ]
        ],
        'subtitle'     =>  [
            'required'  =>  'El subtítulo del evento es un campo obligatorio',
            'array'     =>  'El subtítulo del evento es un campo obligatorio',
            'es'        =>  [
                'required'  =>  'El subtítulo del evento es un campo obligatorio',
                'string'    =>  'El subtítulo del evento tiene un formato incorrecto',
                'max'       =>  'El subtítulo del evento no puede ser mayor a 255 caracteres'
            ]
        ],
        'content'     =>  [
            'required'  =>  'La descripción del evento es un campo obligatorio',
            'array'     =>  'La descripción del evento es un campo obligatorio',
            'es'        =>  [
                'required'  =>  'La descripción del evento es un campo obligatorio',
                'string'    =>  'La descripción del evento tiene un formato incorrecto',
            ]
        ],
    ],

];
