<section class="js-blog-list-section @if($spacing){{ $spacing }}@endif" style="{{ $section_style }}">
    <div class="container px-4 mx-auto">

        @if ($title || $description)
            <div class="flex justify-center lg:mb-20 mb-12">
                <div class="lg:w-1/2 w-full text-center">
                    @if ($title)
                        <p class="font-dm text-5xl font-bold leading-tight tracking-tight mb-4">
                            {{ $title }}
                        </p>
                    @endif
                    @if ($description)
                        <div class="font-poppins text-base leading-6 font-normal mb-5 opacity-90">
                            {!! $description !!}
                        </div>
                    @endif
                </div>
            </div>
        @endif

        @if ($posts)
            <div class="js-blog-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 lg:gap-y-32 gap-y-8"
                data-limit="{{ $posts_per_page }}">
                @foreach ($posts as $index => $post)
                    <div class="js-blog-item {{ $index >= $posts_per_page ? 'hidden' : '' }}">
                        @include('partials.blog-card', ['post' => $post])
                    </div>
                @endforeach
            </div>

            @if (count($posts) > $posts_per_page)
                <div class="flex justify-center mt-20">
                    <a href="#"
                        class="js-load-more inline-flex items-center justify-center px-8 py-4 border-2 border-current opacity-80 hover:opacity-100 rounded-full font-poppins font-bold text-base leading-6 transition-opacity">
                        Továbbiak betöltése
                    </a>
                </div>
            @endif
        @endif

    </div>
</section>