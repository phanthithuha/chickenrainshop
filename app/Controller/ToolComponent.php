
<?php 
	class ToolComponent extends Component{
		public function sum($cart){
		$total = 0;
		foreach ($cart as $book) {
			$total += $book['quantity']*$book['sale_price'];
		}
		return $total;
	}
	}
 ?>