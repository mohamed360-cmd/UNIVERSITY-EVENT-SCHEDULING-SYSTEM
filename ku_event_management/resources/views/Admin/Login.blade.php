
@section('Content')

    <form class="authform Login" method="POST" action="/admin">
        @csrf
        <h2>Admin Login</h2>
        <input placeholder="Enter Your Email" required type="text" name="email" class="authFrominput"/>
        <br/>
        <input placeholder="Enter Your Password" required type="password" name="password" class="authFrominput" />
        </br>
        <input type="submit" value="Login"/>
        <hr/>
    </form>
    @endsection
    @extends('admin.layouts.AuthenicationBody')

