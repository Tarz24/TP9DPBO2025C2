<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;
		$form = null;
		$action = isset($_GET['action']) ? $_GET['action'] : "";
		$id = isset($_GET['id']) ? $_GET['id'] : "";
		
		// Memproses Form CRUD
		if (isset($_POST['add'])) {
			// Proses tambah data
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$tempat = $_POST['tempat'];
			$tl = $_POST['tl'];
			$gender = $_POST['gender'];
			$email = $_POST['email'];
			$telepon = $_POST['telepon'];
			
			if ($this->prosesmahasiswa->addDataMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telepon)) {
				header("Location: index.php");
			}
		} else if (isset($_POST['update'])) {
			// Proses update data
			$id = $_POST['id'];
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$tempat = $_POST['tempat'];
			$tl = $_POST['tl'];
			$gender = $_POST['gender'];
			$email = $_POST['email'];
			$telepon = $_POST['telepon'];
			
			if ($this->prosesmahasiswa->updateDataMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telepon)) {
				header("Location: index.php");
			}
		} else if (isset($_POST['delete'])) {
			// Proses delete data
			$id = $_POST['id'];
			
			if ($this->prosesmahasiswa->deleteDataMahasiswa($id)) {
				header("Location: index.php");
			}
		}
		
		// Membuat form berdasarkan action
		if ($action == "add") {
			// Form tambah data
			$form = '
			<div class="form-container">
				<h2 class="text-center mb-4">Tambah Data Mahasiswa</h2>
				<form method="post" action="">
					<div class="form-group">
						<label>NIM:</label>
						<input type="text" class="form-control" name="nim" required>
					</div>
					<div class="form-group">
						<label>Nama:</label>
						<input type="text" class="form-control" name="nama" required>
					</div>
					<div class="form-group">
						<label>Tempat Lahir:</label>
						<input type="text" class="form-control" name="tempat" required>
					</div>
					<div class="form-group">
						<label>Tanggal Lahir:</label>
						<input type="date" class="form-control" name="tl" required>
					</div>
					<div class="form-group">
						<label>Gender:</label>
						<select class="form-control" name="gender" required>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="email" class="form-control" name="email" required>
					</div>
					<div class="form-group">
						<label>Telepon:</label>
						<input type="text" class="form-control" name="telepon" required>
					</div>
					<div class="form-buttons">
						<input type="submit" name="add" value="Tambah" class="btn btn-primary">
						<a href="index.php" class="btn btn-secondary">Batal</a>
					</div>
				</form>
			</div>';
		} else if ($action == "update" && !empty($id)) {
			// Form update data
			$mhs = $this->prosesmahasiswa->getMahasiswaById($id);
			if ($mhs) {
				$form = '
				<div class="form-container">
					<h2 class="text-center mb-4">Edit Data Mahasiswa</h2>
					<form method="post" action="">
						<input type="hidden" name="id" value="' . $mhs->getId() . '">
						<div class="form-group">
							<label>NIM:</label>
							<input type="text" class="form-control" name="nim" value="' . $mhs->getNim() . '" required>
						</div>
						<div class="form-group">
							<label>Nama:</label>
							<input type="text" class="form-control" name="nama" value="' . $mhs->getNama() . '" required>
						</div>
						<div class="form-group">
							<label>Tempat Lahir:</label>
							<input type="text" class="form-control" name="tempat" value="' . $mhs->getTempat() . '" required>
						</div>
						<div class="form-group">
							<label>Tanggal Lahir:</label>
							<input type="date" class="form-control" name="tl" value="' . $mhs->getTl() . '" required>
						</div>
						<div class="form-group">
							<label>Gender:</label>
							<select class="form-control" name="gender" required>
								<option value="L" ' . ($mhs->getGender() == 'L' ? 'selected' : '') . '>Laki-laki</option>
								<option value="P" ' . ($mhs->getGender() == 'P' ? 'selected' : '') . '>Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>Email:</label>
							<input type="email" class="form-control" name="email" value="' . $mhs->getEmail() . '" required>
						</div>
						<div class="form-group">
							<label>Telepon:</label>
							<input type="text" class="form-control" name="telepon" value="' . $mhs->getTelepon() . '" required>
						</div>
						<div class="form-buttons">
							<input type="submit" name="update" value="Update" class="btn btn-primary">
							<a href="index.php" class="btn btn-secondary">Batal</a>
						</div>
					</form>
				</div>';
			}
		} else if ($action == "delete" && !empty($id)) {
			// Form konfirmasi delete data
			$mhs = $this->prosesmahasiswa->getMahasiswaById($id);
			if ($mhs) {
				$form = '
				<div class="form-container">
					<h2 class="text-center mb-4">Hapus Data Mahasiswa</h2>
					<p class="text-center">Apakah Anda yakin ingin menghapus data mahasiswa <strong>' . $mhs->getNama() . '</strong> (' . $mhs->getNim() . ')?</p>
					<form method="post" action="" class="text-center">
						<input type="hidden" name="id" value="' . $mhs->getId() . '">
						<div class="form-buttons">
							<input type="submit" name="delete" value="Hapus" class="btn btn-danger">
							<a href="index.php" class="btn btn-secondary">Batal</a>
						</div>
					</form>
				</div>';
			}
		}
		
		// Menambahkan tombol tambah data
		$table_header = '<div class="action-buttons">
							<a href="index.php?action=add" class="btn btn-success">Tambah Data</a>
						</div>';
		
		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$gender = $this->prosesmahasiswa->getGender($i);
			$gender_text = ($gender == 'L') ? 'Laki-laki' : 'Perempuan';
			
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $gender_text . "</td>
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTelepon($i) . "</td>
			<td class='action-cell'>
				<a href='index.php?action=update&id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-warning btn-sm'>Edit</a>
				<a href='index.php?action=delete&id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-danger btn-sm'>Hapus</a>
			</td></tr>";
		}
		
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->replace("DATA_FORM", $form);
		$this->tpl->replace("DATA_HEADER", $table_header);

		// Menampilkan ke layar
		$this->tpl->write();
	}
}