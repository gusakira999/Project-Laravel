<?php

use App\Livewire\Forms\CategoryForm;
use Flux\Flux;
use Livewire\Component;

new class extends Component
{
    public CategoryForm $form;
    //inisialisasi form
    public function save()
    {
        $this->form->store();
        //tutup modal setelah berhasil menyimpan data
        Flux::modal('create-category')->close();
    }
    //fungsi untuk reset form ketika modal ditutup
    public function resetForm()
    {
        $this->resetValidation();
        $this->form->reset ();
    }

};
?>

<div>
    <flux:modal name="create-category" class="md:w-150" x-on:close="$wire.resetForm()">
        <div class="space-y-8">
            <form class="space-y-8" wire:submit.prevent="save">
            {{-- header --}}
            <div class="space-y-2">
                <flux:heading size="lg" class="text-zinc-900 dark:text-white">
                    Create Category
                </flux:heading>
                <flux:text class="text-zinc-500 dark:text-zinc-400">
                    Add a new category to your account
                </flux:text>
            </div>

            {{-- form field --}}
            <div class="space-y-6">
                <flux:input
                    label="Name"
                    placeholder="Enter category name"
                    wire:model="form.name"
                />

                <flux:textarea
                    label="Description"
                    placeholder="Enter category description"
                    wire:model="form.description"
                />
            </div>
    
            {{-- footer --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200 dark:border-zinc-800">
                <flux:modal.close>
                    <flux:button variant="outline" color="neutral">Cancel</flux:button>
                </flux:modal.close>
                <flux:button variant="primary" color="primary" type="submit">Create</flux:button>
            </div>
                

        </form>
    </flux:modal>
</div>