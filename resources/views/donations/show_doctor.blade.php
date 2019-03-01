@extends('layouts.app')
@section('body')
<div class="user-info">
    <p class="user-info__title">Декларация на донор: {{$donation->donor->fullname}},
        <br>с ЕГН: {{$donation->donor->egn}}, град: {{$donation->donor->city->name}}, пол: {{$donation->donor->gender}},
        <br> дата: {{$donation->created_at}}
    </p>
    <div class="user-info__form">
        @foreach($donation->donorDeclaration->answers as $answer)
        <div class="row">
            <label>{{$answer->question->name}}</label>
            <div class="radios-wrapper">
                <input disabled="disabled" type="radio" {{ $answer->answer =="yes" ? 'checked='.'"'.'checked'.'"' : '' }} value="yes">
                <p>Да</p>
                <input disabled="disabled" type="radio" {{ $answer->answer =="no" ? 'checked='.'"'.'checked'.'"' : '' }} value="no">
                <p>Не</p>
            </div>
        </div>
        @endforeach
    </div><hr>
    <div class="row">
        @if($donation->patient)
        <label>Дарява кръв за:</label> 
        {{$donation->patient->fullName}},
        <label>в блница</label> 
        {{$donation->patient->hospital->name}},
        <label>град:</label>
        {{$donation->patient->hospital->city->name}}
        @else
        <label class="important-text">Дарява кръв безвъзмездно.</label>
        @endif
        <br>
    </div>
    @if(!$donation->flag)
    {!! Form::model($donation,['method'=>'PATCH','route'=>['donations.store.doctor', $donation]]) !!}
    <label class="groups-text">Кръвна група:</label>
    <span class="warning"> {{$errors->first('blood_type')}}</span>
    {{Form::select('blood_type',$donation->donor->bloodTypes,$donation->donor->blood_type,['placeholder'=>'-избери-', 'class' => 'rounded-dropdown blood_type'])}}
    <div class="row text-row">
        <br>{!! Form::label('description','Направени изследвания:') !!}
        <span class="warning"> {{$errors->first('description')}}</span>
        {!! Form::textarea('description',$donation->description,['class' => 'groups-description']) !!}
    </div>
    {!! Form::button('Запамети',['type' => 'submit','class' => 'red-btn setting-btn']) !!}
    {!! Form::close() !!}
    @else
    <br><label class="groups-text">Кръвна група:</label>
    {{Form::select('blood_type',$donation->donor->bloodTypes,$donation->donor->blood_type,['disabled','placeholder'=>'-избери-', 'class' => 'rounded-dropdown blood_type'])}}
    <br><div class="row text-row">
        {!! Form::label('description','Направени изследвания:') !!}
        <span class="warning"> {{$errors->first('description')}}</span>
        {!! Form::textarea('description',$donation->description,['disabled','class' => 'groups-description']) !!}
    </div>
    <div class="row">
        Одобрил декларацията д-р {{$donation->doctor->fullName}}
    </div>
    @endif
</div>
@stop