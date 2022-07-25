<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Venturecraft\Revisionable\RevisionableTrait;

class UserRole extends Model
{
    use HasFactory, SoftDeletes
    // , RevisionableTrait
    ;

    protected $revisionCreationsEnabled = true;
    protected $revisionForceDeleteEnabled = true;

    protected $primaryKey = 'role_id';

}
