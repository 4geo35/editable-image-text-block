<?php

namespace GIS\EditableImageTextBlock\Templates;


use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Interfaces\ModifierInterface;

class ImageTextRecordTwoThirds implements ModifierInterface
{
    public function apply(ImageInterface $image): ImageInterface
    {
        return $image->cover(930, 418);
    }
}
