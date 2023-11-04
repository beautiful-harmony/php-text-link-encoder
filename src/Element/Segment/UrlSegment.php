<?php

declare(strict_types=1);

namespace Smeghead\TextLinkEncoder\Element\Segment;

use Laminas\Escaper\Escaper;
use Smeghead\TextLinkEncoder\Config\Value;

final class UrlSegment implements Segment
{
    public static function getSearchRegex(): string
    {
        return '/https?:\/{2}[\w\/:%#\$&\?\(\)~\.=\+\-]+/';
    }

    public function __construct(
        private Escaper $escaper,
        private Value $value,
        private string $segment
    )
    {
    }

    public function toHtml(): string
    {
        if (!filter_var($this->segment, FILTER_VALIDATE_URL)) {
            return htmlspecialchars($this->segment, ENT_QUOTES);
        }

        return sprintf(
            '<a href="%s" target="%s" rel="noreferrer noopener">%s</a>',
            $this->segment,
            $this->escaper->escapeHtmlAttr($this->value->linkTarget),
            htmlspecialchars($this->segment, ENT_QUOTES)
        );
    }
}
