<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
// Not Eloquent\Model anymore, now its App\Model

class Post extends Model
{
    // protected $fillable = ['title', 'body']; //$fillable the field that I want (allow)
    // protected $guarded = ['user_id']; //$guarded the fields and don't permit (not allowed)
    // protected $guarded = []; //Not guarded anything, so MassAssignmentException is ok.

    //Just using above code in a customized parent  Model class.
}
