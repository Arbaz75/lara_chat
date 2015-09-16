<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session',

	/**
	 * Consumers
	 */
	'consumers' => [

		'Facebook' => [
			'client_id'     => '824953770951523',
			'client_secret' => 'ba4a86f5b64ac6e381e00d7b77f348e2',
			'scope'         => ['email'],
		],

	]

];