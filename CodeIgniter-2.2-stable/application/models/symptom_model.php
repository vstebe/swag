<?php

class Symptom_Model extends CI_Model{

	private $_id;
	private $_name;

	private static $_db;

	public  function __construct(){
	 	parent::__construct();

	}

	public static function set_db(PDO $db) {
		self::$_db = $db;
	}

	public function set_id($id){
		$this->_id = (int) $id;	
	}

	public function set_name($name){
		if(is_string($name)){
			$this->_name = $name;
		}
	}

	public function get_id(){
		return $this->_id;
	}

	public function get_name(){
		return $this->_name;
	}

	public static function create($n){

		$c = new Symptom_Model();

		$c->set_name($n);

		$q = self::$_db->prepare('INSERT INTO symptome SET nom=:n');
		$q->bindValue(':n', $c->get_name(), PDO::PARAM_STR);
		$q->execute();

		$c->set_id(self::$_db->lastInsertId());

		return $c;
	}

	public static function read(){
		$centres = array();
		$q = self::$_db->query('SELECT * FROM symptome');
		while($data = $q->fetch(PDO::FETCH_ASSOC)) {
			echo(json_encode($data));
			echo "</br>";
			$centres[] = $data;
		}
		return $centres;
	} 

	public function edit(){

	}

	public function delete(){

	}

}

?>