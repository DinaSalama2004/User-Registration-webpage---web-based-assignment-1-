<?php

return [
'required' => 'حقل :attribute مطلوب.',
'email' => ':attribute يجب أن يكون عنوان بريد إلكتروني صحيح.',
'confirmed' => 'تأكيد :attribute غير متطابق.',
'min' => [
'string' => ':attribute يجب أن يكون على الأقل :min أحرف.',
],
'max' => [
'string' => ':attribute لا يجب أن يتجاوز :max أحرف.',
],
'unique' => ':attribute محجوز بالفعل.',
'digits_between' => ':attribute يجب أن يكون بين :min و :max أرقام.',
'image' => ':attribute يجب أن يكون صورة.',
'mimes' => ':attribute يجب أن يكون ملف من نوع: :values.',

// Custom password messages in Arabic
'password' => [
'min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل.',
'regex' => 'كلمة المرور يجب أن تحتوي على رقم واحد على الأقل ورمز خاص (@,$,!,%,*,#,?,&,.).',
'confirmed' => 'تأكيد كلمة المرور غير متطابق.',
],

'attributes' => [
'full_name' => 'الاسم الكامل',
'user_name' => 'اسم المستخدم',
'phone' => 'رقم الهاتف',
'whatsapp' => 'رقم الواتساب',
'address' => 'العنوان',
'email' => 'البريد الإلكتروني',
'password' => 'كلمة المرور',
'password_confirmation' => 'تأكيد كلمة المرور',
'user_image' => 'صورة المستخدم',
],
    ];

