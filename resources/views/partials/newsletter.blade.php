    <form
        action="{{ action(\App\Http\Controllers\SubscribeToEmailListController::class) }}"
        method="post"
        accept-charset="utf-8"
        class="min-w-0 max-w-full flex h-16"
    >
        @csrf

        <div class="min-w-0 bg-white">
            <input
                type="email"
                id="email"
                name="email"
                aria-label="E-mail"
                required
                class="w-full h-16 px-4 {{ isset($onDark) ? 'bg-white text-red-900 bg-opacity-90 focus:bg-opacity-100' : 'bg-blue-500 bg-opacity-10 focus:bg-opacity-5' }} ring-0 focus:outline-none"
            >

        </div>
        <div class="ml-2 group">
            <img class="
            absolute -bottom-2 -right-2 w-full
        " src="/images/button.svg" alt="">
            <button
                type="submit"
                name="submit"
                id="submit"
                class="h-16 px-6 inline-flex items-center
        bg-blue-500 hover:bg-blue-600
        text-base md:text-xl text-white font-sans font-black uppercase tracking-widest
        group-hover:translate-y-[2px] group-hover:translate-x-[2px] transform
        transition-transform duration-300">
                Subscribe
            </button>
        </div>
    </form>

    @error('email')
    <p class="mt-4 text-sm">
                <i class="mr-1 fas fa-exclamation-circle text-red-500 text-xs"></i>
                {{ $message }}
            </p>
    @else
        @if(session()->has('subscribed'))
            <p class="mt-4 text-sm">
                <i class="mr-1 fas fa-check-circle text-green-500 text-xs"></i>
                Thank you for subscribing!
            </p>
        @else
        <p class="mt-4 text-sm">
            Subscribe to get notified when this course is available
        </p>
        @endif
    @endif

    <div x-data="{ open: true }" x-show="open">
        @if(flash()->message)
            <div class="fixed z-50 fix-z top-0 left-0 h-16 w-full flex items-center justify-center py-8 px-4 bg-green-500 border-b border-black border-opacity-50 shadow-xl {{ flash()->class }} md:text-xl text-white text-center">
                <span>{{ flash()->message }}</span>

                <a href="#" @click="open = false" class="p-4 opacity-50 hover:opacity-75">&times;</a>
            </div>
        @endif
    </div>
