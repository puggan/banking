<?php

namespace byrokrat\banking\Validator;

use byrokrat\banking\Validator;
use byrokrat\banking\AccountNumber;
use byrokrat\banking\Exception\InvalidCheckDigitException;
use byrokrat\checkdigit\Modulo11;

/**
 * Validate check digits for type 1B accounts
 */
class CheckdigitType1BValidator implements Validator
{
    /**
     * @var Modulo11 Checksum calculator
     */
    private $checksum;

    /**
     * Inject checksum calculator
     *
     * @param Modulo11 $checksum
     */
    public function __construct(Modulo11 $checksum = null)
    {
        $this->checksum = $checksum ?: new Modulo11;
    }

    /**
     * Validate check digit
     *
     * Type1B checksum calculation is made on the entire clearing number, and
     * seven digits of the actual account number.
     *
     * @param  AccountNumber $number
     * @return null
     * @throws InvalidCheckDigitException If check digit is not valid
     */
    public function validate(AccountNumber $number)
    {
        $toValidate = $number->getClearingNumber() . $number->getSerialNumber() . $number->getCheckDigit();
        if (!$this->checksum->isValid($toValidate)) {
            throw new InvalidCheckDigitException("Invalid check digit {$number->getCheckDigit()} in $number");
        }
    }
}