<?php
class ZoneEpidemie extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('zoneEpidemie_model');
		zoneEpidemie_model::set_db(new PDO('mysql:host=localhost;dbname=swag','root',''));
		$test = zoneEpidemie_model::read_all();
		print_r($test);

	}
	public function index()
	{
		echo 'Hello World!';
	}

	public function getJSON()
	{
		
	}
}
?>
