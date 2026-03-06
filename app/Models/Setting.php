<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Setting extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'meta_keyword',
        'meta_description',
        'theme_color_1',
        'theme_color_2',
        'header_logo',
        'footer_logo',
        'hero_title',
        'hero_subtitle',
        'about_title',
        'about_subtitle',
        'about_description',
        'contact_title',
        'contact_subtitle',
        'contact_address',
        'contact_email',
    ];
}
