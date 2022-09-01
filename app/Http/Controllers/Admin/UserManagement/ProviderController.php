<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Helpers\Constant;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\UserManagement\User\ActiveEmailMobileRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Traits\AhmedPanelTrait;

class ProviderController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('user_managements/providers');
        $this->setViewShow('Admin.UserManagement.Provider.show');
        $this->setEntity(new User());
        $this->setTable('users');
        $this->setLang('Provider');
        $this->setCreate(false);
        $this->setFilters([
            'type'=>[
                'name'=>'type',
                'type'=>'where',
                'value'=>Constant::USER_TYPE['Provider']
            ]
        ]);
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
            'status'=> [
                'name'=>'status',
                'type'=>'select',
                'data'=>[
                    1 =>__('crud.Provider.profile_statuses.'.Constant::USER_STATUS['Active'],[],session('my_locale')),
                    2 =>__('crud.Provider.profile_statuses.'.Constant::USER_STATUS['Not_Complete'],[],session('my_locale')),
                    3 =>__('crud.Provider.profile_statuses.'.Constant::USER_STATUS['Deactivate'],[],session('my_locale')),
                    4 =>__('crud.Provider.profile_statuses.'.Constant::USER_STATUS['Under_Review'],[],session('my_locale')),
                    ],
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
        $this->setFields([
            'status'=> [
                'name'=>'status',
                'type'=>'select',
                'data'=>[
                    1=> __('crud.Provider.profile_statuses.'.Constant::USER_STATUS['Active'],[],session('my_locale')),
                    2=> __('crud.Provider.profile_statuses.'.Constant::USER_STATUS['Not_Complete'],[],session('my_locale')),
                    3=> __('crud.Provider.profile_statuses.'.Constant::USER_STATUS['Deactivate'],[],session('my_locale')),
                    4=> __('crud.Provider.profile_statuses.'.Constant::USER_STATUS['Under_Review'],[],session('my_locale')),
                ],
                'is_required'=>false,
                'is_required_update'=>false,
            ],
            'name_editable'=> [
                'name'=>'name_editable',
                'type'=>'boolean',
                'is_required'=>false,
                'is_required_update'=>false,
            ],
            'country_code_editable'=> [
                'name'=>'country_code_editable',
                'type'=>'boolean',
                'is_required'=>false,
                'is_required_update'=>false,
            ],
            'mobile_editable'=> [
                'name'=>'mobile_editable',
                'type'=>'boolean',
                'is_required'=>false,
                'is_required_update'=>false,
            ],
            'bio_editable'=> [
                'name'=>'bio_editable',
                'type'=>'boolean',
                'is_required'=>false,
                'is_required_update'=>false,
            ],
            'provider_type_editable'=> [
                'name'=>'provider_type_editable',
                'type'=>'boolean',
                'is_required'=>false,
                'is_required_update'=>false,
            ],
            'image_editable'=> [
                'name'=>'image_editable',
                'type'=>'boolean',
                'is_required'=>false,
                'is_required_update'=>false,
            ],
            'id_number_editable'=> [
                'name'=>'id_number_editable',
                'type'=>'boolean',
                'is_required'=>false,
                'is_required_update'=>false,
            ],
            'side_name_editable'=> [
                'name'=>'side_name_editable',
                'type'=>'boolean',
                'is_required'=>false,
                'is_required_update'=>false,
            ],
            'record_number_editable'=> [
                'name'=>'record_number_editable',
                'type'=>'boolean',
                'is_required'=>false,
                'is_required_update'=>false,
            ],
            'category_id_editable'=> [
                'name'=>'category_id_editable',
                'type'=>'boolean',
                'is_required'=>false,
                'is_required_update'=>false,
            ],
        ]);
        $this->SetLinks([
            'active_mobile_email'=>[
                'route'=>'active_mobile_email',
                'icon'=>'fa-check-square',
                'lang'=>__('crud.Provider.Links.active_mobile',[],session('my_locale')),
                'condition'=>function ($Object){
                    return (is_null($Object->getEmailVerifiedAt())|| is_null($Object->getMobileVerifiedAt()));
                }
            ],
            'active',
            'show',
            'change_password',
            'edit',
        ]);
    }
    public function active_mobile_email($id,ActiveEmailMobileRequest $request){
        return $request->preset($this,$id);
    }
}
