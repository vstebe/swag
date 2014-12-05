<?php
class ZoneEpidemie extends CI_Controller 
{
	private $zoneEpidemie;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('zoneEpidemie_model');
		zoneEpidemie_model::set_db(new PDO('mysql:host=localhost;dbname=swag','root',''));
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
