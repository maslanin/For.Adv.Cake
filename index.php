<?php
error_reporting(-1);
header('Content-Type: text/html; charset=windows-1251');
function revertCharacters($s) {
	if (empty($s)) // ���� ������ �� �����
		return;

	$words = explode(" ", $s); // ��������� �� ������ ����

	for ($i = 0; $i < Count($words); $i ++) {
		$copy = $words[$i]; // ����� ��� ������
		for ($j = 0; $j < strlen($copy); $j ++) { // ������ ��������� ����� ����������
			if ($copy[$j] == '.' or $copy[$j] == '?' or $copy[$j] == '!' or $copy[$j] == ',' or $copy[$j] == '-')
				break;
		}
		$copy = substr($copy, 0, $j); // ������� �� ����� ����� ����������
		for ($j = 0; $j < strlen($copy); $j ++) {
			$pos = (strlen($copy) + $j * (-1)) - 1; // �������� �� ����� ������ ����� �������
			if (preg_match("/^[A-Z�-ߨ]/", $words[$i]{$j})) { // ���� ��������� �����
				$words[$i]{$j} = mb_strtoupper($copy{$pos}, 'cp1251');
			} else {
				$words[$i]{$j} = mb_strtolower($copy{$pos}, 'cp1251');
			}
		}
	}

return implode(" ", $words);
}

$result = revertCharacters("������! ����� �� ��������.");
echo $result;