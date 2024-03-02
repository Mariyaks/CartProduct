<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class AuthController extends Controller
{
    public function loginWithGoogleToken(Request $request)
    {
        // Retrieve the 'google_token' parameter from the request
        $googleToken = $request['google_token'];

        // Create a Guzzle client to make a request to Google's tokeninfo endpoint
        $client = new Client();
        $response = $client->post('https://www.googleapis.com/oauth2/v3/tokeninfo?access_token=' . $googleToken);
        //dd($response);
        // Decode the JSON response from the Google endpoint
        $data = json_decode((string)$response->getBody(), true);
         //dd($data);

        // Verify that the token is valid by checking the 'aud' claim (audience)
        if ($data['aud'] === '761849461795-k05hcdviutpsijh7v4fijoscjakcsg2b.apps.googleusercontent.com') {
            // If the token is valid, you can retrieve user details from the response
            
            $userDetails = [
               // 'email' => $data['email'],
                'username' => $data['sub'],
                // Add more user details here as needed
            ];

            // At this point, you can create or authenticate the user in your Laravel application
            // For example, you might create a new user or retrieve an existing one based on the email
            // and generate an access token using Laravel Passport.

            return response()->json(['user' => $userDetails]);
        } else {
            // If the token is not valid, return an error response
            return response()->json(['error' => 'Invalid token'], 401);
        }
    }
}
