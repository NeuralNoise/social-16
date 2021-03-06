@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h3>Sign up</h3>
            <hr/>
            <form class="form-vertical" role="form" method="post" action="{{ route('auth.signup') }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error':''}}">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') ?:'' }}"/>
                @if($errors->has('email'))
                    <span class="help-block">{{$errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('username') ? ' has-error':''}}">
                    <label for="username" class="control-label">Username</label>
                    <input type="text"  name="username" class="form-control" id="username" value="{{ Request::old('username') ?:''}}"/>
                    @if($errors->has('username'))
                        <span class="help-block">{{$errors->first('username') }}</span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-error':''}}">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password"/>
                    @if($errors->has('password'))
                        <span class="help-block">{{$errors->first('password') }}</span>
                    @endif
                </div>
                <div class="g-recaptcha" data-sitekey="6LendQ4TAAAAANLqJhgj9noxsciKg8odzfS9aFOg"></div>
                <div class="form-group"><button type="submit" class="btn btn-success">Sign up</button></div>
                <input type="hidden" name="_token" value="{{Session::token() }}"/>

            </form>
        </div>
    </div>
    @stop
