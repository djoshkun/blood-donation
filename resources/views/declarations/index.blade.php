@extends('layouts.app')
@section('body')
<div class="user-info tables">
    <p class="user-info__title">Списък от всички декларациии</p>
    <a class="action-btn" href="{{route('declarations.create')}}"><i class="fas fa-plus"></i> Добави декларация</a>
    <table class="table">
        <tr>
            <th>№</th>
            <th>Име</th>
            <th>Активност</th>
            <th>Дата на добавяне</th>
            <th>Дата на редактиране</th>
            <th>Действия</th>
        </tr>
        {!! Form::hidden('i', $i=0) !!}
        @foreach($declarations as $declaration)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$declaration->name}}</td>
            <td>{{$declaration->active}}</td>
            <td>{{$declaration->created_at}}</td>
            <td>{{$declaration->updated_at}}</td>
            <td>
                <a class="action-btn" href="{{route('declarations.show',['admin' => $declaration])}}"><i class="fas fa-users"></i> Избери</a>
                <a class="action-btn" href="{{route('declarations.edit', $declaration)}}"><i class="fas fa-pencil-alt"></i> Редактирай</a>
                {!! Form::open(['method' => 'DELETE','route' => ['declarations.destroy', $declaration]]) !!}
                {!! Form::submit('Изтрий',['class' => 'action-btn']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@stop