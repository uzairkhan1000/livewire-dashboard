<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class HubSpotService
{
    protected $accessToken;

    public function __construct()
    {
        $this->accessToken = env('HUBSPOT_ACCESS_TOKEN');
    }

    public function createContact($data)
    {
        $response = Http::withToken($this->accessToken)->post('https://api.hubapi.com/crm/v3/objects/contacts', $data);

        return $response->json();
    }
    public function getTemplateIds()
    {
        $response = Http::withToken($this->accessToken)
        ->get('https://api.hubapi.com/marketing/v3/templates');
    
        if ($response->successful()) {
            return $response->json(); // This will contain a list of templates, including their IDs
        } else {
            return $response->body(); // Handle errors
        }
    }

    // Add more methods as needed
}
