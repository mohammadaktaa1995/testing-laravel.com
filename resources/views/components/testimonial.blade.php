<div class="bg-white max-w-sm px-12 py-6 {{ $class ?? '' }}">
    <p class="{{ $textClass }}">
        {{ $slot }}
    </p>

    <a target="_blank" rel="noopener noreferrer" href="https://twitter.com/{{ $handle ?? '' }}" class="mt-4 mb-2 flex items-center text-lg">
        <div class="-ml-4 mr-4">
            <div class="absolute -top-1 -left-0.5 w-10 h-10 rounded-full bg-red-200"></div>
            <div class="rounded-full overflow-hidden">
                <img loading="lazy" src="/images/testimonials/{{ $avatar ?? '' }}" class="rounded-full w-10 h-10 mix-blend-multiply" alt="{{ $name ?? '' }}">
            </div>
        </div>
        <div>
            <div class="font-semibold">{{ $name ?? '' }}</div>
            <div class="-mt-1 text-xs">
                {{ $title ?? '' }}
            </div>
        </div>
    </a>

    <img class="absolute w-[110%] h-[115%] left-[-5%] top-[-5%] max-w-none" src="/images/frame-0{{ $frame ?? '1' }}.svg" alt=''>
</div>
