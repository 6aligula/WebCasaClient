<?php
$ok=1;
$fileList = shell_exec('/YourPathHere/saveTemp.sh');
$fileList1 = shell_exec('/YourPathHere/saveHumidity.sh');
$res = array('val' => $ok);
echo json_encode($res);
