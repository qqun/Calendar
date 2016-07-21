This is a Laravel 5 package that provides calendar management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `lavalite/calendar`.

    "lavalite/calendar": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Lavalite\Calendar\Providers\CalendarServiceProvider::class,

```

And also add it to alias

```php
'Calendar'  => Lavalite\Calendar\Facades\Calendar::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Lavalite\Calendar\Providers\CalendarServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Lavalite\Calendar\Providers\CalendarServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Lavalite\Calendar\Providers\CalendarServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Lavalite\Calendar\Providers\CalendarServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Lavalite\Calendar\Providers\CalendarServiceProvider" --tag="view"

Publish admin views only if it is necessary.

## Usage


