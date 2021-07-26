<a href="{{ $url }}" class="group max-w-xs">
    <div class="bg-transparent p-4">
        <img class="" width="750 " height="900" alt="{{ $alt }}" loading="lazy" src="{{ $src }}">
        <img alt="" class="absolute w-full h-full top-0 left-0 group-hover:transform group-hover:scale-105 transition-transform duration-150" loading="lazy" src="{{ $frame }}">
    </div>
    <div class="pt-6 px-2 text-xs text-center">
        <p class="leading-relaxed">
            {{ $short }}
        </p>
        <p class="mt-2">
            <span class="font-semibold underline">{{ str_replace('https://','', $url) }}</span>
        </p>
    </div>
</a>
