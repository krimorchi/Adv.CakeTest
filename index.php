<?php
  /**
   * Инициализация переменных
   */
  $string = $stringNew = "Привет! Давно не виделись.";
  
  /**
   * Разбиваю строку в массив при помощи регулярки(regex удобны, т.к. они лучше работают с кириллицей). В случае необходимости максимального ускорения 
   * кода лучше использовать иные средства, т.к. они нагружают систему
   */
  preg_match_all('/[A-Za-zА-Яа-я]+/u', $string, $matches);
  
  /**
   * Перебираю массив совпадений и сразу его обрабатываю 
   */
  foreach($matches[0] as $word){
      /**
       * Перевожу слово в массив и привожу к нижнему регистру, а также реверсирую его
       */
      $dataWordNew = array_reverse(mb_str_split(mb_strtolower($word)));
      
      /**
       * Получаю массив букв исходного слова для установки регистра реверсированного слова
       */
      $dataWord = mb_str_split($word);
      
      /**
       * Прохожусь по буквам и устанавливаю верхний регистр там, где нужно
       */
      foreach($dataWord as $keyLetter => $letter){
          if(preg_match('/[A-ZА-Я]+/u', $letter)){
              $dataWordNew[$keyLetter] = mb_strtoupper($dataWordNew[$keyLetter]);
          }
      }
      
      /**
       * Заменяю текущее слово в строке на риверсированное
       */
      $stringNew = str_replace(
      $word, 
      implode('', $dataWordNew), 
      $stringNew
      );
  }
  
  echo "Ответ: $stringNew \n\r";// 
  echo "Требуемый ответ: Тевирп! Онвад ен ьсиледив";

?>
