<div x-data="{ video: false }">
    <div class="group w-full bg-black">
        <img class="w-full opacity-80 group-hover:opacity-100 transition-opacity duration-300" src="/images/example-video.jpg" alt="Video still">
        <div class="absolute top-1/2 h-1/2 w-full flex items-center justify-center cursor-pointer" @click="video = true">
            <div>
                <button class="h-16 px-6 flex items-center bg-black text-white whitespace-nowrap">
                    <span class="mr-3 markup-body-xl">Watch intro video</span>
                    <span class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center">
                        <i class="ml-0.5 fas fa-play text-sm leading-none"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <template x-if="video">
        <div style="background-color:rgba(0,0,0,0.85)" class="fixed inset-0 p-8 lg:p-16 z-50 fix-z flex flex-col items-center justify-center" @keydown.window.escape="video = false">
            <button class="absolute top-0 right-0 m-6 leading-none text-white text-3xl">×</button>
            <div class="w-full h-64 md:h-96 lg:h-full">
                <iframe src="https://player.vimeo.com/video/577803189?autoplay=1" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen class="absolute inset-0 w-full h-full" frameborder="0" @click.away="video = false"></iframe>
            </div>
            <div class="bg-black rounded py-2 px-3 text-white text-xs text-center mt-4">
            </div>
        </div>
    </template>
</div>
