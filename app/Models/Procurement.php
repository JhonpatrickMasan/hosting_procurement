<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procurement extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'project',
        'category',
        'end_user',
        'status',
        'source_funds',
        'remarks',
        'update_details',
        'procurement_id',
        'app',
        'project_type',
        'annual_procurement_plan',
        'complete_set_of_ppu',
        'purchase_request',
        'condition_of_funds_and_availability',
        'certificate_of_funded_body',
        'end_user',
        'abc_uwp',
        'contract_cost',
        'date_of_receipt_of_initiation',
        'infrastructure',
        'goods',
        'consulting',
        'posted_to',
        'procurement_lead',
        'funding_source',
        'date_of_public_bidding',
        'date_of_negotiated_procurement',
        'date_of_alternative_method',
        'date_of_evaluation_of_eligibility',
        'date_of_post_qualification',
        'date_of_notice_of_award',
        'date_of_contract_signing',
        'date_of_notice_to_proceed',
        'date_of_delivery',
        'date_of_inspection',
        'date_of_acceptance',
        'date_of_closing',
    ];

    public function procurement()
    {
        return $this->belongsTo(Procurement::class);
    }

    public function supplierHistory()
    {
        return $this->belongsTo(SupplierHistory::class);
    }

    public function updates()
    {
        return $this->hasMany(Procurement::class);
    }
    public function getProgressPercentage()
    {
        switch ($this->current_stage) {
            case 'Annual Procurement Plan Submission':
                return 33.33; // Assuming 3 equal stages
            case 'Amendatory APP/Resolution':
                return 66.66;
            case 'Purchase Request Submission':
                return 100;
            default:
                return 0;
        }
    }
    public function getCurrentStage()
    {
        return $this->current_stage;
    }
}