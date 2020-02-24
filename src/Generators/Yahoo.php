<?php

namespace OsmanKH\CalendarLinks\Generators;

use DateTimeZone;
use OsmanKH\CalendarLinks\Link;
use OsmanKH\CalendarLinks\Generator;

/**
 * @see https://github.com/InteractionDesignFoundation/add-event-to-calendar-docs/blob/master/services/yahoo.md
 */
class Yahoo implements Generator
{
    public function generate(Link $link): string
    {
        $url = 'https://calendar.yahoo.com/?v=60&view=d&type=20';

        $url .= '&title='.urlencode($link->title);

        if ($link->allDay) {
            $dateTimeFormat = 'Ymd';
            $url .= '&st='.$link->from->format($dateTimeFormat);
            $url .= '&dur=allday';
        } else {
            $dateTimeFormat = 'Ymd\THis';
            $utcStartDateTime = (clone $link->from)->setTimezone(new DateTimeZone('UTC'));
            $utcEndDateTime = (clone $link->to)->setTimezone(new DateTimeZone('UTC'));
            $url .= '&st='.$utcStartDateTime->format($dateTimeFormat);
            $diff = $utcEndDateTime->diff($utcStartDateTime);
            $url .= '&dur='.$diff->format("%H%I");
        }

        if ($link->description) {
            $url .= '&desc='.urlencode($link->description);
        }

        if ($link->address) {
            $url .= '&in_loc='.urlencode($link->address);
        }

        return $url;
    }
}
