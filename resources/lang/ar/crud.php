<?php


use App\Helpers\Constant;

return [

    'Admin'=>[
        'crud_names' => 'الموظفين',
        'crud_name' => 'موظف',
        'crud_the_name' => 'الموظف',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'is_active' => 'الحالة',
        'avatar' => 'الصورة',
    ],
    'SplashScreen'=>[
        'crud_names' => 'شاشات السبلاش',
        'crud_name' => 'شاشة السبلاش',
        'crud_the_name' => 'الشاشة',
        'title' => 'العنوان',
        'description' => 'الوصف',
        'title_ar' => 'العنوان عربي',
        'description_ar' => 'الوصف عربي',
        'image' => 'الصورة',
        'order' => 'الترتيب',
        'active' => 'الحالة',
    ],
    'Customer'=>[
        'crud_names' => 'العملاء',
        'crud_name' => 'عميل',
        'crud_the_name' => 'العميل',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'country_code'=>'مقدمة الدولة',
        'mobile' => 'رقم الجوال',
        'avatar' => 'الصورة',
        'type' => 'نوع البروفايل',
        'bio' => 'نبذة',
        'balance' => 'الرصيد',
        'country_id' => 'الدولة',
        'city_id' => 'المدينة',
        'address' => 'العنوان',
        'favorite_car' => 'السيارة المفضلة',
        'app_locale' => 'اللغة',
        'is_active' => 'الحالة',
        'created_at' => 'تاريخ الإنشاء',
        'orders_count' => 'عدد الطلبات',
        'Links'=>[
            'active_mobile'=>'تفعيل الجوال'
        ]
    ],
    'Provider'=>[
        'crud_names' => 'المزودين',
        'crud_name' => 'مزود',
        'crud_the_name' => 'المزود',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'country_code'=>'مقدمة الدولة',
        'mobile' => 'رقم الجوال',
        'avatar' => 'الصورة',
        'type' => 'نوع البروفايل',
        'bio' => 'نبذة',
        'balance' => 'الرصيد',
        'app_locale' => 'اللغة',
        'is_active' => 'الحالة',
        'created_at' => 'تاريخ الإنشاء',
        'orders_count' => 'عدد الطلبات',
        'offers_count'=>'عدد العروض',
        'status'=>'حالة الملف الشخصي',
        'name_editable'=>'السماح بتعديل الاسم',
        'country_code_editable'=>'السماح بتعديل المقدمة الدولية',
        'mobile_editable'=>'السماح بتعديل رقم الجوال',
        'bio_editable'=>'السماح بتعديل النبذة الشخصية',
        'provider_type_editable'=>'السماح بتعديل التخصص',
        'image_editable'=>'السماح بتعديل الصورة',
        'id_number_editable'=>'السماح بتعديل رقم الهوية',
        'side_name_editable'=>'السماح بتعديل اسم الجهة',
        'record_number_editable'=>'السماح بتعديل رقم السجل',
        'category_id_editable'=>'السماح بتعديل القسم',
        'Links'=>[
            'active_mobile'=>'تفعيل الجوال'
        ]
    ],
    'Setting'=>[
        'crud_names' => 'الإعدادات',
        'crud_name' => 'اعداد',
        'crud_the_name' => 'الاعداد',
        'key' => 'الإعداد',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'value' => 'القيمة',
        'value_ar' => 'القيمة عربي',
        'pages'=>'الصفحات الثابته',
        'notifications'=>'الاشعارات',
        'other'=>'اعدادات اخرى'
    ],
    'Faq'=>[
        'crud_names' => 'الأسئلة الشائعة',
        'crud_name' => 'سؤال شائع',
        'crud_the_name' => 'السؤال الشائع',
        'faq_category_id' => 'تصنيف الأسئلة الشائعة',
        'question' => 'السؤال',
        'question_ar' => 'السؤال عربي',
        'answer' => 'الإجابة',
        'answer_ar' => 'الإجابة عربي',
        'is_active' => 'الحالة',
    ],
    'FaqCategory'=>[
        'crud_names' => 'تصنيفات الأسئلة الشائعة',
        'crud_name' => 'تصنيف الأسئلة الشائعة',
        'crud_the_name' => 'التصنيف',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
    ],
    'Ticket'=>[
        'crud_names' => 'التذاكر',
        'crud_name' => 'تذكرة',
        'crud_the_name' => 'التذكرة',
        'id' => '#',
        'user_id' => 'العميل',
        'title' => 'العنوان',
        'message' => 'الرسالة',
        'name' => 'الاسم',
        'email' => 'الايميل',
        'ticket_response' => 'الرد',
        'response_form' => 'الرد على التذكرة',
        'status' => 'الحالة',
        'Statuses'=>[
            ''.\App\Helpers\Constant::TICKETS_STATUS['Open']=>'مفتوحة',
            ''.\App\Helpers\Constant::TICKETS_STATUS['Closed']=>'مغلقة',
        ]
    ],
    'Permission'=>[
        'crud_names' => 'الصلاحيات',
        'crud_name' => 'صلاحية',
        'crud_the_name' => 'الصلاحية',
        'id' => '#',
        'name' => 'الاسم',
    ],
    'Role'=>[
        'crud_names' => 'الأدوار',
        'crud_name' => 'دور',
        'crud_the_name' => 'الدور',
        'id' => '#',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'permissions' => 'الصلاحيات',
    ],
    'Category'=>[
        'crud_names' => 'الاقسام',
        'crud_name' => 'القسم',
        'crud_the_name' => 'القسم',
        'parent_id' => 'القسم الرئيسي',
        'manager_id' => 'المشرف',
        'color'=>'اللون',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'description' => 'الوصف',
        'description_ar' => 'الوصف عربي',
        'image' => 'الصورة',
        'has_product' => 'يسمح بمنتج',
        'has_service' => 'يسمح بخدمة',
        'min_price'=>'أقل سعر',
        'max_price'=>'أعلى سعر',
        'is_active' => 'الحالة',
    ],
    'Sites'=>[
        'crud_names' => 'المواقع',
        'crud_name' => 'موقع',
        'crud_the_name' => 'الموقع',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'image' => 'الصورة',
        'url' => 'الرابط',
        'is_active' => 'الحالة',
    ],
    'Discounts'=>[
        'crud_names' => 'الخصومات',
        'crud_name' => 'خصم',
        'crud_the_name' => 'الخصم',
        'site_id'=>'اسم الموقع',
        'country_id'=>'اسم الدولة',
        'countries'=>'الدول',
        'category_id'=>'اسم التصنيف',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'description' => 'الوصف',
        'description_ar' => 'الوصف عربي',
        'image' => 'الصورة',
        'url' => 'الرابط',
        'is_active' => 'الحالة',
        'expire_date'=>'تاريخ الانتهاء',
        'type'=>'نوع الخصم',
        'value'=>'قيمة الخصم',
        'qrcode'=>'رمز الاستجابة السريعة',
        'types'=>[
            ''.Constant::DISCOUNT_TYPE['Percentage']=>'نسبة مئوية',
            ''.Constant::DISCOUNT_TYPE['FreeDelivery']=>'توصيل مجاني',
            ''.Constant::DISCOUNT_TYPE['BackCash']=>'خصم على الكاش',
            ''.Constant::DISCOUNT_TYPE['BuyOneGetOne']=>'قطعة والثانية مجاناً',
        ]
    ],
    'Specialties'=>[
        'crud_names' => 'التخصصات',
        'crud_name' => 'التخصص',
        'crud_the_name' => 'التخصص',
        'parent_id' => 'التخصص الرئيسي',
        'manager_id' => 'المشرف',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'description' => 'الوصف',
        'description_ar' => 'الوصف عربي',
        'image' => 'الصورة',
        'has_product' => 'يسمح بمنتج',
        'has_service' => 'يسمح بخدمة',
        'is_active' => 'الحالة',
    ],
    'Subscription'=>[
        'crud_names' => 'الاشتراكات',
        'crud_name' => 'اشتراك',
        'crud_the_name' => 'الاشتراك',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'description' => 'الوصف',
        'description_ar' => 'الوصف عربي',
        'image' => 'الصورة',
        'price' => 'السعر',
        'is_active' => 'الحالة',
    ],
    'Country'=>[
        'crud_names' => 'الدول',
        'crud_name' => 'دولة',
        'crud_the_name' => 'الدولة',
        'country_code' => 'كود الدولة',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'flag'=>'علم الدولة',
        'is_active' => 'الحالة',
    ],
    'City'=>[
        'crud_names' => 'المدن',
        'crud_name' => 'مدينة',
        'crud_the_name' => 'المدينة',
        'country_id' => 'الدولة',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'is_active' => 'الحالة',
    ],
    'Advertisement'=>[
        'crud_names' => 'الإعلانات',
        'crud_name' => 'إعلان',
        'crud_the_name' => 'الإعلان',
        'provider_id' => 'المزود',
        'image' => 'الصورة',
        'title' => 'العنوان',
        'title_ar' => 'العنوان عربي',
        'description'=>'الوصف',
        'description_ar'=>'الوصف عربي',
        'is_active' => 'الحالة',
        'type'=>'النوع',
        'types'=>[
            ''.Constant::ADVERTISEMENT_TYPE['Url']=>'رابط',
            ''.Constant::ADVERTISEMENT_TYPE['Id']=>'رقم الخصم',
        ],
        'url'=>'الرابط',
        'discount_id'=>'رقم الخصم',
    ],
    'UserSubscription'=>[
        'crud_names' => 'اشتراكات العميلين',
        'crud_name' => 'اشتراك العميل',
        'crud_the_name' => 'الاشتراك',
        'user_id' => 'العميل',
        'subscription_id' => 'الاشتراك',
        'expire_date' => 'تاريخ الانتهاء',
        'status' => 'الحالة',
        'Statuses' => [
            ''.Constant::USER_SUBSCRIPTION['Pending']=>'جديد',
            ''.Constant::USER_SUBSCRIPTION['Approved']=>'مقبول',
            ''.Constant::USER_SUBSCRIPTION['Rejected']=>'مرفوض',
        ],
    ],
];
