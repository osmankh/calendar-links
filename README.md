# Generate add to calendar links for Google, iCal and other calendar systems

This repo is forked from Spatie/calendar-links repo and modified to fit my needs.

Using this package you can generate links to add events to calendar systems. Here's a quick example:

```php
(new Link(
   'Birthday',
   DateTime::createFromFormat('Y-m-d H:i', '2018-02-01 09:00'),
   DateTime::createFromFormat('Y-m-d H:i', '2018-02-01 18:00')
))->google();
```

This will output: `https://calendar.google.com/calendar/render?action=TEMPLATE&text=Birthday&dates=20180201T090000/20180201T180000&sprop=&sprop=name:`

If you follow that link (and are authenticated with Google) you'll see a screen to add the event to your calendar.

The package can also generate ics files that you can open in several email and calendar programs, including Microsoft Outlook, Google Calendar, and Apple Calendar.

## Installation

You can install the package via composer:

```bash
composer require osmankh/calendar-links
```

## Usage

``` php
<?php
use OsmanKH\CalendarLinks\Link;

$from = DateTime::createFromFormat('Y-m-d H:i', '2018-02-01 09:00');
$to = DateTime::createFromFormat('Y-m-d H:i', '2018-02-01 18:00');

$link = Link::create('Sebastian\'s birthday', $from, $to)
    ->description('Cookies & cocktails!')
    ->address('Samberstraat 69D, 2060 Antwerpen');

// Generate a link to create an event on Google calendar
echo $link->google();

// Generate a link to create an event on Yahoo calendar
echo $link->yahoo();

// Generate a link to create an event on outlook.com calendar
echo $link->webOutlook();

// Generate a data uri for an ics file (for iCal & Outlook)
echo $link->ics();
```

> ⚠️ ICS download links don't work in IE and EdgeHTML-based Edge browsers.

## Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email osmankhoder7@gmail.com or use the issue tracker.

## Credits

- [Sebastian De Deyne](https://github.com/sebastiandedeyne)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
