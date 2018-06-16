<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    // protected $fillable = ['title', 'body']; //$fillable the field that I want (allow)
    // protected $guarded = ['user_id']; //$guarded the fields and don't permit (not allowed)
    protected $guarded = []; //Not guarded anything, so massively field is ok.

    //To avoid MassAssignmentException we use those to variables $fillable and $guarded
}