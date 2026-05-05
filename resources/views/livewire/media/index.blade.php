<div class="max-w-4xl mx-auto mt-10 space-y-6 px-4">
    <form wire:submit.prevent="save" class="space-y-4">
        @filepondScripts
        <x-filepond::upload
            wire:model="form.media"
            max-files="1"
            accepted-file-types="image/jpeg, image/png, image/webp, image/gif, video/mp4"
            image-preview-max-height="180"
        />

        <x-form.error name="form.media" />

        <button type="submit"
                class="w-full rounded-md bg-blue-500 px-4 py-2 hover:bg-blue-600 cursor-pointer text-white">
            Upload Media
        </button>
    </form>

    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-8">
        @forelse ($target->getMedia($collection) as $media)
            <x-media.card
                :media="$media"
                :user="$target->user"
                :selected-folder="$selectedFolder[$media->id] ?? null"
            />
        @empty
            <p class="text-gray-500 col-span-full text-center">No media uploaded yet :o</p>
        @endforelse
    </div>
</div>
