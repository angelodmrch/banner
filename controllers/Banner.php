<?php namespace Dmrch\Banner\Controllers;

use BackendMenu;
use Flash;
use Lang;
use Backend\Classes\Controller;
use Dmrch\Banner\Models\Banner as ModBanner;

/**
 * M Banner Back-end Controller
 */
class Banner extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Dmrch.Banner', 'banner', 'banner');

        // Grab the drag and drop requirements
        $this->addCss('/plugins/dmrch/banner/assets/css/sortable.css');
        $this->addJs('/plugins/dmrch/banner/assets/js/html5sortable.js');
        $this->addJs('/plugins/dmrch/banner/assets/js/sortable.js');
    }

    /**
     * Extend the list query to position the rows correctly
     */
    public function listExtendQuery($query, $definition = null)
    {
        $query->orderBy('ordem', 'asc');
    }
    
    /*
     * Reorder the row positions
     */
    public function index_onUpdatePosition()
    {
        $moved = [];
        $position = 0;
        if (($reorderIds = post('checked')) && is_array($reorderIds) && count($reorderIds)) {
            foreach ($reorderIds as $id) {
                if (in_array($id, $moved) || !$record = ModBanner::find($id))
                    continue;
                $record->ordem = $position;
                $record->save();
                $moved[] = $id;
                $position++;
            }
            Flash::success(Lang::get('rainlab.blog::lang.banner.reorder_success'));
        }
        return $this->listRefresh();
    }
}