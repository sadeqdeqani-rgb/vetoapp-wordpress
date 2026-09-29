<?php
/**
 * Rebuilds PNG derivatives from the approved VetoApp logo.
 * Run: php wordpress/scripts/generate-brand-assets.php
 */

declare(strict_types=1);

$theme_root = dirname(__DIR__) . '/vetoapp-landing';
$source = $theme_root . '/assets/images/vetoapp-logo.png';

if (!extension_loaded('gd')) {
    fwrite(STDERR, "The PHP GD extension is required.\n");
    exit(1);
}

if (!is_readable($source)) {
    fwrite(STDERR, "Missing source logo: {$source}\n");
    exit(1);
}

$logo = imagecreatefrompng($source);
if ($logo === false) {
    fwrite(STDERR, "Unable to read source PNG.\n");
    exit(1);
}

$write_icon = static function (int $size, string $destination) use ($logo): void {
    $canvas = imagecreatetruecolor($size, $size);
    imagealphablending($canvas, false);
    $transparent = imagecolorallocatealpha($canvas, 0, 0, 0, 127);
    imagefill($canvas, 0, 0, $transparent);
    imagesavealpha($canvas, true);
    imagecopyresampled($canvas, $logo, 0, 0, 0, 0, $size, $size, imagesx($logo), imagesy($logo));
    imagepng($canvas, $destination, 9);
    imagedestroy($canvas);
};

$write_icon(192, $theme_root . '/assets/icons/icon-192.png');
$write_icon(512, $theme_root . '/assets/icons/icon-512.png');
$write_icon(180, $theme_root . '/assets/icons/apple-touch-icon.png');

$canvas = imagecreatetruecolor(1200, 630);
$primary_dark = imagecolorallocate($canvas, 16, 21, 82);
$primary_light = imagecolorallocate($canvas, 232, 234, 246);
$teal = imagecolorallocate($canvas, 0, 140, 149);
$white = imagecolorallocate($canvas, 255, 255, 255);

imagefill($canvas, 0, 0, $primary_dark);
imagefilledellipse($canvas, 1070, 48, 350, 350, $teal);
imagefilledellipse($canvas, 68, 618, 260, 260, $primary_light);
imagecopyresampled($canvas, $logo, 790, 111, 0, 0, 318, 318, imagesx($logo), imagesy($logo));

$font = '/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf';
if (is_readable($font)) {
    imagettftext($canvas, 57, 0, 75, 250, $white, $font, 'VetoApp');
    imagettftext($canvas, 25, 0, 79, 310, $primary_light, $font, 'Civic participation');
    imagettftext($canvas, 25, 0, 79, 350, $primary_light, $font, 'and collective decisions');
}

imagepng($canvas, $theme_root . '/assets/images/social-card.png', 8);
imagedestroy($canvas);
imagedestroy($logo);

fwrite(STDOUT, "Brand PNG assets regenerated.\n");
