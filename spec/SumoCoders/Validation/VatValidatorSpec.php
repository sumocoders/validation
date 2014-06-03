<?php

namespace spec\SumoCoders\Validation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VatValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SumoCoders\Validation\VatValidator');
        $this->shouldImplement('SumoCoders\Validation\Validator');
    }

    function it_should_sanitize_vat_numbers()
    {
        $this->sanitize('BE-0999999999')->shouldReturn('BE0999999999');
        $this->sanitize('BE 0999999999')->shouldReturn('BE0999999999');
        $this->sanitize('BE/0999999999')->shouldReturn('BE0999999999');
        $this->sanitize('BE.0999999999')->shouldReturn('BE0999999999');
        $this->sanitize('BE-0999999999')->shouldReturn('BE0999999999');
        $this->sanitize('be0999999999')->shouldReturn('BE0999999999');
    }

    function it_should_validate_vat_numbers()
    {
        $this->validate('ATU99999999')->shouldReturn(true);
        $this->validate('BE29999999999')->shouldReturn(false);

        $this->validate('BE0999999999')->shouldReturn(true);
        $this->validate('BE2999999999')->shouldReturn(false);

        $this->validate('BG999999999')->shouldReturn(true);
        $this->validate('BG99999999999')->shouldReturn(false);

        $this->validate('CZ9999999999')->shouldReturn(true);
        $this->validate('CZ99999999999')->shouldReturn(false);

        $this->validate('CY99999999L')->shouldReturn(true);
        $this->validate('CY99999999L9')->shouldReturn(false);

        $this->validate('DE999999999')->shouldReturn(true);
        $this->validate('DE9999999999')->shouldReturn(false);

        $this->validate('DK99999999')->shouldReturn(true);
        $this->validate('DK999999999')->shouldReturn(false);

        $this->validate('EE999999999')->shouldReturn(true);
        $this->validate('EE9999999999')->shouldReturn(false);

        $this->validate('EL999999999')->shouldReturn(true);
        $this->validate('EL9999999999')->shouldReturn(false);

        $this->validate('ESA99999999')->shouldReturn(true);
        $this->validate('ES99999999A')->shouldReturn(true);
        $this->validate('ES9999999999')->shouldReturn(false);

        $this->validate('FI99999999')->shouldReturn(true);
        $this->validate('FI999999999')->shouldReturn(false);

        $this->validate('FRXX999999999')->shouldReturn(true);
        $this->validate('FRXX9999999999')->shouldReturn(false);
        $this->validate('FR9999999999')->shouldReturn(false);

        $this->validate('GB999999999')->shouldReturn(true);
        $this->validate('GB999999999999')->shouldReturn(true);
        $this->validate('GBGD001')->shouldReturn(true);
        $this->validate('GBHA599')->shouldReturn(true);
        $this->validate('GBXX999999999')->shouldReturn(false);
        $this->validate('GB9999999999')->shouldReturn(false);

        $this->validate('HR99999999999')->shouldReturn(true);
        $this->validate('HR999999999')->shouldReturn(false);

        $this->validate('HU99999999')->shouldReturn(true);
        $this->validate('FI999999999')->shouldReturn(false);

        $this->validate('IE1234567T')->shouldReturn(true);
        $this->validate('IE1234567TW')->shouldReturn(true);
        $this->validate('IE1234567FA')->shouldReturn(true);
        $this->validate('IE999999999')->shouldReturn(false);

        $this->validate('IT99999999999')->shouldReturn(true);
        $this->validate('IT9999999999')->shouldReturn(false);

        $this->validate('LT999999999')->shouldReturn(true);
        $this->validate('LT999999999999')->shouldReturn(true);
        $this->validate('LT9999999999')->shouldReturn(false);

        $this->validate('LU99999999')->shouldReturn(true);
        $this->validate('LU9999999999')->shouldReturn(false);

        $this->validate('LV99999999999')->shouldReturn(true);
        $this->validate('LV9999999999')->shouldReturn(false);

        $this->validate('MT99999999')->shouldReturn(true);
        $this->validate('MT9999999999')->shouldReturn(false);

        $this->validate('NL999999999B99')->shouldReturn(true);
        $this->validate('NL9999999999')->shouldReturn(false);

        $this->validate('PL9999999999')->shouldReturn(true);
        $this->validate('PL999999999')->shouldReturn(false);

        $this->validate('PT999999999')->shouldReturn(true);
        $this->validate('PT99999999')->shouldReturn(false);

        $this->validate('RO999999999')->shouldReturn(true);
        $this->validate('RO99999999999')->shouldReturn(false);

        $this->validate('SE999999999999')->shouldReturn(true);
        $this->validate('SE99999999999')->shouldReturn(false);

        $this->validate('SI99999999')->shouldReturn(true);
        $this->validate('SI999999999')->shouldReturn(false);

        $this->validate('SK9999999999')->shouldReturn(true);
        $this->validate('SK99999999999')->shouldReturn(false);

        $this->validate('RA999999999')->shouldReturn(false);
    }
}
