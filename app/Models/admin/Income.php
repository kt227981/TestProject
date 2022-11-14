<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    public $table='incomes';

    protected $fillable = [
        'user_id',
        'category_id',
        'account_id',
        'amount',
        'date',
        'remark',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function category(){
       return $this->belongsTo(Category::class,'category_id');
    }

    public function account(){
        return $this->belongsTo(Account::class,'account_id');
    }
}
