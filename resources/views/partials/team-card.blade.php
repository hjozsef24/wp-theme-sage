<div class="flex flex-col items-start">
     <div class="w-full max-w-sm h-68 mb-5">
         <img src="{{ $member['image']['url'] ?? '' }}" alt="{{ $member['name'] ?? 'Team member' }}"
             class="w-full h-full object-cover rounded-3xl">
             </div>

     <p class="font-poppins lg:text-2xl text-base font-semibold lg:leading-8 leading-6 mb-1">
         {{ $member['name'] }}
     </p>

     <p class="opacity-60 font-poppins lg:text-base text-sm font-normal lg:leading-6 leading-5">
         {{ $member['position'] }}
     </p>
 </div>