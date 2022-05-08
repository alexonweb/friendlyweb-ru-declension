<?php

Class Word {

    /*
    * Метод возвращает тип склонения слова в зависимости от числа
    * 0 - единственное число, - лист
    * 1 - множественное дистрибьютивное, листьев
    * 2 - множественное собирательное, листья
    */
    static function Declension ($number, $words)
    {
        $words = json_decode($words);

        $number = intval($number); // Возвращает целое значение переменной

        $len = strlen($number); // получаем длину строки

        $lastnum =  ( strlen($number) == 1 )  ? $number : substr($number, --$len, $len);  // получаем последнюю цифру

        if ($number > 10 and $number <=20) { // тинейджи - множественное собирательное

            $declension = 2; // 13 программистов

        } elseif ($number == 1 or $lastnum == 1) { // единственное число

            $declension = 0; // 1 программист

        } elseif ( $lastnum > 1 and $lastnum < 5 ) { // множественное дистрибьютивное

            $declension = 1; // 3 программиста 
            
        } else { // множетсвенное собирательное 

            $declension = 2; // 10 программистов

        }

        return $number . " " . $words[ $declension ];

    }

}

echo Word::Declension(12, '["комментарий", "комментария", "комментариев"]' );

?>
