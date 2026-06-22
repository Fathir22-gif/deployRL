<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function send(Request $request): JsonResponse
    {
        $data = $request->validate([
            'message' => ['required', 'string', 'max:1000'],
        ]);

        $apiKey = config('services.gemini.key');

        if (!$apiKey) {
            return response()->json([
                'reply' => 'Gemini API key belum disetel. Tambahkan GEMINI_API_KEY di file .env.',
            ], 500);
        }

        $model = config('services.gemini.model');
        $systemInstruction = 'Kamu adalah asisten ramah untuk website RencanaLiburan. Jawab singkat, jelas, dan bantu pengguna merencanakan destinasi seperti Bali, Raja Ampat, Paris, dan Tokyo.';

        $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";

        try{
            $response = Http::withHeaders([
        'Accept' => 'application/json',
    ])
    ->timeout(30)
    ->post($endpoint, [
        'system_instruction' => [
            'parts' => [
                ['text' => $systemInstruction],
            ],
        ],
        'contents' => [
            [
                'parts' => [
                    ['text' => $data['message']],
                ],
            ],
        ],
        'generationConfig' => [
            'maxOutputTokens' => 350,
        ],
    ]);
        } catch (\Throwable $e) {
            Log::error('Gemini request exception', [
                'message' => $e->getMessage(),
            ]);

            if (app()->environment('local')) {
                return response()->json([
                    'reply' => 'Exception saat menghubungi Gemini: ' . $e->getMessage(),
                ], 502);
            }

            return response()->json([
                'reply' => 'Maaf, chat sedang belum bisa dihubungi. Coba lagi sebentar ya.',
            ], 502);
        }

        if ($response->failed()) {
            $errorMessage = data_get($response->json(), 'error.message', 'Tidak ada detail error dari Gemini.');

            Log::warning('Gemini chat request failed', [
                'status' => $response->status(),
                'error' => $errorMessage,
            ]);

            if (app()->environment('local')) {
                return response()->json([
                    'reply' => 'Gemini error ' . $response->status() . ': ' . $errorMessage,
                ], 502);
            }

            return response()->json([
                'reply' => 'Maaf, chat sedang belum bisa dihubungi. Coba lagi sebentar ya.',
            ], 502);
        }

        $result = $response->json();

        $reply = data_get($result, 'candidates.0.content.0.text')
            ?? data_get($result, 'candidates.0.content.parts.0.text')
            ?? data_get($result, 'candidates.0.output')
            ?? data_get($result, 'output.0.content.0.text')
            ?? null;

        return response()->json([
            'reply' => $reply ?: 'Maaf, aku belum bisa menjawab pesan itu.',
        ]);
    }
}
