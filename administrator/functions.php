<?php 

$connect = mysqli_connect('localhost', 'root', '', 'project-ukk');

// QUERY
function query($query) {
  global $connect;
  $result = mysqli_query($connect, $query);
  $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
}

// REGISTER
function register($data) {
  global $connect;

  $nama = mysqli_real_escape_string($connect, $data['nama']);
  $username = mysqli_real_escape_string($connect, $data['username']);
  $password = md5($data['password']);
  $password2 = md5($data['password2']);

  // cek username sudah pernah ada atau belum di DB
  $result = mysqli_query($connect, "SELECT username FROM users WHERE username = '$username' AND level = 'member' ");
  if (mysqli_fetch_assoc($result)) {
    return $_SESSION['userReady'] = true;
  }

  // cek konfirmasi password
  if ($password2 !== $password) {
    return $_SESSION['passSame'] = true;
  }

  // input data ke DB TB.Masyarakat
  $query = "INSERT INTO users VALUES (NULL, '$nama', '$username', '$password', 'user-default.svg', 'member', 'N') ";
  mysqli_query($connect, $query);

  // cek status input apakah berhasil atau tidak
  return $_SESSION['registerSucccess'] = true;
}

// LOGIN
function login($data) {
  global $connect;

  $username = mysqli_real_escape_string($connect, $data['username']);
  $password = md5($data['password']);

  $cekUser = mysqli_query($connect, "SELECT * FROM users WHERE username='$username' AND password='$password' AND status = 'Y' AND (level = 'member' OR level = 'admin')");


	if (mysqli_num_rows($cekUser) > 0) {
		$data = mysqli_fetch_assoc($cekUser);
    $_SESSION['login'] = true;
    $_SESSION['data'] = $data;
    return $_SESSION;
  }  else {
    $_SESSION['gagalLogin'] = true;
    return $_SESSION['gagalLogin'];
  }

}

// HAPUS PENGUMUMAN
function hapusPengumuman($id) {
  global $connect;

  $result_nama_file = mysqli_query($connect, "SELECT foto FROM pengumuman WHERE id_pengumuman = $id");
  $nama_file = mysqli_fetch_assoc($result_nama_file)['foto'];
  
  $file_path = "../assets/assets/img/pengumuman/" . $nama_file;
  if (file_exists($file_path)) {
      unlink($file_path);
  }
  
  mysqli_query($connect, "DELETE FROM pengumuman WHERE id_pengumuman = $id");
  
  return $_SESSION['hapusPengumuman'] = true;
  
}

// UPLOAD
function uploadPengumuman() {
  global $connect;

  $namaFile = $_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];
  $ukuranFile = $_FILES['foto']['size'];
  $tmpName = $_FILES['foto']['tmp_name'];

   // cek ukuran file
  if ($ukuranFile > 10000000) { // satuan perhitungannya adalah kilobyte(kb)
    $_SESSION['overSize'] = true;
    return false;
  }

  //lolos pengecekan
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $namaFile;
  $lokasiUpload = "../assets/assets/img/pengumuman/";
  move_uploaded_file($tmpName, $lokasiUpload.$namaFileBaru);
  return $namaFileBaru;
}

// TAMBAH PENGUMUMAN
function tambahPengumuman($data) {
  global $connect;

  $judul = $data['judul'];
  $jam = $data['jam'];
  $pengirim = $data['pengirim'];
  $lokasi = $data['lokasi'];
  $isi_pengumuman = htmlspecialchars($data['isi_pengumuman']);
  $tgl_pengumuman = date("Y-m-d");
  // cek masuk ke function upload
  $gambar = uploadPengumuman();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO pengumuman
                VALUES
            (NULL, '$judul', '$isi_pengumuman', '$tgl_pengumuman', '$jam','$pengirim', '$lokasi','$gambar')
            ";

  mysqli_query($connect, $query);

  return $_SESSION['tambahPengumuman'] = true;

}

// UPDATE PENGUMUMAN
function updatePengumuman($data) {
  global $connect;

  $id_pengumuman = $data['id_pengumuman'];  
  $isi_pengumuman = htmlspecialchars($data['isi_pengumuman']);
  $judul = htmlspecialchars($data['judul']);
  $pengirim = htmlspecialchars($data['pengirim']);
  $lokasi = htmlspecialchars($data['lokasi']);
  $tgl_pengumuman = date("Y-m-d");

  $gambar = null;
  if (!empty($_FILES['foto']['name'])) {
    $gambar = uploadPengumuman();
    if (!$gambar) {
      return false;
    }
  }

  if ($gambar) {
    $query = "UPDATE pengumuman SET isi_pengumuman = '$isi_pengumuman', judul = '$judul', pengirim = '$pengirim', tempat = '$lokasi', tgl_pengumuman = '$tgl_pengumuman', foto = '$gambar' WHERE id_pengumuman = $id_pengumuman";
  } else {
    $query = "UPDATE pengumuman SET isi_pengumuman = '$isi_pengumuman', judul = '$judul', pengirim = '$pengirim', tempat = '$lokasi', tgl_pengumuman = '$tgl_pengumuman' WHERE id_pengumuman = $id_pengumuman";
  }

  $result = mysqli_query($connect, $query);
  if ($result) {
    $_SESSION['ubahBerhasil'] = true;
  }

  return $result;
}

