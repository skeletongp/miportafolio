<div>

    <div>
        <a role="button" class="bg-gray-200 p-1 rounded-full flex items-center" wire:click="toggleModal">
            <span class="fas fa-plus text-xl"></span>
        </a>
    </div>
    @stack('modals')

    <div>
        <x-jet-dialog-modal wire:model="open">
            <x-slot name="title">
                <h1 class="uppercase font-bold text-2xl text-center">Nueva Etiqueta</h1>
            </x-slot>
            <x-slot name="content">
                <div class="lg:flex lg:space-x-2 ">
                    <div class="lg:w-1/3 my-2 space-y-2">
                        <x-jet-label for="label">Label</x-jet-label>
                        <x-jet-input type="text" wire:model.defer="title" id="label" class="w-full" ></x-jet-input>
                    </div>
                    <div class="lg:w-2/3 my-2 space-y-2">
                        <x-jet-label for="meta">Meta Descripción</x-jet-label>
                        <x-jet-input type="text" wire:model.defer="meta"  id="meta" class="w-full"></x-jet-input>
                        <x-jet-input-error for="meta"></x-jet-input-error>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-button
                id="save_button"
                wire:click="save_label">Guardar</x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
    <script >
       $(document).ready(function() {
               $('#save_button').on('click', function(e){
                   e.preventDefault();
               })
            });
    </script>
</div>
