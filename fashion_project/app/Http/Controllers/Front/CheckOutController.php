<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Utilities\Constant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    //
    public function index(){
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request){

//        if($request->payment_type == 'pay_later'){
            //1.Them don hang
            $data = $request->all();
            $data['status'] = Constant::order_status_ReceiveOrders;
            $order = Orders::create($data);

            //2.Them chi tiet don hang
            $carts = Cart::content();

            foreach ($carts as $cart){
                $data = [
                    'order_id' => $order->id,
                    'product_id' => $cart->id,
                    'qty' => $cart->qty,
                    'amount' => $cart->price,
                    'total' => $cart->price * $cart->qty,

                ];
                OrderDetails::create($data);
            }

//            //3. Gui email
//            $total = Cart::total();
//            $subtotal = Cart::subtotal();
//            $this->sendEmail($order, $total, $subtotal);

            //4.Xoa gio hang
            Cart::destroy();

            //5.Tra ve ket qua
            return redirect('checkout/result')->with('notification', 'Success !');
//        }
//        else{
//            return "Online payment method not supported";
//        }

    }

    public function result(){

        $notification = session('$notification');

        return view('front.checkout.result', compact('notification'));
    }

//    private function sendEmail($order, $total, $subtotal){
//        $email_to = $order->email;
//        Mail::send('front.checkout.email', compact('order', 'total', 'subtotal'), function ($message) use ($email_to) {
//            $message->from('tu700131@gmail.com', 'Larana Fashion');
//            $message->to($email_to, $email_to);
//            $message->subject('Order Notification');
//        });
//    }
}
