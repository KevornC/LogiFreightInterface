@extends('layouts.member')

@section('content')
<h1 class="pb-6 text-3xl text-black">Dashboard</h1>
<table class="min-w-full bg-white ">
    <thead class="text-white bg-gray-800">
        <tr>
            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Total Shipped Packages</th>
            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Total Packages in Transit</th>
            <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Total Packages at Pickup</th>
        </tr>
    </thead>
    <tbody class="text-gray-700">
        <tr>
            <td class="w-1/3 px-4 py-3 text-left">{{$total[0]['total_packages']}}</td>
            <td class="w-1/3 px-4 py-3 text-left">{{$total[0]['package_transit']}}</td>
            <td class="w-1/3 px-4 py-3 text-left">{{$total[0]['package_pickup']}}</td>
        </tr>

    </tbody>
</table>
@endsection
