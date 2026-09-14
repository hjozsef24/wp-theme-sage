@props([
	'style' => null,
	'link' => null,
	'text' => null
])

@php
	$class = match($style){
		'dark' => 'bg-primary-gray rounded-sm font-medium leading-12 border-solid border border-white px-6 text-white table pointer hover:text-primary-gray hover:bg-white',
	};
	if(is_array($link)):
		$url = $link['url'];
		if($text==null):
			$label = $link['title'];
		endif;
	else:
		$url = $link;
		$label = $text;
	endif;	
@endphp

<a class="{{$class}}" href="{{$url}}" title="{{$label}}" aria-label="{{$label}}">{{$label}}</a>
