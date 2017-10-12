<?


Class Word {


    public $declension;     //  = array("комментарий", "комментария", "комментариев"); 
                            // Склонение слова

    public $numberRel;      // = 13
                            // относительно к числу

    /*
    * Метод возвращает тип склонения слова в зависимости от числа
    * 0 - единственное число, - лист
    * 1 - множественное дистрибьютивное, листьев
    * 2 - множественное собирательное, листья
    */
    function declensionType($number) 
    {

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

        return $declension;

    }

    /*
    *   Метод возвращает слово в склонении, в зависимости от числа
    */
    function declensionByNumber() 
    {

        return 

            $this->numberRel . " " .

            $this->declension[ $this->declensionType( $this->numberRel ) ];
    }

}




$word = new Word;

$word->declension = array("комментарий", "комментария", "комментариев");

$word->numberRel = 15;

echo  $word->declensionByNumber();



/* отладка 

for ($number=0; $number < 500; $number++ ) {
    echo "<hr>";
    $word->numberRel = $number;
    echo  $word->declensionByNumber();
}

*/




?>
