<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentService extends Model
{
    protected $table = 'payment_service';

    protected $primaryKey = null; // Since it's a composite primary key

    public $incrementing = false; // Since it's a composite primary key

    protected $fillable = [
        'payment_id',
        'service_id',
        // Add other fillable fields if necessary
    ];

    // Define relationships if needed
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
