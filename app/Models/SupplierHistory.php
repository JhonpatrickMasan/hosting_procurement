<?php

// app/Models/SupplierHistory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'code',
        'procurement_project',
        'pmo',
        'advertising',
        'submission',
        'notice_of_award',
        'contract_signing',
        'source_funds',
        'total',
        'mooe',
        'co',
        'remarks'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
