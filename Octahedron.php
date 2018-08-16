<?php
	class Octahedron{
		private $side;
		public $id = 'Octahedron';
		public static $measure = 'Side Length';
		public $image = 'Octahedron.png';

		public function __construct($side){
			$this->side = $side;
		}

		public function volume(){
			$volume = (sqrt(2)*$this->side)/3;
			$volume = round($volume);
			return $volume;
		}

		public function surfaceArea(){
			$surfaceArea = 2*sqrt(3)*pow($this->side, 2);
			$surfaceArea = round($surfaceArea);
			return $surfaceArea;
		}

	}

?>