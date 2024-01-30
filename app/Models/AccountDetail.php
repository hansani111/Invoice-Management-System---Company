<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountDetail extends Model
{
    use HasFactory;

    protected $table = "account_details";

    protected $fillable = [
        'company_id',
        // 'company_name',
        'account_holder_name',
        'account_number',
        'ifsc_code',
        'branch',
        'account_type',
        'pan_no',
        'gst_no',
        'swift_code',
        'bank_address'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // public function company()
    // {
    //     return $this->belongsTo(Company::class, 'company_address_id');
    // }
}