<html>
<body>
    <p id="downloadingInfos"></p>
</body>
</html>

<?php
require __DIR__ . '/vendor/autoload.php';
use YoutubeDl\YoutubeDl;

ob_implicit_flush(true);
ob_start();

$url = $_POST['videourl'];

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
});

ob_flush();

$video = $dl->download($url);
$videoTitle = $video->getTitle();
$videoLink = $video->getFile();

echo '<br />';
echo "<a href='" . $videoLink . "'>" . $videoTitle . "</a>";

ob_end_flush();

?>
