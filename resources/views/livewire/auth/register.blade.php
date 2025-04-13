<div class="relative min-h-screen bg-gradient-to-tr from-[#f3e8ff] via-[#dbeafe] to-[#c7d2fe] overflow-hidden">
    <div class="mx-auto flex min-h-screen max-w-7xl flex-col-reverse items-center justify-center px-8 py-16 lg:flex-row lg:justify-between lg:items-center">

        <div class="z-10 w-full max-w-md rounded-xl bg-white p-8 shadow-2xl lg:mr-12">
            <h2 class="mb-6 text-2xl font-bold text-gray-900 text-center">Sign up</h2>

            <form wire:submit="save" class="space-y-6">
                <x-form.input wire:model="form.email" placeholder="KeepYourselfSafe@gmail.com" label="Email" for="form.email" />
                <x-form.error name="form.email"/>
                <x-form.input wire:model="form.username" placeholder="Name" label="Name" for="form.username"/>
                <x-form.error name="form.username"/>
                <x-form.input type="password" wire:model="form.password" placeholder="Dextoruse321" label="Password" for="form.password"/>
                <x-form.error name="form.password"/>

                    <div class="flex items-center justify-between">
                        <a wire:navigate href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-500">Login?</a>
                    </div>

                <button type="submit" class="w-full rounded-md bg-blue-500 px-4 py-2 text-white hover:bg-blue-600 cursor-pointer">Sign up</button>
            </form>

</div>
        <div class="hidden lg:flex flex-col items-start justify-center max-w-3xl space-y-6 lg:ml-12 drop-shadow-[0_1px_2px_rgba(255,255,255,0.1)]">
            <h1 class="text-5xl font-extrabold leading-tight">
                Start your <span class="text-blue-500 drop-shadow-md">free</span><br />
                environment for all your <span class=" underline underline-offset-4 decoration-blue-400">memories</span> today
            </h1>
                <ul class="space-y-2 text-lg font-medium">
                    <li>✔ Easy access to all your photo's and video's or whatever you want to upload idc</li>
                    <li>✔ Totally <span class="text-blue-500 font-bold">free</span></li>
                    <li>✔ Share your library, quick and easy with a unique code</li>
                </ul>
        </div>
    </div>
</div>
