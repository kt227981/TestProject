<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    public $table='expenses';

    protected $fillable = [
        'user_id',
        'category_id',
        'account_id',
        'amount',
        'date',
        'remark',
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function Category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function Account(){
        return $this->belongsTo(Account::class,'account_id');
    }

}
