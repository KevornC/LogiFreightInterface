<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    {{--  <h1 class="pb-6 text-3xl text-black">Dashboard</h1>  --}}
<table class="min-w-full bg-white ">
    <thead class="text-white bg-gray-800">
        <tr>
            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Member Name</th>
            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Purchase Receipt</th>
        </tr>
    </thead>
    <tbody class="text-gray-700">
        @forelse($qa as $info)
        <tr>
            <td class="w-1/3 px-4 py-3 text-left">{{$info['member']['fname'].' '.$info['member']['lname']}}</td>
            <td class="w-1/3 px-4 py-3 text-left"><a href="{{url('/storage/pr/LogiFreightMember/'.$info['purchase_receipt'])}}" target="_blank">{{$info['purchase_receipt']}}</a></td>
        </tr>
        @empty
        <tr>
        <td colspan="6" class="w-1/3 px-4 py-3 text-center">No records to show</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>


