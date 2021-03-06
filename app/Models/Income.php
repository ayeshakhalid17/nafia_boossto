<?php

namespace App\Models;
use App\Observers\IncomeObserver;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property float $amount
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 */
class Income extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'income';

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        Income::observe(IncomeObserver::class);

    }

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['category_id', 'guid','name', 'amount', 'date', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
