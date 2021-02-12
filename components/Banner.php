<?php namespace Dmrch\Banner\Components;

use Cms\Classes\ComponentBase;
use Dmrch\Banner\Models\Banner as ModBanner;

class Banner extends ComponentBase
{

    public $banners;

    public function componentDetails()
    {
        return [
            'name'        => 'Banner Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'group_id' => [
                 'title'             => 'Area',
                 'default'           => '1',
                 'type'              => 'string'
            ],
            'controls' => [
                 'title'             => 'controls',
                 'default'           => 'true',
                 'type'              => 'string'
            ], 
            'nav' => [
                 'title'             => 'nav',
                 'default'           => 'true',
                 'type'              => 'string'
            ]
        ];
    }

    public function onRun() {
        $this->banners = $this->getBanners();
    }

    public function getBanners() {

        return ModBanner::where('status', 1)
            ->where(function ($query) {
                $query->where('published_at', '<=', date('Y-m-d H:i:s'))
                    ->orWhere('published_at', NULL);
            })
            ->orderBy('sort_order','asc')
            ->orderBy('id','desc')->get();
    }
}