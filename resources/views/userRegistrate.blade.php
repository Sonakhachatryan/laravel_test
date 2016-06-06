<div><a href="localize/en">EN</a></div>
<div><a href="localize/ru">RU</a></div>

@if(count($errors) > 0)
<div>
  @foreach($errors as $error)
       @foreach($error as $messige)
            <li>{{$messige}}</li>
       @endforeach
  @endforeach
</div>  
@endif

{!! Form::open(array('url' => url('registrate'), 'method' => 'POST')) !!}
<div> {!!  Form::label('first_name','First Name')  !!} </div>
<div> {!!  Form::text( 'first_name',NULL,['class'=>""])  !!}</div>
<div> {!!  Form::label('last_name','Last Name')  !!} </div>
<div> {!!  Form::text( 'last_name',NULL,['class'=>""])  !!}</div>
<div> {!!  Form::label('emial','Email')  !!} </div>
<div> {!!  Form::text( 'email',NULL,['class'=>""])  !!}</div>
<div> {!!  Form::label('password', 'Password')     !!} </div>
<div> {!!  Form::Password('password',NULL,['class'=>""])  !!}</div>
<div> {!!  Form::label('password_confirmation', 'Confirm Password')  !!} </div>
<div> {!!  Form::password('password_confirmation',NULL,['class'=>""])  !!}</div>
<div> {!!  Form::label('birth_date', 'Birth date')     !!} </div>
<div> {!!  Form::date('birth_date',NULL,['class'=>""])  !!}<div>
<div> {!!  Form::label('gender', 'Gender')     !!} </div>
<div> {!!  Form::radio('gender', 'male', true,['class'=>""])  !!}Male<div>
<div> {!!  Form::radio('gender', 'Female',['class'=>""])  !!}Female<div>
<div> {!!  Form::submit('Sign Up', ['class'=>""]) !!} </div>
{!! Form::close() !!}

