<div class="row text-row">
    {!! Form::label('question','Въпрос:') !!}
    <span class="warning"> {{$errors->first('name')}}</span>
    {!! Form::textarea('name',null,['class' => 'groups-description', 'placeholder'=>'Моля въведете']) !!}
</div>
{!! Form::submit($submitButtonText,['class'=>'red-btn setting-btn']) !!}