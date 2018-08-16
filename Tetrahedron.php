<?php
	class Tetrahedron{
		private $side;
		public $id = 'Tetrahedron';
		public static $measure = 'Side Length';
		public $image = 'Tetrahedron.png';

		public function __construct($side){
			$this->side = $side;
		}

		public function volume(){
			$volume = pow($this->side, 3)/(6*sqrt(2));
			$volume = round($volume);
			return $volume;
		}

		public function surfaceArea(){
			$surfaceArea = (sqrt(3)*$this->side)/4;
			$surfaceArea = round($surfaceArea);
			return $surfaceArea;
		}

	}

?>