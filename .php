{
"name": "laravel/laravel",
"type": "project",
"description": "The Laravel Framework.",
"keywords": ["framework", "laravel"],
"license": "MIT",
"require": {
"php": "^8.0.2",
"ext-curl": "*",
"ext-json": "*",
"ext-mbstring": "*",
"guzzlehttp/guzzle": "^7.2",
"illuminate/support": "^8.77|^9.0",
"laravel/framework": "^9.19",
"laravel/sanctum": "^3.0",
"laravel/tinker": "^2.7",
"monolog/monolog": "^2.3",
"spatie/flare-client-php": "^1.0.1",
"spatie/ignition": "^1.3",
"symfony/console": "^5.0|^6.0",
"symfony/var-dumper": "^5.0|^6.0"
},
"require-dev": {
"fakerphp/faker": "^1.9.1",
"filp/whoops": "^2.14",
"laravel/pint": "^1.0",
"laravel/sail": "^1.0.1",
"livewire/livewire": "^2.8|dev-develop",
"mockery/mockery": "^1.4",
"nunomaduro/collision": "^6.1",
"nunomaduro/larastan": "^1.0",
"orchestra/testbench": "^6.23|^7.0",
"pestphp/pest": "^1.20",
"phpstan/phpstan": "^1.8",
"phpunit/phpunit": "^9.5.10",
"spatie/laravel-ignition": "^1.0"
},
"autoload": {
"psr-4": {
"App\\": "app/",
"Database\\Factories\\": "database/factories/",
"Database\\Seeders\\": "database/seeders/"
}
},
"autoload-dev": {
"psr-4": {
"Tests\\": "tests/"
}
},
"scripts": {
"post-autoload-dump": [
"Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
"@php artisan package:discover --ansi"
],
"post-update-cmd": [
"@php artisan vendor:publish --tag=laravel-assets --ansi --force"
],
"post-root-package-install": [
"@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
],
"post-create-project-cmd": [
"@php artisan key:generate --ansi"
]
},
"extra": {
"laravel": {
"dont-discover": []
}
},
"config": {
"optimize-autoloader": true,
"preferred-install": "dist",
"sort-packages": true,
"allow-plugins": {
"pestphp/pest-plugin": true
}
},
"minimum-stability": "dev",
"prefer-stable": true
}
