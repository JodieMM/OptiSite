<?php
	session_start();

	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
	{
		$fileLocation = '/Software/OptimatorBeta.zip';
		$nginxFile = 'var/www/Software/OptimatorBeta.zip';
		$fileName = 'OptimatorBeta.zip';
		header('Cache-Control: public, must-revalidate');
		header('Pragma: no-cache');
		header('Content-Type: application/zip');
		header('Content-Length: ' .(string)(filesize($nginxFile)) );
		header('Content-Disposition: attachment; filename='.$fileName.'');
		header('Content-Transfer-Encoding: binary');
		header('X-Accel-Redirect: '. $fileLocation);
		exit(0);
	}
?>