<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Mahasiswa.class.php");
include("model/TabelMahasiswa.class.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Interface atau gambaran dari presenter akan seperti apa
interface KontrakPresenter
{
	public function prosesDataMahasiswa();
	public function getId($i);
	public function getNim($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i); // Getter untuk email
	public function getTelepon($i); // Getter untuk telepon
	public function getSize();
	
	// Method CRUD
	public function addDataMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telepon);
	public function updateDataMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telepon);
	public function deleteDataMahasiswa($id);
	public function getMahasiswaById($id);
}