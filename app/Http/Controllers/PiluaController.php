<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PiluaController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function ask(Request $request)
    {
        $prompt = $request->input('question');

        $apiKey = env('GROQ_API_KEY');
        $model = env('GROQ_MODEL', 'mistral-7b-32k');

        try {
            $response = Http::withoutVerifying()
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ])
                ->post('https://api.groq.com/openai/v1/chat/completions', [
                    'model' => $model,
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'You are Pilua, a helpful AI assistant that provides insights on crypto investments, SIPs, and forecasts.',
                        ],
                        [
                            'role' => 'user',
                            'content' => $prompt,
                        ],
                    ],
                    'temperature' => 0.7,
                ]);

            $result = $response->json();
            logger()->info('Groq Response', $result); // Debug log

            if (isset($result['choices'][0]['message']['content'])) {
                $answer = $result['choices'][0]['message']['content'];
            } else {
                $answer = 'Oops! Pilua couldn’t fetch the answer.';
            }

        } catch (\Exception $e) {
            $answer = '⚠️ An error occurred: ' . $e->getMessage();
        }

        return view('home', compact('answer', 'prompt'));
    }
}
