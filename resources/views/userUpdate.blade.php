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

{!! Form::open(array('url' => url('user/' . auth()->id() . '/user/update/' . $user['id']),
                     'method' => 'POST',
                     )) !!}
<div> {!!  Form::label('first_name','First Name')  !!} </div>
<div> {!!  Form::text( 'first_name',$user['first_name'],['class'=>""])  !!}</div>
<div> {!!  Form::label('last_name','Last Name')  !!} </div>
<div> {!!  Form::text( 'last_name',$user['last_name'],['class'=>""])  !!}</div>
<div> {!!  Form::label('emial','Email')  !!} </div>
<div> {!!  Form::text( 'email',$user['email'],['class'=>""])  !!}</div>
<div> {!!  Form::label('birth_date', 'Birth date')     !!} </div>
<div> {!!  Form::date('birth_date',$user['birth_date'],['class'=>""])  !!}<div>
<div> {!!  Form::label('gender', 'Gender')     !!} </div>
@if($user['gender'] == 'male')
<div> {!!  Form::radio('gender', 'male', true,['class'=>""])  !!}Male<div>
<div> {!!  Form::radio('gender', 'female',['class'=>""])  !!}Female<div>
@else
<div> {!!  Form::radio('gender', 'male', ['class'=>""])  !!}Male<div>
<div> {!!  Form::radio('gender', 'female',true,['class'=>""])  !!}Female<div>
@endif        
<div> {!!  Form::submit('Update', ['class'=>""]) !!} </div>
{!! Form::close() !!}

