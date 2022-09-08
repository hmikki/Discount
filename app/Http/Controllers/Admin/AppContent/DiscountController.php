<?php

namespace App\Http\Controllers\Admin\AppContent;

use App\Helpers\Constant;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\AppContent\Discount\StoreRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Discount;
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
            'category_id'=> [
                'name'=>'category_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> Category::all(),
                    'custom'=>function($Object){
                        return app()->getLocale() == 'ar'?$Object->getNameAr():$Object->getName();
                    },
                    'entity'=>'category'
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
            'site_id'=> [
                'name'=>'site_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> Site::where('is_active', true)->get(),
                    'custom'=>function($Object){
                        return app()->getLocale() == 'ar'?$Object->getNameAr():$Object->getName();
                    },
                    'entity'=>'site'
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
            'country_id'=> [
                'name'=>'country_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> Country::all(),
                    'custom'=>function($Object){
                        return app()->getLocale() == 'ar'?$Object->getNameAr():$Object->getName();
                    },
                    'entity'=>'country'
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
            'image'=> [
                'name'=>'image',
                'type'=>'image',
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
                        return app()->getLocale() == 'ar'?$Object->getNameAr():$Object->getName();
                    },
                    'entity'=>'site'
                ],
                'is_required'=>true
            ],
            'category_id'=> [
                'name'=>'category_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> Category::all(),
                    'custom'=>function($Object){
                        return app()->getLocale() == 'ar'?$Object->getNameAr():$Object->getName();
                    },
                    'entity'=>'category'
                ],
                'is_required'=>true
            ],
            'country_id'=> [
                'name'=>'country_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> Country::all(),
                    'custom'=>function($Object){
                        return app()->getLocale() == 'ar'?$Object->getNameAr():$Object->getName();
                    },
                    'entity'=>'country'
                ],
                'is_required'=>true
            ],
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_required'=>true
            ],
            'name_ar'=> [
                'name'=>'name_ar',
                'type'=>'text',
                'is_required'=>true
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
            'expire_date'=> [
                'name'=>'expire_date',
                'type'=>'date',
                'is_required'=>true,
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
}
