<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Center_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Center_Model");
		Center_Model::set_db(new PDO('mysql:host=stebe.fr;dbname=swag','root','choucroute'));

	}

	public function coucou() {

		$this->load->view('welcome_message');
	}

	public function create()
	{
		$n = 'Centre de ittleheim';
		$x = 45.566;
		$y = 87.55657;
		$t = 'VACCINATION';

		Center_Model::create($n, $x, $y, $t);

	}

	public function getjson()
	{
		$tab_all_centers = Center_Model::read();
		echo(json_encode($tab_all_centers));
	}

	public function edit()
	{

	}

	public function delete()
	{

	}
}