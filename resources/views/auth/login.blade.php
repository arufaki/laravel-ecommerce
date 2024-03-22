<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="#" class="h1"><b>Dashboard</b>KRS</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Sign in to start your session</p>
    
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group mb-3">
              <input type="email" required autofocus autocomplete="username" name="email" class="form-control" placeholder="Email">
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" id="password" name="password" required autocomplete="current-password" class="form-control" placeholder="Password">
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <!-- /.social-auth-links -->
    
          <p class="mb-0">
            <a href="{{ url('register') }}" class="text-center">Register a new member</a>
          </p>
        </div>
        <!-- /.card-body -->
      </div>
      <div>
        <h5 class="text-center my-1 font-bold">Account Testing</h5>
        <div>
          <p class="mb-0 px-2">Email : johndoe@gmail.com</p>
          <p class="mb-0 px-2">Password : johndoe123</p>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->
</x-guest-layout>



