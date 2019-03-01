@extends('layouts.app')
@section('body')
<div class="user-info">
    <p class="user-info__title">ДЕКЛАРАЦИЯ ЗА КРЪВОДАРИТЕЛИ: {{$declaration->name}}</p>
    <div class="user-info__form">
        {!! Form::hidden('i', $i=0) !!}
        @foreach($declaration->questions as $question)
        <div class="row">
            <a href="{{route('questions.edit', $question)}}">
                <i class="edit-question fas fa-pencil-alt"></i>
            </a>

            {!! Form::open(['method' => 'DELETE','route' => ['questions.destroy', $question]]) !!}
            <button type="submit" class="action-btn"><i class="delete-question fas fa-trash-alt"></i></button>
            {!! Form::close() !!}

            {!! Form::label('question',++$i.'. '.$question->name) !!}
        </div>
        @endforeach
    </div>
    @include('questions/create')
</div>
@stop