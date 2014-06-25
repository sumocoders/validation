<?php

namespace SumoCoders\Validation;

/**
 * Telephone validator
 *
 * Currently this class only validates belgian format fixed and mobile phone numbers.
 * It is not tested for other formats.
 */
class Telephone implements Validator
{
    /**
     * Method to sanitize given input according to the Validator's rules
     *
     * @param string $input The input that we want to santize
     *
     * @return string The sanitized output string
     */
    public function sanitize($input)
    {
        $phoneNumber = $input;

        // Remove everything except numbers and '+' sign
        $phoneNumber = preg_replace('/[^+0-9]/i', '', $phoneNumber);

        // Normalize: all numbers start with +{countryCode}
        $phoneNumber = preg_replace('/^00/i', '+', $phoneNumber);
        $phoneNumber = preg_replace('/^0/i', '+32', $phoneNumber);

        return $phoneNumber;
    }

    /**
     * Method to validate if a given input satisfies the rules of this Validator
     *
     * @param string $input The input that we want to validate
     *
     * @return bool A boolean value (true: the input validates, false: input does not validate)
     */
    public function validate($input)
    {
        if (!preg_match('/^\+\d{2}\d{8,9}$/i', $input)) {
            return false;
        }

        return true;
    }
}
