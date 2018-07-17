<?php
require __DIR__ . '/vendor/autoload.php';
use YoutubeDl\YoutubeDl;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
		<title>Enter URL</title>
	</head>

	<body>

		<form method="POST" action="audio.php">
			<input type="text" name="videourl">
			<button>Submit</button>
		</form>

		<br />

		<!--<p id="downloadingInfos"></p>

		<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
		<div id="information" style="width"></div>
		<br />-->

<!--<?php
/*	ob_implicit_flush(true);
	ob_start();

	$url = $_POST['videourl'];

	if ($url) {
		$dl = new YoutubeDl([
	    'extract-audio' => true,
	    'audio-format' => 'mp3',
	    'audio-quality' => 0, // best
	    'output' => '%(title)s.%(ext)s',
	]);
	$dl->setDownloadPath('./audios');

	ob_flush();

	$dl->onProgress(function ($progress) {

	    $percentage = $progress['percentage'];
	    $size = $progress['size'];
	    $speed = $progress['speed'] ?? null;
	    $eta = $progress['eta'] ?? null;

	    ob_flush();

	    if ($speed && $eta) {
	        $paragraphContent="Percentage: $percentage; Size: $size; Speed : $speed; Temps restant : $eta";
	    }
	    else {
	        $paragraphContent="Percentage: $percentage; Size: $size";
	    }

	    echo '<script language="javascript">
	    document.getElementById("downloadingInfos").innerHTML="' . $paragraphContent . '"
	    </script>';

	    ob_flush();
    	
    	/*
	    if ($speed) {
	        echo "; Speed: $speed";
	    }
	    if ($eta) {
	        echo "; ETA: $eta";
	    }
	    */

	    
	    // Will print: Percentage: 21.3%; Size: 4.69MiB; Speed: 4.47MiB/s; ETA: 00:01
/*	});

	$video = $dl->download($url);
	$videoTitle = $video->getTitle();
	$videoLink = $video->getFile();

	echo '<br />';
	echo "<a href='" . $videoLink . "'>" . $videoTitle . "</a>";

	ob_end_flush();

	}
*/
?>-->

	</body>
</html>