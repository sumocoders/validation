<?php

namespace SumoCoders\Validation;

interface Validator
{
    /**
     * Method to sanitize given input according to the Validator's rules
     *
     * @param string $input The input that we want to santize
     *
     * @return string The sanitized output string
     */
    public function sanitize($input);

    /**
     * Method to validate if a given input satisfies the rules of this Validator
     *
     * @param string $input The input that we want to validate
     *
     * @return bool A boolean value (true: the input validates, false: input does not validate)
     */
    public function validate($input);
}
