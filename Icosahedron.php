<?php
	class Icosahedron{
		private $side;
		public $id = 'Icosahedron';
		public static $measure = 'Side Length';
		public $image = 'Icosahedron.png';

		public function __construct($side){
			$this->side = $side;
		}

		public function volume(){
			$volume = (5*(3+sqrt(5))*$this->side)/12;
			$volume = round($volume);
			return $volume;
		}

		public function surfaceArea(){
			$surfaceArea = 5*sqrt(3)*pow($this->side, 2);
			$surfaceArea = round($surfaceArea);
			return $surfaceArea;
		}

	}

?>