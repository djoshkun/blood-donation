@extends('layouts.app')
@section('body')
<div class="tabs-wrapper">
    <p class="tabs-text">Болница: {{$hospital->name}}, град: {{$hospital->city->name}}</p>
    <ul class="tabs" >
        <li><a href="#tab1" class="tab-active">Доктори</a></li>
        <li><a href="#tab2">Пациенти</a></li>
    </ul>
    <div id="tab1" class="user-info tables">
        <p class="user-info__title">Списък от доктори</p>
        <table class="table">
            <tr>
                <th>№</th>
                <th>Име, Презиме, Фамилия</th>
                <th>Дата на добавяне</th>
                <th>Активност</th>
                <th>Действия</th>
            </tr>
            {{ Form::hidden('i', $i=0) }}
            @foreach($hospital->doctors as $doctor)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$doctor->fullName}}</td>
                <td>{{$doctor->active}}</td>
                <td>{{$doctor->created_at}}</td>
                <td>
                    <a class="action-btn" href="{{route('users.edit', $doctor)}}"><i class="fas fa-pencil-alt"></i> Редактирай</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $doctor]]) !!}
                    {!! Form::submit('Изтрий',['class' => 'action-btn']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div id="tab2" class="user-info tables">
        <p class="user-info__title">Списък от пациенти</p>
        <table class="table">
            <tr>
                <th>№</th>
                <th>Име, Презиме, Фамилия</th>
                <th>Нужни донори</th>
                <th>Намерени донори</th>
                <th>Дата на добавяне</th>
                <th>Действия</th>
            </tr>
            {{ Form::hidden('i', $i=0) }}
            @foreach($hospital->allPatients as $patient)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$patient->fullName}}</td>
                <td>{{$patient->blood_quantity}}</td>
                <td>{{$patient->count_blood_quantity}}</td>
                <td>{{$patient->created_at}}</td>
                <td>
                    <a class="action-btn" href="{{route('patients.edit', $patient)}}"><i class="fas fa-pencil-alt"></i> Редактирай</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $patient]]) !!}
                    {!! Form::submit('Изтрий',['class' => 'action-btn']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@stop