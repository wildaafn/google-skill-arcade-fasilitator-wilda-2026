<?php

namespace App\Http\Controllers;

use App\Models\LeaderboardParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class KalkulatorController extends Controller
{
    // List of official Arcade Games (match query)
    private $arcadeGameKeywords = [
        'arcade game', 'trivia', 'voyage', 'trail', 'adventure', 
        'base camp', 'safe spaces', 'data mesh architect', 
        'level 1', 'level 2', 'monsoon', 'season'
    ];

    // List of official Skill Badges for matching
    private $officialSkillBadges = [
        "Create Your First Gemini Enterprise Application",
        "Develop AI-Powered Prototypes in Google AI Studio",
        "The Basics of Google Cloud Compute",
        "Implement Event-Driven Messaging and Automation Workflows",
        "Implement Cloud Storage and Data Protection Solutions",
        "Create a Streaming Data Lake on Cloud Storage",
        "Deploy and Manage Applications on Google App Engine",
        "Implement Speech and Language Solutions with Pre-trained APIs",
        "Using the Google Cloud Speech API",
        "Analyze Speech and Language with Google APIs",
        "Store, Process, and Manage Data on Google Cloud - Console",
        "Store, Process, and Manage Data on Google Cloud - Command Line",
        "Migrate MySQL Data to Cloud SQL Using Database Migration Service",
        "Get Started with Sensitive Data Protection",
        "Analyze Images with the Cloud Vision API",
        "Build Event-Driven Applications with Eventarc",
        "Configure Service Accounts and IAM Roles for Google Cloud",
        "Get Started with App Development using Gemini Code Assist",
        "Implement Cloud Security Fundamentals in Google Cloud",
        "Engineer AI Agents with Agent Development Kit (ADK)",
        "Build Useful AI Applications with Gemini and Imagen",
        "Build a Smart Cloud Application with Vibe Coding and MCP",
        "Implement Cloud Collaboration and Productivity Workflows",
        "Analyze BigQuery Data in Connected Sheets",
        "Streaming Analytics into BigQuery",
        "Create a Secure Data Lake on Cloud Storage",
        "Secure Lakehouse Data",
        "Enrich Metadata and Discovery of Lakehouse Data",
        "Monitor and Manage Google Cloud Resources",
        "Monitor and Log with Google Cloud Observability",
        "Set Up a Google Cloud Network",
        "Integrate BigQuery Data and Google Workspace using Apps Script",
        "Engineer Data for Predictive Modeling with BigQuery ML",
        "Implement DevOps Workflows in Google Cloud",
        "Create ML Models with BigQuery ML",
        "Build a Website on Google Cloud",
        "Manage Kubernetes in Google Cloud",
        "Share Data Using Google Data Cloud",
        "Use Machine Learning APIs on Google Cloud",
        "Monitor Environments with Google Cloud Managed Service for Prometheus",
        "Organize and Manage Data with Dataplex",
        "Analyze Sentiment with Natural Language API",
        "Develop with Apps Script and AppSheet",
        "Use APIs to Manage Cloud Storage",
        "Monitoring in Google Cloud",
        "Orchestrate Multi-agent Workflows with Gemini Enterprise",
        "Connect Cloud Networks with NCC",
        "Privileged Access with IAM",
        "Enhance Gemini Model Capabilities",
        "Analyze and Reason on Multimodal Data with Gemini",
        "Implement Multimodal Vector Search with BigQuery",
        "Protect Cloud Traffic with Chrome Enterprise Premium Security",
        "Discover and Protect Sensitive Data Across Your Ecosystem",
        "Secure Software Delivery",
        "Create and Manage AlloyDB Instances",
        "Create and Manage Cloud SQL for PostgreSQL Instances",
        "Deploy and Manage Apigee X",
        "Develop Serverless Apps on Cloud Run",
        "Build a Data Warehouse with BigQuery",
        "Prepare Data for ML APIs on Google Cloud",
        "Build Serverless Applications with Cloud Run Functions",
        "Get Started with API Gateway",
        "App Building with AppSheet",
        "Build Google Cloud Infrastructure for AWS Professionals",
        "Create and Manage Bigtable Instances",
        "Implement CI/CD Pipelines in Google Cloud",
        "Using Functions, Formulas, and Charts in Google Sheets",
        "Create and Manage Cloud Spanner Instances",
        "Build Infrastructure with Terraform in Google Cloud",
        "Perform Predictive Data Analysis in BigQuery",
        "Automate Data Capture at Scale with Document AI",
        "Develop and Secure APIs with Apigee X",
        "Explore Generative AI in Agent Platform",
        "Implementing Cloud Load Balancing for Compute Engine",
        "Prompt Design in Agent Platform",
        "Inspect Rich Documents with Gemini Multimodality and Multimodal RAG",
        "Develop Gen AI Apps with Gemini and Streamlit",
        "Set Up an App Dev Environment on Google Cloud",
        "Develop Your Google Cloud Network",
        "Build a Secure Google Cloud Network",
        "Deploy Kubernetes Applications on Google Cloud",
        "Derive Insights from BigQuery Data",
        "Build LookML Objects in Looker",
        "Manage Data Models in Looker",
        "Prepare Data for Looker Dashboards and Reports",
        "Develop Serverless Apps with Firebase",
        "Cloud Architecture: Design, Implement, and Manage",
        "Build Global and Regional Load Balancing Solutions",
        "Google DeepMind: Train A Small Language Model",
        "Mitigate Threats and Vulnerabilities with Security Command Center",
        "Build a Data Mesh with Knowledge Catalog",
        "Deploy Multi-Agent Architectures",
        "Optimize Costs for Google Kubernetes Engine"
    ];

    /**
     * Parse profile URL and calculate points real-time
     */
    public function hitungPoin(Request $request)
    {
        $url = $request->query('url');

        if (!$url) {
            return response()->json(['error' => 'URL profil wajib diisi.'], 400);
        }

        // Validate Google Cloud Skills Boost domain
        if (!preg_match('/^(https?:\/\/)?(www\.)?(skills\.google|cloudskillsboost\.google)\/public_profiles\/[a-f0-9-]+/i', $url)) {
            return response()->json(['error' => 'URL harus berupa tautan profil publik Google Cloud Skills Boost yang sah.'], 400);
        }

        try {
            // Fetch profile content
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'Accept-Language' => 'en-US,en;q=0.9',
            ])->timeout(12)->get($url);

            if ($response->failed()) {
                return response()->json(['error' => 'Gagal mengambil data profil publik. Pastikan profil diatur ke publik.'], 502);
            }

            $html = $response->body();

            // Extract Name
            $name = 'Peserta Arcade';
            if (preg_match('/<h1[^>]*class=[\'"]ql-display-small[\'"][^>]*>([\s\S]*?)<\/h1>/i', $html, $nameMatch)) {
                $name = trim($nameMatch[1]);
            }

            // Extract Avatar
            $avatarUrl = null;
            if (preg_match('/<ql-avatar[^>]*src=[\'"]([^\'"]+)[\'"]/i', $html, $avatarMatch)) {
                $avatarUrl = $avatarMatch[1];
            }

            // Parse badges
            $blocks = explode("<div class='profile-badge'>", $html);
            array_shift($blocks); // remove before first badge

            $arcadeCount = 0;
            $skillCount = 0;

            // Date Range: 13 July 2026 to 14 September 2026
            $startDate = strtotime('2026-07-13 00:00:00');
            $endDate = strtotime('2026-09-14 23:59:59');

            foreach ($blocks as $block) {
                if (preg_match('/<span[^>]*class=[\'"]ql-title-medium l-mts[\'"][^>]*>([\s\S]*?)<\/span>/i', $block, $titleMatch)) {
                    $title = trim(html_entity_decode($titleMatch[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'));
                    
                    $earnedDate = null;
                    if (preg_match('/<span[^>]*class=[\'"]ql-body-medium l-mbs[\'"][^>]*>([\s\S]*?)<\/span>/i', $block, $dateMatch)) {
                        $earnedDate = trim($dateMatch[1]);
                    }

                    // Check date validity
                    if ($earnedDate) {
                        $cleanDateStr = preg_replace('/^Earned\s+/i', '', $earnedDate);
                        $cleanDateStr = preg_replace('/\s+[A-Z]{3,4}$/', '', $cleanDateStr); // remove timezone
                        $cleanDateStr = preg_replace('/\s+/', ' ', $cleanDateStr);
                        $timestamp = strtotime($cleanDateStr);

                        if ($timestamp && $timestamp >= $startDate && $timestamp <= $endDate) {
                            // Classify badge
                            $isArcade = false;
                            $lowerTitle = strtolower($title);
                            foreach ($this->arcadeGameKeywords as $keyword) {
                                if (strpos($lowerTitle, $keyword) !== false) {
                                    $isArcade = true;
                                    break;
                                }
                            }

                            if ($isArcade) {
                                $arcadeCount++;
                            } else {
                                // Match against official skill badges list
                                $isSkill = false;
                                foreach ($this->officialSkillBadges as $officialSkill) {
                                    if (strcasecmp($title, $officialSkill) === 0) {
                                        $isSkill = true;
                                        break;
                                    }
                                }
                                // Fallback: count if title contains "Skill Badge"
                                if ($isSkill || strpos($lowerTitle, 'skill badge') !== false) {
                                    $skillCount++;
                                }
                            }
                        }
                    }
                }
            }

            // Calculate Milestones & Points
            // 1 Game = 1 Point, 1 Skill = 0.5 Point
            $basePoints = $arcadeCount + ($skillCount * 0.5);
            $bonusPoints = 0;
            $milestoneReached = 'None';

            if ($arcadeCount >= 12 && $skillCount >= 56) {
                $milestoneReached = 'Ultimate Milestone';
                $bonusPoints = 40; // Total 80
            } elseif ($arcadeCount >= 10 && $skillCount >= 42) {
                $milestoneReached = 'Milestone 3';
                $bonusPoints = 29; // Total 60
            } elseif ($arcadeCount >= 8 && $skillCount >= 28) {
                $milestoneReached = 'Milestone 2';
                $bonusPoints = 18; // Total 40
            } elseif ($arcadeCount >= 6 && $skillCount >= 14) {
                $milestoneReached = 'Milestone 1';
                $bonusPoints = 7; // Total 20
            }

            $totalPoints = $basePoints + $bonusPoints;

            // Extract profile token from URL
            $profileToken = null;
            if (preg_match('/\/public_profiles\/([a-f0-9-]+)/i', $url, $tokenMatch)) {
                $profileToken = $tokenMatch[1];
            }

            // Save/Update in leaderboard DB
            $participant = LeaderboardParticipant::updateOrCreate(
                ['profile_url' => $url],
                [
                    'name' => $name,
                    'profile_token' => $profileToken,
                    'arcade_count' => $arcadeCount,
                    'skill_count' => $skillCount,
                    'bonus_points' => $bonusPoints,
                    'total_points' => $totalPoints,
                    'milestone_reached' => $milestoneReached,
                    'last_checked_at' => now()
                ]
            );

            return response()->json([
                'success' => true,
                'name' => $name,
                'avatarUrl' => $avatarUrl,
                'summary' => [
                    'arcadeGameCount' => $arcadeCount,
                    'skillBadgeCount' => $skillCount,
                    'bonusPoints' => $bonusPoints,
                    'totalPoints' => $totalPoints,
                    'milestoneReached' => $milestoneReached
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Error hitung poin: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal memproses kalkulasi poin. Silakan coba beberapa saat lagi.'], 500);
        }
    }

    /**
     * Get all leaderboard entries
     */
    public function leaderboard()
    {
        $records = LeaderboardParticipant::orderBy('total_points', 'desc')
            ->orderBy('arcade_count', 'desc')
            ->orderBy('skill_count', 'desc')
            ->get();

        // format records for leaderboard view
        $formattedRecords = $records->map(function ($r) {
            return [
                'name' => $r->name,
                'profile_token' => $r->profile_token,
                'milestone_reached' => $r->milestone_reached,
                'arcade_count' => $r->arcade_count,
                'skill_count' => $r->skill_count,
                'total_points' => $r->total_points
            ];
        });

        // Date of last record update
        $lastUpdate = LeaderboardParticipant::max('updated_at');
        $fileDate = $lastUpdate ? date('d M Y, H:i', strtotime($lastUpdate)) . ' WIB' : date('d M Y') . ' WIB';

        return response()->json([
            'records' => $formattedRecords,
            'fileDate' => $fileDate
        ]);
    }

    /**
     * Sync/Update all profile data in DB
     */
    public function syncAll()
    {
        $participants = LeaderboardParticipant::all();

        foreach ($participants as $p) {
            // call inner logic to update
            try {
                $response = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
                ])->timeout(8)->get($p->profile_url);

                if ($response->successful()) {
                    $html = $response->body();

                    // Extract Name
                    if (preg_match('/<h1[^>]*class=[\'"]ql-display-small[\'"][^>]*>([\s\S]*?)<\/h1>/i', $html, $nameMatch)) {
                        $p->name = trim($nameMatch[1]);
                    }

                    // Parse badges
                    $blocks = explode("<div class='profile-badge'>", $html);
                    array_shift($blocks);

                    $arcadeCount = 0;
                    $skillCount = 0;
                    $startDate = strtotime('2026-07-13 00:00:00');
                    $endDate = strtotime('2026-09-14 23:59:59');

                    foreach ($blocks as $block) {
                        if (preg_match('/<span[^>]*class=[\'"]ql-title-medium l-mts[\'"][^>]*>([\s\S]*?)<\/span>/i', $block, $titleMatch)) {
                            $title = trim(html_entity_decode($titleMatch[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'));
                            
                            $earnedDate = null;
                            if (preg_match('/<span[^>]*class=[\'"]ql-body-medium l-mbs[\'"][^>]*>([\s\S]*?)<\/span>/i', $block, $dateMatch)) {
                                $earnedDate = trim($dateMatch[1]);
                            }

                            if ($earnedDate) {
                                $cleanDateStr = preg_replace('/^Earned\s+/i', '', $earnedDate);
                                $cleanDateStr = preg_replace('/\s+[A-Z]{3,4}$/', '', $cleanDateStr);
                                $cleanDateStr = preg_replace('/\s+/', ' ', $cleanDateStr);
                                $timestamp = strtotime($cleanDateStr);

                                if ($timestamp && $timestamp >= $startDate && $timestamp <= $endDate) {
                                    $isArcade = false;
                                    $lowerTitle = strtolower($title);
                                    foreach ($this->arcadeGameKeywords as $keyword) {
                                        if (strpos($lowerTitle, $keyword) !== false) {
                                            $isArcade = true;
                                            break;
                                        }
                                    }

                                    if ($isArcade) {
                                        $arcadeCount++;
                                    } else {
                                        $isSkill = false;
                                        foreach ($this->officialSkillBadges as $officialSkill) {
                                            if (strcasecmp($title, $officialSkill) === 0) {
                                                $isSkill = true;
                                                break;
                                            }
                                        }
                                        if ($isSkill || strpos($lowerTitle, 'skill badge') !== false) {
                                            $skillCount++;
                                        }
                                    }
                                }
                            }
                        }
                    }

                    $basePoints = $arcadeCount + ($skillCount * 0.5);
                    $bonusPoints = 0;
                    $milestoneReached = 'None';

                    if ($arcadeCount >= 12 && $skillCount >= 56) {
                        $milestoneReached = 'Ultimate Milestone';
                        $bonusPoints = 40;
                    } elseif ($arcadeCount >= 10 && $skillCount >= 42) {
                        $milestoneReached = 'Milestone 3';
                        $bonusPoints = 29;
                    } elseif ($arcadeCount >= 8 && $skillCount >= 28) {
                        $milestoneReached = 'Milestone 2';
                        $bonusPoints = 18;
                    } elseif ($arcadeCount >= 6 && $skillCount >= 14) {
                        $milestoneReached = 'Milestone 1';
                        $bonusPoints = 7;
                    }

                    $p->arcade_count = $arcadeCount;
                    $p->skill_count = $skillCount;
                    $p->bonus_points = $bonusPoints;
                    $p->total_points = $basePoints + $bonusPoints;
                    $p->milestone_reached = $milestoneReached;
                    $p->last_checked_at = now();
                    $p->save();
                }
            } catch (\Exception $e) {
                // Log and continue to next participant
                Log::warning("Sync failed for profile {$p->profile_url}: " . $e->getMessage());
            }
        }

        return $this->leaderboard();
    }

    /**
     * Proxy avatar to prevent CORS issues
     */
    public function avatar(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            return response()->json(['error' => 'Profile ID required'], 400);
        }

        try {
            // First fetch the profile page to get the avatar URL
            $url = "https://www.skills.google/public_profiles/" . $id;
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
            ])->timeout(6)->get($url);

            if ($response->successful()) {
                $html = $response->body();
                if (preg_match('/<ql-avatar[^>]*src=[\'"]([^\'"]+)[\'"]/i', $html, $avatarMatch)) {
                    return response()->json(['avatarUrl' => $avatarMatch[1]]);
                }
            }
        } catch (\Exception $e) {
            // Fall through to empty
        }

        return response()->json(['avatarUrl' => null]);
    }
}
