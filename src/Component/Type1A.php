<?php
/**
 * This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://www.wtfpl.net/ for more details.
 */

namespace ledgr\banking\Component;

use ledgr\checkdigit\Modulo11;

/**
 * Helper that implements isValidCheckDigit() for Type1A accounts
 *
 * @author Hannes Forsgård <hannes.forsgard@fripost.org>
 */
trait Type1A
{
    use Type1;

    /**
     * Validate check digit (from Component\Constructor)
     *
     * Type1A checksum calculation is made on the clearing number with the exception
     * of the first digit, and seven digits of the actual account number.
     *
     * @return boolean
     */
    protected function isValidCheckDigit()
    {
        return Modulo11::verify(
            substr($this->getClearingNumber(), 1) . $this->getSerialNumber() . $this->getCheckDigit()
        );
    }
}
