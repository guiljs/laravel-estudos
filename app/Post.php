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

    public function comments()
    {
        return $this->hasMany(Comment::class); //Comment::class is the same of App\Comment
    }

    public function addComment($body)
    {
        //add a comment to a post

        // Comment::create([
        //     'body' => $body,
        //     'post_id' => $this->id,
        //     'user_id' => 1
        // ]);

        $this->comments()->create(compact('body'));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
