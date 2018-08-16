<?php
	class Dodecahedron{
		private $side;
		public $id = 'Dodecahedron';
		public static $measure = 'Side Length';
		public $image = 'Dodecahedron.png';

		public function __construct($side){
			$this->side = $side;
		}

		public function volume(){
			$volume = (15+(7*sqrt(5))*$this->side)/4;
			$volume = round($volume);
			return $volume;
		}

		public function surfaceArea(){
			$surfaceArea = 3*$this->side*sqrt(25+(10*sqrt(5)));
			$surfaceArea = round($surfaceArea);
			return $surfaceArea;
		}

	}

?>