<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Report
 * @package App\Models
 * @version November 6, 2020, 8:02 am UTC
 *
 */
class Report extends Model
{
    use SoftDeletes;

    public $table = 'reports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function trans()
    {
        return $this->hasMany('App\Models\Transaksi','transaksi_id','id');
    }

    public function status()
    {
        return $this->hasMany('App\Models\status_pembayaran','nama_status','id');
    }
      
}
