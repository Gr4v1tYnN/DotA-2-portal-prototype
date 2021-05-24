<?php
/**
 * @author   Aivaras Medelinskas <aivmedelinskas@gmail.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');

function shortenString($string, $maxLenght){
	$string = strip_tags($string);
	if(strlen($string) >= $maxLenght){
		$string = substr($string, 0, $maxLenght);
		$string = rtrim($string, "!,.-");

		/*Surandame tarpa, ir nukerpame iki zodzio pabaigos, kad nebutu atvejo, kad nukirpome zodzio viduryje*/
		$cutTo = strrpos($string, ' ');
		if ($cutTo > 0) {
			$string = substr($string, 0, $cutTo);
		}

		$string = $string.'...';
	}

	return $string;
}