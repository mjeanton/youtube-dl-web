<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
		<title>Enter URL</title>
	</head>

	<body>

		<header>
			YouTube Music
		</header>

		<div class="defineLink">
			<form method="POST" action="">
				<input type="text" name="videourl"><br />
				<button>Télécharger</button>
			</form>
		</div>

		<div class="download">
			<div id="barContainer">
				<div id="progress">54%</div>
			</div>
			<span id="downloadingInfos">Taille: 5.00MiB</span>
		</div>

		<div class="getLink">
			<form method="GET" action="download.php?video=wowVideo.mp3">
				<button>GET SONG!</button>
			</form>
		</div>

		<footer>
			<span>YouTube music downloader</span><br />
			<span>By Milan J</span>
		</footer>

	</body>
</html>

<!--
<?php
/*
$url = $_POST['videourl'];

if (isset($url)) {
	ob_implicit_flush(true);
	ob_start();

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
	        $paragraphContent="Size: $size; Speed : $speed; Temps restant : $eta";
	    }
	    else {
	        $paragraphContent="Size: $size";
	    }

	    echo '<script language="javascript">
	    document.getElementById("downloadingInfos").innerHTML="' . $paragraphContent . '";
	    document.getElementById("progress").innerHTML="<div style=\"width:' . $percentage . ';background-color:#ddd;\">' . $percentage . '</div>";
	    </script>';

	    ob_flush();
    	
	    
	    // Will print: Percentage: 21.3%; Size: 4.69MiB; Speed: 4.47MiB/s; ETA: 00:01
	});

	$video = $dl->download($url);

	$videoFilename = $video->getFilename();

	echo '<div>';
	echo "<a href='download.php?video=" . $videoFilename . "'>Get song</a><br />";
	echo '</div>';

	ob_end_flush();

	echo '<script language="javascript">
		document.getElementById("progress").innerHTML="<div style=\"width:100%;background-color:#ddd;\">Process completed</div>";
	</script>';
}
*/
?>
-->