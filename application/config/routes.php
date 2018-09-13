<?php

return [
	'' => [
		'controller' => 'main',
		'action' => 'index'
	],

	'login' => [
		'controller' => 'account',
		'action' => 'login'
	],

	'register' => [
		'controller' => 'account',
		'action' => 'register'
	],

	'account/response' => [
		'controller' => 'account',
		'action' => 'response'
	],

	'camera' => [
		'controller' => 'camera',
		'action' => 'enable'
	],

    'savetodb' => [
        'controller' => 'savetodb',
        'action' => 'save'
    ],

    'getpost' => [
        'controller' => 'post',
        'action' => 'get'
    ]
];