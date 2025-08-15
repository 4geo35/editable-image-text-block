<?php

return [
    "availableTypes" => [
        "imageText" => [
            "title" => "Текст с изображением",
            // Livewire компонент для админки
            "admin" => "eb-image-text",
            // Компонент для вывода блока
            "render" => "eitb::types.image-text",
        ],
    ],

    // Admin
    "customImageTextComponent" => null,

    // Templates
    "templates" => [
        "image-text-record" => \GIS\EditableImageTextBlock\Templates\ImageTextRecord::class,
        "image-text-record-tablet" => \GIS\EditableImageTextBlock\Templates\ImageTextRecordTablet::class,
        "image-text-record-mobile" => \GIS\EditableImageTextBlock\Templates\ImageTextRecordMobile::class,

        "image-text-record-two-thirds" => \GIS\EditableImageTextBlock\Templates\ImageTextRecordTwoThirds::class,
    ],
];
