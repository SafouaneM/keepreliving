<div class="max-w-4xl mx-auto mt-10 space-y-6 px-4">
<p>yoyo form hier maken</p>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <x-form.input wire:model="form.name" placeholder="Name" label="Name" for="form.name"/>
            <x-form.error name="form.name"/>
        </div>
        <button class="bg-green-300" type="submit">Save</button>
    </form>
</div>
