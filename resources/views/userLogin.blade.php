<div><a href="localize/en">EN</a></div>
<div><a href="localize/ru">RU</a></div>


<div><a href={!!URL::to('facebook')!!} >Login with facebook</a></div>
<div><a href={!!URL::to('twitter')!!} >Login with twitter</a></div>
@if(count($errors) > 0)
<div>
  @foreach($errors as $error)
       @foreach($error as $messige)
            <li>{{$messige}}</li>
       @endforeach
  @endforeach
</div>  
@endif

{!! Form::open(array('url' => url('login'), 'method' => 'POST')) !!}
<div> {!!  Form::label('emial','Email')  !!} </div>
<div> {!!  Form::text( 'email',NULL,['class'=>""])  !!}</div>
<div> {!!  Form::label('password', 'Password')     !!} </div>
<div> {!!  Form::Password('password',NULL,['class'=>""])  !!}</div>
<div>{!!  Form::submit('Log In', ['class'=>""]) !!} </div>
{!! Form::close() !!}
