<?php 
// date
// untuk menampilkan tanggal dengan format tertentu
// echo date("l, d-M-Y");

// Time
// unix Timestamp / EPOCH time
// detik yang sudah berlalu sejak 1 januari 1970
// echo time();
// echo date("d-M-Y", time()-60*60*24*100);
// echo date("l", mktime(0,0,0,8,25,1985));

// strtotime
echo date("l", strtotime("2 jan 2003"));
?>