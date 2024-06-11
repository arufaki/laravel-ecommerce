<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FKH.CO | Login</title>
    <link rel="stylesheet" href="{{ url('fkhco/css/login.css') }}" />
    <link href="./resources/css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

  </head>
  <body class="h-full">
    <header>
      <nav class="container">
        <div class="nav-wrap nav-border">
          <h1 class="logos login-logo">FKH.CO</h1>
        </div>
      </nav>
    </header>
    <main>
      <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="#" method="POST">
        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
  
        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
            <div class="text-sm">
              <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
            </div>
          </div>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
        </div>
      </form>
  
      <p class="mt-10 text-center text-sm text-gray-500">
        Not a member?
        <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a>
      </p>
    </div>
  </div>
  
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
