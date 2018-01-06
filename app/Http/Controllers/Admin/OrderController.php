<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;

class OrderController extends Controller
{
    function index()
    {
        $max_item = 5;
        $need_approved_orders    = Transaction::getNeedApproved($max_item);
        $waiting_payment_orders  = Transaction::getWaitingPayment($max_item);
        $payment_verified_orders = Transaction::getPaymentVerified($max_item);
        $recent_success_orders   = Transaction::getRecentSuccess($max_item);

        $max_item = 30;
        $all_orders = Transaction::all()->take($max_item);

        return view('admin/orders', [
            'title'                     => 'List Orders',
            'all_orders'                => $all_orders,
            'need_approved_orders'      => $need_approved_orders,
            'waiting_payment_orders'    => $waiting_payment_orders,
            'payment_verified_orders'   => $payment_verified_orders,
            'recent_success_orders'     => $recent_success_orders,
        ]);
    }

    function needApproved()
    {
        $max_item = 30;

        $need_approved_orders = Transaction::getNeedApproved($max_item);

        return view('admin/orders_all', [
            'title' => 'Need-Approved Orders',
            'orders' => $need_approved_orders,
        ]);
    }

    function waitingPayment()
    {
        $max_item = 30;

        $waiting_payment_orders = Transaction::getWaitingPayment($max_item);

        return view('admin/orders_all', [
            'title' => 'Waiting-Payment Orders',
            'orders' => $waiting_payment_orders,
        ]);
    }

    function paymentVerified()
    {
        $max_item = 30;

        $payment_verified_orders = Transaction::getPaymentVerified($max_item);

        return view('admin/orders_all', [
            'title' => 'Payment-Verified Orders',
            'orders' => $payment_verified_orders,
        ]);
    }

    function recentSuccess()
    {
        $max_item = 30;

        $recent_success_orders = Transaction::getRecentSuccess($max_item);

        return view('admin/orders_all', [
            'title' => 'Recent Success Orders',
            'orders' => $recent_success_orders,
        ]);
    }

    function detail()
    {
        // TODO: make order detail page
    }

    /**
     * Called when admin click checklist button at order page
     *
     * @param Request $req
     * @param integer $id
     * @param string  $state    waiting_approval|rejected|waiting_payment|product_has_sent|done
     */
    function changeState(Request $req, $id, $state)
    {
        if ($this->validateState($state) == -1) {
            return back()->with('status',  'BAD')
                         ->with('message', 'Error! status is not recognized');
        }

        $trans = Transaction::find($id);
        $trans->status = $state;
        $trans->save();

        return back()
        ->with('status', 'OK')
        ->with('message', "Order status changed (Receiver order: {$trans->customer->name})");
    }

    function validateState($state)
    {
        switch ($state) {
            case 'waiting_approval' :break;
            case 'rejected'         :break;
            case 'waiting_payment'  :break;
            case 'product_has_sent' :break;
            case 'done'             :break;
            default                 :return -1;
        }

        return 0;
    }
}