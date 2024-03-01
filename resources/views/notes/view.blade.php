<x-guest-layout>
    <div class="flex justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $note->title }}
        </h2>
    </div>
    <p class="mt-4 mb-2">{{ $note->body }}</p>
    <p class="mt-4 mb-2">Dibuat oleh : {{ $user->name }}</p>
    <p class="mt-2 mb-2">Dibuat pada : {{ $note->created_at }}</p>
    <p class="mt-2 mb-2">Diperbarui pada : {{ $note->updated_at }}</p>
    <div class="flex items-center justify-end mt-12 mb-2 space-x-2 ">
        <x-button href="{{ route('notes.index') }}" flat negative>Kembali</x-button>
    </div>
</x-guest-layout>