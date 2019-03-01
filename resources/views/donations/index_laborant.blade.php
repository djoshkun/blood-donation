@extends('layouts.app')
@section('body')
<div class="tabs-wrapper">
    <ul class="tabs" >
        <li><a href="#tab1" class="tab-active">Tab 1</a></li>
        <li><a href="#tab2">Tab 2</a></li>
    </ul>
    <div id="tab1" class="user-info tables">
        <p class="user-info__title">Списък от чакащи дарения за резултати</p>
        <table class="table">
            <tr>
                <th>№</th>
                <th>Име</th>
                <th>ЕГН</th>
                <th>Пол</th>
                <th>СПИН/ХИВ</th>
                <th>Хепатит В</th>
                <th>Хепатит С</th>
                <th>Сифилис</th>
                <th>Действие</>
            </tr>
            {{ Form::hidden('i', $i=0) }}
            @foreach($waiting_donations as $donation)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$donation->donor->fullName}}</td>
                <td>{{$donation->donor->egn}}</td>
                <td>{{$donation->donor->gender}}</td>
                {!! Form::model($donation,['method'=>'PATCH','route'=>['donations.update.laborant',$donation]]) !!}
                <td>{!! Form::select('hiv_spin['.$donation->id.']',$donation->results,null,['placeholder'=>'-избери-', 'class' => '']) !!}</td>
                <td>{!! Form::select('hepatitis_b['.$donation->id.']',$donation->results,null,['placeholder'=>'-избери-', 'class' => '']) !!}</td>
                <td>{!! Form::select('hepatitis_c['.$donation->id.']',$donation->results,null,['placeholder'=>'-избери-', 'class' => '']) !!}</td>
                <td>{!! Form::select('syphilis['.$donation->id.']',$donation->results,null,['placeholder'=>'-избери-', 'class' => '']) !!}</td>
                <td>{!! Form::button('Запамети',['type' => 'submit','class' => 'red-btn setting-btn']) !!}</td>
                {!! Form::close() !!}
            </tr>
            @endforeach
        </table>
    </div>
    <div id="tab2" class="user-info tables">
        <p class="user-info__title">Списък от направени изследвания</p>
        <table class="table">
            <tr>
                <th>№</th>
                <th>Дата</th>
                <th>Име, Презиме, Фамилия</th>
                <th>ЕГН</th>
                <th>Пол</th>
                <th>СПИН/ХИВ</th>
                <th>Хепатит В</th>
                <th>Хепатит С</th>
                <th>Сифилис</th>
            </tr>
            {{ Form::hidden('i', $i=0) }}
            @foreach($donations as $donation)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$donation->created_at}}</td>
                <td>{{$donation->donor->fullName}}</td>
                <td>{{$donation->donor->egn}}</td>
                <td>{{$donation->donor->gender}}</td>
                <td>{{$donation->hiv_spin}}</td>
                <td>{{$donation->hepatitis_b}}</td>
                <td>{{$donation->hepatitis_c}}</td>
                <td>{{$donation->syphilis}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@stop