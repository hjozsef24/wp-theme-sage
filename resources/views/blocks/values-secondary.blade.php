<section class="@if($spacing){{ $spacing }}@endif" style="{{ $section_style }}">
    <div class="container px-4 mx-auto">
        <div class="flex justify-start lg:mb-24 mb-12">
            <div class="lg:w-7/12 w-full text-left">
                @if ($label)
                    <span class="block font-poppins text-xs font-bold leading-3 uppercase mb-8 opacity-70">
                        {{ $label }}
                    </span>
                @endif

                @if ($title)
                    <p class="font-dm lg:text-5xl text-4xl font-bold lg:leading-14 leading-10 tracking-tight mb-5">
                        {{ $title }}
                    </p>
                @endif

                @if ($description)
                    <p class="font-poppins lg:text-2xl text-base font-normal lg:leading-8 leading-6 tracking-tight opacity-80">
                        {{ $description }}
                    </p>
                @endif
            </div>
        </div>

        @if ($values)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-12">
                @foreach ($values as $value)
                    <div class="flex flex-col">
                        <div class="font-dm text-8 font-bold leading-10 tracking-tight">
                            {{ $value['title'] }}
                        </div>

                        <div class="my-6 h-0.5 w-full bg-current opacity-20"></div>

                        <p class="font-poppins text-base font-medium leading-6 mb-4">
                            {{ $value['subtitle'] }}
                        </p>

                        <p class="font-poppins text-sm font-normal leading-6 opacity-70">
                            {{ $value['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>