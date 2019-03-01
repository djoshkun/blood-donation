<div class="row">
    {!! Form::label('name','Име:') !!}
    <span class="warning"> {{$errors->first('name')}}</span>
    {!! Form::text('name',null,['placeholder'=>'Моля въведете']) !!}
</div>
<div class="row">
    <label>Активност:</label><span class="warning"> {{$errors->first('active')}}</span>
    <div class="radios-wrapper">
        <input type="radio" name="active" value="0"
               @if($declaration->active === 'Не активен' && $declaration->id)
               {{'checked=cheked'}}
               @else 
               {{(old('active') === '0') ? 'checked' : ''}}
               @endif>
               <p>Не активен</p>
        <input type="radio" name="active" value="1" 
               @if($declaration->active === 'Активен' && $declaration->id)
               {{'checked=cheked'}}
               @else
               {{(old('active') === '1') ? 'checked' : ''}}
               @endif>
               <p>Активен</p>
    </div>
</div>
{!! Form::submit($submitButtonText,['class'=>'red-btn setting-btn']) !!}