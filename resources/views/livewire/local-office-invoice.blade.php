<div>
    {{-- Success is as dangerous as failure. --}}
    @if($addmode===true)
        <form wire:submit.prevent='invoice'>
            @if($custompackage==1)
            <div class="flex flex-wrap">
                <label for="cf" class="block mt-8 mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('Custom Fee') }}:
                </label>
            
                <input id="cf" type="number"
                    class="form-input text-black w-full @error('cf') border-red-500 @enderror"
                    wire:model="cf" required autofocus>
            
                @error('cf')
                <p class="mt-4 text-xl italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>
            @endif
            <div class="flex flex-wrap">
                <label for="hf" class="block mt-8 mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('Handlers Fee') }}:
                </label>
            
                <input id="hf" type="number"
                    class="form-input text-black w-full @error('HandlerFees') border-red-500 @enderror"
                    wire:model="HandlerFees" required autofocus>
            
                @error('HandlerFees')
                <p class="mt-4 text-xl italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>

        <div class="flex flex-wrap justify-center w-full align-items-center">
            <button type="submit"
            class="inline-flex items-center justify-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 disabled:opacity-50">
            <svg wire:loading wire:target="invoice" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <span>Generate</span>
        </button>
            <p class="w-full my-6 text-xs text-center text-gray-700 sm:text-sm sm:my-8">
                {{-- {{ __('Already have an account?') }}
                <a class="text-blue-500 no-underline hover:text-blue-700 hover:underline" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a> --}}
            </p>
        </div>
        </form>
    @else
    @if($package!=null)
        <table class="min-w-full bg-white ">
            <thead class="text-white bg-gray-800">
                <tr>
                    <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Memebr Name</th>
                    <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Package Name</th>
                    <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Description</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($package as $index)
                @foreach($index as $info)
                {{--  {{dd($member)}}  --}}
                @if($info['package']['member']['id']==$member['member_id'])
                <tr>
                    {{--  <td class="w-1/3 px-4 py-3 text-left">Test</td>  --}}
                    <td class="w-1/3 px-4 py-3 text-left">{{$info['package']['member']['fname'].' '.$info['package']['member']['lname']}}</td>
                    <td class="w-1/3 px-4 py-3 text-left">{{$info['package']['package_name']}}</td>
                    <td class="w-1/3 px-4 py-3 text-left">{{$info['package']['package_desc']}}</td>
                </tr>
                @endif
                @endforeach
                @endforeach
            </tbody>
        </table>
        <a href="" wire:click.prevent="addmode()">
            <button type="submit"
                class="inline-flex items-center justify-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 disabled:opacity-50">
                <svg wire:loading wire:target="addmode()" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <span>Generate Invoice</span>
            </button>
            
        </a>
        {{--  {{$PTN}}  --}}
    @else
    @if ($successMsg=="Invoice Generated Successfully")
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
    @endif
    <form wire:submit.prevent="search">
        <input type="text"  class="w-full form-input" placeholder="Search" wire:model.fire="PTN" />
        <div class="flex flex-wrap justify-center w-full align-items-center">
            <button type="submit"
            class="inline-flex items-center justify-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 disabled:opacity-50">
            <svg wire:loading wire:target="search" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <span>Search</span>
        </button>
        </form>
        <h1 class="w-full px-4 py-3 text-center">Enter Member Search!</h1>
    @endif
    @endif
</div>
