{!! Form::label('name','Име:') !!}
<span class="warning"> {{$errors->first('name')}}</span>
{!! Form::text('name',$city->name,['placeholder'=>'Моля въведете']) !!}
{!! Form::submit($submitButtonText,['class'=>'red-btn setting-btn']) !!}