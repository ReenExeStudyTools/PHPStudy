<?php

class AlternativeTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        foreach ([] as $key => $value):
        endforeach;

        if (true):
        endif;

        while (false):
        endwhile;

        for(;false;):
        endfor;

        switch (true):
        endswitch;

        switch (true):
            case true:
        endswitch;
    }
}