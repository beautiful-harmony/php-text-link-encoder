<?php

declare(strict_types=1);

namespace Smeghead\TextLinkEncoder\Element\Segment;


interface Segment
{
    public static function getSearchRegex(): string;
    public function toHtml(): string;
}
