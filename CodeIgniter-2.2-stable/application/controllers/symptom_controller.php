<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*require_once('config/database.php');*/

class Symptom_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Symptom_Model");

		$this->load->database();
		Symptom_Model::set_db(new PDO($this->db->dbdriver.':host='.$this->db->hostname.';dbname='.$this->db->database,$this->db->username ,$this->db->password ));

	}

	public function index() 
	{
		echo "index";
	}

	public function create()
	{
		$n = 'Centre de ittleheim';
		$x = 45.566;
		$y = 87.55657;
		$t = 'VACCINATION';

		Symptom_Model::create($n, $x, $y, $t);

	}

	public function getjson()
	{
		$tab_all_symptoms = Symptom_Model::read();
		echo(json_encode($tab_all_symptoms));
	}

	public function edit()
	{

	}

	public function delete()
	{

	}
}