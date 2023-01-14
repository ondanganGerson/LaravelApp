<x-app-layout>

<h1 style="margin-top: 20px; margin-left: 15px; font-weight: bold; font-size: 30px">Type A Employee</h1>
<h6 style="margin-top: 20px; margin-left: 15px; font-weight: bold">salary is less than 60k</h6>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Position</th>
            <th scope="col">Salary</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas['typeA'] as $data)
            <tr>
                <td>{{$data['id']}}</td>
                <td>{{$data['firstname'].' '.$data['lastname']}}</td>
                <td>{{$data['position']}}</td>
                <td>P {{$data['salary']}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h1 style="margin-top: 20px; margin-left: 15px; font-weight: bold; font-size: 30px">Type B Employee</h1>
<h6 style="margin-top: 20px; margin-left: 15px; font-weight: bold">salary is more than 60k and less than 100k</h6>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Position</th>
            <th scope="col">Salary</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas['typeB'] as $data)
            <tr>
                <td>{{$data['id']}}</td>
                <td>{{$data['firstname'].' '.$data['lastname']}}</td>
                <td>{{$data['position']}}</td>
                <td>P {{$data['salary']}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h1 style="margin-top: 20px; margin-left: 15px; font-weight: bold; font-size: 30px">Type C Employee</h1>
<h6 style="margin-top: 20px; margin-left: 15px; font-weight: bold">salary is more than 100k</h6>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Position</th>
            <th scope="col">Salary</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas['typeC'] as $data)
            <tr>
                <td>{{$data['id']}}</td>
                <td>{{$data['firstname'].' '.$data['lastname']}}</td>
                <td>{{$data['position']}}</td>
                <td>P {{$data['salary']}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</x-app-layout>