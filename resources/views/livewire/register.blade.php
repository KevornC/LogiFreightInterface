<div>
    <div>
        <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" wire:submit.prevent="Onsubmit" autocomplete="off">
            {{-- @csrf --}}
            @if ($successMsg=="Registration Successfull")
            <div class="p-4 mt-8 rounded-md bg-green-50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium leading-5 text-green-800">
                            {{ $successMsg }}
                        </p>
                    </div>
                    <div class="pl-3 ml-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button
                                type="button"
                                wire:click="$set('successMsg', null)"
                                class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150"
                                aria-label="Dismiss">
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($successMsg=="Registration Failed. Duplicate entries")
            <div class="p-4 mt-8 rounded-md bg-red-50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium leading-5 text-red-800">
                            {{ $successMsg }}
                        </p>
                    </div>
                    <div class="pl-3 ml-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button
                                type="button"
                                wire:click="$set('successMsg', null)"
                                class="inline-flex rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:bg-red-100 transition ease-in-out duration-150"
                                aria-label="Dismiss">
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="flex flex-wrap">
                <label for="fname" class="block mt-8 mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('First Name') }}:
                </label>

                <input id="fname" type="text" class="form-input w-full @error('firstname')  border-red-500 @enderror"
                wire:model="firstname" autofocus>

                @error('firstname')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>
            
            <div class="flex flex-wrap">
                <label for="lname" class="block text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('Last Name') }}:
                </label>

                <input id="lname" type="text" class="form-input w-full @error('lastname')  border-red-500 @enderror"
                wire:model="lastname" autofocus>

                @error('lastname')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap">
                <label for="email" class="block text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('E-Mail Address') }}:
                </label>

                <input id="email" type="email"
                    class="form-input w-full @error('email') border-red-500 @enderror" wire:model="email">

                @error('email')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>
            
            <div class="flex flex-wrap">
                <label for="address" class="block text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('Address') }}:
                </label>

                <input id="address" type="text" class="form-input w-full @error('address')  border-red-500 @enderror"
                wire:model="address" autofocus>

                @error('address')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap">
                <label for="trn" class="block text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('TRN') }}:
                </label>

                <input id="trn" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="000-000-000" class="form-input w-full @error('trn')  border-red-500 @enderror"
                wire:model="trn" autofocus>

                @error('trn')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>
            
            <div class="flex flex-wrap">
                <label for="trn" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('Telephone') }}:
                </label>

                <input id="tel" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="000-000-0000" class="form-input w-full @error('trn')  border-red-500 @enderror"
                wire:model="telephone" autofocus>

                @error('telephone')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap">
                <label for="password" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('Password') }}:
                </label>

                <input id="password" type="password"
                    class="form-input w-full @error('password') border-red-500 @enderror" wire:model="password"
                    >

                @error('password')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap">
                <label for="password-confirm" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('Confirm Password') }}:
                </label>

                <input id="password-confirm" type="password" class="w-full form-input @error('password_confirmation') border-red-500 @enderror"
                wire:model="password_confirmation" >
                @error('password_confirmation')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap justify-center w-full align-items-center">
                <button type="submit"
                class="inline-flex items-center justify-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 disabled:opacity-50">
                <svg wire:loading wire:target="Onsubmit" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <span>Register</span>
            </button>
                <p class="w-full my-6 text-xs text-center text-gray-700 sm:text-sm sm:my-8">
                    {{ __('Already have an account?') }}
                    <a class="text-blue-500 no-underline hover:text-blue-700 hover:underline" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </p>
            </div>
        </form>

</div>
</div>
