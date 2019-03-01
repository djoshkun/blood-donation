@extends('layouts.app')
@section('nav')
<nav class="sticky-header__container__nav first-nav">
    <div class="first-nav__container">
        <a class="sticky-header__link main-link" href="#">МЕДИИТЕ ЗА НАС</a>
        <a class="sticky-header__link main-link" href="#">ДАРИТЕЛНИ КАМПАНИИ</a> 
        <a class="sticky-header__link main-link" href="#">СПЕШНО-ТЪРСЕЩИ</a>
        <a class="sticky-header__link main-link" href="#">КОНТАКТИ</a>
    </div>
</nav>
<nav class="sticky-header__container__nav second-nav">
    @if(!auth()->user())
    <div class="reg-enter-wrapper">
        <a class="sticky-header__link main-link enter" href="#">ВЛЕЗ</a>
        <a class="sticky-header__link main-link register" href="#">РЕГИСТРИРАЙ СЕ</a>
    </div>
    <span class="burger-menu" ><span></span>
        @else
        @include('partials/user_login_second_nav')
        @endif
</nav>
@stop
@section('body')
<div id="regWrapper" class="mask" role="dialog"></div>
<div id="regModal" class="modal" role="alert">
    @include('auth/registration')
</div>
<div id="enterWrapper" class="mask" role="dialog"></div>
<div id="enterModal" class="modal" role="alert">
    @include('auth/login')
</div>
<header class="slider">
    <div class="slider__item first">
        <p class="slider__item__text">Вземане, събиране, съхранение и преработка на кръв</p>
    </div>
    <div class="slider__item second">
        <p class="slider__item__text">Подбор и изследване на кръводарители</p>
    </div>
    <div class="slider__item thirth">
        <p class="slider__item__text">Диагностика и контрол на взетите кръв и кръвни съставки</p>
    </div>
    <div class="slider__item fourth">
        <p class="slider__item__text">Осигуряване и разпределение на кръв</p>
    </div>
</header>
<div class="our-goal">
    <div class="our-goal__container">
        <h2>Предмет на дейност</h2>
        <p class="paralax-img fst">
            Съгласно действащото у нас специализирано законодателство, напълно синхронизирано с Европейските регламенти в трансфузиологията, РЦТХ - гр. Пловдив осъществява следните високо специализирани медицински дейности:
        </p>
        <img class="our-goal__imgf" src="./src/images/6.png" alt="Blood">
        <ul class="paralax-img sec">
            <li>Подбор и изследване на кръводарители;</li>
            <li>Вземане, събиране, съхранение и преработка на кръв;</li>
            <li>Диагностика и контрол на взетите кръв и кръвни съставки: кръвна група, резус фактор, антитела, хепатит В, хепатит С, СПИН и Луес.</li>
            <li>Производство, съхраняване и поддържане на запаси от кръв, кръвни съставки и кръвни биопрепарати;</li>
            <li>Промоция и организиране на кръводаряването.</li>
            <li>Осигуряване и разпределение на кръв, кръвни съставки и кръвни биопрепарати в териториалния обхват на дейност на Центъра - лечебните заведения за болнична помощ.</li>
            <li>Имунохематологична диагностика на пациенти.</li>
        </ul>
    </div>
</div>
<div class="about-us">
    <div class="about-us__left"></div>
    <div class="about-us__right"></div>
    <a class="main-link" href="#">За нас</a>
    <p>Районен център за трансфузионна хематология гр. Пловдив е ключово лечебно заведение за здравеопазването в град Пловдив и Южна България. Кръвният център /РЦТХ/ в Пловдив е създаден през 1951 год. и повече от 60 години функционира ежедневно, като обслужва болничните структури в Пловдивска област.</p>
</div>
@stop
@section('js')
<script type="text/javascript"  src="{{asset("src/js/front-register-form.js")}}"></script>
<script type="text/javascript"  src="{{asset("src/js/front-login-form.js")}}"></script>
@stop