<div class="row">
    {!! Form::label('email','Email:') !!}
    <span class="warning"> {{$errors->first('email')}}</span>
    {!! Form::text('email',null,['placeholder'=>'Моля въведете']) !!}
</div>
<div class="row">
    {!! Form::label('password','Парола:') !!}
    <span class="warning"> {{$errors->first('password')}}</span>
    <input type="password"  class="password" name="password" value="" />
</div>
<div class="row">
    {!! Form::label('role','Тип:') !!}
    <span class="warning"> {{$errors->first('role')}}</span>
    {!! Form::select('role',$user->types,null,['placeholder'=>'-избери-', 'id' => 'user_role', 'class' => 'rounded-dropdown']) !!}
</div>
<div id="user_hospital" class="row">
    {!! Form::label('hospital','Болница:') !!}  
    <span class="warning"> {{$errors->first('hospital_id')}}</span>
    {!! Form::select('hospital_id',$hospitals,null,['placeholder'=>'-избери-', 'class' => 'rounded-dropdown']) !!}
</div>
<div class="row">
    {{Form::label('active','Активност:')}}
    <span class="warning"> {{$errors->first('active')}}</span>
    <div class="radios-wrapper">
        <input type="radio" name="active" value="1" 
               @if($user->id && $user->active === 'Активен')
               {{"checked=cheked"}}
               @else
               {{old('active') === '1' ? "checked=cheked" : ''}}
               @endif>
               <p>Активен</p>
        <input type="radio" name="active" value="0" 
               @if($user->id && $user->active === 'Не активен')
               {{"checked=cheked"}}
               @else
               {{old('active') === '0' ? "checked=cheked" : ''}}
               @endif>
               <p>Не активен</p>
    </div>
</div>
{!! Form::submit($submitButtonText,['class'=>'red-btn setting-btn']) !!}
@section('js')
<script type="text/javascript"  src="{{asset("src/js/user-role.js")}}"></script>
@stop