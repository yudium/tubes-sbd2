<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Cart;

class TransactionDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaction_detail';

    /**
     * Move db record from Cart to TransactionDetail table
     *
     * @var integer             $trans_id
     * @var array of integer    $cart_ids
     */
    function pullItemFromCart($trans_id, $cart_ids)
    {
        foreach ($cart_ids as $key => $cart_id) {
            $cart_item = Cart::find($cart_id));
            $trans_detail = new Self;

            $trans_detail->size = $cart_item->size;
            $trans_detail->color = $cart_item->color;
            $trans_detail->quantity = $cart_item->quantity;
            $trans_detail->transaction_id = $trans_id;
            $trans_detail->product_id = $cart_item->product_id;

            $trans_detail->save();
            $cart_item->delete();
        }
    }
}
