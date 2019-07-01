<?php

return [

    'associate' => [

        'categories' => [
            'success'    => 'Las categorías se han asociado correctamente al producto.',
        ],
        'products' => [
            'success'    => 'Los productos se han asociado correctamente al producto.',
        ],
        'collections' => [
            'success'    => 'Las colecciones se han asociado correctamente al producto.',
        ],
    ],

    'deletable' =>  [
        'error'     =>  'El producto no pude ser eliminado.'
    ],

    'delete' =>  [
        'error'     =>  'El producto no pudo ser eliminado.',
        'categories_error'  =>  'El producto no pudo ser eliminado porque tiene categorías asociadas',
        'products_error'    =>  'El producto no pudo ser eliminado porque tiene productos asociados',
		'related_error'		=>  'El producto no pudo ser eliminado porque esta asociado con otros productos',
        'collections_error'    =>  'El producto no pudo ser eliminado porque tiene colecciones asociadas',
        'photos_error'    =>  'El producto no pudo ser eliminado porque tiene fotos asociadas',
        'lang_error'    =>  'El producto no pudo ser eliminado por los idiomas',
        'success'       =>  'El producto fue eliminado correctamente'
    ],

    'update'    =>  [
        'success'   =>   'El producto fue actualizado correctamente',
        'error'     =>   'El producto no pudo ser actualizado',
        'title'     =>  [
            'required'  =>  'El título del producto es un campo obligatorio',
            'array'     =>  'El título del producto es un campo obligatorio',
            'max'       =>  'El título del producto no puede ser mayor a 255 caracteres',
            'es'    =>  [
                'required'  =>  'El título del producto es un campo obligatorio',
                'array'     =>  'El título del producto es un campo obligatorio',
                'max'       =>  'El título del producto no puede ser mayor a 255 caracteres'
            ]
        ],
        'description'   =>  [
            'required'  =>  'La descripción del producto es un campo obligatorio',
            'array'     =>  'La descripción del producto es un campo obligatorio',
            'max'       =>  'La descripción del producto no puede ser mayor a 255 caracteres',
            'es'    =>  [
                'required'  =>  'La descripción del producto es un campo obligatorio',
                'array'     =>  'La descripción del producto es un campo obligatorio',
                'max'       =>  'La descripción del producto no puede ser mayor a 255 caracteres'
            ]
        ],

    ],
    'create'    =>  [
        'error'     =>  'El producto no pudo ser creado',
        'succes'    =>  'El producto fue creado correctamente',
        'title'     =>  [
            'required'  =>  'El título del producto es un campo obligatorio',
            'array'     =>  'El título del producto es un campo obligatorio',
            'max'       =>  'El título del producto no puede ser mayor a 255 caracteres',
            'es'    =>  [
                'required'  =>  'El título del producto es un campo obligatorio',
                'array'     =>  'El título del producto es un campo obligatorio',
                'max'       =>  'El título del producto no puede ser mayor a 255 caracteres',
            ]
        ],
        'description'   =>  [
            'required'  =>  'La descripción del producto es un campo obligatorio',
            'array'     =>  'La descripción del producto es un campo obligatorio',
            'max'       =>  'La descripción del producto no puede ser mayor a 255 caracteres',
            'es'    =>  [
                'required'  =>  'La descripción del producto es un campo obligatorio',
                'array'     =>  'La descripción del producto es un campo obligatorio',
                'max'       =>  'La descripción del producto no puede ser mayor a 255 caracteres'
            ]
        ],

    ]

];
