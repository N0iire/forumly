<div class="px-2 py-1 text-xs pb-1 text-gray-500 transition duration-100 bg-red-400 rounded hover:bg-red-500">

    <a wire:click="confirmThreadDeletion" wire:loading.attr="disabled" class="cursor-pointer">
        Delete
    </a>

    <x-jet-dialog-modal wire:model="confirmingThreadDeletion">
        <x-slot name="title">
            {{ __("Hapus Postingan") }}
        </x-slot>

        <x-slot name="content" class="text-gray-500">
            {{ __('Apakah anda yakin ingin menghapus postingan?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingThreadDeletion')" wire:loading.attr="disabled">
                {{ __("Cancel") }}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="deleteThread" wire:loading.attr="disabled">
                {{ __('Hapus Postingan') }}
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
