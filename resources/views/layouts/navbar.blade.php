<div class="navbar">
    navbar
    @guest
    <a href="{{route('login')}}">Login</a>
    <a href="{{route('register')}}">Register</a>
    @endguest
</div>
