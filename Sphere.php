<?php
	class Sphere{
		private $radius;
		public $id = 'Sphere';
		public static $measure = 'Radius';
		public $image = 'Sphere.png';

		public function __construct($radius){
			$this->radius = $radius;
		}

		public function volume(){
			$volume = (4/3)*M_PI*pow($this->radius,2);
			$volume = round($volume);
			return $volume;
		}

		public function surfaceArea(){
			$surfaceArea = 4*M_PI*pow($this->radius, 2);
			$surfaceArea = round($surfaceArea);
			return $surfaceArea;
		}

	}

?>