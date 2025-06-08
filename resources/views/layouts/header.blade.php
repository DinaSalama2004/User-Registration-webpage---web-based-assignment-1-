<header class="bg-primary text-white py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <h6 class="mb-0">{{ __('messages.welcome_message') }}</h6>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <!-- Language Switcher -->
                <div class="btn-group" role="group" aria-label="Language Switcher">
                    <a href="{{ route('lang.switch', 'en') }}"
                       class="btn btn-outline-light btn-sm {{ app()->getLocale() == 'en' ? 'active' : '' }}">
                        <i class="fas fa-flag-usa"></i> {{ __('messages.english') }}
                    </a>
                    <a href="{{ route('lang.switch', 'ar') }}"
                       class="btn btn-outline-light btn-sm {{ app()->getLocale() == 'ar' ? 'active' : '' }}">
                        <i class="fas fa-flag"></i> {{ __('messages.arabic') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
