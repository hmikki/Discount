<?php

namespace App\Http\Controllers\Admin\AppContent;

use App\Helpers\Constant;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\AppContent\Discount\OrderStatusRequest;
use App\Models\Order;
use App\Models\Site;
use App\Models\User;
use App\Traits\AhmedPanelTrait;

class SitesController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('app_content/sites');
        $this->setEntity(new Site());
        $this->setTable('sites');
        $this->setLang('Sites');
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
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_searchable'=>true,
                'order'=>true
            ],
            'url'=> [
                'name'=>'url',
                'type'=>'url',
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
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'url'=> [
                'name'=>'url',
                'type'=>'url',
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
            'show',
            'edit',
            'delete'
        ]);
    }
    public function change_status(OrderStatusRequest $request){
        return $request->preset($this);
    }
}
