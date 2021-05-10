<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		table {
			border-bottom: 1px solid black;
		}
		table:first-child {
			border-top: 1px solid black;
		}
		td:first-child {
			min-width: 100px;
		}
		td:last-child {
			min-width: 400px;
		}
	</style>
	<title>php-oop-1</title>
</head>
<body>

<?php
	ini_set('display_errors',1);

	/**
	 * nome repo: php-oop-1
	 * Creare una classe Movie
	 * Dichiarare le proprietà
	 * Dichiarare il costruttore
	 * Dichiarare almeno un metodo
	 * 
	 * Fare degli esempi di utilizzo della classe istanziando almeno 2 oggetti della stessa e stampando a schermo il valore delle proprietà
	 * Bonus: la stampa delle proprietà della classe potrebbe avvenire in una struttura HTML :wink:
	 * 
	 */

	class Movie {
		public $title;
		public $year;
		public $cast = [];
		public $crew = [];
		function __construct($_title,$_year,$_crew) {
			$this->title = $_title;
			$this->year = $_year;
			$this->crew = $_crew;
		}
		public function getMovieCastLength() {
			return count($this->cast);
		}
		public function getMovieCrewLength() {
			return count($this->crew);
		}
		private function getCurrentYear () {
			return date('Y');
		}
		public function getMovieAge() {
			return ($this->getCurrentYear() - $this->year);
		}
	}

	$movies = [
		new Movie('Star Wars', 				1977, ['director'=>'George Lucas']),
		new Movie('Blade Runner', 			1982, ['director'=>'Ridley Scott']),
		new Movie('Million Dollar Baby', 	2004, ['director'=>'Clint Eastwood'])
	];

	// var_dump($movies);

	$movies[0]->cast = ['Mark Hamill','Harrison Ford', 'Carrie Fisher'];
	$movies[1]->cast = ['Harrison Ford', 'Rutger Hauer'];
	$movies[2]->cast = ['Hilary Swank', 'Clint Eastwood', 'Morgan Freeman'];

?>	

<h3>Movie List</h3>

<div class="movie_list">
	<?php foreach ($movies as $movie) { ?>
		<table>
			<tr><td>title</td><td><?php echo $movie->title; ?></td></tr>
			<tr><td>year</td><td><?php echo $movie->year; ?></td></tr>
			<tr><td>movie age</td><td><?php echo $movie->getMovieAge(); ?></td></tr>
			<tr>
				<td>cast</td>
				<td>
					<?php
						foreach ($movie->cast as $key => $person) {
							echo $person.(($key==count($movie->cast)-1)?'':', ');
						}
					?>
				</td>
			</tr>
			<tr><td>cast length</td><td><?php echo $movie->getMovieCastLength(); ?></td></tr>
			<tr>
				<td>crew</td>
				<td>
					<?php 
						$lastCrew = end($movie->crew);
						foreach ($movie->crew as $key => $person) {
							echo $person.' ('.$key.')'.($person==$lastCrew?'':', ');
						}			
					?>
				</td>
			</tr>
			<tr><td>crew length</td><td><?php echo $movie->getMovieCrewLength(); ?></td></tr>
		</table>
	<?php } ?>
</div>


</body>
</html>


