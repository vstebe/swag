<?php
class Zoneepidemie extends CI_Controller 
{
	private $zoneEpidemie;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Zoneepidemie_model');
		$this->load->database();
		zoneepidemie_model::set_db(new PDO($this->db->dbdriver.':host='.$this->db->hostname.';dbname='.$this->db->database,$this->db->username ,$this->db->password  ));
		$this->zoneEpidemie = zoneEpidemie_model::read_all();
	}
	
	public function index()
	{
		echo 'Hello World!';
	}

	public function getJSON()
	{
		$json_e = json_encode($this->zoneEpidemie);
		print($json_e);
	}
}
?>
