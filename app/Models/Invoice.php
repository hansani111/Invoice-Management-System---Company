<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = "invoices";

    protected $fillable = [
        'company_id',
        'invoice_no',
        'invoice_date',
        'reference_no',
        'reference_date',
        'invoice_amount',
        'cgst_rate',
        'sgst_rate',
        'igst_rate',
        'cgst_amount',
        'sgst_amount',
        'igst_amount',
        'gst_amount',
        'total_gst',
        'company_address_id',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class); // Example relationship definition
    }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}