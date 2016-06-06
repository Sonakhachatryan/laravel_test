
<div><a href="localize/en">EN</a></div>
<div><a href="localize/ru">RU</a></div>
@if(!auth()->check())
<div><a href="login">{{session()->get('locale')=='en'?'Login':'Вход'}}</a></div>
<div><a href="registrate">{{session()->get('locale')=='en'?'Registrate':'Регистрация'}}</a></div>
@else
<div><a href={{ "user/" . auth()->id() }}>{{session()->get('locale')=='en'?'My Account':'Мой Аккаунт'}}</a></div>
<div><a href={{ "logout"}}>{{session()->get('locale')=='en'?'Log Out':'Быход'}}</a></div>
@endif
 @foreach($posts as $post)
    <div>
        <h1>{{$post->title }}</h1>
        <img scr = {{$post->images}}>
        <p>{{$post->content}}<p>
        
    </div>
    @endforeach
