@extends('layouts.unauth')
@section('content')

<style>
main.login-form.confirmpswrd {
    max-width: 500px;
    width: 100%;
}
</style>
<main class="login-form confirmpswrd">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Reset Password</div>
                  <div class="card-body">

                      <form action="{{ route('reset.password.post') }}" method="POST">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">

                          <div class="form-group row">

                              <!-- <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label> -->
                              <div class="col-lg-12">
                                  <input type="text" id="email_address" class="form-control" name="email" placeholder="E-Mail Address" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <!-- <label for="password" class="col-md-4 col-form-label text-md-right">Password</label> -->
                              <div class="col-lg-12">
                                  <input type="password" id="password" class="form-control" placeholder="Password" name="password" required autofocus>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label> -->
                              <div class="col-lg-12">
                                  <input type="password" id="password-confirm" class="form-control" placeholder="onfirm Password" name="password_confirmation" required autofocus>
                                  @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <button type="submit" class="btn btn-primary">
                                  Reset Password
                              </button>
                            </div>
                          </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection
