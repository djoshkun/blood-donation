@extends('layouts.app')
@section('body')
<div class="user-info tables">
    <p class="user-info__title">Резултати от даренията</p>
    <table class="table">
        <tr>
            <th>№</th>
            <th>Дарил за</th>
            <th>Дата</th>
            <th>СПИН/ХИВ</th>
            <th>Хепатит В</th>
            <th>Хепатит С</th>
            <th>Сифилис</th>
        </tr>
        {{ Form::hidden('i', $i=0) }}
        @foreach($user->donations as $donation)
        <tr>
            <td>{{++$i}}</td>
            <td>
                @if($donation->patient)
                {{$donation->patient->fullName}}
                ,{{$donation->patient->hospital->name}},
                {{$donation->patient->hospital->city->name}}
                @else
                Безвъзмездно
                @endif
            </td>
            <td>{{$donation->created_at}}</td>
            <td>
                @if($donation->hiv_spin)
                {{$donation->hiv_spin}}
                , Д-р {{$donation->laborant->name}} {{$donation->laborant->surname}}
                @else
                Изследването не е готов
                @endif
            </td>
            <td>
                @if($donation->hepatitis_b)
                {{$donation->hepatitis_b}}
                , Д-р {{$donation->laborant->name}} {{$donation->laborant->surname}}
                @else
                Изследването не е готов
                @endif
            </td>
            <td>
                @if($donation->hepatitis_c)
                {{$donation->hepatitis_c}}
                , Д-р {{$donation->laborant->name}} {{$donation->laborant->surname}}
                @else
                Изследването не е готов
                @endif
            </td>
            <td>
                @if($donation->syphilis)
                {{$donation->syphilis}}
                , Д-р {{$donation->laborant->name}} {{$donation->laborant->surname}}
                @else
                Изследването не е готов
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
@stop