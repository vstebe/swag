<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require_once 'application/models/center.php';

class Center extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model("Center");
		center::set_db(new PDO('mysql:host=localhost;dbname=swag','root','root'));
	}

	public function coucou() {
		echo "string";
		$string = read_file('./path/to/file.php');
		$chaine2 = file_exists("upload/$id.jpg");
		$this->load->view('welcome_message');
	}

	public function create()
	{

	}

	public function read()
	{
		$tab_all_centers = center::read();
		$outp = "[";
		while($rs = $tab_all_centers->fetch_array()) {
			if ($outp != "[") 
				$outp .= ",";
			$outp .= '{"Name":"'  . $rs.get_name() . '",';
			$outp .= '"Longitude":"' . $rs.get_longitude() . '",';
			$outp .= '"Latitude":"'. $rs.get_latitude() . '"}';
			$outp .= '"Type":"'. $rs.get_type() . '"}';
		}
		$outp .="]";
		$conn->close();

		echo($outp);
	}

	public function edit()
	{

	}

	public function delete()
	{

	}
}