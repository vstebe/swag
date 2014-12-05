<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maladie_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Maladie_Model");
		$this->load->database();
		Maladie_Model::set_db(new PDO($this->db->dbdriver.':host='.$this->db->hostname.';dbname='.$this->db->database,$this->db->username ,$this->db->password  ));
	}

	public function coucou() {

		$this->load->view('welcome_message');
	}

	public function create()
	{
		$n = 'laMaladieDamour';
		Maladie_Model::create($n);

	}

	public function getjson()
	{
		header('Content-Type: application/json; charset=utf-8');

		$tab_all_maladies = Maladie_Model::read();
		echo(json_encode($tab_all_maladies));
	}

	public function edit()
	{

	}

	public function delete()
	{

	}
}