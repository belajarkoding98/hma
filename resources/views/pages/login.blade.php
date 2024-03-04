@extends('layouts.app')

@section('title', 'Login')

@section('content')
<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-body">

            <div class="text-center m-b-15">
                <a href="/" class="logo logo-admin"><img src="{{ asset('assets/images/logo.png') }}" height="100"
                        alt="logo"></a>
            </div>
            <div id="infoMessage" class="text-center bg-info">
                @if(session()->get('message'))
                {{ session()->get('message') }}
                @endif
            </div>
            <div class="p-3">
                <form class="form-horizontal m-t-20" id="login">

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="email" required="" id="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="password" required="" id="password"
                                placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button type="submit" id="submit"
                                class="btn btn-danger btn-block waves-effect waves-light">Log
                                In</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection