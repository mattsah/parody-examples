<?php namespace Dotink\Lab {

	use Dotink\Parody\Mime;

	return [
		'setup' => function($data) {
			needs(implode(
				DIRECTORY_SEPARATOR,
				[$data['root'], 'classes', 'Foo.php']
			));
		},

		'tests' => [
			'Foo::bar()' => function() {
				Mime::define('Bar');
				Mime::create('Bar')
					-> onNew (function($mime) {
						return $mime
							-> onCall('value')
							-> give('bar');
					});

				assert('Foo::bar')
					-> using (new \Foo())
					-> equals('bar');
			}
		]
	];
}
