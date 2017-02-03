<?php
namespace PMVC\PlugIn\dynamic_ads;

use PHPUnit_Framework_TestCase;

class Dynamic_adsTest extends PHPUnit_Framework_TestCase
{
    private $_plug = 'dynamic_ads';
    function testPlugin()
    {
        ob_start();
        print_r(\PMVC\plug($this->_plug));
        $output = ob_get_contents();
        ob_end_clean();
        $this->assertContains($this->_plug,$output);
    }

}
