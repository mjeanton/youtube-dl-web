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

		<form method="POST" action="">
			<input type="text" name="videourl">
			<button>Submit</button>
		</form>

		<br />

		<p id="downloadingInfos"></p>

		<div id="progress" style="width:500px;border:none;text-align:center;"></div>
		<br />

<?php
	ob_implicit_flush(true);
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
	    document.getElementById("downloadingInfos").innerHTML="' . $paragraphContent . '";
	    document.getElementById("progress").innerHTML="<div style=\"width:' . $percentage . ';background-color:#ddd;\">' . $percentage . '</div>";
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
	});

	$video = $dl->download($url);
	$videoTitle = $video->getTitle();
	$videoLink = $video->getFile();
	$videoFilename = $video->getFilename();

	echo '<br />';

	//echo "<a href='" . $videoLink . "'>Get song</a><br />";
	echo $videoFilename;
	echo "<a href='download.php?video=" . $videoFilename . "'>Get song</a><br />";

	ob_end_flush();

	echo '<script language="javascript">
		document.getElementById("progress").innerHTML="<div style=\"width:500px;background-color:#ddd;\">Process completed</div>";
	</script>';


	}

?>

	</body>
</html>