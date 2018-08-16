<?php
	class Cube{
		private $side;
		public $id = 'Cube';
		public static $measure = 'Side Length';
		public $image = 'Cube.png';

		public function __construct($side){
			$this->side = $side;
		}

		public function volume(){
			$volume = pow($this->side,3);
			return $volume;
		}

		public function surfaceArea(){
			$surfaceArea = 6*pow($this->side,2);
			return $surfaceArea;
		}
	}


?>