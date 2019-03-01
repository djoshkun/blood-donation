<div class="profile">
    <p class="profile__name">
        {{auth()->user()->name !== null ? auth()->user()->name.' '.auth()->user()->surname : auth()->user()->email}}
    </p>
    <i class="angle-down fas fa-angle-down"></i>
    <ul  class="profile__menu">
        <li class="profile__item"><a class="main-link" href="{{route('profile')}}">Профил</a></li>
        <li class="profile__item"><a class="main-link" href="{{route('results')}}">Изследвания</a></li>
        <li class="profile__item"><a class="main-link" href="{{route('logout')}}">Излез</a></li>
    </ul>
</div>