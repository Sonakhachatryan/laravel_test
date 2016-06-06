
<div><a href="localize/en">EN</a></div>
<div><a href="localize/ru">RU</a></div>

<table>
    <tr>
        <th class='table'>ID</th>
        <th class='table'>{{session()->get('locale')=='en'?'First Name':'Имя'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Last Name':'Фамилия'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Birth Date':'Дата пождения'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Email':'Email'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Gender':'Пол'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Actions':'Действия'}}</th>
        
    </tr>
    <tr>
        <td class='table'>{{$user['id']}}</td>
        <td class='table'>{{$user['first_name']}}</td>
        <td class='table'>{{$user['last_name']}}</td>
        <td class='table'>{{$user['birth_date']}}</td>
        <td class='table'>{{$user['email']}}</td>
        <td class='table'>{{$user['gender']}}</td>
        <td class='table'>
            <a href={{  auth()->id() . "/user/delete/". $user['id']}}>
               {{session()->get('locale')=='en'?'Delete':'Удалить'}}
            </a> |
            <a href={{  auth()->id() . "/user/update/" .$user['id']}}>
               {{session()->get('locale')=='en'?'Update':'Изменитй'}}
           </a> 
        </td>
    </tr>
</table>

<a href={{ auth()->id() . "/post/create"}}>{{session()->get('locale')=='en'?'Create Post':'Новый Пост'}}</a>
<style>
    .table{
        border:1px solid black;
    }
</style>
<br><br>
{{session()->get('locale')=='en'?'All Posts':'Все Посты'}}
<table>
    <tr>
        <th class='table'>ID</th>
        <th class='table'>{{session()->get('locale')=='en'?'Category':'Категория'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Title in English':'Заголожок на англиском'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Content in English':'Контент на англиском'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Title in Russian':'Заголожок на русском'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Content in Russian':'Контент на русском'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Images':'Картинки'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Created At':'Создан'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Last update':'Изменен'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Actions':'Действия'}}</th>
        
    </tr>
    @foreach($posts as $post)
    <tr>
        <td class='table'>{{$post->post_id}}</td>
        <td class='table'>{{$post->category}}</td>
        <td class='table'>{{$post->title_en}}</td>
        <td class='table'>{{$post->content_en}}</td>
        <td class='table'>{{$post->title_ru}}</td>
        <td class='table'>{{$post->content_ru}}</td>
        <td class='table'>{{$post->images}}</td>
        <td class='table'>{{$post->created_at}}</td>
        <td class='table'>{{$post->updated_at}}</td>
        <td class='table'>
            <a href={{  auth()->id() . "/post/delete/". $post->post_id}}>
               {{session()->get('locale')=='en'?'Delete':'Удалить'}}
            </a> |
            <a href={{  auth()->id() . "/post/update/" .$post->post_id}}>
               {{session()->get('locale')=='en'?'Update':'Изменитй'}}
           </a> 
        </td>
    </tr>
    @endforeach
</table>
<br><br>
@if(auth()->user()->getRole()=='admin')
{{session()->get('locale')=='en'?'All Users':'Все Юзери'}}
<table>
    <tr>
        <th class='table'>ID</th>
        <th class='table'>{{session()->get('locale')=='en'?'First Name':'Имя'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Last Name':'Фамилия'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Birth Date':'Дата пождения'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Email':'Email'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Gender':'Пол'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Status':'Статус'}}</th>
        <th class='table'>{{session()->get('locale')=='en'?'Actions':'Действия'}}</th>
        
    </tr>
    @foreach($users as $user)
    <tr>
        <td class='table'>{{$user->id}}</td>
        <td class='table'>{{$user->first_name}}</td>
        <td class='table'>{{$user->last_name}}</td>
        <td class='table'>{{$user->birth_date}}</td>
        <td class='table'>{{$user->email}}</td>
        <td class='table'>{{$user->gender}}</td>
        <td class='table'>{{$user->status}}</td>
        <td class='table'>
            <a href={{  auth()->id() . "/user/delete/". $user->id}}>
               {{session()->get('locale')=='en'?'Delete':'Удалить'}}
            </a> |
        @if($user->status=='active')
            <a href={{  auth()->id() . "/user/block/" . $user->id }}>
               {{session()->get('locale')=='en'?'Block':'Блокировать'}}
            </a> 
        @else
            <a href={{  auth()->id() . "/user/unblock/" . $user->id }}>
               {{session()->get('locale')=='en'?'Unblock':'Разблокировать'}}
            </a> 
        @endif    
        </td>
    </tr>
    @endforeach
</table>
@endif