<?php
namespace devskyfly\libs\helpers\date;

use devskyfly\php56\types\Nmbr;

class Month
{
    const IM_PAD="im_pad";
    const ROD_PAD="rod_pad";
    
    protected static $month_list = [
        self::IM_PAD => [
            1 => "Январь",
            2 => "Февраль",
            3 => "Март",
            4 => "Апрель",
            5 => "Май",
            6 => "Июнь",
            7 => "Июль",
            8 => "Август",
            9 => "Сентябрь",
            10 => "Октябрь",
            11 => "Ноябрь",
            12 => "Декабрь"
        ],
        self::ROD_PAD => [
            1 => "Января",
            2 => "Февраля",
            3 => "Марта",
            4 => "Апреля",
            5 => "Мая",
            6 => "Июня",
            7 => "Июля",
            8 => "Августа",
            9 => "Сентября",
            10 => "Октября",
            11 => "Ноября",
            12 => "Декабря"
        ]
    ];
    
    /**
     * Return month name by its number from 1 to 12.
     * 
     * @param self::IM_PAD|self::ROD_PAD $pad
     * @return string
     */
    public static function getMonthNameByNmb($nmb,$pad=self::IM_PAD)
    {
        if(!Nmbr::isInteger($nmb)){
            throw new \InvalidArgumentException('Param $nmb is not integer type.');
        }
        $list=self::$month_list[$pad];
        
        if(!array_key_exists($nmb, $list)){
            throw new \RangeException("Key is't exist.");
        }
        return $list[$nmb];
    }
    
    /**
     * Return month name tring to parse passed date.
     * 
     * @param string $date
     * @param self::IM_PAD|self::ROD_PAD $pad
     * @throws \RuntimeException
     * @return string
     */
    public static function getMonthName($date,$pad=self::IM_PAD)
    {
        $result=date_parse($date);
        if($result===false){
            throw new \RuntimeException("Can't parse date parem.");
        }
        $month_nmb=Nmbr::toIntegerStrict($result['month']);
        return self::getMonthNameByNmb($month_nmb,$pad);
    }
}