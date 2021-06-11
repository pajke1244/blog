<?php 
// posebna klasa za pravljenje kverija

class QueryBuilder {

	protected $db;

	function __construct($db){
		$this->db=$db;
	}
	//prosledjujemo kao parametar bilo koju tabelu iz baze
	public function selectAll($table){
		$sql= "SELECT * FROM {$table}";

		$query = $this->db->prepare($sql);

		$query->execute();
		//pretvaramo svaki todo u objekat
		return $query->fetchAll(PDO::FETCH_OBJ);
		
	}
}

?>