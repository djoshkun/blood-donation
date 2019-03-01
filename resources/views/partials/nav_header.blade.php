<nav class="sticky-header__container__nav first-nav">
    <div class="first-nav__container">
        @if(auth()->user()->role === 'ROLE_ADMIN')
        <a class="sticky-header__link main-link" href="{{route('users.index')}}">ПОТРЕБИТЕЛИ</a>
        <a class="sticky-header__link main-link" href="{{route('declarations.index')}}">ДЕКЛАРАЦИИ</a>
        <a class="sticky-header__link main-link" href="{{route('cities.index')}}">ГРАДОВЕ</a>
        <a class="sticky-header__link main-link" href="{{route('hospitals.index')}}">БОЛНИЦИ</a>
        @endif
        @if(auth()->user()->role === 'ROLE_DOCTOR')
        <a class="sticky-header__link main-link" href="{{route('donations.index.doctor')}}">ДЕКЛАРАЦИИ</a>
        <a class="sticky-header__link main-link" href="{{route('patients.create')}}">ДОБАВИ ПАЦИЕНТ</a>
        @endif
        @if(auth()->user()->role === 'ROLE_LABORANT')
        <a class="sticky-header__link main-link" href="{{route('donations.index.laborant')}}">ДОБАВИ РЕЗУЛТАТИ</a>
        @endif
        <a class="sticky-header__link main-link" href="{{route('answers.index.one')}}">ДАРЕТЕ КРЪВ</a>
        <a class="sticky-header__link main-link" href="{{route('patients.index')}}">СПЕШНО-ТЪРСЕЩИ</a>
    </div>
</nav>
<nav class="sticky-header__container__nav second-nav">
    @include('partials/user_login_second_nav')
</nav>