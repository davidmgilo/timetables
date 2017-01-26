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
    $this->call(AttendancePermissionSeeder::class);
}
```



## Usage

``` php
$skeleton = new scool\timetables();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```
## See more

On the presentation made via reveal.js:

[Presentation](https://davidmgilo.github.io/timetables-presentation/#/)

On the documentation via sami:

[Docs](https://davidmgilo.github.io/TimetablesDocs/)

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email davidmgilo@gmail.com instead of using the issue tracker.

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
