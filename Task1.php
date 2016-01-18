<?php
$title = 'Task1';
$result = '';
$RESULT = "Result: ";
$validRequest = true;

require_once "heading.php";
require_once 'functions.php';

$operations = [
	"0" => "+",
	"1" => "-",
	"2" => "*",
	"3" => "/"
];

$x = (int)getValue($_POST, 'x');
$y = (int)getValue($_POST, 'y');
$op = getValue($_POST, 'operation');

if($op != null && $x != null && $y != null){
	$op = $operations[$op];
} else{
	$validRequest = false;
}

if($validRequest){
	
	switch($op){
		case '+':
			$result = $x + $y;
			break;
		case '-':
			$result = $x - $y;
			break;
		case '*':
			$result = $x * $y;
			break;
		case '/':
			$result = $x / $y;
			break;	
	}
}
?>
   <form method="POST">
		<div>
			<label for='x'>X</label>
			<input type='number' id=x name=x />
		</div>
		<div>
			<label for='operation'>Operation</label>
			<select name=operation id=operation>
				<?=
					options([
						"0" => "+",
						"1" => "-",
						"2" => "*",
						"3" => "/",
					], "+");
				?>
			</select>
		</div>
		<div>
			<label for='y'>Y</label>
			<input type='number' id=y name=y />
		</div>
		<div>
			<button type=submit> Calculate </button>
		</div>
		<div>
			<?php 
			if($result):
			//echo $RESULT, $result; 
			endif;
			?>
		</div>
   </form>
<?php 
	require_once 'footer.php';
?>