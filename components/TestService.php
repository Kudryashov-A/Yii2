<?php
namespace app\components;

class TestService
{
    public $testProp = 'prop content';

    public function getProp()
    {
        return $this->testProp;
    }
}