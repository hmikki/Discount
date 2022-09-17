<?php


namespace App\Helpers;


class Constant
{
    const NOTIFICATION_TYPE = [
        'General'=>1,
        'Ticket'=>2,
        'Order'=>3,
        'Message'=>4,
    ];
    const VERIFICATION_TYPE = [
        'Email'=>1,
        'Mobile'=>2
    ];
    const VERIFICATION_TYPE_RULES = '1,2';
    const ADVERTISEMENT_TYPE = [
        'Url'=>1,
        'Id'=>2
    ];
    const ADVERTISEMENT_TYPE_RULES = '1,2';
    const SETTING_TYPE = [
        'Page'=>1,
        'Splash'=>2,
        'Notification'=>3,
        'Values'=>4,
        'Bools'=>5,
    ];
    const MEDIA_TYPE = [
        'Attachments'=>1,
        'Experience_Certificate'=>2,
        'College_Document'=>3,
    ];
    const MEDIA_TYPE_RULES = '1,2,3';
    const TICKETS_STATUS = [
        'Open'=>1,
        'Closed'=>2
    ];
    const SENDER_TYPE = [
        'User'=>1,
        'Admin'=>2,
    ];
    const SENDER_TYPE_RULES='1,2';
    const USER_SUBSCRIPTION = [
        'Pending'=>1,
        'Approved'=>2,
        'Rejected'=>3,
    ];
    const FORGET_TYPE = [
        'Email'=>1,
        'Mobile'=>2
    ];
    const FORGET_TYPE_RULES = '1,2';
    const DISCOUNT_TYPE = [
        'Percentage'=>1,
        'FreeDelivery'=>2,
        'BackCash'=>3,
        'BuyOneGetOne'=>4,
    ];
    const DISCOUNT_TYPE_RULES = '1,2,3,4';
}
