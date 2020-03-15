  <?php require("./__qp.lock/__qp.open.php"); ?>
 <html>
 <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <?php
	if (isset($_GET['watch'])) { 
	$idlo = (int)$_GET['watch'];
	$sql = "SELECT * FROM lock_data WHERE id='$idlo'";
							} else 	{
	$sql = "SELECT * FROM lock_data";
		}
	$result = mysqli_query($bot_to_root, $sql);
	if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $mang = explode("|0|", $row['data']);
  $mangk = explode("|olock|", $row['times']);
  $sophantu = count($mang);
  $phantus = $sophantu - 1;
  $timerss = $row['times'];
  $sslist = $row['style'];
  $repat = $row['rpeat'];
  $msbg = $row['msbg'];
  echo '<title>'.$row['tieude'].'</title>'; 
  echo '<meta name="description" content="'.$row['mota'].'"/>';

	} else {
    echo "Không tìm thấy câu chuyện!";
	exit;
		}
//
$i = -1;
$ik = -1;
?>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css'>
</head>
<body>
<?php 
	if ($msbg == "yes") {
	if (isset($row['music'])) {
		 if (strlen(strstr($row['music'], "http://mp3.zing.vn/bai-hat/")) > 0) {
				$id = explode('/', $row['music']);
				$id = explode('.html', $id[5]);
				$id=$id[0];
				$api = 'http://api.mp3.zing.vn/api/mobile/song/getsonginfo?keycode=fafd463e2131914934b73310aa34a23f&requestdata={"id":"'.$id.'"}';
				$get = file_get_contents($api);
				$json = json_decode($get, true);
				$audio = $json['source']['128'];
				echo '<audio  autoplay>
	<source src="'.$audio.'" type="audio/mpeg">
	Your browser does not support the audio element.
	</audio>'; 
																} else {
	echo '<audio  autoplay>
	<source src="'.$row['music'].'" type="audio/mpeg">
	Your browser does not support the audio element.
	</audio>'; 
	}
							}
						}
					?>
 <div class="wrap">
<p id="p1">Câu chuyện của <?php echo $row['user'];?></p>
</div>

<script type="text/javascript">
var timek = [<?php echo "'1800',"; foreach ($mangk as $mang2k) { $ik++; if ($ik == $phantus) { echo "'2000'"; } else {echo "'".$mang2k."000',"; }} echo ']';?>;

var array = [<?php echo "'Câu chuyện của ".$row['user']."', "; foreach ($mang as $mang2) { $i++; if ($i == $phantus) { echo "'Hết'"; } else {echo "'".(htmlspecialchars($mang2))."',"; }} echo ']';?>;
var txt = -1;
var numText = <?php echo $phantus + 1; ?>;
window.onload = function(){
  setTimeout("switchText()", timek[txt]);
}
function switchText(){
  txt++;
  document.getElementById("p1").innerHTML = array[txt];
<?php 
if ($repat == "yes") {
	echo ' if(txt == numText){txt =-1;}
setTimeout("switchText()",  timek[txt]);
}';
} else {
echo 'if(txt < numText){
  setTimeout("switchText()",  timek[txt]);
} }';
}
?>
</script>
<style>
<?php
$path = "./css/".$sslist.".css.txt";
include($path);
if (strlen($row['imgbg']) > 0) {
	echo 'body {
    background-image: url("'.$row['imgbg'].'");
    background-repeat: repeat-y;
}';
}
?>
</style>
<?php  mysqli_close($bot_to_root); ?>
</body>
</html>