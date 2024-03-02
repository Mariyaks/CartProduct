<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Twilio\Rest\Client;


class CartController extends Controller
{
    

    public function addToCart($productId)
{
    $product = Product::find($productId);

    if (!$product) {
        return redirect()->route('productlist')->with('error', 'Product not found.');
    }

    // Add the product to the cart
    $cartItems = session()->get('cartItems', []);
    $cartItems[] = $product;
    session(['cartItems' => $cartItems]);

    return redirect()->route('productlist')->with('status', 'Product added to the cart.');
}


public function viewCart()
{
    $cartItems = session()->get('cartItems', []);

    return view('admin.cart-view', compact('cartItems'));
}
    public function sendCartToWhatsApp()
    {
        $cartItems = session()->get('cartItems', []);
    
        $accountSid = 'your_account_sid';
        $authToken = 'your_auth_token';
        $twilioNumber = '8078252784';
        $userPhoneNumber = '8078252784'; // Get this from your user
    
        $client = new Client($accountSid, $authToken);
    
        $messageBody = "Your cart items:\n";
        
        foreach ($cartItems as $productId) {
            $product = Product::where('id', $productId)->first();
        
        if ($product) {
            $messageBody .= "Product: {$product->name}, ID: {$product->id}\n";
        } else {
            $messageBody .= "Product with ID {$productId} not found.\n";
        }
        }
    
        try {
            // Send WhatsApp message
            $message = $client->messages->create(
                "whatsapp:{$userPhoneNumber}",
                [
                    'from' => "whatsapp:{$twilioNumber}",
                    'body' => $messageBody,
                ]
            );
    
            // You can add more logic or flash a success message here.
            return redirect()->back()->with('status', 'Cart sent to WhatsApp successfully.');
        } catch (\Exception $e) {
            // Handle exceptions (e.g., Twilio API errors)
            return redirect()->back()->with('error', 'Error sending cart to WhatsApp: ' . $e->getMessage());
        }
    }
    


    
}

