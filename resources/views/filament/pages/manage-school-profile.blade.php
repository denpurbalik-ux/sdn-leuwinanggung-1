<x-filament-panels::page>
    <form wire:submit="save">
        <div class="space-y-6">
            {{ $this->form }}
        </div>

        <div class="mt-16 flex gap-3">
            <x-filament::button type="submit" icon="heroicon-o-check">
                Simpan Perubahan
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
