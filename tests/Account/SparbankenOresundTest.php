<?php

namespace byrokrat\banking\Account;

/**
  * @covers \byrokrat\banking\Account\SparbankenOresund
*/
class SparbankenOresundTest extends AccountNumberTestCase
{
    public function getFormatId()
    {
        return 'SparbankenOresund';
    }

    public function getClassName()
    {
        return '\byrokrat\banking\Account\SparbankenOresund';
    }

    public function validProvider()
    {
        return [
            ['9300,1234567897', '9300', '', '123456789', '7'],
            ['9349,1234567897', '9349', '', '123456789', '7'],
        ];
    }
}
