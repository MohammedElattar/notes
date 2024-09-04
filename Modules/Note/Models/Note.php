<?php

namespace Modules\Note\Models;

use App\Traits\PaginationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Note\Database\Factories\NoteFactory;

class Note extends Model
{
    use HasFactory, PaginationTrait;

    protected $fillable = ['content'];

    protected static function newFactory(): NoteFactory
    {
        return NoteFactory::new();
    }
}
