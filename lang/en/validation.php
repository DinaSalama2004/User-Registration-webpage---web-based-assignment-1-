<?php


return [
    'required' => 'The :attribute field is required.',
    'email' => 'The :attribute must be a valid email address.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'min' => [
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'max' => [
        'string' => 'The :attribute may not be greater than :max characters.',
    ],
    'unique' => 'The :attribute has already been taken.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'image' => 'The :attribute must be an image.',
    'mimes' => 'The :attribute must be a file of type: :values.',

    // Custom password messages
    'password' => [
        'min' => 'Password must be at least 8 characters long.',
        'regex' => 'Password must contain at least one number and one special character (@,$,!,%,*,#,?,&,.).',
        'confirmed' => 'Password confirmation does not match.',
    ],

    'attributes' => [
        'full_name' => 'full name',
        'user_name' => 'username',
        'phone' => 'phone number',
        'whatsapp' => 'WhatsApp number',
        'address' => 'address',
        'email' => 'email',
        'password' => 'password',
        'password_confirmation' => 'password confirmation',
        'user_image' => 'user image',
    ],
];
