@extends('layouts.app')

@section('title', 'Login')

@section('content')
<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-body">

            <div class="text-center m-b-15">
                <a href="index.html" class="logo logo-admin"><img src="{{ asset('assets/images/logo.png') }}"
                        height="100" alt="logo"></a>
            </div>
            @if(session()->get('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
            <div class="p-3">
                <form class="form-horizontal m-t-20" action="{{ route('login.action') }}">

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="email" required="" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="password" required="" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger btn-block waves-effect waves-light"
                                type="submit">Log
                                In</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection