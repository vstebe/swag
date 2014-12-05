<?php

	class Diagnostic_Model extends CI_Model {

		private $_id;
		private $_name;

		private static $_db;

		 public  function __construct($id, $n){
			parent::__construct();
			$this->set_id($id);
			$this->set_name($n);
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


		public function create(){

			$q = self::$_db->prepare('INSERT INTO diagnostic SET nom=:n');
			$q->bindValue(':n', $this->get_name(), PDO::PARAM_STR);
			$q->execute();

			$this->set_id(self::$_db->lastInsertId());
		}

		public static function read(){
			$diagnostics = array();
			$q = self::$_db->query('SELECT * FROM diagnostic');
			while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
				$diagnostics[] = new Diagnostic_Model($data["id"], $data["nom"]);
				//echo $data["nom"];

			}
			echo 'test'.$diagnostics[0];
			/*print_r($centres);*/
			return $diagnostics;
		} 

		public function edit(){

		}

		public function delete(){

		}

	}

?>