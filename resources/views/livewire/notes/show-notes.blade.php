<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with():array
    {
        return [
            'notes'=>Auth::user()
            ->notes()
            ->orderby('send_date', 'asc')
            ->get(),
        ];
    }
}; ?>

<div>
    @if ($notes->isEmpty())
        <div class="text-center">
            <p>Belum ada Notes</p>
            <br>
            <x-button primary icon-right="plus">Buat Notes</x-button>
        </div>
        
        
    @else
        <div class="space-y-3">
            <div class="grid-cols-2 gap-4 mt-12">
                @foreach ($notes as $note)
                    <x-card wire:key='{{ $note->id }}'>
                        <div class='flex justify-between'>
                            <a href="#" class="font-bold text-x1 hover:underline hover:text-blue-500">{{ $note->title}}</a>
                            <div class="text-xs text-gray-500">{{  \Carbon\Carbon::parse( $note->send_date)->format("M-d-Y") }}</div>
                        </div>
                        <div class="flex items-end justify-between mt-4 space-x-1">
                            <p class="text-xs">Recipient: <span class="font-semibold">{{ $note->recipient }}</span></p>
                            <div>
                                <x-button.circle icon="eye"></x-button.circle>
                                <x-button.circle icon="trash"></x-button.circle>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endif
    </div>
</div>
