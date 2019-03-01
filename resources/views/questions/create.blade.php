<p class="user-info__title">Добавяне на нов въпрос</p>
{!! Form::model($question=new App\Question,['method'=>'post','route'=>['questions.store', $declaration]]) !!}
@include('questions/form',['submitButtonText'=>'Добави'])
{!! Form::close() !!}