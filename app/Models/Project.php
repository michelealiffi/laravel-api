<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Indica i campi che possono essere assegnati in massa
    protected $fillable = [
        'name',
        'description',
        'featured',
        'draft',
        'image'
    ];

    // Indica i campi da escludere dalla conversione in JSON (se ce ne sono)
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = ['id'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
