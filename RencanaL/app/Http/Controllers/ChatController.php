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

        $apiKey = config('services.openai.key');

        if (!$apiKey) {
            return response()->json([
                'reply' => 'OpenAI API key belum disetel. Tambahkan OPENAI_API_KEY di file .env.',
            ], 500);
        }

        $response = Http::withToken($apiKey)
            ->timeout(30)
            ->post('https://api.openai.com/v1/responses', [
                'model' => config('services.openai.model'),
                'instructions' => 'Kamu adalah asisten ramah untuk website RencanaLiburan. Jawab singkat, jelas, dan bantu pengguna merencanakan destinasi seperti Bali, Raja Ampat, Paris, dan Tokyo.',
                'input' => $data['message'],
                'max_output_tokens' => 350,
            ]);

        if ($response->failed()) {
            $errorMessage = data_get($response->json(), 'error.message', 'Tidak ada detail error dari OpenAI.');

            Log::warning('OpenAI chat request failed', [
                'status' => $response->status(),
                'error' => $errorMessage,
            ]);

            if (app()->environment('local')) {
                return response()->json([
                    'reply' => 'OpenAI error ' . $response->status() . ': ' . $errorMessage,
                ], 502);
            }

            return response()->json([
                'reply' => 'Maaf, chat sedang belum bisa dihubungi. Coba lagi sebentar ya.',
            ], 502);
        }

        $result = $response->json();
        $reply = $result['output_text'] ?? data_get($result, 'output.0.content.0.text');

        return response()->json([
            'reply' => $reply ?: 'Maaf, aku belum bisa menjawab pesan itu.',
        ]);
    }
}
