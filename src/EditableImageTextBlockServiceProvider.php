<?php

namespace GIS\EditableImageTextBlock;

use GIS\EditableBlocks\Traits\ExpandBlocksTrait;
use GIS\Fileable\Traits\ExpandTemplatesTrait;
use Illuminate\Support\ServiceProvider;
use GIS\EditableImageTextBlock\Livewire\Admin\Types\ImageTextWire;
use Livewire\Livewire;

class EditableImageTextBlockServiceProvider extends ServiceProvider
{
    use ExpandBlocksTrait, ExpandTemplatesTrait;

    public function register(): void
    {
        // Config
        $this->mergeConfigFrom(__DIR__ . "/config/editable-image-text-block.php", 'editable-image-text-block');
    }

    public function boot(): void
    {
        // Views
        $this->loadViewsFrom(__DIR__ . "/resources/views", "eitb");

        // Livewire
        $this->addLivewireComponents();

        // Конфиг
        $this->expandConfiguration();
    }

    protected function expandConfiguration(): void
    {
        $eitb = app()->config["editable-image-text-block"];
        $this->expandTemplates($eitb);
        $this->expandBlocks($eitb);
    }

    protected function addLivewireComponents(): void
    {
        $component = config("editable-image-text-blocks.customImageTextComponent");
        Livewire::component(
            "eitb-image-text",
            $component ?? ImageTextWire::class
        );
    }
}
