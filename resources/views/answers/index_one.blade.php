@extends('layouts.app')
@section('body')
<div class="user-info">
    <p class="user-info__step">СТЪПКА 1</p>
    <p class="user-info__title">МОЛЯ ОТГОВОРЕТЕ НА СЛЕДНИТЕ ВЪПРОСИ</p>
    {!! Form::model($answer=new App\Answer,['class' => 'user-info__form','method' =>'POST','route'=>['answers.store.one']]) !!}
    {!! Form::hidden('i', $i=0) !!}
    @foreach($declaration->questions as $question)
    <div class="row">
        {!! Form::label('question',++$i.'. '.$question->name) !!}
        <div class="radios-wrapper">
            <input type="radio" {{ old('answer.' . $question->id) =="yes" ? 'checked='.'"'.'checked'.'"' : '' }}  name="answer[{{$question->id}}]" value="yes">
                   <p>Да</p>
            <input type="radio" {{ old('answer.' . $question->id) =="no" ? 'checked='.'"'.'checked'.'"' : '' }} name="answer[{{$question->id}}]" value="no">
                   <p>Не</p>
            <span class="warning">{{$errors->first('answer.' . $question->id)}}</span>
        </div>
    </div>
    @endforeach
    {!! Form::button('КЪМ СЛЕДВАЩА СТЪПКА >>',['type' => 'submit','class' => 'red-btn setting-btn']) !!}
    {!! Form::close() !!}
</div>
@stop