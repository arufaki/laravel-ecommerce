<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FKH.CO | Login</title>
    <link rel="stylesheet" href="{{ url('fkhco/css/login.css') }}" />
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
          <form class="form-login">
            <h1>Sign In</h1>
            <label for="username"
              >Username<input
                type="text"
                placeholder="Username"
                name="username"
                class="username"
            /></label>
            <label for="password"
              >Password<input
                type="password"
                placeholder="Password"
                name="password"
                class="password"
            /></label>
            <p class="sign-up-acc">
              Don't have an account ? <span class="sign-up">Sign Up</span>
            </p>
            <button class="login-btn">Sign In</button>
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
                          <img src="{{ url('fkhco/assets/svg/mail.svg') }}" alt="mail-icon" />
                          <input type="text" placeholder="Enter your email address..."
                              class="subscribe-input" />
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
              <a href="https://github.com/Arufaki" target="_blank" class="creator-name">Alfakih Anggi Subekti</a>
          </h5>
      </div>
  </footer>
    <script src="{{ url('fkhco/js/app.js') }}"></script>
  </body>
</html>
