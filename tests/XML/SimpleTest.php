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

        $fromFunction = simplexml_load_string($data);

        $this->assertInstanceOf(SimpleXMLElement::class, $fromFunction);

        $this->assertSame($data, $fromFunction->asXML());
    }
}
