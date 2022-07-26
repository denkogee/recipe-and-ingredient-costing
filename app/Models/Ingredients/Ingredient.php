<?php

namespace App\Models\Ingredients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Venturecraft\Revisionable\RevisionableTrait;

class Ingredient extends Model
{
    use HasFactory, SoftDeletes
    // , RevisionableTrait
    ;

    protected $revisionCreationsEnabled = true;

    protected $primaryKey = 'in_id';

    protected $table = 'ingredients';

    protected $fillable = [
        'in_name',
        'in_code',
        'in_short_name',
        'in_other_names',
        'in_cat_id',
        'unit',
        'unit_price',
        'weight_volume',
        'pack_size',
    ];

    public function belonged_category() {
        return $this->belongsTo(IngredientCategory::class,'in_cat_id')->withTrashed();
    }

    public static function genCode() {
        $max_count = self::withTrashed()->count();
        if($max_count) {
            $code = 'IN/'.str_pad($max_count+1,4,0,STR_PAD_LEFT);
        } else {
            $code = 'IN/0001';
        }
        return $code;
    }

}
