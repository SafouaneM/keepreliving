@props(['result', 'searchType'])

@php
    use App\Enums\SearchType;

    $isMedia = $searchType === SearchType::Media;

    $previews = $isMedia ? collect() : $result->media->take(3);
    $previewStyles = [
        'top-[22px] left-[75px] rotate-[7deg] group-hover:rotate-[15deg] group-hover:-translate-y-[15px]', // first image
        'top-[22px] left-[8px] -rotate-[7deg] group-hover:-rotate-[15deg] group-hover:-translate-y-[15px]', // second image
        'top-[20px] left-[38px] group-hover:-translate-y-[15px]', // third image
    ];
@endphp

@if ($isMedia)
    <div class="w-36 h-auto">
        <img
            src="{{ $result->getUrl('preview') }}"
            alt="{{ $result->name }}"
            class="w-full h-auto rounded-md shadow object-cover"
        />
        <p class="mt-1 text-base text-center break-words whitespace-normal leading-snug">
            {{ $result->name }}
        </p>
    </div>
@else

<a wire:navigate href="{{ route('folders.show', $result->id) }}">
    <ul class="relative w-36 h-28 scale-90 cursor-pointer group">
        <li class="absolute inset-0 w-full h-full rounded-[0.6rem] z-0"
            style="
                background: linear-gradient(to bottom, #3BAEE4 10%, #0586CC 25%);
                mask-image: url('{{ asset('images/folder-clip.png') }}');
                mask-size: cover;
                mask-repeat: no-repeat;
                mask-mode: luminance;
            ">
        </li>

        @foreach ($previews as $preview)
            <img
                src="{{ $preview->getUrl('preview') }}"
                alt="{{ $result->name }}"
                class="absolute w-16 max-h-20 rounded-[5px] bg-black transition duration-500 bg-contain {{ $previewStyles[$loop->index] }}"
            />
        @endforeach

        <li class="absolute bottom-0 w-full h-[70%] flex justify-center rounded-[0.6rem] z-20 drop-shadow-xl"
            style="background: linear-gradient(to top, #29ABE3 1%, #58CCFF 10%);">
            <p class="w-4/5 mt-1 text-base text-center break-words whitespace-normal leading-snug">
                {{ $result->name }}
            </p>
        </li>
    </ul>
</a>
@endif
