<?php

	class Maladie_Model extends CI_Model{

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

			$m = new Maladie_Model();

			$m->set_name($n);

			$q = self::$_db->prepare('INSERT INTO maladie SET nom=:n');
			$q->bindValue(':n', $c->get_name(), PDO::PARAM_STR);
			$q->execute();

			$m->set_id(self::$_db->lastInsertId());

			return $m;
		}

		public static function read(){
			$maladies = array();
			$q = self::$_db->query('SELECT m.id AS maladieID, m.nom AS maladieNOM, s.id AS symptomeID, s.nom AS symptomeNOM FROM maladie m, maladiesymptome ms, symptome s where m.id = ms.fk_maladie and s.id = ms.fk_symptome');

			while($data = $q->fetch(PDO::FETCH_ASSOC)) {
				$maladies[] = $data;
			}
			return $maladies;
		} 

		public function edit(){

		}

		public function delete(){

		}

	}

?>