<?php namespace devskyfly\libs\helpers\date;



class MonthTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testGetMonthNameByNmb()
    {
        $month=Month::getMonthNameByNmb(1);
        $this->assertTrue($month=="Январь");
        $month=Month::getMonthNameByNmb(8);
        $this->assertTrue($month=="Август");
        $this->expectException(\InvalidArgumentException::class);
        $month=Month::getMonthNameByNmb("8");
        
    }
}