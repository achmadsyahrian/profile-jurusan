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

// QUERY RESULT
function queryResult($query) {
  global $connect;
  $result = mysqli_query($connect, $query);
  return $result;
}

// REGISTER
function register($data) {
  global $connect;

  $nama = mysqli_real_escape_string($connect, $data['nama']);
  $username = mysqli_real_escape_string($connect, $data['username']);
  $password = md5($data['password']);
  $password2 = md5($data['password2']);

  // cek username sudah pernah ada atau belum di DB
  $result = mysqli_query($connect, "SELECT username FROM users WHERE username = '$username' ");
  if (mysqli_fetch_assoc($result)) {
    return $_SESSION['userReady'] = true;
  }

  // cek konfirmasi password
  if ($password2 !== $password) {
    return $_SESSION['passSame'] = true;
  }

  // input data ke DB TB.Masyarakat
  $query = "INSERT INTO users VALUES (NULL, '$nama', '$username', '$password', 'user-default.svg', 'user') ";
  mysqli_query($connect, $query);

  // cek status input apakah berhasil atau tidak
  return $_SESSION['registerSucccess'] = true;
}

// LOGIN
function login($data) {
  global $connect;

  $username = mysqli_real_escape_string($connect, $data['username']);
  $password = md5($data['password']);

  $cekUser = mysqli_query($connect, "SELECT * FROM users WHERE username='$username' AND password='$password'");

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

// LOGOUT
function logout() {
  global $connect;

  session_destroy();

  return 1;
}

// KIRIM KOMENTAR
function kirimKomentar($data, $titlePage) {
  global $connect;

  $idUser = $data['id_user'];
  $nama = $data['nama'];
  $foto = $data['foto'];
  $isi_komentar = mysqli_real_escape_string($connect, $data['isi_komentar']);
  $tgl_post = date("Y-m-d");

  if ($titlePage == "Gallery") {
    $idGallery = $data['id_gallery'];
    $query = "INSERT INTO komentar_gallery 
              VALUES
            (NULL, $idGallery, $idUser, '$nama', '$foto', '$isi_komentar', '$tgl_post')
            ";
  } elseif ($titlePage == "Berita") {
    $idBerita = $data['id_berita'];
    $query = "INSERT INTO komentar 
              VALUES
            (NULL, $idBerita, $idUser, '$nama', '$foto', '$isi_komentar', '$tgl_post')
            ";
  }
  $inp = mysqli_query($connect, $query);

  if ($inp > 0) {
    return $_SESSION['tambahKomentar'] = true;
  } else {
    return mysqli_error($connect);
  }
}

// UPLOAD FOTO PROFILE
function upload() {
  global $connect;

  $namaFile = $_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];
  $ukuranFile = $_FILES['foto']['size'];
  $tmpName = $_FILES['foto']['tmp_name'];

   // cek ukuran file
  if ($ukuranFile > 5000000) { // satuan perhitungannya adalah kilobyte(kb)
    $_SESSION['overSize'] = true;
    return false;
  }

  //lolos pengecekan
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $namaFile;
  $lokasiUpload = "assets/assets/img/profile-user/";
  move_uploaded_file($tmpName, $lokasiUpload.$namaFileBaru);
  return $namaFileBaru;
}

// EDIT PROFILE
function editProfile($data) {
  global $connect;

  $id_user = $data['id_user'];
  $nama = $data['nama'];
  $username = $data['username'];

  // Cek username dari id_user
  $cekUser = query("SELECT username FROM users WHERE id_user = $id_user")[0];
  // Cek inputan user apakah sama dengan yg di DB
  if ($username != $cekUser['username']) {
    // cek jika username sama
    $result = mysqli_query($connect, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
      $_SESSION['userReady'] = true;
      return $_SESSION['userReady'];
    }
  }
  
  // cek input password user
  if (!empty($data['password'])) {
    $password = md5($data['password']);
  } else {
    $password = $data['passwordLama'];
  }

  $gambar = null;
  if (!empty($_FILES['foto']['name'])) {
    // hapus gambar lama dari direktori
    $query_gambar = "SELECT foto FROM users WHERE id_user = $id_user";
    $result_gambar = mysqli_query($connect, $query_gambar);
    $gambar_lama = mysqli_fetch_assoc($result_gambar)['foto'];

    if (!empty($gambar_lama) && $gambar_lama !== 'user-default.svg' && file_exists("assets/assets/img/profile-user/" . $gambar_lama)) {
      unlink("assets/assets/img/profile-user/" . $gambar_lama);
    }



    // upload gambar baru
    $gambar = upload();
    if (!$gambar) {
      return false;
    }
  }


  if ($gambar) {
    $query1 = "UPDATE users SET nama = '$nama', username = '$username', password = '$password', foto = '$gambar' WHERE id_user = $id_user";
    $query2 = "UPDATE komentar SET nama = '$nama', foto = '$gambar' WHERE id_user = $id_user";
    $query3 = "UPDATE komentar_gallery SET nama = '$nama', foto = '$gambar' WHERE id_user = $id_user";
    $query = $query1 . ";" . $query2 . ";" . $query3;
  } else {
    $query1 = "UPDATE users SET nama = '$nama', username = '$username', password = '$password' WHERE id_user = $id_user";
    $query2 = "UPDATE komentar SET nama = '$nama' WHERE id_user = $id_user";
    $query3 = "UPDATE komentar_gallery SET nama = '$nama' WHERE id_user = $id_user";
    $query = $query1 . ";" . $query2 . ";" . $query3;
  }

  if (mysqli_multi_query($connect, $query)) {
    do {
      // kosongkan buffer
    } while (mysqli_next_result($connect));
    return $_SESSION['editProfile'] = true;
  } else {
    return false;
  }

}