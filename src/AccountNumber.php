<?php
/**
 * This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://www.wtfpl.net/ for more details.
 */

namespace ledgr\banking;

/**
 * The basic account interface
 *
 * @author Hannes Forsgård <hannes.forsgard@fripost.org>
 */
interface AccountNumber extends Data\BankNames
{
    /**
     * Get account as string
     *
     * @return string
     */
    public function __tostring();

    /**
     * Get account as string
     *
     * @return string
     */
    public function getNumber();

    /**
     * Get clearing number, 4 digits
     *
     * @return string
     */
    public function getClearingNumber();

    /**
     * Get the check digit of the clearing number
     *
     * @return string Empty if not applicable
     */
    public function getClearingCheckDigit();

    /**
     * Get account serial number
     *
     * @return string
     */
    public function getSerialNumber();

    /**
     * Get account check digit
     *
     * @return string
     */
    public function getCheckDigit();

    /**
     * Get account as a 16 digit number
     *
     * Clearing number (4 digits) + x number of ceros + serial number
     *
     * @return string
     */
    public function get16();

    /**
     * Get name of Bank this number belongs to
     *
     * @return string One of the Data\BankNames constants
     */
    public function getBankName();
}
