<?php namespace Dmrch\Banner\Models;

use Model;
use Lang;
use Cms\Classes\Page;
use Cms\Classes\Theme;
use ApplicationException;
use ValidationException;

/**
 * Banner Model
 */
class Banner extends Model
{

    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;

    const SORT_ORDER = 'sort_order';

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dmrch_banner_banners';

    /*
     * Validation
     */
    public $rules = [
       //'image' => 'required'
    ];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'group' => ['Dmrch\Banner\Models\Group'],
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'image' => ['System\Models\File', 'delete' => true],
    ];    
    public $attachMany = [];

    public function afterCreate() {
        $banner = Banner::find($this->id);
        $banner->sort_order = 1;
        $banner->save();

        $sort_order = 2;
        foreach (Banner::where('id','<>', $this->id)->orderBy('sort_order', 'asc')->get() as $banner) {
            $banner->sort_order = $sort_order;
            $banner->save();

            $sort_order++;
        }
    }
}