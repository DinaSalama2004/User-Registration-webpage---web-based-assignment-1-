<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch the application language
     */
    public function switchLang($locale)
    {
        // Validate the locale
        if (in_array($locale, ['en', 'ar'])) {
            // Store the locale in session
            Session::put('locale', $locale);

            // Set the application locale immediately
            App::setLocale($locale);
        }

        // Redirect back to the previous page
        return redirect()->back();
    }
}
