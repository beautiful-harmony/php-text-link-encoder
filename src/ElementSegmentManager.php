<?php

namespace Smeghead\TextLinkEncoder;

use Smeghead\TextLinkEncoder\Config\TextLinkEncoderSettings;
use Smeghead\TextLinkEncoder\Element\Segment\EmailSegment;
use Smeghead\TextLinkEncoder\Element\Segment\TextSegment;
use Smeghead\TextLinkEncoder\Element\Segment\UrlSegment;

class ElementSegmentManager
{
    public function __construct(
        private TextLinkEncoderSettings $settings
    ) {}

    /**
     * @param class-string $segmentClass
     * @param string $segment
     * @return Element\Segment\Segment
     */
    public function instantiate(string $segmentClass, string $segment): Element\Segment\Segment
    {
        return match ($segmentClass) {
            EmailSegment::class => new EmailSegment($this->settings->value(), $segment),
            UrlSegment::class => new UrlSegment($this->settings->value(),$segment),
            TextSegment::class => new TextSegment($segment),
            default => throw new \LogicException('Unexpected SegmentClass')
        };
    }
}