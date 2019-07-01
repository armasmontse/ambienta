<?php

return [
	'user' =>[
		'update_password'    => [
			'subject'   => 'Tu contraseña ha cambiado',
	        'copy'      => 'Recientemente notamos que tu contraseña ha cambiado, si no reconoces este cambio por favor contacta a soporte técnico.',
		],

		'update_mail'    => [
			'subject'   => 'Tu email ha cambiado',
	        'copy'      => 'Recientemente notamos que has hecho un cambio en tu mail, si no fuiste tú por favor contacta a soporte técnico, en caso contrario ignora este mensaje.',
		]
	],

	'admin' => [
		'users'	=> [
			'activation_account' => [
				'subject'   => 'Registro en Ambienta',
				'action'    => 'Activar cuenta',
			],
		]
	],

	'general'=> [
		'success'			=> 'Hola',
		'error'				=> 'Whoops!',
		'salutation'		=> 'Saludos',
		'button_problems'	=> 'Si tienes problemas dando click al botón ":button", copia y pega el siguiente URL en tu navegador.',
		'rights_reserved'	=> 'Todos los derechos reservados',

	],

	'client'=> [
		'reset_password' => [
			'subject'   => 'Restablecer contraseña',
	        'copy'      => 'Recientemente notamos que has perdido tu contraseña, para restablecerla da click en el siguiente botón',
	        'action'    => 'Restablecer contraseña',
		],

		'contact' => [
			'subject'   => 'Información de contacto de: :full_name',
	        'copy'      => 'El usuario :full_name con los siguientes datos: <br/>
			Edad: :age, <br/>
			Sexo: :sex, <br/>
			Teléfono: :phone, <br/>
			Email: :email <br/>
			Fecha: :date <br/>
			Número de invitados: :number_invites <br/> <br/>
			Tipo de evento : :type <br/>

			Datos del evento: <br/> ":event"',
		],

		'thanks_for_contact' => [
			'subject'   => 'Confirmación de contacto',
			'copy'      => 'Gracias por tu mensaje :full_name. <br/> En breve nos comunicaremos contigo.',
		],
	],

];
