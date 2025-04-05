<div>
    <form wire:submit="save">
    <x-form.input type="text" wire:model="form.email" placeholder="Name" />
    <x-form.error name="form.email"/>
    <x-form.input type="text" wire:model="form.password" placeholder="pw" />
    <x-form.error name="form.password"/>
    <button type="submit">Login</button>
    </form>
</div>
