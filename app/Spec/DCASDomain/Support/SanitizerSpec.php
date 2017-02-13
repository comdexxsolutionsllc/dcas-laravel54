<?php

namespace Spec\DCASDomain\Support;

use DCASDomain\Support\Sanitizer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SanitizerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Sanitizer::class);
    }
}
