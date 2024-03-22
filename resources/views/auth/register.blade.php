<x-guest-layout>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <a href="#" class="h1"><b>Dashboard</b>KRS</a>
          </div>
          <div class="card-body">
            <p class="login-box-msg">Sign up to start your session</p>
      
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group mb-3">
                  <input type="text" name="name" required autofocus autocomplete="name" id="name" class="form-control" placeholder="Name">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="email" name="email" id="email" required autofocus autocomplete="username" id="email" class="form-control" placeholder="Email">
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input id="password"
                  type="password"
                  name="password"
                  required autocomplete="new-password" class="form-control" placeholder="Password">
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input id="password_confirmation"
                  type="password"
                  name="password_confirmation" required autocomplete="new-password" class="form-control" placeholder=" Confirm Password">
                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
              <p class="mb-0">
                <a href="{{ url('login') }}" class="text-center">Already registered?</a>
              </p>
            <!-- /.social-auth-links -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    
</x-guest-layout>

