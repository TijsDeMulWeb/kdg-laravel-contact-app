@props([
    'contact' => null,
    'method' => null,
    'btn' => 'Save'
])

<form action="/contacts/store" method="POST">
    @csrf
    @if ($method)
        @method($method)
    @endif

    <div class="border-b border-gray-900/10 pb-12 dark:border-white/10 m-3">
        <h2 class="text-base/7 font-semibold text-gray-900 dark:text-white">Contact Information</h2>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="firstName" class="block text-sm/6 font-medium text-gray-900 dark:text-white">First name</label>
                <div class="mt-2">
                    <input id="firstName" type="text" name="firstName" autocomplete="given-name" value="{{ old('first_name', $contact->first_name) }}"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500" />
                </div>
                <x-form.error name='firstName' />
            </div>

            <div class="sm:col-span-3">
                <label for="lastName" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Last
                    name</label>
                <div class="mt-2">
                    <input id="lastName" type="text" name="lastName" autocomplete="family-name" value="{{ old('last_name', $contact->last_name) }}"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500" />
                </div>
                <x-form.error name='lastName' />
            </div>

            <div class="sm:col-span-6">
                <label for="email" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Email
                    address</label>
                <div class="mt-2">
                    <input id="email" type="email" name="email" autocomplete="email" value="{{ old('email', $contact->email) }}"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-basæe text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500" />
                </div>
                <x-form.error name='email' />
            </div>
        </div>
    </div>


    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/contacts" class="text-sm/6 font-semibold text-gray-900 dark:text-white">
            Cancel
        </a>
        <button type="submit"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:focus-visible:outline-indigo-500">{{ $btn }}</button>
    </div>
</form>