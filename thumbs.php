<?php
$thumbDir   = 'thumbs';
$thumbWidth = 320;
$columns    = 3;

if (!is_dir($thumbDir)) {
    mkdir($thumbDir, 0755);
}

$files = glob('*.{jpg,jpeg,JPG,JPEG,png,PNG,gif,GIF}', GLOB_BRACE);
sort($files, SORT_NATURAL | SORT_FLAG_CASE);

function makeThumb($src, $dest, $width) {
    $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));
    switch ($ext) {
        case 'jpg': case 'jpeg': $img = @imagecreatefromjpeg($src); break;
        case 'png':  $img = @imagecreatefrompng($src);  break;
        case 'gif':  $img = @imagecreatefromgif($src);  break;
        default: return false;
    }
    if (!$img) return false;

    $thumb = imagescale($img, $width);
    imagedestroy($img);
    if (!$thumb) return false;

    //we like progressive loading jpegs
    imageinterlace($thumb, true); //change "true" to 1 for php versions older than 8.0

    $ok = imagejpeg($thumb, $dest, 82);
    imagedestroy($thumb);
    return $ok;
}

$items = array();
foreach ($files as $file) {
    $thumb = $thumbDir . '/' . pathinfo($file, PATHINFO_FILENAME) . '.jpg';
    if (!file_exists($thumb) || filemtime($thumb) < filemtime($file)) {
        if (!makeThumb($file, $thumb, $thumbWidth)) continue;
    }
    $items[] = array($file, $thumb);
}
?>
