<?php

namespace spec\SumoCoders\Validation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IbanValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SumoCoders\Validation\IbanValidator');
        $this->shouldImplement('SumoCoders\Validation\Validator');
    }

    function it_should_sanitize_iban_numbers()
    {
        $this->sanitize('BE00 1234 5678 9012')->shouldReturn('BE00123456789012');
        $this->sanitize('be00 1234 5678 9012')->shouldReturn('BE00123456789012');
    }

    function it_should_validate_iban_numbers()
    {
        $this->validate('BE33 0688 9108 2746')->shouldReturn(true);
        $this->validate('BE00 1234 5678 9012')->shouldReturn(false);
    }
}
