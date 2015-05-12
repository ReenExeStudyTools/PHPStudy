<?php

/**
 * 5 types of tags
 *      Standard:
 *          <?php ?>
 *      Short:
 *          <? ?>
 *      Echo:
 *          <?= $value; ?> or <?= $value ?>
 *      Script:
 *          <script language="php"></script>
 *      ASP:
 *          <% %>
 */


class TagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider fileProvider
     */
    public function testAll($path)
    {
        $a = require __FIXTURES__ . $path;

        $this->assertEquals($a, 'OK');
    }

    public function fileProvider()
    {
        return [
            ['/tag/standard.php'],
            ['/tag/once/standard.php'],
            ['/tag/short.php'],
            /**
             * TODO: fix in travis
             */
//            ['/tag/once/short.php'],
//            ['/tag/script.php'],
//            ['/tag/once/script.php'],
        ];
    }
}