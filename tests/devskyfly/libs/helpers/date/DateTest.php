<?php namespace devskyfly\libs\helpers\date;



class DateTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testGetDayAndMonthName()
    {
        $result=Date::parse("2018-10-09 21:10:05");
        codecept_debug($result);
        $this->assertTrue($result['year']==2018);
        $this->assertTrue($result['month']==10);
        $this->assertTrue($result['day']==9);
        $this->assertTrue($result['zero_day']=="09");
        $this->assertTrue($result['str_month']=="Октябрь");
        $this->assertTrue($result['hour']=="21");
        $this->assertTrue($result['minute']=="10");
        $this->assertTrue($result['second']=="05");
        
    }
}