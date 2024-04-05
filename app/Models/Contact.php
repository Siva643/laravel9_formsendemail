<?php
  
namespace App\Models;
  
use Mail;
use App\Mail\ContactMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
  
class Contact extends Model
{
    use HasFactory;
  
    public $fillable = ['name', 'email', 'phone', 'subject', 'message'];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot() {
  
        parent::boot();
  
        static::created(function ($item) {
                
            $adminEmail = "jmsiva333@gmail.com";
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }
}