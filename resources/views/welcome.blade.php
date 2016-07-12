@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        <p>Greetings from <strong>LaraTask</strong>, the no-nonsense Laravel-based task manager to keep
                            you in shape of your schedule.</p>

                        <p>If you don't have an account with us yet, it's about time you make one.<br>
                            Click on the button below and we'll redirect you to the registration page!</p>
                        <a href="{{ url('register') }}">
                            <button class="btn btn-danger col-lg-2">Register</button>
                        </a>

                        <p>&nbsp;</p>
                        <p>&nbsp;</p>

                        <p>But if you do have an account, by all means... login and start organizing your life much
                            better!</p>
                        <a href="{{ url('login') }}">
                            <button class="btn btn-primary col-lg-2">Login</button>
                        </a>

                        <p>&nbsp;</p>
                        <p>&nbsp;</p>

                        <p>
                            This application was built by <a href="http://facebook.com/AmruthPillai">Amruth Pillai</a>
                            and is open to the free world on GitHub.<br>
                            You can check out the source code here: <a href="#">source code url here</a>. Feel free to
                            fork and fiddle as you like!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
