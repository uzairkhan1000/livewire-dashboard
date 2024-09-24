<?php

namespace App\Http\Controllers;

use App\Services\HubSpotService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $hubSpotService;

    public function __construct(HubSpotService $hubSpotService)
    {
        $this->hubSpotService = $hubSpotService;
    }

    public function store(Request $request)
    {
        $data = [
                'properties' => 
                [
                    'email' => 'john.doe@example.com',
                    'firstname' => 'John',
                    'lastname' => 'Doe',
                    'phone' => '555-555-5555',
                ]
        ];

        $response = $this->hubSpotService->createContact($data);
        dd($response);

        return response()->json($response);
    }
    public function TemplateIds(Request $request)
    {
        $response = $this->hubSpotService->getTemplateIds();
        dd($response);
    }
}
