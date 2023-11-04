<?php

namespace Smeghead\TextLinkEncoder\Config;

final class Value {
    public function __construct(
        public bool $brTag,
        public string $linkTarget,
        public string $linkRel
    )
    {
    }
}