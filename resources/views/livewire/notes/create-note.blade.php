<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteSendDate;

    public function submit()
    {
        $validated = $this->validate([
            'noteTitle' => ['required', 'string', 'min:5'],
            'noteBody' => ['required', 'string', 'min:20'],
            'noteSendDate' => ['required', 'date'],
        ]);

        auth()
            ->user()
            ->notes()
            ->create([
                'title' => $this->noteTitle,
                'body' => $this->noteBody,
                'send_date' => $this->noteSendDate,
                'is_published' => true,
            ]);

        redirect(route('notes.index'));
    }
}; ?>

<div>
    <form wire:submit='submit' class="space-y-4">
        <x-input wire:model="noteTitle" label="Judul" />
        <x-textarea wire:model="noteBody" label="Deskripsi" />
        <x-input icon="calendar" wire:model="noteSendDate" type="date" label="Tanggal" />
        <div class="pt-4">
            <x-button type="submit" primary right-icon="calendar" spinner>Simpan</x-button>
        </div>
        <x-errors />
    </form>
</div>