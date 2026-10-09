<?php require_once('thumbs.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Gallery</title>
</head>
<body>
<table border="0" cellpadding="4" cellspacing="0" summary="The Gallery" align="center">
<?php
$count = count($items);
for ($i = 0; $i < $count; $i++) {
    if ($i % $columns == 0) echo "<tr>\n";

    list($file, $thumb) = $items[$i];
    $full = htmlspecialchars(rawurlencode($file));
    $th   = htmlspecialchars($thumbDir . '/' . rawurlencode(basename($thumb)));
    $alt  = htmlspecialchars($file);

    $size = @getimagesize($thumb);
    $dims = $size ? " width=\"{$size[0]}\" height=\"{$size[1]}\"" : '';

    echo "  <td align=\"center\" valign=\"top\"><a href=\"$full\" target=\"_blank\"><img src=\"$th\"$dims alt=\"$alt\"></a></td>\n";

    if ($i % $columns == $columns - 1) echo "</tr>\n";
}

if ($count % $columns != 0) {
    for ($j = $count % $columns; $j < $columns; $j++) {
        echo "  <td>&nbsp;</td>\n";
    }
    echo "</tr>\n";
}
if ($count == 0) {
    echo "<tr><td>No images found.</td></tr>\n";
}
?>
</table>
</body>
</html>