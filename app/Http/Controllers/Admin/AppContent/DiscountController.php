<?php

namespace App\Http\Controllers\Admin\AppContent;

use App\Helpers\Constant;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\AppContent\Discount\StoreRequest;
use App\Http\Requests\Admin\AppContent\Discount\UpdateRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Discount;
use App\Models\DiscountCountry;
use App\Models\Site;
use App\Traits\AhmedPanelTrait;

class DiscountController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('app_content/discounts');
        $this->setEntity(new Discount());
        $this->setTable('discounts');
        $this->setViewShow('Admin.AppContent.Discount.show');
        $this->setLang('Discounts');
        $this->setColumns([
            'site_id'=> [
                'name'=>'site_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> Site::where('is_active', true)->get(),
                    'custom'=>function($Object){
                        return ($Object)?((app()->getLocale() == 'ar')?$Object->getNameAr():$Object->getName()): '-';
                    },
                    'entity'=>'site'
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
            'category_id'=> [
                'name'=>'category_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> Category::all(),
                    'custom'=>function($Object){
//                        return $Object;
                        return ($Object)?((app()->getLocale() == 'ar')?$Object->getNameAr():$Object->getName()): '-';
                    },
                    'entity'=>'category'
                ],
                'is_searchable'=>false,
                'order'=>true
            ],
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_searchable'=>true,
                'order'=>true
            ],
            'code'=> [
                'name'=>'code',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
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

            'url'=> [
                'name'=>'url',
                'type'=>'url',
                'is_searchable'=>true,
                'order'=>true
            ],
            'expire_date'=> [
                'name'=>'expire_date',
                'type'=>'datetime',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->setFields([
            'site_id'=> [
                'name'=>'site_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> Site::where('is_active', true)->get(),
                    'custom'=>function($Object){
                        return ($Object)?((app()->getLocale() == 'ar')?$Object->getNameAr():$Object->getName()): '-';
                    },
                    'entity'=>'site'
                ],
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'category_id'=> [
                'name'=>'category_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> Category::where('is_active', true)->get(),
                    'custom'=>function($Object){
                        return ($Object)?((app()->getLocale() == 'ar')?$Object->getNameAr():$Object->getName()): '-';
                    },
                    'entity'=>'category'
                ],
                'is_required'=>true,
                'is_required_update'=>false
            ],
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
            'description'=> [
                'name'=>'description',
                'type'=>'textarea',
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'description_ar'=> [
                'name'=>'description_ar',
                'type'=>'textarea',
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'code'=> [
                'name'=>'code',
                'type'=>'text',
                'is_required'=>false,
                'is_required_update'=>false
            ],
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'url'=> [
                'name'=>'url',
                'type'=>'url',
                'is_required'=>false,
                'is_required_update'=>false
            ],
            'type'=> [
                'name'=>'type',
                'type'=>'select',
                    'data'=>[
                        Constant::DISCOUNT_TYPE['Percentage'] =>__('crud.Discounts.types.'.Constant::DISCOUNT_TYPE['Percentage'],[],session('my_locale')),
                        Constant::DISCOUNT_TYPE['FreeDelivery'] =>__('crud.Discounts.types.'.Constant::DISCOUNT_TYPE['FreeDelivery'],[],session('my_locale')),
                        Constant::DISCOUNT_TYPE['BackCash'] =>__('crud.Discounts.types.'.Constant::DISCOUNT_TYPE['BackCash'],[],session('my_locale')),
                        Constant::DISCOUNT_TYPE['BuyOneGetOne'] =>__('crud.Discounts.types.'.Constant::DISCOUNT_TYPE['BuyOneGetOne'],[],session('my_locale')),
                        ],
                'is_required'=>false,
                'is_required_update'=>false
            ],
            'value'=> [
                'name'=>'value',
                'type'=>'text',
                'is_required'=>false,
                'is_required_update'=>false
            ],
            'expire_date'=> [
                'name'=>'expire_date',
                'type'=>'date',
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'countries'=> [
                'name'=>'countries',
                'type'=>'multi_checkbox',
                'custom'=>[
                    'ListModel'=>[
                        'Model'=>(new Country())->all(),
                        'name'=>(app()->getLocale() == 'ar')? 'name_ar' : 'name',
                        'id'=>'id',
                    ],
                    'RelationModel'=>[
                        'Model'=>(new DiscountCountry()),
                        'ref_id'=>'country_id',
                        'id'=>'discount_id',
                    ],
                    'CheckFunc'=>function ($Object ,$id){
                        if($Object){
                            return true;
                        }
                        return false;
                    }
                ],
                'is_required'=>false,
                'is_required_update'=>false
            ],

        ]);
        $this->SetLinks([
            'show',
            'edit',
            'delete'
        ]);
    }
    public function store(StoreRequest $request)
    {
        return $request->preset($this);
    }
    public function update(UpdateRequest $request, $id)
    {
        return $request->preset($this, $id);
    }
}
