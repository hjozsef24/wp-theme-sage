<div class="swiper-slide !h-auto">
    <div class="flex flex-col items-center">

        <div class="w-full h-56 rounded-lg overflow-hidden mb-6">
            @if (!empty($item['image']['url']))
                <img src="{{ $item['image']['url'] }}" alt="{{ $item['title'] ?? '' }}" class="w-full h-full object-cover">
            @endif
        </div>

        <div class="text-center">
            <span class="font-poppins text-base font-normal leading-6 mb-2 block">
                {{ $item['title'] ?? '' }}
            </span>

            <p class="font-poppins text-sm font-normal leading-6 opacity-70">
                {{ $item['description'] ?? '' }}
            </p>
        </div>

    </div>
</div>