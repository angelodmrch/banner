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
            'classe' => [
                 'title'             => 'Classe',
                 'description'       => 'Classe do plugin Jquery',
                 'default'           => '0',
                 'type'              => 'string'
            ],
            'area' => [
                 'title'             => 'Area',
                 'default'           => 'Home',
                 'type'              => 'string'
            ]
        ];
    }

    public function onRender()
    {
        $this->page['classe'] = $this->property('classe');
    }

    public function onRun()
    {
        $this->banners = $this->getBanners($this->property('area'));
    }

    public function getBanners($area)
    {
        return ModBanner::where('status', 1)
            ->where(function ($query) use ($area) {
                $query->where('area','LIKE','%"'.$area.'"%')
                    ->orWhere('area','0')
                    ->orWhere('area',NULL);
            })
            ->where(function ($query) {
                $query->where('published_at', '<=', date('Y-m-d H:i:s'))
                    ->orWhere('published_at', NULL);
            })
            ->orderBy('ordem','asc')
            ->orderBy('id','desc')->get();
    }
}