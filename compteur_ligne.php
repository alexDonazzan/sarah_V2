<?php

$folder = __DIR__;

global $lineCount;
global $filesLines;

echo 'Counting Lines<BR />';

scan($folder);

echo " Total : $lineCount lignes<BR />";
echo "==========================<BR />";

$maxFile = maxLines($filesLines);
$maxFileName = array_keys($maxFile)[0];
$maxFileLength = $maxFile[$maxFileName];

$avgLinesPerFile = $lineCount / count($filesLines);

echo "Fichier le plus long : $maxFileName $maxFileLength lignes<BR />";
echo "Lignes/fichier en moyenne : $avgLinesPerFile lignes/fichier";

function scan($folderPath)
{
	global $lineCount, $filesLines;
	$files = scandir($folderPath, SCANDIR_SORT_ASCENDING);

	echo "<strong>$folderPath</strong><br />";

	foreach ($files as $file) {
		if ($file != '.' && $file != '..' && $file != 'Spyc.php' && $file != 'formulaire.js' && $file !='index.php') {

			if (is_dir($folderPath . '/' . $file)) {
				scan($folderPath . '/' . $file);
			} else {
				$lines = 0;
				echo "$folderPath/$file ";
				$fp = fopen($folderPath . '/' . $file, 'r');

				while ($l = fgets($fp)) {
					$thisLine = trim($l);
					if (!preg_match('/^\/\*/', $thisLine) && !preg_match('/^\*/', $thisLine) && !preg_match('/^\/\//',
									$thisLine) && strlen($thisLine) > 3) {
						$lines++;
					}
				}
				$lines++;

				$lineCount += $lines;
				$filesLines[$folderPath . '/' . $file] = $lines;

				echo $lines . ' lignes<br />';

				fclose($fp);
			}
		}
	}
}

function maxLines($array)
{
	$keys = array_keys($array);
	$maxKey = $keys[0];
	$maxValue = $array[$maxKey];

	foreach ($array as $k => $f) {
		if ($f >= $maxValue) {
			$maxKey = $k;
			$maxValue = $f;
		}
	}

	return [ $maxKey => $maxValue];
}
