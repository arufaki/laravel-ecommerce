<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FKH.CO | Login</title>
    <link rel="stylesheet" href="./css/login.css" />
  </head>
  <body>
    <header>
      <nav class="container">
        <div class="nav-wrap nav-border">
          <h1 class="logos login-logo">FKH.CO</h1>
        </div>
      </nav>
    </header>
    <main>
      <section id="login">
        <div class="container login-form">
          <form method="POST" action="{{ route('register') }}">
          @csrf
            <h1>Sign Up</h1>
            <label for="username">Name
                <input type="text" name="name" required autofocus autocomplete="name" id="name" class="form-control" placeholder="Name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </label>
            <label for="username">Username
                <input type="email" name="email" id="email" required autofocus autocomplete="username" id="email" class="form-control" placeholder="Email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </label>
            <label for="password">Password
                <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control" placeholder="Password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </label>
            <label for="password_confirmation">Password Confirmation
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control" placeholder=" Confirm Password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </label>
            <p class="sign-up-acc">
              Have an Account ? <span class="sign-up sign-in">Sign In</span>
            </p>
            <button class="login-btn">Sign Up</button>
          </form>
        </div>
      </section>
    </main>
    <footer>
      <div id="subscribe">
        <div class="subscribe-wrap container">
          <div class="subscribe-content container">
            <h1>STAY UPTO DATE ABOUT OUR LATEST OFFERS</h1>
            <div class="subscribe-form">
              <div class="subscribe-input-wrap">
                <img src="assets/svg/mail.svg" alt="mail-icon" />
                <input
                  type="text"
                  placeholder="Enter your email address..."
                  class="subscribe-input"
                />
              </div>
              <button class="subscribe-btn">Subscribe to Newsletter</button>
            </div>
          </div>
        </div>
      </div>
      <div class="footer container">
        <div class="footer-content">
          <h1 class="footer-logo">FKH.CO</h1>
          <p class="footer-body">
            We have clothes that suits your style and which you’re proud to
            wear. From women to men.
          </p>
        </div>
        <h5>
          Created with ❤ by
          <a
            href="https://github.com/Arufaki"
            target="_blank"
            class="creator-name"
            >Alfakih Anggi Subekti</a
          >
        </h5>
      </div>
    </footer>
    <script src="js/app.js"></script>
  </body>
</html>
