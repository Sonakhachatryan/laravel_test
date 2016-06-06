<div><a href="localize/en">EN</a></div>
<div><a href="localize/ru">RU</a></div>

{!! Form::open(array('url' => url('user/' . auth()->id() .'/post/create'), 'method' => 'POST')) !!}
<div> {!!  Form::label('title_en', 'Title in English')  !!} </div>
<div> {!!  Form::text('title_en','No Title',['class'=>""])  !!}</div>
<div> {!!  Form::label('content_en', 'Content')  !!} </div>
<div> {!!  Form::textarea('content_en','No Content',['class'=>""])  !!}</div>
<div> {!!  Form::label('title_ru', 'Title in Russian')  !!} </div>
<div> {!!  Form::text('title_ru','Нет загаловка',['class'=>""])  !!}</div>
<div> {!!  Form::label('content_ru', 'Content in Russina')  !!} </div>
<div> {!!  Form::textarea('content_ru','Нет контента',['class'=>""])  !!}</div>
<div> {!!  Form::label('images', 'Image')  !!} </div>
<div> {!!  Form::file('images',NULL,['class'=>""])  !!}<div>
<div> {!!  Form::submit('Add', ['class'=>""]) !!} </div>
{!! Form::close() !!}
