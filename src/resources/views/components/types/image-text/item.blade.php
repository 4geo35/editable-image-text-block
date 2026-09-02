@props(["item", "index", "hasTitle" => false])
@php($hasImage = $item->recordable->image_id)
<div class="{{ $hasImage ? 'row' : 'w-full lg:w-8/12' }}">
    @if ($hasImage)
        <div class="col w-full lg:w-1/2 ml-auto order-last {{ $index % 2 > 0 ? 'lg:order-last' : 'lg:order-first' }}">
            <div class="h-full flex flex-col justify-center mb-indent-half  2xl:w-[660px] {{ $index % 2 > 0 ? 'ml-auto' : 'mr-auto' }}">
                @if ($item->title)
                    @if ($hasTitle)
                        <h3 class="text-h3-mobile sm:text-h3 font-semibold mb-indent-half">{{ $item->title }}</h3>
                    @else
                        <h2 class="text-h2-mobile sm:text-h2 font-semibold mb-indent-half">{{ $item->title }}</h2>
                    @endif
                @endif
                <div class="prose max-w-none prose-p:leading-6">
                    {!! $item->recordable->markdown !!}
                </div>
                @includeIf("ebtns::web.render-buttons", ["blockItem" => $item])
            </div>
        </div>
        <div class="col w-full lg:w-1/2 relative mb-indent-half lg:mb-0 {{ $index % 2 > 0 ? '' : 'text-right' }}">
            @php($fileName = $item->recordable->image->file_name)
            <a href="{{ route('thumb-img', ['template' => 'original', 'filename' => $fileName]) }}"
               data-fslightbox="lightbox-{{ $item->id }}" class="sticky top-sticky inline-block">
                <picture class="not-prose">
                    <source media="(min-width: 1024px)" srcset="{{ route('thumb-img', ['template' => 'image-text-record', 'filename' => $fileName]) }}">
                    <source media="(min-width: 480px)" srcset="{{ route('thumb-img', ['template' => 'image-text-record-tablet', 'filename' => $fileName]) }}">
                    <img src="{{ route('thumb-img', ['template' => 'image-text-record-mobile', 'filename' => $fileName]) }}" alt="" class="rounded-base">
                </picture>
            </a>
        </div>
    @else
        @if ($item->title)
            @if ($hasTitle)
                <h3 class="text-h3-mobile sm:text-h3 font-semibold mb-indent-half">{{ $item->title }}</h3>
            @else
                <h2 class="text-h2-mobile sm:text-h2 font-semibold mb-indent-half">{{ $item->title }}</h2>
            @endif
        @endif
        <div class="prose max-w-none prose-p:leading-6">
            {!! $item->recordable->markdown !!}
        </div>
        @includeIf("ebtns::web.render-buttons", ["blockItem" => $item])
    @endif
</div>
