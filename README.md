SumoCoders Validation Library
========================================

A simple validation library for e.g.: IBAN and VAT numbers


Validators
----------------------------------------

- IBAN
- VAT
- Telephone numbers (currently only BE fixed and mobile numbers)


Getting started
----------------------------------------

### Requirements

- php 5.3
- composer


### Usage

#### 1. Install this package in your project using composer

in your `composer.json` file:

```json
{
    "require": {
        "sumocoders/validation": "v0.2"
    }
}
```

#### 2. Require the composer autoloader in your project

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';
```

#### 3. Create a validator instance for iban

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

// Create validator instance
$ibanValidator = new SumoCoders\Validation\IbanValidator();

// Sanitize iban code input:
$validIbanFormat = $ibanValidator->sanitize($input);

// Validate iban code:
if ($ibanValidator->validate($validIbanFormat)) {
    // It's a valid iban code!
}
```

