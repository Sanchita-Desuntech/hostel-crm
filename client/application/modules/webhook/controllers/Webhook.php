<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Webhook extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Webhook_Model');
    }

    public function stripe()
    {
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = $_ENV['STRIPE_WEBHOOK_SECRET'];

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }

        // Handle the event
        switch ($event->type) {
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object;
                $invoice_id = $paymentIntent->metadata->invoice_id;
                $plan_id = $paymentIntent->metadata->plan_id;
                $this->Webhook_Model->updateInvoiceAndPlanStatus(
                    $invoice_id,
                    $plan_id,
                    $paymentIntent
                );
                break;
            case 'payment_intent.payment_failed':
                $paymentIntent = $event->data->object;
                break;

            default:
            echo 'Received unknown event type ' . $event->type;
        }
    }
}
