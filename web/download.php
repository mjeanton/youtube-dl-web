<?php

$wantedVideo = $_GET['video'];

$fichier = 'audios/' . $wantedVideo;
$tailleFichier = filesize($fichier);

header("Content-disposition: attachment; filename=$wantedVideo");
header("Content-Type: application/force-download");
header("Content-Transfer-Encoding: application/octet-stream");
header("Content-Length: $tailleFichier");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
header("Expires: 0");
readfile($fichier);

?>