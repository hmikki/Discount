<?php

namespace App\Http\Controllers\Admin\AppData;

use App\Http\Controllers\Admin\Controller;
use App\Models\City;
use App\Models\Country;
use App\Traits\AhmedPanelTrait;

class CountryController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('app_data/countries');
        $this->setEntity(new Country());
        $this->setTable('Countries');
        $this->setLang('Country');
        $this->setColumns([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'name_ar'=> [
                'name'=>'name_ar',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'flag'=> [
                'name'=>'flag',
                'type'=>'image',
                'is_searchable'=>true,
                'order'=>true
            ],
            'country_code'=> [
                'name'=>'country_code',
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
        ]);
        $this->setFields([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'name_ar'=> [
                'name'=>'name_ar',
                'type'=>'text',
                'is_required'=>true,
                'is_required_update'=>false
            ],

            'flag'=> [
                'name'=>'flag',
                'type'=>'image',
                'is_required'=>true,
                'is_required_update'=>false,
            ],
            'country_code'=> [
                'name'=>'country_code',
                'type'=>'text',
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'is_active'=> [
                'name'=>'is_active',
                'type'=>'active',
                'is_required'=>true,
                'is_required_update'=>false
            ],
        ]);
        $this->SetLinks([
            'edit',
            'delete',
        ]);
    }

}
