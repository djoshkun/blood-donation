@extends('layouts.app')
@section('body')
<div class="user-info tables">
    <p class="user-info__title">Списък от всички потребители</p>
    <a class="action-btn" href="{{route('users.create')}}"><i class="fas fa-plus"></i> Добави потребител</a>
    {!! Form::open(['method'=>'GET','route'=>['users.index'],'class' => 'users-form']) !!}
    <div class="row">
        {!! Form::select('role',$user->roles,$role,['placeholder'=>'-избери тип потребител-', 'id' => 'user_role', 'class' => 'rounded-dropdown']) !!}
    </div>
    {!! Form::button('покажи',['type' => 'submit','class' => 'red-btn']) !!}
    {!! Form::close() !!}
    <table class="table">
        <tr>
            <th>№</th>
            <th>Email</th>
            <th>Тип</th>
            <th>Активност</th>
            <th>Действия</th>
        </tr>
        {!! Form::hidden('i', $i=0) !!}
        @foreach($users as $user)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->type}}</td>
            <td>{{$user->active}}</td>
            <td>
                @if($user->role === 'ROLE_PATIENT')
                <a class="action-btn" href="{{route('patients.edit', $user)}}"><i class="fas fa-pencil-alt"></i> Редактирай</a>
                @else
                <a class="action-btn" href="{{route('users.edit', $user)}}"><i class="fas fa-pencil-alt"></i> Редактирай</a>
                @endif 
                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user]]) !!}
                {!! Form::submit('Изтрий',['class' => 'action-btn']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@stop