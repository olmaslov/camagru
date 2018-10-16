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
    ],

    'mask' => [
        'controller' => 'camera',
        'action' => 'mask'
    ],

	'delpost' => [
		'controller' => 'savetodb',
		'action' => 'del'
	],

	'getadm' => [
		'controller' => 'account',
		'action' => 'adm'
	],

	'delusr' => [
		'controller' => 'account',
		'action' => 'del'
	],

	'forgot' => [
		'controller' => 'account',
		'action' => 'forgot'
	],

	'newpass' => [
		'controller' => 'account',
		'action' => 'newpass'
	],

    'addcom' => [
        'controller' => 'post',
        'action' => 'comment'
    ],

    'addlike' => [
        'controller' => 'post',
        'action' => 'like'
    ]
];