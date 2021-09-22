<?php
error_reporting(-1);
header('Content-Type: text/html; charset=windows-1251');
function revertCharacters($s) {
	if (empty($s)) // если ничего не ввели
		return;

	$words = explode(" ", $s); // разбиваем на массив слов

	for ($i = 0; $i < Count($words); $i ++) {
		$copy = $words[$i]; // копия для работы
		for ($j = 0; $j < strlen($copy); $j ++) { // найдем вхождение знака препинания
			if ($copy[$j] == '.' or $copy[$j] == '?' or $copy[$j] == '!' or $copy[$j] == ',' or $copy[$j] == '-')
				break;
		}
		$copy = substr($copy, 0, $j); // отрежем от копии знаки препинания
		for ($j = 0; $j < strlen($copy); $j ++) {
			$pos = (strlen($copy) + $j * (-1)) - 1; // отнимаем от длины строки номер символа
			if (preg_match("/^[A-ZА-ЯЁ]/", $words[$i]{$j})) { // если заглавная буква
				$words[$i]{$j} = mb_strtoupper($copy{$pos}, 'cp1251');
			} else {
				$words[$i]{$j} = mb_strtolower($copy{$pos}, 'cp1251');
			}
		}
	}

return implode(" ", $words);
}

$result = revertCharacters("Привет! Давно не виделись.");
echo $result;