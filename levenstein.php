<?php
/*
code par @baptistereb (sur github)
fonction permettant de calculer la distance de levenstein,
basé sur l'algorithme de levenstein

code by @baptistereb (on github)
function allowing to calculate the levenstein range,
based on levenstein algorithm
*/

function levenstein($mot1, $mot2) {

	$d = [];
	$i = 0;
	$j = 0;

	for($i = 0; $i <= strlen($mot1); $i++) {
	    $d[$i] = [$i];
	}
	
	for($j = 0; $j <= strlen($mot2); $j++) {
	    $d[0][$j] = $j;
	}

	for($i = 1; $i <= strlen($mot1); $i++) {
		for($j = 1; $j <= strlen($mot2); $j++) {
			if($mot1[$i-1] === $mot2[$j-1]) {
				$cost = 0;
			} else {
				$cost = 1;
			}
			$d[$i][$j] = min($d[$i-1][$j] + 1, $d[$i][$j-1] + 1, $d[$i-1][$j-1] + $cost);
		}
	}

	return $d[strlen($mot1)][strlen($mot2)];
}

?>