<?php

declare(strict_types=1);

namespace Smeghead\TextLinkEncoder\Element\Segment;

use Smeghead\TextLinkEncoder\Config\TextLinkEncoderSettings;

final class TextSegment implements Segment
{
    public static function getSearchRegex(): string
    {
        return '/.*/';
    }

    public function __construct(private string $segment)
    {
    }

    public function toHtml(): string
    {
        return htmlspecialchars($this->segment, ENT_QUOTES);
    }
}
