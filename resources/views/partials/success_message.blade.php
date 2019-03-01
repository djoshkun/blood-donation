@if($message = Session::get('success'))
<div class="message">
    <p class="left"></p>
    <p class="right"></p>
    {{$message}} <div style="font-size: 35px;">&#9786;</div>
</div>
@endif