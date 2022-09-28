<?php

use App\Helpers\Constant;

return [

    'Admin'=>[
        'crud_names' => 'Employees',
        'crud_name' => 'Employee',
        'crud_the_name' => 'The Employee',
        'name' => 'Name',
        'email' => 'E-Mail',
        'is_active' => 'Status',
        'avatar' => 'Avatar',
    ],
    'Customer'=>[
        'crud_names' => 'Customers',
        'crud_name' => 'Customer',
        'crud_the_name' => 'The Customer',
        'name' => 'Name',
        'email' => 'E-Mail',
        'country_code'=>'Country Code',
        'mobile' => 'Mobile',
        'avatar' => 'Avatar',
        'type' => 'Type',
        'bio' => 'Bio',
        'country_id' => 'Country',
        'city_id' => 'City',
        'address' => 'Address',
        'balance' => 'Balance',
        'favorite_car' => 'Favorite Car',
        'app_locale' => 'App Locale',
        'is_active' => 'Status',
        'created_at' => 'Created At',
        'orders_count' => 'Orders Count',
        'Links'=>[
            'active_mobile'=>'Active Mobile'
        ]
    ],
    'SplashScreen'=>[
        'crud_names' => 'Splash Screens',
        'crud_name' => 'Splash Screen',
        'crud_the_name' => 'The Splash Screen',
        'title' => 'Title',
        'description' => 'Description',
        'title_ar' => 'Title Ar',
        'description_ar' => 'Description Ar',
        'image' => 'Image',
        'order' => 'Order',
        'active' => 'Status',
    ],
    'Provider'=>[
        'crud_names' => 'Providers',
        'crud_name' => 'Provider',
        'crud_the_name' => 'The Provider',
        'name' => 'Name',
        'email' => 'E-Mail',
        'mobile' => 'Mobile',
        'country_code'=>'Country Code',
        'avatar' => 'Avatar',
        'type' => 'Type',
        'bio' => 'Bio',
        'balance' => 'Balance',
        'app_locale' => 'App Locale',
        'is_active' => 'Status',
        'created_at' => 'Created At',
        'orders_count' => 'Orders Count',
        'offers_count'=>'offers count',
        'status'=>'Profile Status',
        'name_editable'=>'Allow Update Name',
        'country_code_editable'=>'Allow Update Country Code',
        'mobile_editable'=>'Allow Update Mobile',
        'bio_editable'=>'Allow Update Bio',
        'provider_type_editable'=>'Allow Update Specialist',
        'image_editable'=>'Allow Update Image',
        'id_number_editable'=>'Allow Update Id Number',
        'side_name_editable'=>'Allow Update Side Name',
        'record_number_editable'=>'Allow Update Record Number',
        'category_id_editable'=>'Allow Update Category',
        'Links'=>[
            'active_mobile'=>'Active Mobile'
        ]
    ],

    'Setting'=>[
        'crud_names' => 'Settings',
        'crud_name' => 'Setting',
        'crud_the_name' => 'The Setting',
        'key' => 'Key',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
        'value' => 'Value',
        'value_ar' => 'Value Ar',
        'pages'=>'Pages',
        'notifications'=>'Notifications',
        'other'=>'Other Settings'
    ],
    'Faq'=>[
        'crud_names' => 'FAQ',
        'crud_name' => 'Faq',
        'crud_the_name' => 'The Faq',
        'question' => 'Question',
        'question_ar' => 'Question Ar',
        'faq_category_id' => 'Faq Category',
        'answer' => 'Answer',
        'answer_ar' => 'Answer Ar',
        'is_active' => 'Status',
    ],
    'FaqCategory'=>[
        'crud_names' => 'Faq Categories',
        'crud_name' => 'Faq Category',
        'crud_the_name' => 'The Faq Category',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
    ],
    'Ticket'=>[
        'crud_names' => 'Tickets',
        'crud_name' => 'Ticket',
        'crud_the_name' => 'The Ticket',
        'id' => '#',
        'user_id' => 'Customer',
        'title' => 'Title',
        'name' => 'Name',
        'email' => 'Email',
        'message' => 'Message',
        'ticket_response' => 'Response',
        'status' => 'Status',
        'response_form' => 'Response to the ticket',
        'Statuses'=>[
            ''.\App\Helpers\Constant::TICKETS_STATUS['Open']=>'Opened',
            ''.\App\Helpers\Constant::TICKETS_STATUS['Closed']=>'Closed',
        ]
    ],
    'Permission'=>[
        'crud_names' => 'Permissions',
        'crud_name' => 'Permission',
        'crud_the_name' => 'The Permission',
        'id' => '#',
        'name' => 'Name',
    ],
    'Role'=>[
        'crud_names' => 'Roles',
        'crud_name' => 'Role',
        'crud_the_name' => 'The Role',
        'id' => '#',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
        'permissions' => 'Permissions',
    ],
    'Category'=>[
        'crud_names' => 'Categories',
        'crud_name' => 'Category',
        'crud_the_name' => 'The Category',
        'parent_id' => 'Parent Category',
        'manager_id' => 'Manager',
        'color'=>'Color',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
        'description' => 'Description',
        'description_ar' => 'Description Ar',
        'image' => 'Image',
        'has_product' => 'Has Product',
        'has_service' => 'Has Service',
        'min_price'=>'Minimum Price',
        'max_price'=>'Maximum Price',
        'is_active' => 'Status',
    ],
    'Sites'=>[
        'crud_names' => 'Sites',
        'crud_name' => 'Site',
        'crud_the_name' => 'The Site',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
        'image' => 'Image',
        'url' => 'URL',
        'is_active' => 'Status',
    ],
    'Discounts'=>[
        'crud_names' => 'Discounts',
        'crud_name' => 'Discount',
        'crud_the_name' => 'The Discount',
        'site_id'=>'Site Name',
        'country_id'=>'Country',
        'countries'=>'Countries',
        'category_id'=>'Category',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
        'description' => 'Description',
        'description_ar' => 'Description Ar',
        'image' => 'Image',
        'url' => 'Link',
        'is_active' => 'Status',
        'type'=>'Discount Type',
        'value'=>'Discount Value',
        'qrcode'=>'Qrcode',
        'code'=>'Promocode',
        'expire_date'=>'Expire Date',
        'types'=>[
            ''.Constant::DISCOUNT_TYPE['Percentage']=>'Percentage',
            ''.Constant::DISCOUNT_TYPE['FreeDelivery']=>'Free Delivery',
            ''.Constant::DISCOUNT_TYPE['BackCash']=>'BackCash',
            ''.Constant::DISCOUNT_TYPE['BuyOneGetOne']=>'Buy One Get One',
        ]
    ],
    'Posts'=>[
        'crud_names' => 'Posts',
        'crud_name' => 'Post',
        'crud_the_name' => 'The Post',
        'title' => 'Title En',
        'title_ar' => 'Title Ar',
        'description' => 'Description En',
        'description_ar' => 'Description Ar',
        'active' => 'Status',
        'date' => 'Date',
        'type' => 'Type',
        'image'=>'Image',
        'post_types'=>[
            ''.Constant::POST_TYPE['News'] => 'News',
            ''.Constant::POST_TYPE['Analytics'] => 'Analytics',
        ],
    ],
    'Subscription'=>[
        'crud_names' => 'Subscriptions',
        'crud_name' => 'Subscription',
        'crud_the_name' => 'The Subscription',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
        'description' => 'Description',
        'description_ar' => 'Description Ar',
        'image' => 'Image',
        'price' => 'Price',
        'is_active' => 'Status',
    ],
    'Country'=>[
        'crud_names' => 'Countries',
        'crud_name' => 'Country',
        'crud_the_name' => 'The Country',
        'country_code' => 'Country Code',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
        'flag'=>'Flag',
        'is_active' => 'Status',
    ],
    'City'=>[
        'crud_names' => 'Cities',
        'crud_name' => 'City',
        'crud_the_name' => 'The City',
        'country_id' => 'Country',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
        'is_active' => 'Status',
    ],
    'Advertisement'=>[
        'crud_names' => 'Advertisements',
        'crud_name' => 'Advertisement',
        'crud_the_name' => 'The Advertisement',
        'image' => 'Image',
        'title' => 'Title',
        'title_ar' => 'Title Ar',
        'description' => 'Description',
        'description_ar' => 'Description Ar',
        'is_active' => 'Status',
        'type'=>'Type',
        'types'=>[
            ''.Constant::ADVERTISEMENT_TYPE['Url']=>'Url',
            ''.Constant::ADVERTISEMENT_TYPE['Id']=>'Discount Id',
        ],
        'url'=>'Linl',
        'discount_id'=>'Discount Id',
    ],
    'UserSubscription'=>[
        'crud_names' => 'Users Subscriptions',
        'crud_name' => 'User Subscription',
        'crud_the_name' => 'The User Subscription',
        'user_id' => 'User',
        'subscription_id' => 'Subscription',
        'expire_date' => 'Expire Date',
        'status' => 'Status',
        'Statuses' => [
            ''.Constant::USER_SUBSCRIPTION['Pending']=>'Pending',
            ''.Constant::USER_SUBSCRIPTION['Approved']=>'Approved',
            ''.Constant::USER_SUBSCRIPTION['Rejected']=>'Rejected',
        ],
    ],
];
