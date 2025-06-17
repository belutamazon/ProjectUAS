<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ChatMenu extends Model
{
    protected $fillable = ['user_id', 'partner_id'];
    public $timestamps = false;
}
