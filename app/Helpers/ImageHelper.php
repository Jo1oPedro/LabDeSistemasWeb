<?php

namespace App\Helpers;

use App\Controllers\Controller;

class ImageHelper
{

    public static function resize(mixed $file, array &$data,  int $maxWidth, int $maxHeight)
    {
        var_dump($file);
        list($widthOrig, $heightOrig) = getimagesize($file['tmp_name']);
        $ratio = $widthOrig / $heightOrig;

        $newWidth = $maxWidth;
        $newHeight = $maxHeight;
        $ratioMax = $maxWidth / $maxHeight;

        if($ratioMax > $ratio) {
            $newWidth = $newHeight * $ratio;
        } else {
            $newHeight = $newWidth / $ratio;
        }

        $finalImage = imagecreatetruecolor($newWidth, $newHeight);
        switch($file['type']) {
            case 'image/png':
                $image = imagecreatefrompng($file['tmp_name']);
                break;
            case 'image/jpg':
            case 'image/jpeg':
                $image = imagecreatefromjpeg($file['tmp_name']);
                break;
        }

        imagecopyresampled(
            $finalImage, $image,
            0, 0, 0, 0,
            $newWidth, $newHeight, $widthOrig, $heightOrig,
        );

        //$photoName = md5(time().rand(0,9999)).'.jpg';
        $postData["file"] = md5(time().rand(0,9999)).'.jpg';
        imagejpeg($finalImage, 'public/img/users/'.$postData["file"]);
    }

}