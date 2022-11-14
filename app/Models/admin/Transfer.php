<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    public $table='transfer';

    protected $fillable = [
        'user_id',
        'to_account_id',
        'from_account_id',
        'amount',
        'date',
        'remark',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function to_account(){
        return $this->belongsTo(Account::class,'to_account_id');
    }
    public function from_account(){
        return $this->belongsTo(Account::class,'from_account_id');
    }
}
