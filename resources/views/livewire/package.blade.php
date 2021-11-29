<div>
    {{-- The Master doesn't talk, he acts. --}}
    <!-- component -->
{{--  <div class="relative flex items-center justify-center min-h-screen px-4 py-12 bg-gray-500 bg-center bg-no-repeat bg-cover bg-gray-50 sm:px-6 lg:px-8"
style="background-image: url(https://images.unsplash.com/photo-1532423622396-10a3f979251a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1500&q=80);">  --}}
{{--  <div class="absolute inset-0 z-0 bg-black opacity-60"></div>  --}}
<div class="w-full p-8 space-y-8 bg-white shadow-lg rounded-xl">
<div class="grid grid-cols-1 gap-8">
<div class="flex flex-col ">
        <div class="flex flex-col items-center sm:flex-row">
            {{--  <h2 class="mr-auto text-lg font-semibold">Shop Info</h2>  --}}
            <div class="w-full mt-2 sm:w-auto sm:ml-auto sm:mt-0"></div>
        </div>
        <div class="">
            @if ($successMsg=="Package Added Successfully")
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
            <div class="form">
                
                <form wire:submit.prevent="submit">
                <div class=" md:space-y-2">
                    {{--  <label class="text -gray-600 py-2font-semibold">Company Logo<abbr class="hidden" title="required">*</abbr></label>  --}}
                    <div class="flex items-center py-6">
                        {{--  <div class="flex-none w-12 h-12 mr-4 overflow-hidden border rounded-xl">  --}}
                            {{--  <img class="object-cover w-12 h-12 mr-4" src="https://images.unsplash.com/photo-1611867967135-0faab97d1530?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1352&amp;q=80" alt="Avatar Upload">  --}}
            {{--  </div>  --}}
                            {{--  <label class="cursor-pointer ">  --}}
              {{--  <span class="px-4 py-2 text-sm text-white bg-green-400 rounded-full focus:outline-none hover:bg-green-500 hover:shadow-lg">Browse</span>  --}}
              {{--  <input type="file" class="hidden" :multiple="multiple" :accept="accept">  --}}
            {{--  </label>  --}}
                        </div>
                    </div>
                    <div class="mb-5 font-semibold text-center text-gray-800">Member Info</div>
                
                    <div class="flex flex-col w-full mb-3">
                        <label class="py-2 font-semibold text-gray-600">Member Name</label>
                        <select wire:model="mID" class="block w-full h-10 px-4 border rounded-lg bg-grey-lighter text-grey-darker border-grey-lighter md:w-full " name="integration[city_id]" id="integration_city_id">
                            <option value="">Select Member</option>
                            @forelse ($members as $info)
                            <option value="{{$info['id']}}">{{$info['fname'].' '.$info['lname']}}</option>
                            @empty
                            <option value="">*Not Available*</option>
                            @endforelse
                        </select>
                    </div>
                    @error('mID')
                    <p class="mt-4 text-xs italic text-red-500">
                        {{$message}}
                    </p>
                    @enderror
                    
                    <hr class="mt-10 mb-5 text-gray-500"/>
                    <div class="mb-5 font-semibold text-center text-gray-800">Package Info</div>
                   
                        <div class="w-full mb-3 space-y-2 ">
                            <label class="py-2 font-semibold text-gray-600">Package name </label>
                            <input wire:model="pID" placeholder="IPhone X" class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" type="text"  id="">
                        </div>
                        @error('pID')
                        <p class="mt-4 text-xs italic text-red-500">
                            {{$message}}
                        </p>
                        @enderror
                        
                        <div class="w-full mb-3 space-y-2 ">
                            <label class="py-2 font-semibold text-gray-600">Package Assigned Tracking Number</label>
                            <input wire:model="pATN" placeholder="" class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" type="text"  id="">
                        </div>
                        @error('pATN')
                        <p class="mt-4 text-xs italic text-red-500">
                            {{$message}}
                        </p>
                        @enderror

                    <div class="flex-auto w-full mb-1 space-y-2 ">
                        <label class="py-2 font-semibold text-gray-600">Description</label>
                        <textarea wire:model="pDesc"  name="message" id="" class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Enter package description" spellcheck="false"></textarea>
                      </div>
                        @error('pDesc')
                        <p class="mt-4 text-xs italic text-red-500">
                            {{$message}}
                        </p>
                        @enderror
                        
                    <div class="flex-row w-full md:flex md:space-x-4">
                        <div class="w-full mb-3 space-y-2 ">
                            <label class="py-2 font-semibold text-gray-600">Quantity</label>
                            <input wire:model="quan" class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" type="number"  id="">
                          </div>
                          @error('quan')
                          <p class="mt-4 text-xs italic text-red-500">
                              {{$message}}
                          </p>
                          @enderror
                          
                        <div class="w-full mb-3 space-y-2 ">
                            <label class="py-2 font-semibold text-gray-600">Weight</label>
                            <input wire:model="weight" class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" type="number"  id="">
                            </div>
                            @error('weight')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{$message}}
                            </p>
                            @enderror
                            
                    </div>
                    <div class="w-full mb-3 space-y-2 ">
                        <label class="py-2 font-semibold text-gray-600">Estimated Cost</label>
                        <input wire:model="eCost" placeholder="$" class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" type="text"  id="">
                        </div>
                            @error('eCost')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{$message}}
                            </p>
                            @enderror
                            
                    <hr class="mt-10 mb-5 "/>
                    
                    <div class="mb-5 font-semibold text-center text-gray-800">Shipper Info</div>
                   
                    <div class="flex-row w-full md:flex md:space-x-4">
                        <div class="w-full mb-3 space-y-2 ">
                            <label class="py-2 font-semibold text-gray-600">Name</label>
                            <input wire:model="shipperName" placeholder="Amazon Services" class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" type="text"  id="">
                            </div>
                            @error('shipperName')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{$message}}
                            </p>
                            @enderror
                        <div class="w-full mb-3 space-y-2 ">
                            <label class="py-2 font-semibold text-gray-600">Address</label>
                            <input wire:model="shipperAdd" placeholder="22 Lambert Drive" class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" type="text"  id="">
                            </div>
                            @error('shipperAdd')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{$message}}
                            </p>
                            @enderror
                    </div>
                    <div class="w-full mb-3 space-y-2 ">
                        <label class="py-2 font-semibold text-gray-600">Tracking Number</label>
                        <input  wire:model="shipperTN" placeholder="" class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" type="text"  id="">
                       </div>
                       @error('shipperTN')
                       <p class="mt-4 text-xs italic text-red-500">
                           {{$message}}
                       </p>
                       @enderror
                       <div class="flex flex-wrap justify-center w-full p-10 align-items-center">
                        <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 disabled:opacity-50">
                        <svg wire:loading wire:target="submit" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span>Add</span>
                    </button>
                        <p class="w-full my-6 text-xs text-center text-gray-700 sm:text-sm sm:my-8">
                            {{-- {{ __('Already have an account?') }}
                            <a class="text-blue-500 no-underline hover:text-blue-700 hover:underline" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a> --}}
                        </p>
                    </div>
                </form>
        </div>
                    </div>
                </div>
            {{--  </div>
        </div>  --}}
</div>
