<footer class="bg-black py-12">
    <x-layout>
        <nav class="w-full">
            <ul class="grid grid-flow-col gap-12 items-center justify-center">
                <li><a class="block w-16
                hover:text-spatie
                transition-colors duration-300" href="https://spatie.be">
                    @include('partials.logoSpatie')
                </a></li>
                <li><a class="text-white text-sm hover:underline" href="{{ route("privacy") }}">Privacy</a></li>
                <li><a class="text-white text-sm hover:underline" href="{{ route("termsOfUse") }}">Terms of Use</a></li>
            </ul>
        </nav>
    </x-layout>
</footer>
