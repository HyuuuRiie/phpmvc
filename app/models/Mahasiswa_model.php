<?php

class Mahasiswa_model{
	private $table= 'mahasiswa';
	private $db;

	///begitu kelas dipanggil otomastis instatiasi ke database
	public function __construct(){
		$this->db = new Database;
	}

	public function getAllMahasiswa(){
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}
}