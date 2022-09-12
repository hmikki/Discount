<?php

namespace App\Http\Controllers\Admin\AppContent;

use App\Http\Controllers\Admin\Controller;
use App\Models\Category;
use App\Traits\AhmedPanelTrait;

class CategoryController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('app_content/categories');
        $this->setEntity(new Category());
        $this->setTable('categories');
        $this->setLang('Category');
        $this->setColumns([
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_searchable'=>true,
                'order'=>true
            ],
            'color'=> [
                'name'=>'color',
                'type'=>'color',
                'is_searchable'=>false,
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
            'description'=> [
                'name'=>'description',
                'type'=>'text',
                'is_required'=>true,
                'is_required_update'=>false,
            ],
            'description_ar'=> [
                'name'=>'description_ar',
                'type'=>'text',
                'is_required'=>true,
                'is_required_update'=>false,
            ],
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'color'=> [
                'name'=>'color',
                'type'=>'color',
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
            'delete',
        ]);
    }

}
