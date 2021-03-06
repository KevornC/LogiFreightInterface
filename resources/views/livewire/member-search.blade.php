<div>
    {{-- Success is as dangerous as failure. --}}
    
    @if($member!=null)
        <table class="min-w-full bg-white ">
            <thead class="text-white bg-gray-800">
                <tr>
                    <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Name</th>
                    <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Email</th>
                    <th class="px-4 py-3 text-sm font-semibold text-left uppercase">TRN</th>
                    <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Address</th>
                    <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Telephone</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($member as $info)
                <tr>
                    {{--  <td class="w-1/3 px-4 py-3 text-left">Test</td>  --}}
                    <td class="w-1/3 px-4 py-3 text-left">{{$info['fname'].' '.$info['lname']}}</td>
                    <td class="w-1/3 px-4 py-3 text-left">{{$info['email']}}</td>
                    <td class="w-1/3 px-4 py-3 text-left">{{$info['trn']}}</td>
                    <td class="w-1/3 px-4 py-3 text-left">{{$info['address']}}</td>
                    <td class="w-1/3 px-4 py-3 text-left">{{$info['telephone']}}</td>
                    {{--  <td class="w-1/3 px-4 py-3 text-left">${{number_format($totalc,2)}}</td>
                    <td class="w-1/3 px-4 py-3 text-left">${{number_format($totald,2)}}</td>  --}}
                </tr>
                @endforeach
            </tbody>
        </table> 
        {{--  {{$PTN}}  --}}
    @else
    <form wire:submit.prevent="search">
        <input type="text"  class="w-full form-input" placeholder="Search" wire:model="searchTerm" />
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
        <h1 class="w-full px-4 py-3 text-center">Enter Member Full Name To Search!</h1>
    @endif
</div>
