<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LakM\Comments\Concerns\Commentable;

class Article extends Model
{
    use HasFactory;
    use Commentable;

    private $guestMode = false;
}
