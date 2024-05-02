@extends('layouts.unauth')
@section('content')
<style>
.resetpswrdform label.col-form-label {
    text-wrap: nowrap;
}
.resetform .card .card-header {
    justify-content: center;
    font-size: 20px;
    font-weight: 500;
}
</style>
<main class="login-form resetform">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">Reset Password</div>
                  <div class="card-body">

                    @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                      <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
                          <div class="form-group row resetpswrdform">
                            <div class="col-lg-12">
                                <!-- <label for="email_address" class="col-form-label text-md-right">E-Mail Address</label> -->
                            </div>
                              <div class="col-lg-12">
                                  <input type="text" id="email_address" class="form-control" placeholder="E-Mail Address" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">
                                        Send Password Reset Link
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
