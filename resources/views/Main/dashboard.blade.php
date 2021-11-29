  @extends('layouts.MainOffice')

  @section('content')
                    
                      
  {{--start Table--}}
  <!-- component -->
{{--  <section class="h-screen px-4 antialiased text-gray-600 bg-gray-100">  --}}
    <div class="flex flex-col justify-center mt-5">
        <div class="flex justify-between">
            <div>
                {{--  <h4 class="text-sm font-bold text-indigo-600">Hi  </h4>  --}}
                <h1 class="text-4xl font-bold text-indigo-900 mt-">Welcome!</h1>
            </div>
        </div>
        <div>
            <div class="flex mb-20 space-x-10">
                <div class="flex items-center justify-around w-64 p-6 mt-10 ml-40 space-x-2 bg-white shadow-lg rounded-xl">
                    <div>
                        <span class="text-sm font-semibold text-gray-400">Total Package(s) at Warehouse</span>
                        <h1 class="text-2xl font-bold">{{$totalware['totalware']}}</h1>
                    </div>
                    <div>
                        <a href=""><svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
                        </svg></a>
                    </div>
                </div>
                <div class="flex items-center justify-around w-64 p-6 mt-10 space-x-2 bg-white shadow-lg rounded-xl">
                    <div>
                        <span class="text-sm font-semibold text-gray-400">Total Package(s) in Transit</span>
                        <h1 class="text-2xl font-bold">{{$totaltransit['totaltransit']}}</h1>
                    </div>
                    <div>
                        <a href=" "><svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
                        </svg></a>
                    </div>
                </div>
                <div class="flex items-center justify-around w-64 p-6 mt-10 space-x-2 bg-white shadow-lg rounded-xl">
                    <div>
                        <span class="text-sm font-semibold text-gray-400">Total Package(s) at Pickup</span>
                        <h1 class="text-2xl font-bold ">{{$totalshipped['totalshipped']}} </h1>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                        </svg>
                    </div>
                </div>
            </div>
            {{--  <div class="flex mt-10 space-x-10">
                <div class="flex items-center justify-around w-2/3 p-2 bg-white shadow-lg rounded-xl">
                    <div class="space-y-2">
                        <h3 class="text-sm font-semibold text-gray-400">Total Loan Application Reviewed</h3>
                        <h1 class="text-4xl font-bold text-indigo-600"> </h1>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-40 h-40 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>
            </div>  --}}
            <div></div>
            <div></div>
        </div>
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white border border-gray-200 rounded-sm shadow-lg">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Recent Packages Shipped</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead class="text-xs font-semibold text-gray-400 uppercase bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Package Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Package Description</div>
                                </th>
                                {{--  <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left"></div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Country</div>
                                </th>  --}}
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @if($check>=0)
                                @foreach ($packages as $key)
                                    @foreach ($key as $info)
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10 mr-2 sm:mr-3"><img class="rounded-full" src="/image/logo1.png" width="40" height="40" alt="LogiFreight LTD"></div>
                                                <div class="font-medium text-gray-800">{{$info['package']['package_name']}}</div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">{{$info['package']['package_desc']}}</div>
                                        </td>
                                    </tr>
                                @endforeach
                                @endforeach
                            @endif
                            @if($check==0)
                            <tr>
                                <td colspan="2" class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">Not Available</div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{--  </section>  --}}
  @endsection   
