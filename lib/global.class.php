<?php
class glb {
	public static function getDay($str) {
			$day = '';

			$day = substr($str,0,1) == '1' ? $day.' Senin,' : $day;
			$day = substr($str,1,1) == '1' ? $day.' Selasa,' : $day;
			$day = substr($str,2,1) == '1' ? $day.' Rabu,' : $day;
			$day = substr($str,3,1) == '1' ? $day.' Kamis, ' : $day;
			$day = substr($str,4,1) == '1' ? $day.' Jumat, ' : $day;
			$day = substr($str,5,1) == '1' ? $day.' Sabtu, ' : $day;
			$day = substr($str,6,1) == '1' ? $day.' Minggu, ' : $day;

			return $day;   
	}
}
?>
