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
                <form class="form-login" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1>Sign Up</h1>
                    <label for="name">Name
                        <input type="text" name="name" required autofocus autocomplete="name" id="name"
                            class="form-control name" placeholder="Name">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </label>
                    <label for="email">Email
                        <input type="email" name="email" id="email" required autofocus autocomplete="username"
                            id="email" class="form-control username" placeholder="Email">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </label>
                    <label for="password">Password
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="form-control password" placeholder="Password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </label>
                    <label for="password_confirmation">Password Confirmation
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            autocomplete="new-password" class="form-control password_confirmation name"
                            placeholder=" Confirm Password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </label>
                    <p class="sign-up-acc">
                        Have an Account ? <a href="{{ url('/login') }}" class="sign-up">Sign In</a>
                    </p>
                    <button class="login-btn">Register</button>
                </form>
            </div>
        </section>
    </main>
    <footer>
        @include('ecomPages.component.footer')
    </footer>
    <script src="js/app.js"></script>
</body>

</html>
