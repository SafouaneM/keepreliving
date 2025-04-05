<div class="md-3 px-3 py-2 border-2 border-amber-50">
    <form wire:submit="save">
        <x-form.input wire:model="form.email" placeholder="Email" />
        <x-form.error name="form.email"/>
        <x-form.input wire:model="form.name" placeholder="Name"/>
        <x-form.error name="form.name"/>
        <x-form.input wire:model="form.password" placeholder="Password"/>
        <x-form.error name="form.password"/>
        <button class="bg-green-300 hover:bg-green-400" type="submit">Save</button>
    </form>
</div>
