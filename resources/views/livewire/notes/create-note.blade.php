<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteDesc;
    public $noteRecipient;
    public $noteSendDate;

    public function submit()
    {
        $validated = $this->validate([
            'noteTitle'=>['required', 'string', 'min:5'],
            'noteDesc'=>['required', 'string', 'min:15'],
            'noteRecipient'=>'required',
            'noteSendDate'=>'required'
    ]); 

    auth()
        ->user()
        ->notes()
        ->create([
        'title'=>$this->noteTitle,
        'desc'=>$this->noteDesc,
        'recipient'=>$this->noteRecipient,
        'send_date'=>$this->noteSendDate,
        'is_published'=>false
    ]);
    
    redirect(route('notes.index'));
    }
}; ?>

<div>
    <form wire:submit='submit' class='space-y-3' action="">
        <x-input wire:model='noteTitle' label='Judul' />
        <x-textarea wire:model='noteDesc' label='Deskripsi' />
        <x-input wire:model='noteRecipient' label='Recipient' />
        <x-input wire:model='noteSendDate' type='date' label='Send Date' />
        <x-button wire:click='submit'>Submit</x-button>
    </form>
</div>
