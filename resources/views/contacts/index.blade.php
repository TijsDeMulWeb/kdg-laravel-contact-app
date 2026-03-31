<x-layout>
    @if(session('success'))
        <div class="rounded-md bg-green-50 p-4 dark:bg-green-500/10 dark:outline dark:outline-green-500/20 m-3">
            <div class="flex">
                <div class="shrink-0">
                    <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                        class="size-5 text-green-400">
                        <path
                            d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                            clip-rule="evenodd" fill-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800 dark:text-green-300">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if ($contacts->count())
        @foreach ($contacts as $contact)
            <div class="mx-5">
                <ul role="list" class="divide-y divide-gray-100 dark:divide-white/5">
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt=""
                                class="size-12 flex-none rounded-full bg-gray-50 dark:bg-gray-800 dark:outline dark:-outline-offset-1 dark:outline-white/10" />
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm/6 font-semibold text-gray-900 dark:text-white">{{ $contact->first_name }}
                                    {{ $contact->last_name }}
                                </p>
                                <p class="mt-1 truncate text-xs/5 text-gray-500 dark:text-gray-400">{{ $contact->email }}
                                </p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm/6 text-gray-900 dark:text-white">Co-Founder / CEO</p>
                            <p class="mt-1 text-xs/5 text-gray-500 dark:text-gray-400">Last seen <time
                                    datetime="2023-01-23T13:23Z">3h ago</time></p>
                        </div>
                    </li>
                </ul>
            </div>
        @endforeach
    @else
        <div class="text-center mt-3">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"
                class="mx-auto size-12 text-gray-400 dark:text-gray-500">
                <path d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"
                    stroke-width="2" vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <h3 class="mt-2 text-sm font-semibold text-gray-900 dark:text-white">No contacts</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by creating a new contact.</p>
            <div class="mt-6">
                <a href="/contacts/create"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:hover:bg-indigo-400 dark:focus-visible:outline-indigo-500">
                    <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                        class="mr-1.5 -ml-0.5 size-5">
                        <path
                            d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                    </svg>
                    New Contact
                </a>
            </div>
        </div>
    @endif

</x-layout>