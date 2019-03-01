@extends('layouts.app')
@section('body')
<div class="tabs-wrapper">
    <ul class="tabs" >
        <li><a href="#tab1" class="tab-active">Tab 1</a></li>
        <li><a href="#tab2">Tab 2</a></li>
    </ul>
    <div id="tab1" class="user-info tables">
        <p class="user-info__title">Списък от чакащи декларации за кръводаряване</p>
        <table class="table">
            <tr>
                <th>№</th>
                <th>Име, Презиме, Фамилия</th>
                <th>ЕГН</th>
                <th>Пол</th>
                <th>Дата на попълване</t>
                <th>Действия</th>
            </tr>
            {{ Form::hidden('i', $i=0) }}
            @foreach($waiting_declarations as $declaration)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$declaration->donor->fullName}}</td>
                <td>{{$declaration->donor->egn}}</td>
                <td>{{$declaration->donor->gender}}</td>
                <td>{{$declaration->created_at}}</td>
                <td>
                    <a class="action-btn" href="{{route('donations.show.doctor',$declaration)}}"><i class="fas fa-users"></i> Избери</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['donations.destroy.doctor', $declaration]]) !!}
                    {!! Form::submit('Изтрий',['class' => 'action-btn']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div id="tab2" class="user-info tables">
        <p class="user-info__title">Списък от online попълнени декларации за кръводаряване</p>
        <table class="table">
            <tr>
                <th>№</th>
                <th>Име, Презиме, Фамилия</th>
                <th>ЕГН</th>
                <th>Пол</th>
                <th>Дата на попълване</t>
                <th>Действия</th>
            </tr>
            {{ Form::hidden('i', $i=0) }}
            @foreach($declarations as $declaration)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$declaration->donor->fullName}}</td>
                <td>{{$declaration->donor->egn}}</td>
                <td>{{$declaration->donor->gender}}</td>
                <td>{{$declaration->created_at}}</td>
                <td>
                    <a class="action-btn" href="{{route('donations.show.doctor',$declaration)}}"><i class="fas fa-users"></i> Избери</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@stop