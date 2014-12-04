<?php

	class Center_Model extends CI_Model {

		private $_id;
		private $_name;
		private $_latitude;
		private $_longitude;
		private $_type;

		private static $_db;

		 public  function __construc($id, $n, $x, $y, $t){
			parent::__construct();
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




		public function create(){

			$q = self::$_db->prepare('INSERT INTO centre SET nom=:n, coordonneX=:x, coordonneY=:y, type=:t');
			$q->bindValue(':n', $this->get_name(), PDO::PARAM_STR);
			$q->bindValue(':x', $this->get_longitude(), PDO::PARAM_INT);
			$q->bindValue(':y', $this->get_latitude(), PDO::PARAM_INT);
			$q->bindValue(':t', $this->get_type(), PDO::PARAM_STR);
			$q->execute();

			$this->set_id(self::$_db->lastInsertId());
		}

		public static function read(){
			$centres = array();
			$q = self::$_db->query('SELECT * FROM centre');
			while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
				$centres[] = new Center_Model($data["id"], $data["nom"], $data["coordonneX"], $data["coordonneY"], $data["type"]);
				//echo $data["nom"];

			}
			echo 'test'.$centres[0];
			/*print_r($centres);*/
			return $centres;
		} 

		public function edit(){

		}

		public function delete(){

		}

	}

?>