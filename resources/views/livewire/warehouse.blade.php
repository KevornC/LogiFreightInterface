<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    {{--  <h1 class="pb-6 text-3xl text-black">Dashboard</h1>  --}}
<table class="min-w-full bg-white ">
    <thead class="text-white bg-gray-800">
        <tr>
            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Name</th>
            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Description</th>
            <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Weight</th>
            <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Quantity</th>
            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Tracking#</th>
            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Status</th>
        </tr>
    </thead>
    <tbody class="text-gray-700">
        @forelse($wPackages as $info)
        <tr>
            <td class="w-1/3 px-4 py-3 text-left">{{$info['package_id']}}</td>
            <td class="w-1/3 px-4 py-3 text-left">{{$info['package_desc']}}</td>
            <td class="w-1/3 px-4 py-3 text-left">{{$info['weight']}}</td>
            <td class="w-1/3 px-4 py-3 text-left">{{$info['quantity']}}</td>
            <td class="w-1/3 px-4 py-3 text-left">{{$info['Package_TN']}}</td>
            <td class="w-1/3 px-4 py-3 text-left">{{$info['status']}}</td>
            {{--  <td class="w-1/3 px-4 py-3 text-left">${{number_format($totalc,2)}}</td>  --}}
            {{--  <td class="w-1/3 px-4 py-3 text-left">${{number_format($totald,2)}}</td>  --}}
        </tr>
        @empty
        <tr>
        <td colspan="6" class="w-1/3 px-4 py-3 text-center">No records to show</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>


