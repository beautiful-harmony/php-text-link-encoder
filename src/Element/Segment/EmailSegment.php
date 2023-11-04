<?php

declare(strict_types=1);

namespace Smeghead\TextLinkEncoder\Element\Segment;

use Laminas\Escaper\Escaper;
use Smeghead\TextLinkEncoder\Config\Value;

final class EmailSegment implements Segment
{
    public static function getSearchRegex(): string
    {
        return '/[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}/';
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
        return sprintf(
            '<a href="mailto:%s" target="%s" rel="noreferrer noopener">%s</a>',
            $this->segment,
            $this->escaper->escapeHtmlAttr($this->value->linkTarget),
            htmlspecialchars($this->segment, ENT_QUOTES)
        );
    }
}
