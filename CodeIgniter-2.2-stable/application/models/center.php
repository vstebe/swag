<?php

	class center {

		private $_id;
		private $_name;
		private $_latitude;
		private $_longitude;
		private $_type;

		private static $_db;

		public  function __construct($id, $n, $x, $y, $t){

			$this->set_id($id);
			$this->set_name($n);
			$this->set_latitude($x);
			$this->set_longitude($x);
			$this->set_type($t);

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
			if(is_string($type) && ($type == "V" || $type == "D")){
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




		public create(){

			$q = self::$_db->prepare('INSERT INTO centre SET nom=:n, coordonneX=:x, coordonneY=:y, type=:t');
			$q->bindValue(':n', $this->get_name(), PDO::PARAM_STR);
			$q->bindValue(':x', $this->get_longitude(), PDO::PARAM_INT);
			$q->bindValue(':y', $this->get_latitude(), PDO::PARAM_INT);
			$q->bindValue(':t', $this->get_type(), PDO::PARAM_STR);
			$q->execute();

			$this->set_id(self::$_db->lastInsertId());
		}

		public static read(){
		$centres = array();
		$q = self::$_db->query('SELECT * FROM centre');
			while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
				$centres[] = new center($data["id"], $data["nom"], $data["coordonneX"], $data["coordonneY"], $data["type"]); 
			}
			return $centres;
		} 

		public edit(){

		}

		public delete(){

		}

	}