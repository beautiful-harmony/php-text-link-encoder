<?php

declare(strict_types=1);

namespace Smeghead\TextLinkEncoder\Element\Segment;

use Smeghead\TextLinkEncoder\Config\Value;

final class UrlSegment implements Segment
{
    public static function getSearchRegex(): string
    {
        return '/https?:\/{2}[\w\/:%#\$&\?\(\)~\.=\+\-]+/';
    }

    public function __construct(private Value $value, private string $segment)
    {
    }

    public function toHtml(): string
    {
        $encoded = htmlspecialchars($this->segment, ENT_QUOTES);
        return sprintf(
            '<a href="%s" target="%s" rel="noreferrer noopener">%s</a>',
            $encoded,
            htmlspecialchars($this->value->linkTarget, ENT_QUOTES),
            $encoded
        );
    }
}
