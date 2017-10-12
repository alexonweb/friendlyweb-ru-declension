<?


/*
* Возвращает тип склонения слова
* 0 - единственное число, 1 - множественное дистрибьютивное, 2 - множественное собирательное
*/
function declensionNumber($number) 
{

        $len = strlen($number); // получаем длину строки

        $lastnum =  ( $len == 1 )  ? $number : substr($number, --$len, $len);  // получаем последнюю цифру

        if ($number > 10 and $number <=20) { // тинейджи - множественное собирательное

            $declension = 2; // 13 программистов

        } elseif ($number == 1 or $lastnum == 1) { // единственное число

            $declension = 0; // 1 программист

        } elseif ( $lastnum > 1 and $lastnum < 5 ) { // множественное дистрибьютивное

            $declension = 1; // 3 программиста 
            
        } else { // множетсвенное собирательное 

            $declension = 2; // 10 программистов

        }

        return $declension;

}


/* -------------------------------------------------------------------- */
/* пример использования */

$i18n_comments = array( "комментарий", "комментария", "комментариев");

$number = 13;

echo $number . " " . $i18n_comments[declensionNumber($number)];


/* отладка 

for ($number=0; $number < 500; $number++ ) {
    echo "<hr>";
    echo $number . " " . $i18n_comments[declensionNumber($number)];
    
}

*/




?>
