<?php
$ok=1;
$fileList = shell_exec('/home/pi/Desktop/lab/tempHumedad/guardaTemp.sh');
$fileList1 = shell_exec('/home/pi/Desktop/lab/tempHumedad/guardaHumedad.sh');
$res = array('val' => $ok);
echo json_encode($res);
