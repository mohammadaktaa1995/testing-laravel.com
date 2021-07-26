 @if($couldFetchPrice ?? '')
    @if($discount->active)
        <h4 class="mb-1 font-semibold text-red-500 uppercase tracking-widest">{{ $discount->name }} ending in</h4>
        <div
            class="mb-6 z-10 transform rotate-0 font-normal px-1 py-1"
            style="--transform-rotate: -1.5deg !important">
            <x-countdown :expires="$discount->expiresAt()">
            <span class="bg-red-900 bg-opacity-10 px-1"><span
                    x-text="timer.days">{{ $component->days() }}</span> days</span>
                <span class="bg-red-900 bg-opacity-10 px-1"><span
                        x-text="timer.hours">{{ $component->hours() }}</span> hours</span>
                <span class="bg-red-900 bg-opacity-10 px-1"><span
                        x-text="timer.minutes">{{ $component->minutes() }}</span> minutes</span>
            </x-countdown>
        </div>
    @endif
@endif          

@if(($couldFetchPrice ?? '') && $discount->active)
<div class="markup-body-xl">
    <span class="px-4">
        {{ $priceWithoutDiscount->formattedPrice() }}
        <img loading="lazy" class="absolute inset-0 w-full h-full mix-blend-multiply" src="/images/strike-through.svg">
    </span>
</div>
@endif

<div class="-mt-1 markup-h2">
    @if($couldFetchPrice ?? '')
        {{ $price->formattedPrice() }}
    @else
        –
    @endif    
</div>

<x-buy-button class="mt-8"/>

<p class="mt-12 text-sm text-center">
    VAT will be calculated during checkout by Paddle. 
    <br>We support Purchase Power Parity.
</p>

