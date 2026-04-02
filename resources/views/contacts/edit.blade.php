<x-layout>
    <x-contacts.form :contact="$contact" action="{{ route('contacts.update', $contact->id) }}" method="PUT" btn="Edit"></x-contacts>
</x-layout>