// HAPUS PENGUMUMAN
function hapusBerita($id) {
  global $connect;

  $result_nama_file = mysqli_query($connect, "SELECT foto FROM berita WHERE id_berita = $id");
  $nama_file = mysqli_fetch_assoc($result_nama_file)['foto'];
  
  $file_path = "../assets/assets/img/berita/" . $nama_file;
  if (file_exists($file_path)) {
      unlink($file_path);
  }
  
  mysqli_query($connect, "DELETE FROM berita WHERE id_berita = $id");
  
  return $_SESSION['hapusBerita'] = true;
  
}

function uploadBerita() {
  global $connect;

  $namaFile = $_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];
  $ukuranFile = $_FILES['foto']['size'];
  $tmpName = $_FILES['foto']['tmp_name'];

   // cek ukuran file
  if ($ukuranFile > 10000000) { // satuan perhitungannya adalah kilobyte(kb)
    $_SESSION['overSize'] = true;
    return false;
  }

  //lolos pengecekan
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $namaFile;
  $lokasiUpload = "../assets/assets/img/berita/";
  move_uploaded_file($tmpName, $lokasiUpload.$namaFileBaru);
  return $namaFileBaru;
}

// TAMBAH berita
function tambahBerita($data) {
  global $connect;

  $judul = $data['judul'];
  $isi_berita = htmlspecialchars($data['isi_berita']);
  $tgl_berita = date("Y-m-d");
  // cek masuk ke function upload
  $gambar = uploadBerita();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO berita
                VALUES
            (NULL, '$judul', '$isi_berita', '$tgl_berita', '$gambar')
            ";

  mysqli_query($connect, $query);

  return $_SESSION['tambahBerita'] = true;

}

// GANTI BERITA
function updateBerita($data) {
  global $connect;

  $id_berita = $data['id'];  
  $isi_berita = htmlspecialchars($data['isi_berita']);
  $judul = htmlspecialchars($data['judul']);
  $tgl_berita = date("Y-m-d");

  $gambar = null;
  if (!empty($_FILES['foto']['name'])) {
    $gambar = uploadBerita();
    if (!$gambar) {
      return false;
    }
  }

  if ($gambar) {
    $query = "UPDATE berita SET isi_berita = '$isi_berita', judul = '$judul', tgl_post = '$tgl_berita', foto = '$gambar' WHERE id_berita = $id_berita";
  } else {
    $query = "UPDATE berita SET isi_berita = '$isi_berita', judul = '$judul', tgl_post = '$tgl_berita' WHERE id_berita = $id_berita";
  }

  $result = mysqli_query($connect, $query);
  if ($result) {
    $_SESSION['ubahBerita'] = true;
  }

  return $result;
}

// UPLOAD GALLERY
function uploadGAllery() {
  global $connect;

  $namaFile = $_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];
  $ukuranFile = $_FILES['foto']['size'];
  $tmpName = $_FILES['foto']['tmp_name'];

   // cek ukuran file
  if ($ukuranFile > 10000000) { // satuan perhitungannya adalah kilobyte(kb)
    $_SESSION['overSize'] = true;
    return false;
  }

  //lolos pengecekan
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $namaFile;
  $lokasiUpload = "../assets/assets/img/gallery/";
  move_uploaded_file($tmpName, $lokasiUpload.$namaFileBaru);
  return $namaFileBaru;
}

// TAMBAH Gallery
function tambahGallery($data) {
  global $connect;

  $judul = $data['judul'];
  $tgl_post = date("Y-m-d");
  // cek masuk ke function upload
  $gambar = uploadGallery();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO gallery 
                VALUES
            (NULL, '$judul', '$gambar', '$tgl_post')
            ";

  mysqli_query($connect, $query);

  return $_SESSION['tambahGallery'] = true;

}

