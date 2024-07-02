<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FKH.CO | Login</title>
    <link rel="stylesheet" href="{{ url('fkhco/css/cart.css') }}" />
    <link rel="stylesheet" href="{{ url('fkhco/css/checkout.css') }}" />
    <link rel="stylesheet" href="{{ url('fkhco/css/profile.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    @php
        $userNow = Auth::user();
        $getUserInformation = \DB::table('tbpelanggan')
            ->where('id_user', $userNow->id)
            ->first();
    @endphp
    <header>
        @include('ecomPages.component.header')
    </header>
    <main>
        @include('sweetalert::alert')
        <section id="profile">
            <div class="profile-wrap container">
                <div class="header-profile mt-10">
                    <h1 class="text-base font-semibold leading-7 text-gray-900">Profile</h1>
                    <p class="mt-1 fs-6 lh-base">This information is not displayed publicly, so please remain calm.</p>
                </div>
                <div class="forms-wrap">
                    <div class="sm:col-span-4 mt-10">
                        <form method="post" action="{{ route('update.username') }}">
                            @csrf
                            <label for="username"
                                class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                            <div class="mt-2 ">
                                <div class="flex rounded-md shadow-sm  sm:max-w-md border">
                                    <input id="name" name="name" type="text" value="{{ $userNow->name }}"
                                        required autofocus autocomplete="name"
                                        class="profile-username block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="Username">
                                </div>
                            </div>
                            <button type="submit"
                                class="w-[70px] mt-2 rounded-md bg-[#b1b1b1] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#7c7c7c] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="personal-information container">
                <div class="personal-information-profile mt-10">
                    <h1 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h1>
                    <p class="mt-1 fs-6 lh-base">Use a permanent address where you can receive mail.</p>
                </div>
                <div class="personal-information-wrap">
                    <div class="col-span-full mt-10">
                        <form method="post" action="{{ route('update.information') }}">
                            @csrf
                            <label for="nohp" class="block text-sm font-medium leading-6 text-gray-900">Phone
                                Number</label>
                            <div class="mt-2 border rounded-md sm:max-w-md">
                                <input type="number" name="nohp" id="street-address nohp" maxlength="14"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    value="{{ $getUserInformation->nohp != null ? $getUserInformation->nohp : null }}"
                                    autocomplete="nohp"
                                    class="block w-full rounded-md border-0 bg-transparent py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 address">
                            </div>
                            <label for="alamat_pelanggan"
                                class="block text-sm font-medium leading-6 text-gray-900 mt-3">Street
                                address</label>
                            <div class="mt-2 border rounded-md sm:max-w-2xl">
                                <input type="text" name="alamat_pelanggan" id="street-address alamat_pelanggan"
                                    value="{{ $getUserInformation->alamat_pelanggan != null ? $getUserInformation->alamat_pelanggan : null }}"
                                    autocomplete="alamat_pelanggan"
                                    class="block w-full rounded-md border-0 bg-transparent py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 address">
                            </div>
                            <button type="submit"
                                class="w-[70px] mt-2 rounded-md bg-[#b1b1b1] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#7c7c7c] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        @include('ecomPages.component.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="{{ url('fkhco/js/app.js') }}"></script>
</body>

</html>
