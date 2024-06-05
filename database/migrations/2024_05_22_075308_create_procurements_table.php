<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProcurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('procurements', function (Blueprint $table) {
            // Rename existing columns
            $table->renameColumn('procurement_act', 'early_procurement');
            $table->renameColumn('pre_pro_conference', 'advertisement');
            $table->renameColumn('eligibility_check', 'submission');

            // Change columns to be nullable if they are not already
            $table->string('code')->nullable()->change();
            $table->string('source_funds')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('category')->nullable()->change();

            // Drop unnecessary columns
            $table->dropColumn([
                'ads',
                'sub',
                'bid_eval',
                'post_qual',
                'bac_resolution_award',
                'notice_proceed',
                'delivery',
                'inspection'
            ]);

            // Add new columns based on the provided image
            $table->string('app')->nullable();
            $table->string('project_type')->nullable();
            $table->date('annual_procurement_plan')->nullable();
            $table->date('complete_set_of_ppu')->nullable();
            $table->date('purchase_request')->nullable();
            $table->date('condition_of_funds_and_availability')->nullable();
            $table->date('certificate_of_funded_body')->nullable();
            $table->string('end_user')->nullable();
            $table->string('abc_uwp')->nullable();
            $table->decimal('contract_cost', 15, 2)->nullable();
            $table->string('date_of_receipt_of_initiation')->nullable();
            $table->date('infrastructure')->nullable();
            $table->date('goods')->nullable();
            $table->date('consulting')->nullable();
            $table->string('posted_to')->nullable();
            $table->string('procurement_lead')->nullable();
            $table->string('funding_source')->nullable();
            $table->date('date_of_public_bidding')->nullable();
            $table->date('date_of_negotiated_procurement')->nullable();
            $table->date('date_of_alternative_method')->nullable();
            $table->date('date_of_evaluation_of_eligibility')->nullable();
            $table->date('date_of_post_qualification')->nullable();
            $table->date('date_of_notice_of_award')->nullable();
            $table->date('date_of_contract_signing')->nullable();
            $table->date('date_of_notice_to_proceed')->nullable();
            $table->date('date_of_delivery')->nullable();
            $table->date('date_of_inspection')->nullable();
            $table->date('date_of_acceptance')->nullable();
            $table->date('date_of_closing')->nullable();

            // Add foreign key constraint
            $table->foreignId('supplier_history_id')->nullable()->constrained('supplier_histories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('procurements', function (Blueprint $table) {
            // Remove foreign key constraint
            $table->dropForeign(['supplier_history_id']);

            // Rename columns back to original
            $table->renameColumn('early_procurement', 'procurement_act');
            $table->renameColumn('advertisement', 'pre_pro_conference');
            $table->renameColumn('submission', 'eligibility_check');

            // Revert the nullable change if necessary
            $table->string('code')->nullable(false)->change();
            $table->string('source_funds')->nullable(false)->change();
            $table->string('status')->nullable(false)->change();
            $table->string('category')->nullable(false)->change();

            // Drop added columns
            $table->dropColumn([
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
            ]);

            // Add dropped columns back
            $table->date('ads')->nullable();
            $table->date('sub')->nullable();
            $table->date('bid_eval')->nullable();
            $table->date('post_qual')->nullable();
            $table->date('bac_resolution_award')->nullable();
            $table->date('notice_proceed')->nullable();
            $table->date('delivery')->nullable();
            $table->date('inspection')->nullable();
        });
    }
}