<div><a href="localize/en">EN</a></div>
<div><a href="localize/ru">RU</a></div>
{!! Form::open(array('url' => url('user/'. auth()->id() .'/post/update/' . $post->post_id), 'method' => 'POST')) !!}
<div> {!!  Form::label('title_en', 'Title in English')  !!} </div>
<div> {!!  Form::text('title_en',$post->title_en,['class'=>""])  !!}</div>
<div> {!!  Form::label('content_en', 'Content')  !!} </div>
<div> {!!  Form::textarea('content_en',$post->content_en,['class'=>""])  !!}</div>
<div> {!!  Form::label('title_ru', 'Title in Russian')  !!} </div>
<div> {!!  Form::text('title_ru',$post->title_ru,['class'=>""])  !!}</div>
<div> {!!  Form::label('content_ru', 'Content in Russina')  !!} </div>
<div> {!!  Form::textarea('content_ru',$post->content_ru,['class'=>""])  !!}</div>
<div> {!!  Form::label('images', 'Image')  !!} </div>
<div> {!!  Form::file('images',NULL,['class'=>""])  !!}<div>
<div> {!!  Form::submit('Update', ['class'=>""]) !!} </div>
{!! Form::close() !!}
