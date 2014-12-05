<?php

	class Center_Model extends CI_Model{

		private $_id;
		private $_name;
		private $_latitude;
		private $_longitude;
		private $_type;

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


		public function set_latitude($latitude){
			$this->_latitude = (int) $latitude;
			
		}

		public function set_longitude($longitude){
			$this->_longitude = $longitude;
			
		}

		public function set_type($type){
			if(is_string($type) && ($type == "VACCINATION" || $type == "DEPISTAGE")){
				$this->_type = $type;
			}
		}

		public function get_id(){
			return $this->_id;
		}

		public function get_name(){
			return $this->_name;
		}

		public function get_longitude(){
			return $this->_longitude;
		}

		public function get_latitude(){
			return $this->_latitude;
		}


		public function get_type(){
			return $this->_type;
		}




		public static function create($n, $x, $y, $t){

			$c = new Center_Model();

			$c->set_name($n);
			$c->set_latitude($x);
			$c->set_longitude($y);
			$c->set_type($t);

			$q = self::$_db->prepare('INSERT INTO centre SET nom=:n, coordonneX=:x, coordonneY=:y, type=:t');
			$q->bindValue(':n', $c->get_name(), PDO::PARAM_STR);
			$q->bindValue(':x', $c->get_longitude(), PDO::PARAM_INT);
			$q->bindValue(':y', $c->get_latitude(), PDO::PARAM_INT);
			$q->bindValue(':t', $c->get_type(), PDO::PARAM_STR);
			$q->execute();

			$c->set_id(self::$_db->lastInsertId());

			return $c;
		}

		public static function read(){
			$centres = array();
			$q = self::$_db->query('SELECT * FROM centre');
			while($data = $q->fetch(PDO::FETCH_ASSOC)) {
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