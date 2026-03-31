<x-layout>
    <x-contacts.form :contact="$contact" action="/contacts/{{ $contact->id }}/edit" method="PUT" btn="Edit"></x-contacts>
</x-layout>