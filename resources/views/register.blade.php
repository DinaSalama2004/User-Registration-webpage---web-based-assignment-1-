@extends('layouts.master')

@section('title', __('messages.registration_form'))

@section('content')
    <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<body class="bg-light">

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class=" border-light shadow shadow-md rounded-3">
            <div class="row g-0">
                <div class="col-12 col-md-5">
                    <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                         src="{{ asset('images/penguin.jpg') }}"
                         alt="{{ __('messages.registration_form') }}">
                </div>
                <div class="col-12 col-md-7">
                    <div class="p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <h2 class="h2 text-dark pb-2">{{ __('messages.registration_form') }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-3 gy-md-4 overflow-hidden">
                            <div class="col-md-11">
                                @if (session('success'))
                                    <div class="alert alert-success" id="successMessage">{{ session('success') }}</div>
                                @else
                                    <form id="registrationForm" class="ps-3 p-4 bg-white" action="{{ route('register.store') }}"
                                          method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" id="fullName"
                                                   placeholder="{{ __('messages.full_name') }}" required>
                                            <label for="fullName">{{ __('messages.full_name') }}</label>
                                            <div id="fullNameAlert" class="alert alert-danger d-none mt-2 p-2"></div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" id="userName"
                                                   placeholder="{{ __('messages.username') }}" required>
                                            <label for="username">{{ __('messages.username') }}</label>
                                            <div id="usernameAlert" class="alert alert-danger d-none mt-2 p-2"></div>
                                            <div id="usernameAlertS" class="alert alert-success d-none mt-2 p-2"></div>
                                        </div>
                                        <span id="username_status"></span>

                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" id="phone"
                                                   placeholder="{{ __('messages.phone') }}" required>
                                            <label for="phone">{{ __('messages.phone') }}</label>
                                            <div id="phoneAlert" class="alert alert-danger d-none mt-2 p-2"></div>
                                        </div>

                                        <div class="d-flex">
                                            <select name="countryPrefix" value="{{ old('countryPrefix') }}"
                                                    class="form-select w-auto rounded-end-0 phone-prefix"
                                                    id="countryPrefix">
                                                <option value="20" selected>+20</option>
                                                <option value="966">+966</option>
                                                <option value="1">+1</option>
                                                <option value="44">+44</option>
                                                <option value="49">+49</option>
                                                <option value="33">+33</option>
                                                <option value="34">+34</option>
                                                <option value="39">+39</option>
                                                <option value="91">+91</option>
                                                <option value="81">+81</option>
                                                <option value="86">+86</option>
                                                <option value="7">+7</option>
                                                <option value="82">+82</option>
                                                <option value="62">+62</option>
                                                <option value="55">+55</option>
                                                <option value="52">+52</option>
                                                <option value="234">+234</option>
                                                <option value="27">+27</option>
                                                <option value="971">+971</option>
                                                <option value="90">+90</option>
                                            </select>
                                            <div class="form-floating mb-3 d-flex">
                                                <input type="tel" class="form-control rounded-end-0 rounded-start-0"
                                                       name="whatsapp" value="{{ old('whatsapp') }}" id="whatsappNumber" placeholder="{{ __('messages.whatsapp') }}"
                                                       required>
                                                <label for="whatsappNumber">{{ __('messages.whatsapp') }}</label>
                                                <button type="button"
                                                        class="btn btn-outline-dark rounded-start-0 p-0 px-1"
                                                        id="checkWhatsappNumberBtn">{{ __('messages.check') }}</button>
                                            </div>
                                        </div>
                                        <p id="whatsappMsg" class="text-success"></p>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="address" value="{{ old('address') }}" id="address"
                                                   placeholder="{{ __('messages.address') }}" required>
                                            <label for="address">{{ __('messages.address') }}</label>
                                            <div id="addressAlert" class="alert alert-danger d-none mt-2 p-2"></div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email"
                                                   placeholder="{{ __('messages.email') }}" required>
                                            <label for="email">{{ __('messages.email') }}</label>
                                            <div id="emailAlert" class="alert alert-danger d-none mt-2 p-2"></div>
                                            <div id="emailAlertS" class="alert alert-success d-none" role="alert"></div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password"
                                                   placeholder="{{ __('messages.password') }}" required>
                                            <label for="password">{{ __('messages.password') }}</label>
                                        </div>
                                        <div id="passwordAlert" class="alert alert-danger d-none mt-2"></div>

                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}"
                                                   id="confirmPassword" placeholder="{{ __('messages.confirm_password') }}" required>
                                            <label for="confirmPassword">{{ __('messages.confirm_password') }}</label>
                                            <div id="confirmPasswordAlert" class="alert alert-danger d-none mt-2"></div>
                                        </div>

                                        <div class="mb-3 d-flex align-items-center w-auto">
                                            <input type="checkbox" id="viewPassword" style="width: 20px; height: 20px">
                                            <label for="viewPassword" class="ps-2">{{ __('messages.view_password') }}</label>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">{{ __('messages.upload_image') }}</label>
                                            <input type="file" class="form-control" name="user_image" id="fileInput" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100 py-2" name="submit">
                                            {{ __('messages.register') }}
                                        </button>
                                    </form>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger" id="errorMessage">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div id="errorMessage" class="alert alert-danger d-none" role="alert">
                                    {{ __('messages.correct_errors') }}
                                </div>

                                <div id="successMessage" class="alert alert-success d-none " role="alert">
                                    {{ __('messages.registration_successful') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @media screen and (min-width: 700px) {
        .container {
            width: 80% !important;
        }
    }

    /* RTL Support for Arabic */
    [dir="rtl"] .form-floating > label {
        right: 0.75rem;
        left: auto;
    }

    [dir="rtl"] .btn-group .btn:first-child:not(:last-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        border-top-right-radius: 0.375rem;
        border-bottom-right-radius: 0.375rem;
    }

    [dir="rtl"] .btn-group .btn:last-child:not(:first-child) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-top-left-radius: 0.375rem;
        border-bottom-left-radius: 0.375rem;
    }
</style>
</body>

</html>
@endsection
