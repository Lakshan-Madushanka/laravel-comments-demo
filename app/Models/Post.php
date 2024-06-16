<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LakM\Comments\Concerns\Commentable;

class Post extends Model
{
    use HasFactory;
    use Commentable;

    private $guestMode = true;
}
