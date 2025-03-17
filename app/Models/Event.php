<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Event extends Model
{
    
    public function up()
{
    Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('title');
        $table->string('slug')->unique();
        $table->text('description');
        $table->string('location');
        $table->date('date');
        $table->string('category');
        $table->integer('max_participants');
        $table->timestamps();
    });

    
}
// Génération automatique du slug
public static function boot()
{
    parent::boot();

    static::creating(function ($event) {
        $event->slug = Str::slug($event->title);
    });
}
protected $fillable = [
    'title', 'slug', 'description', 'location', 'date', 'category', 'max_participants', 'user_id'
];


public function user()
    {
        return $this->belongsTo(User::class);
    }
}
