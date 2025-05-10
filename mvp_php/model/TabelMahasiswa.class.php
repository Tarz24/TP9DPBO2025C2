<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Kelas yang berisikan tabel dari mahasiswa
class TabelMahasiswa extends DB
{
	function getMahasiswa()
	{
		// Query mysql select data mahasiswa
		$query = "SELECT * FROM mahasiswa";
		
		// Mengeksekusi query
		return $this->execute($query);
	}
	
	function getMahasiswaById($id)
	{
		// Query mysql select data mahasiswa berdasarkan id
		$query = "SELECT * FROM mahasiswa WHERE id = '$id'";
		
		// Mengeksekusi query
		return $this->execute($query);
	}
	
	function addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telepon)
	{
		// Query insert data mahasiswa
		$query = "INSERT INTO mahasiswa (nim, nama, tempat, tl, gender, email, telp) 
				  VALUES ('$nim', '$nama', '$tempat', '$tl', '$gender', '$email', '$telepon')";
		
		// Mengeksekusi query
		return $this->execute($query);
	}
	
	function updateMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telepon)
	{
		// Query update data mahasiswa
		$query = "UPDATE mahasiswa 
				  SET nim = '$nim', nama = '$nama', tempat = '$tempat', 
				      tl = '$tl', gender = '$gender', email = '$email', telp = '$telepon' 
				  WHERE id = '$id'";
		
		// Mengeksekusi query
		return $this->execute($query);
	}
	
	function deleteMahasiswa($id)
	{
		// Query delete data mahasiswa
		$query = "DELETE FROM mahasiswa WHERE id = '$id'";
		
		// Mengeksekusi query
		return $this->execute($query);
	}
}