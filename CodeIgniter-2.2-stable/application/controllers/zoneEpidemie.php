<?php
class Zoneepidemie extends CI_Controller 
{
	private $zoneEpidemie;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Zoneepidemie_model');
		zoneepidemie_model::set_db(new PDO('mysql:host=stebe.fr;dbname=swag','root','choucroute'));
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
