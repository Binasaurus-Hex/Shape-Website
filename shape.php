<?php

	include 'Sphere.php';
	include 'Cube.php';
	include 'Icosahedron.php';
	include 'Tetrahedron.php';
	include 'Octahedron.php';
	include 'Dodecahedron.php';

	function number(){
		if(isset($_GET['number'])){
			return $_GET['number'];
		}
		else{
			return "";
		}
	}

	function shape(){
		if(isset($_GET['shape'])){
			return $_GET['shape'];
		}
		else{
			return "";
		}
	}

	function calc(){
		if(isset($_GET['calc'])){
			return $_GET['calc'];
		}
		else{
			return "";
		}
	}

	function getUnits($base,$calc){
		$dimentions = array('volume' => '3', 'surfaceArea' => '2');
		$dimention = $dimentions[$calc];
		return $base."<sup>".$dimention."</sup>";

	}

	function getMeasure(){
		if(!$_GET['shape']==''){
			return $_GET['shape']::$measure;
		}
		else{
			return "radius / side length";
		}
	}

	function shapeSelected($shape){
		if(isset($_GET['shape'])){
			if($_GET['shape'] == $shape){
			return "selected";
			}
		}
		
	}

	function calcSelected($calc){
		if(isset($_GET['calc'])){
			if($_GET['calc'] == $calc){
			return "selected";
			}
		}
		
	}

	function calcResult($shape,$calc){
		if($calc == "volume"){
			return $shape->volume();
		}
		if($calc == "surfaceArea"){
			return $shape->surfaceArea();
		}

	}

	if(empty($_GET)){
		echo "<form id='jsform' action='".basename($_SERVER['PHP_SELF'])."' method = 'get'>
				<input type = 'hidden' name = 'shape' value = 'sphere'>
				<input type = 'hidden' name = 'calc' value = 'volume'>
				<input type = 'hidden' name = 'number' value = '1'>
			</form>

			<script type='text/javascript'>
				document.getElementById('jsform').submit();
			</script>";
	}

	echo "<form action = '".basename($_SERVER['PHP_SELF'])."' method = 'get' id = 'shape'>
	What shape would you like?
	<select name='shape' onchange = 'this.form.submit()'>
 		<option value='tetrahedron' ".shapeSelected('tetrahedron').">Tetrahedron</option>
		<option value='cube' ".shapeSelected('cube').">Cube</option>
		<option value='octahedron' ".shapeSelected('octahedron').">Octahedron</option>
		<option value='icosahedron' ".shapeSelected('icosahedron').">Icosahedron</option>
		<option value='dodecahedron' ".shapeSelected('dodecahedron').">Dodecahedron</option>
		<option value='sphere' ".shapeSelected('sphere').">Sphere</option>
	</select><br>
	<input type = 'hidden' name = 'calc' value = '".calc()."'>
	<input type = 'hidden' name = 'number' value = '".number()."'>
	</form>";	
	
	
	if(isset($_GET['shape'])){
		echo "<form action = '".basename($_SERVER['PHP_SELF'])."' method = 'get'>
		Solve for :
	    <select name='calc' onchange = 'this.form.submit()'>
          	<option value='volume' ".calcSelected('volume').">Volume</option>
			<option value='surfaceArea' ".calcSelected('surfaceArea').">Surface Area</option>
		</select><br>
		<p>".getMeasure()." : 
		<input type = 'text' name = 'number' size = '5' value = '".number()."' onchange = 'this.form.submit()'>  Meters
		<input type = 'hidden' name = 'shape' value = '".shape()."'>
		</p>
		</form>";
	}
	
	
	if(isset($_GET['shape'])&&isset($_GET['number'])&&isset($_GET['calc'])){
		$shape = $_GET['shape'];
		$number = $_GET['number'];
		$calc = $_GET['calc'];
		if(ctype_digit($number)){
			if($shape == 'sphere'){
				$shape = new Sphere($number);
			}
			if($shape == 'cube'){
				$shape = new Cube($number);
			}
			if($shape == 'icosahedron'){
				$shape = new Icosahedron($number);
			}
			if($shape == 'tetrahedron'){
				$shape = new Tetrahedron($number);
			}
			if($shape == 'octahedron'){
				$shape = new Octahedron($number);
			}
			if($shape == 'dodecahedron'){
				$shape = new Dodecahedron($number);
			}
			echo "<div class = 'shape'>";
			echo "<img src = '".$shape->image."'>";
			echo "<br>";
			echo "Shape = ".$shape->id;
			echo "<br>";
			echo $calc." = ".calcResult($shape,$calc)."".getUnits("m",$calc);
			echo "</div>";	
		}

	}

	

	

?>