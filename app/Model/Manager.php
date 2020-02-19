<?php
namespace ScarvesHome\Model;

class Manager{
    protected function dbConnect(){
        $host = 'localhost';
		$db = 'ScarvesHome';
		$login = 'root';
		$mdp = 'root';
		$db = new \PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $login, $mdp);	
        return $db;
    }
}