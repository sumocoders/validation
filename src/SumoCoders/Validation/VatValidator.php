<?php

namespace SumoCoders\Validation;

class VatValidator implements Validator
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
        $sanitizedInput = str_replace(array(' ', '/', '.', '-'), '', $input);
        $sanitizedInput = strtoupper($sanitizedInput);

        return $sanitizedInput;
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
        $rules = array(
            'AT' => '/^ATU\d{8}$/',
            'BE' => '/^BE[0-1]?\d{9}$/',
            'BG' => '/^BG\d{9,10}$/',
            'CZ' => '/^CZ\d{8,10}$/',
            'CY' => '/^CY\d{8}[A-Z]$/',
            'DE' => '/^DE\d{9}$/',
            'DK' => '/^DK\d{8}$/',
            'EE' => '/^EE\d{9}$/',
            'EL' => '/^EL\d{9}$/',
            'ES' => '/^ES([A-Z]\d{8}|\d{8}[A-Z])$/',
            'FI' => '/^FI\d{8}$/',
            'FR' => '/^FR\w{2}\d{9}$/',
            'GB' => '/^GB(\d{9}|\d{12}|GD\d{3}|HA\d{3})$/',
            'HR' => '/^HR\d{11}$/',
            'HU' => '/^HU\d{8}$/',
            'IE' => '/^IE(\d[A-Z0-9+*]\d{5}[A-Z]|\d{7}[A-Z]{1,2})$/',
            'IT' => '/^IT\d{11}$/',
            'LT' => '/^LT(\d{9}|\d{12})$/',
            'LU' => '/^LU\d{8}$/',
            'LV' => '/^LV\d{11}$/',
            'MT' => '/^MT\d{8}$/',
            'NL' => '/^NL\d{9}B\d{2}$/',
            'PL' => '/^PL\d{10}$/',
            'PT' => '/^PT\d{9}$/',
            'RO' => '/^RO\d{2,10}$/',
            'SE' => '/^SE\d{12}$/',
            'SI' => '/^SI\d{8}$/',
            'SK' => '/^SK\d{10}$/',
        );

        $countryCode = substr($input, 0, 2);

        if (!isset($rules[$countryCode])) {
            return false;
        }

        return (bool) preg_match($rules[$countryCode], $input);
    }
}
