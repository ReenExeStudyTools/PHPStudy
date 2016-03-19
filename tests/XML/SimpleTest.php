<?php

class SimpleTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $data = <<<XML
<?xml version="1.0"?>
<document>
    <text>
        Reen
    </text>
</document>

XML;
        $xml = new SimpleXMLElement($data);

        $this->assertSame($data, $xml->asXML());
    }
}
