<?php

namespace App\Http\Controllers;

use App\Models\MutualProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class CommunityController extends Controller
{
    /**
     * Display the community page with mutual profiles.
     */
    public function index()
    {
        // Get all verified mutual profiles grouped by type
        $instagramProfiles = MutualProfile::where('type', 'Instagram')->where('is_verified', true)->get();
        $linkedinProfiles = MutualProfile::where('type', 'LinkedIn')->where('is_verified', true)->get();
        $githubProfiles = MutualProfile::where('type', 'GitHub')->where('is_verified', true)->get();

        return view('komunitas', compact('instagramProfiles', 'linkedinProfiles', 'githubProfiles'));
    }

    /**
     * Handle mutual profile submissions with rate-limiting and validation.
     */
    public function storeMutual(Request $request)
    {
        // Simple rate limiting (max 3 submissions per IP per hour)
        $ip = $request->ip();
        if (RateLimiter::tooManyAttempts('submit-mutual:'.$ip, 3)) {
            return response()->json([
                'success' => false,
                'message' => 'Terlalu banyak pengiriman. Silakan coba lagi nanti.'
            ], 429);
        }

        // Validate request input
        $validated = $request->validate([
            'type' => 'required|in:Instagram,LinkedIn,GitHub',
            'username' => 'required|string|max:50',
            'link' => 'required|url|max:255',
        ]);

        // Create new unverified profile
        MutualProfile::create([
            'type' => $validated['type'],
            'username' => $validated['username'],
            'link' => $validated['link'],
            'is_verified' => false, // Requires admin verification
        ]);

        // Increment attempts for rate limiter
        RateLimiter::hit('submit-mutual:'.$ip, 3600);

        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil dikirim dan menunggu verifikasi admin!'
        ]);
    }
}
