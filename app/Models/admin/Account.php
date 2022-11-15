<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    public $table = 'accounts';

   protected $appends = ['Income','Expenses','FromTransfer','ToTransfer'];

    protected $fillable = [
        'type',
        'name',
        'user_id',
        'amount',
        'status',
    ];

    public function user() {
           return $this->belongsTo(User::class,'user_id');
    }

    public function getIncomeAttribute()
    {
    return $this->income()->sum('amount');
    }

    public function income()
    {
        return $this->hasMany(Income::class, 'account_id');
    }

    public function getExpensesAttribute()
    {
        return $this->Expenses()->sum('amount');
    }

    public function Expenses()
    {
        return $this->hasMany(Expenses::class, 'account_id');
    }

    public function getFromTransferAttribute()
    {
        return $this->FromTransfer()->sum('amount');
    }

    public function FromTransfer()
    {
        return $this->hasMany(Transfer::class, 'from_account_id');
    }

    public function getToTransferAttribute()
    {
        return $this->ToTransfer()->sum('amount');
    }

    public function ToTransfer()
    {
        return $this->hasMany(Transfer::class, 'to_account_id');
    }



}
