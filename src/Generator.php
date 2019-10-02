<?php

namespace OsmanKH\CalendarLinks;

interface Generator
{
    public function generate(Link $link): string;
}
