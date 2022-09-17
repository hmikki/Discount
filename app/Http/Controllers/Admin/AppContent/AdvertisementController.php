<?php

namespace App\Http\Controllers\Admin\AppContent;

use App\Helpers\Constant;
use App\Http\Controllers\Admin\Controller;
use App\Models\Advertisement;
use App\Models\Discount;
use App\Traits\AhmedPanelTrait;

class AdvertisementController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('app_content/advertisements');
        $this->setEntity(new Advertisement());
        $this->setTable('advertisements');
        $this->setLang('Advertisement');
        $this->setColumns([
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_searchable'=>true,
                'order'=>true
            ],
            'title'=> [
                'name'=>'title',
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
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_required'=>true,
                'is_required_update'=>false,
            ],
            'title'=> [
                'name'=>'title',
                'type'=>'text',
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'title_ar'=> [
                'name'=>'title_ar',
                'type'=>'text',
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'description'=> [
                'name'=>'description',
                'type'=>'text',
                'is_required'=>false,
                'is_required_update'=>false
            ],
            'description_ar'=> [
                'name'=>'description_ar',
                'type'=>'text',
                'is_required'=>false,
                'is_required_update'=>false
            ],
            'type'=> [
                'name'=>'type',
                'type'=>'select',
                'data' => ([
                    1 => __('crud.Advertisement.types.'.Constant::ADVERTISEMENT_TYPE['Url']),
                    2 => __('crud.Advertisement.types.'.Constant::ADVERTISEMENT_TYPE['Id']),
                ]),
                'is_required'=>false,
                'is_required_update'=>false
            ],
            'url'=> [
                'name'=>'url',
                'type'=>'text',
                'is_required'=>false,
                'is_required_update'=>false
            ],
            'discount_id'=> [
                'name'=>'discount_id',
                'type' => 'custom_relation',
                'relation' => [
                    'data' => Discount::all(),
                    'custom' => function ($Object) {
                        return ($Object) ? ((app()->getLocale() == 'ar') ? $Object->name_ar : $Object->name) : '-';
                    },
                    'entity' => 'category',
                ],
                'is_required'=>false,
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
