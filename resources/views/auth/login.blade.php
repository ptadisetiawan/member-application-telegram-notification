@extends('layouts.web.auth')

@section('content')
<div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand">
          <img src="{{asset('img/logo.png')}}" alt="logo" width="100" class="shadow-light rounded-circle">
        </div>

        <div class="card card-primary">
          <div class="card-header"><h4>Masuk admin</h4></div>

          <div class="card-body">
            <form method="POST" action="{{url('/login')}}" class="needs-validation" novalidate="">
                @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  masukkan email
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                  <div class="float-right">
                    <a href="auth-forgot-password.html" class="text-small">
                      Lupa password?
                    </a>
                  </div>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  masukkan passwordmu
                </div>
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me">Ingat saya</label>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                  Masuk
                </button>
              </div>
            </form>
            <div class="row sm-gutters">
            </div>

          </div>
        </div>
        <div class="simple-footer">
          Copyright &copy; suryapangan.com 2020
        </div>
      </div>
    </div>
  </div>
@endsection
