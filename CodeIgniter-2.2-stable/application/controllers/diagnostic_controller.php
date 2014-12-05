<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diagnostic_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Diagnostic_Model");
		Diagnostic_Model::set_db(new PDO('mysql:host=localhost;dbname=swag','root',''));

	}

	public function coucou() {

		$this->load->view('welcome_message');
	}

	public function create()
	{

	}

	public function read()
	{
		$tab_all_centers = Diagnostic_Model::read();
		$outp = "[";
		foreach($tab_all_diagnostics as $value) {
			/*if ($outp != "[") 
				$outp .= ",";*/
			echo $value->get_name();
			echo "bla";
			/*$outp .= '{"Name":"'  . $value->get_name() . '",';
			$outp .= '"Longitude":"' . $value->get_longitude() . '",';
			$outp .= '"Latitude":"'. $value->get_latitude() . '"}';
			$outp .= '"Type":"'. $value->get_type() . '"}';*/
		}
		$outp .="]";
		echo($outp);
	}

	public function edit()
	{

	}

	public function delete()
	{

	}
}