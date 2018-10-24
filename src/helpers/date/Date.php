<?php
namespace devskyfly\libs\helpers\date;

class Date extends Month
{
    /**
     * Return parsed array of date with string month values
     *
     * @param string $date
     * @param self::IM_PAD|self::ROD_PAD  $pad
     * @throws \RuntimeException
     * @return [] - ["year"=>"", "day"=>"","month"=>"", "str_day"=>"", "str_month"=>""]
     */
    public static function parse($date,$pad=self::IM_PAD)
    {
        $result=date_parse($date);
        
        if($result===false){
            throw new \RuntimeException("Can't parse date parem.");
        }
        
        $day=(int)$result['day'];
        if($day<10){
            $day="0".$day;
        }else{
            $day="".$day;
        }
        
        return [
            'year'=>$result['year'],
            'day'=>(int)$result['day'],
            'zero_day'=>$day,
            'month'=>$result['month'],
            'str_month'=>self::getMonthName($date,$pad)
        ];
    }
}