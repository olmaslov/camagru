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

    'take_photo' => [
        'controller' => 'camera',
        'action' => 'camera'
    ],

    'savetodb' => [
        'controller' => 'savetodb',
        'action' => 'save'
    ],

    'getpost' => [
        'controller' => 'post',
        'action' => 'get'
    ],

	'my' => [
		'controller' => 'account',
		'action' => 'my'
	],

	'admin' => [
		'controller' => 'account',
		'action' => 'admin'
	],

    'resend' => [
        'controller' => 'account',
        'action' => 'resend'
	],

	'install' => [
		'controller' => 'install',
		'action' => 'install'
	],

    'change' => [
        'controller' => 'account',
        'action' => 'change'
    ]
];