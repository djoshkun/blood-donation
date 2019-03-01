@extends('layouts.app')
@section('body')
<div class="user-info tables">
    <p class="user-info__title">Списък от градове</p>
    <a class="action-btn" href="{{route('cities.create')}}"><i class="fas fa-plus"></i> Добави град</a>
    <table class="table">
        <tr>
            <th>№</th>
            <th>Име</th>
            <th>Дата на добавяне</th>
            <th>Дата на редактиране</th>
            <th>Действия</th>
        </tr>
        {!! Form::hidden('i', $i=0) !!}
        @foreach($cities as $city)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$city->name}}</td>
            <td>{{$city->created_at}}</td>
            <td>{{$city->updated_at}}</td>
            <td>
                <a class="action-btn" href="{{route('cities.edit', $city)}}"><i class="fas fa-pencil-alt"></i> Редактирай</a>
                {!! Form::open(['method' => 'DELETE','route' => ['cities.destroy', $city]]) !!}
                {!! Form::submit('Изтрий',['class' => 'action-btn']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@stop