// HAPUS PENGUMUMAN
function hapusGallery($id) {
  global $connect;

  $result_nama_file = mysqli_query($connect, "SELECT foto FROM gallery WHERE id_gallery = $id");
  $nama_file = mysqli_fetch_assoc($result_nama_file)['foto'];
  
  $file_path = "../assets/assets/img/gallery/" . $nama_file;
  if (file_exists($file_path)) {
      unlink($file_path);
  }
  
  mysqli_query($connect, "DELETE FROM gallery WHERE id_gallery = $id");
  
  return $_SESSION['hapusGallery'] = true;
  
}


// UPDATE GALLERY
function updateGallery($data) {
  global $connect;

  $id_gallery = $data['id'];  
  $judul = htmlspecialchars($data['judul']);
  $tgl= date("Y-m-d");

  $gambar = null;
  if (!empty($_FILES['foto']['name'])) {
    $gambar = uploadGallery();
    if (!$gambar) {
      return false;
    }
  }

  if ($gambar) {
    $query = "UPDATE gallery SET judul = '$judul', tgl = '$tgl', foto = '$gambar' WHERE id_gallery = $id_gallery";
  } else {
    $query = "UPDATE gallery SET judul = '$judul', tgl = '$tgl' WHERE id_gallery = $id_gallery";
  }

  $result = mysqli_query($connect, $query);
  if ($result) {
    $_SESSION['ubahGallery'] = true;
  }

  return $result;
}

function uploadAgenda() {
  global $connect;

  $namaFile = $_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];
  $ukuranFile = $_FILES['foto']['size'];
  $tmpName = $_FILES['foto']['tmp_name'];

   // cek ukuran file
  if ($ukuranFile > 10000000) { // satuan perhitungannya adalah kilobyte(kb)
    $_SESSION['overSize'] = true;
    return false;
  }

  //lolos pengecekan
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $namaFile;
  $lokasiUpload = "../assets/assets/img/kegiatan/";
  move_uploaded_file($tmpName, $lokasiUpload.$namaFileBaru);
  return $namaFileBaru;
}

// TAMBAH AGENDA
function tambahAgenda($data) {
  global $connect;

  $nama_kegiatan = $data['nama_kegiatan'];
  $waktu = $data['waktu'];
  $koordinator = $data['koordinator'];
  $lokasi = $data['lokasi'];
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $tgl_kegiatan = $data['tanggal'];
  // cek masuk ke function upload
  $gambar = uploadAgenda();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO agenda
                VALUES
            (NULL, '$nama_kegiatan', '$tgl_kegiatan', '$waktu', '$lokasi','$deskripsi', '$koordinator','$gambar')
            ";

  mysqli_query($connect, $query);

  return $_SESSION['tambahAgenda'] = true;

}


// HAPUS PENGUMUMAN
function hapusAgenda($id) {
  global $connect;

  $result_nama_file = mysqli_query($connect, "SELECT foto FROM agenda WHERE id_agenda = $id");
  $nama_file = mysqli_fetch_assoc($result_nama_file)['foto'];
  
  $file_path = "../assets/assets/img/kegiatan/" . $nama_file;
  if (file_exists($file_path)) {
      unlink($file_path);
  }
  
  mysqli_query($connect, "DELETE FROM agenda WHERE id_agenda = $id");
  
  return $_SESSION['hapusAgenda'] = true;
  
}


function updateAgenda($data) {
  global $connect;

  $id_agenda = $data['id_agenda'];  
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $nama = htmlspecialchars($data['nama']);
  $koordinator = htmlspecialchars($data['koordinator']);
  $lokasi = htmlspecialchars($data['lokasi']);
  $waktu = htmlspecialchars($data['waktu']);
  $tgl = htmlspecialchars($data['tgl']);

  $gambar = null;
  if (!empty($_FILES['foto']['name'])) {
    $gambar = uploadAgenda();
    if (!$gambar) {
      return false;
    }
  }

  if ($gambar) {
    $query = "UPDATE agenda SET deskripsi = '$deskripsi', nama_kegiatan = '$nama', penanggung_jawab = '$koordinator', lokasi = '$lokasi', waktu = '$waktu', tgl_kegiatan = '$tgl', foto = '$gambar' WHERE id_agenda = $id_agenda";
  } else {
    $query = "UPDATE agenda SET deskripsi = '$deskripsi', nama_kegiatan = '$nama', penanggung_jawab = '$koordinator', lokasi = '$lokasi', waktu = '$waktu', tgl_kegiatan = '$tgl' WHERE id_agenda = $id_agenda";
  }

  $result = mysqli_query($connect, $query);
  if ($result) {
    $_SESSION['ubahAgenda'] = true;
  }

  return $result;
}

// VERIF MEMBER
function verifMember($id) {
  global $connect;

  $query = "UPDATE users SET status = 'Y' WHERE id_user = $id ";
  $result = mysqli_query($connect, $query);

    $_SESSION['verifMember'] = true;
  
}