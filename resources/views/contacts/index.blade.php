<x-layout>
    @if(session('success'))
        <x-success message="{{ session('success') }}"/>
    @endif

    @if ($contacts->count())            
        <div class="mx-5">
            @foreach ($contacts as $contact)
                    <ul role="list" class="divide-y divide-gray-100 dark:divide-white/5">
                        <li class="flex items-center justify-between gap-x-6 py-5">
                            <div class="min-w-0">
                                <div class="flex items-start gap-x-3">
                                    <p class="text-sm/6 font-semibold text-gray-900 dark:text-white">{{ $contact->first_name }}
                                        {{ $contact->last_name }}
                                    </p>
                                    @if ($contact->deleted_at == null)
                                        <p class="mt-0.5 rounded-md bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-700 inset-ring inset-ring-green-600/20 dark:bg-green-400/10 dark:text-green-400 dark:inset-ring-green-500/20">Active</p>
                                    @else
                                        <p class="mt-0.5 rounded-md bg-red-50 px-1.5 py-0.5 text-xs font-medium text-red-700 inset-ring inset-ring-red-600/20 dark:bg-red-400/10 dark:text-red-400 dark:inset-ring-red-500/20">Inactive</p>
                                    @endif  
                                </div>
                                <div class="mt-1 flex items-center gap-x-2 text-xs/5 text-gray-500 dark:text-gray-400">
                                    <p class="truncate">Created on {{ $contact->created_at->format('M j, Y') }}</p>
                                </div>
                            </div>
                            <div class="flex flex-none items-center gap-x-4">
                                <a href="#"
                                    class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 sm:block dark:bg-white/10 dark:text-white dark:shadow-none dark:inset-ring-white/5 dark:hover:bg-white/20">View
                                    contact<span class="sr-only"></span></a>
                                <el-dropdown class="relative flex-none">
                                    <button
                                        class="relative block text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                        <span class="absolute -inset-2.5"></span>
                                        <span class="sr-only">Open options</span>
                                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                                            class="size-5">
                                            <path
                                                d="M10 3a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM10 8.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM11.5 15.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                        </svg>
                                    </button>
                                    <el-menu anchor="bottom end" popover
                                        class="w-32 origin-top-right rounded-md bg-white py-2 shadow-lg outline-1 outline-gray-900/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in dark:bg-gray-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10">
                                        @if ($contact->deleted_at == null)
                                            <form action="{{ route('contacts.delete', $contact->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="block px-3 py-1 text-sm/6 text-gray-900 focus:bg-gray-50 focus:outline-hidden dark:text-white dark:focus:bg-white/5">Delete<span
                                                        class="sr-only"></span></button>
                                            </form>
                                            <a href="{{ route('contacts.edit', $contact->id) }}" class="block px-3 py-1 text-sm/6 text-gray-900 focus:bg-gray-50 focus:outline-hidden dark:text-white dark:focus:bg-white/5">Edit</a>
                                        @else
                                            <form action="{{ route('contacts.activate', $contact->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="block px-3 py-1 text-sm/6 text-gray-900 focus:bg-gray-50 focus:outline-hidden dark:text-white dark:focus:bg-white/5">Activate<span
                                                        class="sr-only"></span></button>
                                            </form>
                                        @endif
                                    </el-menu>
                                </el-dropdown>
                            </div>
                        </li>
                    </ul>
            @endforeach
            {{ $contacts->links() }}
        </div>
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
                <a href="{{ route('contacts.create') }}"
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