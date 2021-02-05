<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;

class GooCalendarController extends Controller
{
    protected $client;
    // $client->setAccessType("offline");
    // This will include any other scopes (Google APIs) previously granted by the venue
    // $client->setIncludeGrantedScopes(true);
    // Set this to force to consent form to display.
    // $client->setApprovalPrompt('force');
    // Set the redirect URL back to the site to handle the OAuth2 response. This handles both the success and failure journeys.
    // $client->setRedirectUri(URL::to('/') . '/oauth2callback');

    public function __contruct()
    {
        // Initialise the client.
        $client = new Google_Client();

        // Set the application name, this is included in the User-Agent HTTP header.
        $client->setApplicationName('Calendar integration');

        // Set the authentication credentials we downloaded from Google.
        $client->setAuthConfig('[private-path]/client_id.json');

        // Add the Google Calendar scope to the request.
        $client->addScope(Google_Service_Calendar::CALENDAR);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get all the request parameters
        $input = $request->all();

        // Attempt to load the venue from the state we set in $client->setState($venue->id);
        $venue = Venue::findOrFail($input['state']);

        // If the user cancels the process then they should be send back to
        // the venue with a message.
        if (isset($input['error']) &&  $input['error'] == 'access_denied') {
            Session::flash('global-error', 'Authentication was cancelled. Your calendar has not been integrated.');
            return redirect()->route('venues.show', ['slug' => $venue->slug]);
       } elseif (isset($input['code'])) {

        // Else we have an auth code we can use to generate an access token
        // This is the helper we added to setup the Google Client with our             
        // application settings
        $gcHelper = new GoogleCalendarHelper($venue);

        // This helper method calls fetchAccessTokenWithAuthCode() provided by 
        // the Google Client and returns the access and refresh tokens or 
        // throws an exception
        $accessToken = $gcHelper->getAccessTokenFromAuthCode($input['code']);

        // We store the access and refresh tokens against the venue and set the 
        // integration to active.
        $venue->update([
            'gcalendar_credentials' => json_encode($accessToken),
            'gcalendar_integration_active' => true,
        ]);

        Session::flash('global-success', 'Google Calendar integration enabled.');
                   return redirect()->route('venues.show', ['slug' => $venue->slug]);
               }
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
