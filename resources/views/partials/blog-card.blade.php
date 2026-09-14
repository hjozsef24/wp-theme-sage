@php
    $tag = $post['url'] ? 'a' : 'div';
    $href = $post['url'] ? "href={$post['url']}" : '';
@endphp

<{{ $tag }} {{ $href }} class="group flex flex-col h-full border-b-2 border-current pb-14 border-opacity-20 transition-colors hover:border-opacity-100">
    
    <div class="h-48 w-full rounded-xl overflow-hidden mb-12">
        @if($post['image'])
            <img 
                src="{{ $post['image']['url'] }}" 
                alt="{{ $post['image']['alt'] }}" 
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
            >
        @endif
    </div>

    @if($post['categories'])
        <div class="flex flex-wrap gap-1 mb-5">
            @foreach($post['categories'] as $cat)
                <span 
                    class="rounded px-2 pt-2 pb-1.5 font-poppins text-xs font-bold leading-3 uppercase"
                    style="background-color: {{ $cat['color'] }}"
                >
                    {{ $cat['name'] }}
                </span>
            @endforeach
        </div>
    @endif

    <p class="font-poppins text-2xl font-semibold leading-8 mb-6">
        {!! $post['title'] !!}
    </p>

    <div class="flex items-center justify-between mt-auto">
        
        <div class="flex items-center">
            @if($post['author']['image'])
                <div class="w-6 h-6 rounded-full overflow-hidden mr-3">
                    <img src="{{ $post['author']['image']['url'] }}" alt="{{ $post['author']['name'] }}" class="w-full h-full object-cover">
                </div>
            @endif
            <span class="font-poppins text-sm font-medium leading-6 opacity-70">
                {{ $post['author']['name'] }}
            </span>
        </div>

        <time class="font-poppins text-sm font-medium leading-6 text-right opacity-70">
            {{ $post['date'] }}
        </time>

    </div>

</{{ $tag }}>