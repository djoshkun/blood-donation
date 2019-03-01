@extends('layouts.app')
@section('body')
<div class="user-info">
    <p class="user-info__title">Редактиране на потребител</p>
    {!! Form::model($user,['method'=>'PATCH','route'=>['users.update', $user]]) !!}
    @include('users/form',['submitButtonText'=>'Редактирай'])
    {!! Form::close() !!}
</div>
@stop