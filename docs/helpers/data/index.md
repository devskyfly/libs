** Convertors\helpers\data

Эта библиотека помогает с руссификацией даты.

```php
//Получить название месяца по его номеру в именительном падеже
$month=Month::getMonthNameByNmb(1);

//Получить название месяца по его номеру в родительном падеже
$month=Month::getMonthNameByNmb(1,Month::ROD_PAD);
```