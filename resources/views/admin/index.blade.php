<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
    </div>
</div>
<h5>Saved Data</h5>
<style>
    td, tr, th{
        border:1px solid black
    }
    ul{
        width: 100%;
        margin: 20px auto;
    }
    ul li{
        display: inline-block;
        list-style: none;
        padding: 10px;
    }
</style>
<table style="width: 100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>Page</th>
        <th>Date</th>
        <th>Count</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datas ?? '' as $data)
    <tr>
        <td>{{$data['id']}}</td>
        <td>{{$data['url']}}</td>
        <td>{{ date('D M Y, H:i:s', strtotime($data['created_at'])) }}</td>
        <td>{{ $data['count'] }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
<ul>
@foreach($count as $c)
    <li>
        @if($c == 0)
            <a href="../admin">1</a>
        @else
            <a href="../admin/{{$c}}">{{$c + 1}}</a>
        @endif
    </li>
@endforeach
</ul>
