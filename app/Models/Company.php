<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = "companies";

    protected $fillable = [
        'name',
        'address_line_1',
        'address_line_2',
        'state',
        'city',
        'country',
        'email',
        'contact_no',
        'pin_code',
        'gst_no'
    ];

    public function accountDetails()
    {
        return $this->hasMany(AccountDetail::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}