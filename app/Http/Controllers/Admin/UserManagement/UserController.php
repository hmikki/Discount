<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Helpers\Constant;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\UserManagement\User\ActiveEmailMobileRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Traits\AhmedPanelTrait;

class UserController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('user_managements/users');
        $this->setEntity(new User());
        $this->setViewShow('Admin.UserManagement.Customer.show');
        $this->setTable('users');
        $this->setLang('Customer');
        $this->setCreate(false);
        $this->setColumns([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'country_code'=> [
                'name'=>'country_code',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'mobile'=> [
                'name'=>'mobile',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'is_active'=> [
                'name'=>'is_active',
                'type'=>'active',
                'is_searchable'=>true,
                'order'=>true
            ],
            'created_at'=> [
                'name'=>'created_at',
                'type'=>'datetime',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->SetLinks([
            'active_mobile_email'=>[
                'route'=>'active_mobile_email',
                'icon'=>'fa-check-square',
                'lang'=>__('crud.Customer.Links.active_mobile',[],session('my_locale')),
                'condition'=>function ($Object){
                    return (is_null($Object->getEmailVerifiedAt())|| is_null($Object->getMobileVerifiedAt()));
                }
            ],
            'active',
            'show',
            'change_password',
        ]);
    }
    public function active_mobile_email($id,ActiveEmailMobileRequest $request){
        return $request->preset($this,$id);
    }
}
