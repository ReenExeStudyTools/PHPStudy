<?php

class HashTest extends \PHPUnit_Framework_TestCase
{
    public function testCrc32()
    {
        $this->assertSame(2212294583, crc32(1));
        $this->assertSame(2212294583, crc32('1'));

        $this->assertSame(811004170, crc32(str_repeat('some', 50)));
    }

    public function testMd5()
    {
        $this->assertSame('2063c1608d6e0baf80249c42e2be5804', md5('value'));
        $this->assertSame('2063c1608d6e0baf80249c42e2be5804', md5('value'));

        $this->assertSame('795f3202b17cb6bc3d4b771d8c6c9eaf', md5('other'));
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Notice
     * @expectedExceptionMessage No salt parameter was specified. You must use a randomly generated salt and a strong hash function to produce a secure hash.
     */
    public function testCryptSaltAbsent()
    {
        crypt('some source string');
    }

    public function testCrypt()
    {
        $this->assertSame('101nIroBCuF1E', crypt('some source string', 10));
        $this->assertSame('12oZhTljyd2dI', crypt('some source string', 1234567));
    }
}
