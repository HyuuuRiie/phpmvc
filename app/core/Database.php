<?php

class Database{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db_name = DB_NAME;

	private $dbh;
	private $stmt;

	public function __construct()
	{
		///data source name
		$dsn ='mysql:host='. $this->host .';dbname='.$this->db_name;
		///option digunakan untuk mengoptimasi koneksi ke database 
		$option = [
			PDO::ATTR_PERSISTENT=>true, ////untuk membuat koneksi databse terjaga terus
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
		];
		try{
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
		}catch(PDOException $e){  #$e = error
			die($e->getMessage()); #pesan error
		}
	}


 
	 ////untuk menjalankan query dengan generic, misal update, insert dll
	 public function query($query){
	 	$this->stmt = $this->dbh->prepare($query);
	 }
	 ///binding data $type wajib ada pada bind
	 public function bind($param, $value, $type=null){
	 	if(is_null($type)){ 
	 		switch (true) {
	 			case is_int($value): ///kalau valuenya integer tipenya otomatis integer
	 				$type = PDO::PARAM_INT;
	 				break;
	 			case is_bool($value):
	 				$type = PDO::PARAM_BOOL;
	 				break;
	 			case is_null($value):
	 				$type = PDO::PARAM_NULL;
	 				break;
	 			default:
	 				$type = PDO::PARAM_STR;
	 		}
	 	}
	 	$this->stmt->bindValue($param, $value, $type); ////misalkan masuk data 1, dicek apa tipenya
	 	#dibind terlebih supaya terhindar dari sql injection, karena query dieksekusi setelah stirng dibersihkan dulu
	 }

	 ////eksekusi data
	 public function execute()
	 {
	 	$this->stmt->execute();
	 }
	///untuk hasil data banyak
	 public function resultSet()
	 {
	 	$this->execute();
	 	return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	 }
	 ///untuk hasil data tunggal
	 public function single()
	 {
	 	$this->execute();
	 	return $this->stmt->fetch(PDO::FETCH_ASSOC);
	 }
	 public function rowCount(){
	 	return $this->stmt->rowCount();
	 }

} 	