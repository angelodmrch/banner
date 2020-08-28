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

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dmrch_banner_banners';

    /*
     * Validation
     */
    public $rules = [
        'image' => 'required'
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
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'image' => ['System\Models\File', 'delete' => true],
    ];    
    public $attachMany = [];

    public $jsonable = ['area'];

    public function getAreaOptions() {
        if (!$theme = Theme::getEditTheme()) {
            throw new ApplicationException('Unable to find the active theme.');
        }

        return Page::listInTheme($theme)->lists('title', 'id');
    }    
}