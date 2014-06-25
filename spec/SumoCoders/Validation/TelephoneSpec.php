<?php

namespace spec\Sumocoders\Validation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TelephoneSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Sumocoders\Validation\Telephone');
        $this->shouldImplement('SumoCoders\Validation\Validator');
    }

    function it_should_sanitize_phone_numbers()
    {
        $this->sanitize('092300000')->shouldReturn('+3292300000');
        $this->sanitize('09/230.00.00')->shouldReturn('+3292300000');
        $this->sanitize('09 230 00 00')->shouldReturn('+3292300000');
        $this->sanitize('+32 9 230 00 00')->shouldReturn('+3292300000');
        $this->sanitize('0032 9 230 00 00')->shouldReturn('+3292300000');

        $this->sanitize('0472000000')->shouldReturn('+32472000000');
        $this->sanitize('0472/00.00.00')->shouldReturn('+32472000000');
        $this->sanitize('0472 00 00 00')->shouldReturn('+32472000000');
        $this->sanitize('+32 472 00 00 00')->shouldReturn('+32472000000');
        $this->sanitize('0032 472 00 00 00')->shouldReturn('+32472000000');

        $this->sanitize('0034 472 00 00 00')->shouldReturn('+34472000000');
    }

    function it_should_validate_phone_numbers()
    {
        $this->validate('+3292300000')->shouldReturn(true);
        $this->validate('+32472000000')->shouldReturn(true);

        $this->validate('+32000')->shouldReturn(false);
        $this->validate('BLA 1020')->shouldReturn(false);
        $this->validate('0472/00.00.00')->shouldReturn(false);
    }
}
