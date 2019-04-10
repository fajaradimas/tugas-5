<?php
// Check for the path elements
// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
$method = $_SERVER['REQUEST_METHOD'];

//site.com/data -> /data
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));

// echo "request===".$request;
// echo "|||";
// echo "method===".$method;
// echo "|||";
 
// $input = json_decode(file_get_contents('php://input'),true);
// $input = file_get_contents('php://input');
// var_dump($input);die*();
$link = mysqli_connect('localhost', 'id8008057_dimas', 'fajar', 'id8008057_fajar');
// $link = mysqli_connect('localhost', 'root', '', 'id8008057_crud');
mysqli_set_charset($link,'utf8');
 
$params = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
// echo "data===".$data;
// echo "|||";
$id = array_shift($request);
// echo "id===".$id;
// echo "|||";



if ($params == 'data') {
	switch ($method) {
		case 'GET':
	    {
		    if (empty($id))
		    {
			    $sql = "select * from siswa"; 
			    // echo "select * from siswa ";break;
		    }
		    else
		    {
		         $sql = "select * from siswa where id='$id'";
		         // echo "select * from siswa where id='$id'";break;
		    }
	    }
	}
 
	$result = mysqli_query($link,$sql);
 
	if (!$result) {
		http_response_code(404);
		die(mysqli_error());
	}

	if ($method == 'GET') {
		$hasil=array();

		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			$hasil[]=$row;
		} 

		$resp = array('status' => true, 'message' => 'Data show succes', 'data' => $hasil);
	} else {
		$resp = array('status' => false, 'message' => 'Access Denied');
	}
}elseif ($method == 'POST') {
	$data = $_POST;
    if ($params == "create") {
        $no=$data["no"];
	    $nama=$data["nama"];

		$querycek = "SELECT * FROM siswa WHERE kode like '$kode'";
		$result=mysqli_query($link,$querycek);

		if (mysqli_num_rows($result) == 0)
		{
			$query = "INSERT INTO siswa (
			no,
			nama,
			jenis_kelamin,
			alamat ,
			telepon,
			created_at)
			VALUES (				
			'$no',
			'$nama',
			current_timestamp)";
			
			mysqli_query($link,$query);

			$resp = array('status' => true, 'message' => "mapel $kode ditambahkan");
		} else { 
			$resp = array('status' => false, 'message' => 'mapel sudah terdaftar');
		}
    } elseif ($params == "update") {
    	$id=$data["nis"];
	    $nama=$data["nama"];
	    $id=$data["jenis_kelamin"];
	    $id=$data["telp"];
	    $id=$data["alamat"];

	    $query = "UPDATE siswa 
	    	SET siswa	= '$no',
			nama_siswa = '$nama'
			WHERE id =$nis";
	    if (mysqli_query($link,$query)) {
	    	
			$resp = array('status' => true, 'message' => "mapel $kode diupdate");
	    } else {
	    	$resp = array('status' => false, 'message' => 'proses update gagal');
	    }
    } elseif ($params == "delete") {
    	$id=$data["nis"];

	    $query = "DELETE FROM siswa WHERE id = $id";

	    if (mysqli_query($link,$query)) {
	    	
		    $resp = array('status' => true, 'message' => 'data berhasil dihapus');
	    } else {
	    	$resp = array('status' => false, 'message' => 'data gagal dihapus');
	    }
    }    
} else {
	$resp = array('status' => false, 'message' => 'data gagal');
}
echo json_encode($resp);

mysqli_close($link);
?>