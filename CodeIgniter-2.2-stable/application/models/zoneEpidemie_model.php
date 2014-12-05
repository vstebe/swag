<?php

class zoneEpidemie_model extends CI_Model
{

	private static $_db;


    function __construct()
    {
        parent::__construct();


    }
    public static function set_db(PDO $db)
    {
		self::$_db = $db;
	}

	public static function read_all()
	{
		$zones = array();
		$q = self::$_db->query('SELECT * FROM zoneepidemie');
		while ($data = $q->fetch(PDO::FETCH_ASSOC)) 
		{
			$q2 = self::$_db->prepare('SELECT nom FROM maladie WHERE id=:i');
			$q2->bindValue(':i', $data['fk_maladie'], PDO::PARAM_INT);
			$q2->execute();
			$string_maladie = $q2->fetch(PDO::FETCH_ASSOC);

			$zones[$data['id']] = array($data['coordonneX'], $data['coordonneY'], $data['radius'], $string_maladie['nom']);

		}
		return $zones;
		 
	}


}

?>