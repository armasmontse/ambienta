<?php
return [

    'full_name' => [
       'required'	=>	'El nombre es un campo obligatorio',
       'string'	=>	'El nombre es un campo obligatorio',
    ],
    'age' => [
       'present'	=>	'La edad es un campo obligatorio',
       'integer'	=>	'La edad debe ser ingresada en números',
       'min'        =>  'La edad no puede ser menor a 1'
    ],
    'sex' =>	[
	   'in'	=>	'Elegir un sexo es un campo obligatorio'
    ],
    'phone' => [
       'required'	=>	'El teléfono es un campo obligatorio',
       'string'	=>	'El teléfono es un campo obligatorio',
    ],
    'email'   => [
       'required'  =>  'Es necesario que ingreses un correo electrónico',
       'email'     =>  'Ingresa un correo electrónico válido',
    ],
    'event'     =>  [
        'required'  =>  'El campo datos del evento es obligatorio',
        'string'    =>  'El campo datos del evento es obligatorio'
    ],
	'date'     =>  [
		'after'  =>  'El evento debe ser en una fecha futura',
	],
   'sended'	=> [
	   "success"	=> "¡Muchas gracias! Hemos recibido tu mensaje correctamente, pronto recibirás un correo de confirmación.",
   ]

];
