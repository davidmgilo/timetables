# timetables

[![Latest Stable Version](https://poser.pugx.org/davidmgilo/timetables/v/stable)](https://packagist.org/packages/davidmgilo/timetables)
[![Software License][ico-license]](LICENSE.md)
[![Build Status](https://travis-ci.org/davidmgilo/timetables.svg?branch=master)](https://travis-ci.org/davidmgilo/timetables)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/davidmgilo/timetables/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/davidmgilo/timetables/?branch=master)
[![StyleCI](https://styleci.io/repos/73413104/shield?branch=master)](https://styleci.io/repos/73413104)
[![Total Downloads](https://poser.pugx.org/davidmgilo/timetables/downloads)](https://packagist.org/packages/davidmgilo/timetables)


All-year-long project.

## Install

Via Composer in a laravel project

``` bash
$ composer require davidmgilo/timetables
```

Add to file **config/app.php** the TimetablesServiceProvider:
```php
/*
* Package Service Providers
*/
Scool\Timetables\Providers\TimetablesServiceProviders::class,
```
You'll need other packages:

spatie/menu
laravel/passport


Add other ServiceProviders:

```php
Spatie\Menu\Laravel\MenuServiceProvider::class,
Laravel\Passport\PassportServiceProvider::class,
```

And publish files with:
```bash
php artisan vendor:publish --tag=scool_timetables
```

## Database

Use:

```
php artisan migrate:status
```

To see timetables migrations and run migrations with:

```
php artisan migrate
```

Factories for all models are installed in database/factories.

To use Timetables Seeders modify file database/seeds/DatabaseSeeder:
```
public function run()
{
    ...
    $this->call(TimetablesSeeder::class);
}
```

Remember to create the adequate permissions about lessons in a seeder. (browse lessons, add lessons, edit lessons, delete lessons). You can found an example [here](https://github.com/davidmgilo/timetables_test)



## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ phpunit
```
## See more

On the presentation made via reveal.js:

[Presentation](https://davidmgilo.github.io/timetables-presentation/#/)

On the documentation via sami:

[Docs](https://davidmgilo.github.io/TimetablesDocs/)

### Other links

* [Package](https://github.com/davidmgilo/timetables)
* [Test Package](https://github.com/davidmgilo/timetables_test)
* [Official Page](https://davidmgilo.github.io/LandingPage/)
* [Demo](http://timetables.davidmartinez.sintesi.acacha.org:8080)
* [API Docs](https://davidmgilo.github.io/TimetablesDocs/)
* [Packagist](https://packagist.org/packages/davidmgilo/timetables)
* [Presentation](https://davidmgilo.github.io/timetables-presentation/#/)

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Credits

- [David Martinez][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/scool/timetables.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/scool/timetables/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/scool/timetables.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/scool/timetables.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/scool/timetables.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/scool/timetables
[link-travis]: https://travis-ci.org/scool/timetables
[link-scrutinizer]: https://scrutinizer-ci.com/g/scool/timetables/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/scool/timetables
[link-downloads]: https://packagist.org/packages/scool/timetables
[link-author]: https://github.com/davidmgilo
[link-contributors]: ../../contributors
