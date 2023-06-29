<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Webhook_Model extends CI_Model
{
    public function updateInvoiceAndPlanStatus($invoice_id, $plan_id, $paymentIntent)
    {
        // find plan and invoice
        $sql = "SELECT * FROM tbl_customer_plan WHERE id = ?";
        $plan = $this->db->query($sql, [$plan_id])->row();

        $currentTime = new DateTime();
        $starts_at = $currentTime->format('Y-m-d H:i:s');
        $currentTime->modify('+'.$plan->plan_duration.' month');
        $ends_at = $currentTime->format('Y-m-d H:i:s');

        $status = $this->db->update('tbl_customer_plan', [
            'plan_status' => 'active',
            'starts_at' =>  $starts_at,
            'ends_at'   => $ends_at
        ], ['id' => $plan_id]);

        $status = $this->db->update('tbl_cust_invoice', [
            'inv_status' => 'paid',
            'stripe_payment_intent_id' => $paymentIntent->id
        ], ['id' => $invoice_id]);
    }
}