<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $fillable = ['invoices_id', 'user_phone', 'item_id', 'invoice_status', 'item_name', 'quantity', 'option', 'message', 'address', 'courier', 'price'];
}
