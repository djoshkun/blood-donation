<div class="row">
    <label>Име:</label><span class="warning"> {{$errors->first('name')}}</span>
    <input type="text" name="name" value="{{$user->name !== null ? $user->name : old('name')}}" />
</div>
<div class="row">
    <label>Презиме:</label><span class="warning"> {{$errors->first('fathersname')}}</span>
    <input type="text" name="fathersname" value="{{$user->fathersname !== null  ? $user->fathersname : old('fathersname')}}" />
</div>
<div class="row">
    <label>Фамилия:</label><span class="warning"> {{$errors->first('surname')}}</span>
    <input type="text" name="surname" value="{{$user->surname !== null ? $user->surname : old('surname')}}" />
</div>
<div class="row">
    <label>Кръвна група:</label><span class="warning"> {{$errors->first('blood_type')}}</span>
    {{Form::select('blood_type',$user->bloodTypes,null,['placeholder'=>'-избери-', 'class' => 'rounded-dropdown blood_type'])}}
</div>
<div class="row">
    <label>Количество кръв(брой донори):</label><span class="warning"> {{$errors->first('blood_quantity')}}</span>
    <input type="text" name="blood_quantity" value="{{$user->blood_quantity ? $user->blood_quantity : old('blood_quantity')}}" />
</div>
<div class="row">
    <label>Болница:</label><span class="warning"> {{$errors->first('hospital_id')}}</span>
    {{Form::select('hospital_id',$hospitals,null,['placeholder'=>'-избери-', 'class' => 'rounded-dropdown hospital'])}}
</div>
<div class="row">
    <label>Намерен кръв(брой донори):</label><span class="warning"> {{$errors->first('count_blood_quantity')}}</span>
    <input type="text" name="count_blood_quantity" value="{{$user->count_blood_quantity ? $user->count_blood_quantity : old('count_blood_quantity')}}" />
</div>
<div class="row">
    <label>Пол:</label><span class="warning"> {{$errors->first('gender')}}</span>
        <div class="radios-wrapper"> 
            <input type="radio" name="gender" value="female" 
                   @if($user->gender)
                   {{$user->gender == 'жена' ? "checked=cheked" : ''}}
                   @else
                   {{old('gender') === 'female' ? "checked=cheked" : ''}}
                   @endif>
                   <p>Жена</p>
            <input type="radio" name="gender" value="male" 
                   @if($user->gender)
                   {{$user->gender == 'мъж' ? "checked=cheked" : ''}}
                   @else
                   {{old('gender') === 'male' ? "checked=cheked" : ''}}
                   @endif>
                   <p>Мъж</p>
        </div>
</div>
{!! Form::submit($submitButtonText,['class'=>'red-btn setting-btn']) !!}