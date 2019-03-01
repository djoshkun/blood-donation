@extends('layouts.app')
@section('body')
<div class="user-info tables">
    <p class="user-info__title">Списък от чакащи кръв</p>
    <table class="table">
        <tr>
            <th>№</th>
            <th>Нуждаещ се</th>
            <th>Кръвна група</th>
            <th>Болница</th>
            <th>Нужни донори</th>
            <th>Дата на добавяне</th>
        </tr>
        {{ Form::hidden('i', $i=0) }}
        @foreach($patients as $patient)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$patient->fullName}}
            <td>{{$patient->bloodGroup}}</td>
            <td>{{$patient->hospital->name}}, град: {{$patient->hospital->city->name}}</td>
            <td>{{$patient->blood_quantity === 1 ? $patient->blood_quantity - $patient->count_blood_quantity.' човек' : $patient->blood_quantity - $patient->count_blood_quantity.' човека'}}</td>
            <td>{{$patient->created_at}}</td>
        </tr>
        @endforeach
    </table>
</div>
@stop