@php($hasImage = $item->recordable->image_id)
@if ($hasImage)
    <div class="row">
        <div class="col w-full lg:w-1/2">
            <div class="h-full flex flex-col justify-center">
                @if (! empty($item->title))
                    <h2 class="font-semibold text-2xl mb-indent-half">{{ $item->title }}</h2>
                @endif
                <div class="prose max-w-none">{!! $item->recordable->markdown !!}</div>
            </div>
        </div>
        <div class="col w-full lg:w-1/2">
            @php($fileName = $item->recordable->image->file_name)
            <a href="{{ route('thumb-img', ['template' => 'original', 'filename' => $item->recordable->image->file_name]) }}"
               target="_blank" class="block mr-indent mb-indent basis-auto shrink-0">
                <picture class="not-prose">
                    <source media="(min-width: 1024px)" srcset="{{ route('thumb-img', ['template' => 'image-text-record', 'filename' => $fileName]) }}">
                    <source media="(min-width: 480px)" srcset="{{ route('thumb-img', ['template' => 'image-text-record-tablet', 'filename' => $fileName]) }}">
                    <img src="{{ route('thumb-img', ['template' => 'image-text-record-mobile', 'filename' => $fileName]) }}" alt="" class="rounded-base">
                </picture>
            </a>
        </div>
    </div>
@else
    <div class="w-full lg:w-8/12">
        @if (! empty($item->title))
            <h2 class="font-semibold text-2xl mb-indent-half">{{ $item->title }}</h2>
        @endif
        <div class="prose max-w-none">{!! $item->recordable->markdown !!}</div>
    </div>
@endif
