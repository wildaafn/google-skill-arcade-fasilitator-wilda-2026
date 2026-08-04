<?php
require_once __DIR__ . '/../db/init.php';

header('Content-Type: application/json');
set_time_limit(300); // Allow up to 5 minutes for sync

$participants = $db->query("SELECT * FROM leaderboard_participants")->fetchAll();

$arcadeGameKeywords = [
    'arcade game', 'trivia', 'voyage', 'trail', 'adventure', 
    'base camp', 'safe spaces', 'data mesh architect', 
    'level 1', 'level 2', 'monsoon', 'season'
];

$officialSkillBadges = [
    "Create Your First Gemini Enterprise Application", "Develop AI-Powered Prototypes in Google AI Studio",
    "The Basics of Google Cloud Compute", "Implement Event-Driven Messaging and Automation Workflows",
    "Implement Cloud Storage and Data Protection Solutions", "Create a Streaming Data Lake on Cloud Storage",
    "Deploy and Manage Applications on Google App Engine", "Implement Speech and Language Solutions with Pre-trained APIs",
    "Using the Google Cloud Speech API", "Analyze Speech and Language with Google APIs",
    "Store, Process, and Manage Data on Google Cloud - Console", "Store, Process, and Manage Data on Google Cloud - Command Line",
    "Migrate MySQL Data to Cloud SQL Using Database Migration Service", "Get Started with Sensitive Data Protection",
    "Analyze Images with the Cloud Vision API", "Build Event-Driven Applications with Eventarc",
    "Configure Service Accounts and IAM Roles for Google Cloud", "Get Started with App Development using Gemini Code Assist",
    "Implement Cloud Security Fundamentals in Google Cloud", "Engineer AI Agents with Agent Development Kit (ADK)",
    "Build Useful AI Applications with Gemini and Imagen", "Build a Smart Cloud Application with Vibe Coding and MCP",
    "Implement Cloud Collaboration and Productivity Workflows", "Analyze BigQuery Data in Connected Sheets",
    "Streaming Analytics into BigQuery", "Create a Secure Data Lake on Cloud Storage",
    "Secure Lakehouse Data", "Enrich Metadata and Discovery of Lakehouse Data",
    "Monitor and Manage Google Cloud Resources", "Monitor and Log with Google Cloud Observability",
    "Set Up a Google Cloud Network", "Integrate BigQuery Data and Google Workspace using Apps Script",
    "Engineer Data for Predictive Modeling with BigQuery ML", "Implement DevOps Workflows in Google Cloud",
    "Create ML Models with BigQuery ML", "Build a Website on Google Cloud",
    "Manage Kubernetes in Google Cloud", "Share Data Using Google Data Cloud",
    "Use Machine Learning APIs on Google Cloud", "Monitor Environments with Google Cloud Managed Service for Prometheus",
    "Organize and Manage Data with Dataplex", "Analyze Sentiment with Natural Language API",
    "Develop with Apps Script and AppSheet", "Use APIs to Manage Cloud Storage",
    "Monitoring in Google Cloud", "Orchestrate Multi-agent Workflows with Gemini Enterprise",
    "Connect Cloud Networks with NCC", "Privileged Access with IAM",
    "Enhance Gemini Model Capabilities", "Analyze and Reason on Multimodal Data with Gemini",
    "Implement Multimodal Vector Search with BigQuery", "Protect Cloud Traffic with Chrome Enterprise Premium Security",
    "Discover and Protect Sensitive Data Across Your Ecosystem", "Secure Software Delivery",
    "Create and Manage AlloyDB Instances", "Create and Manage Cloud SQL for PostgreSQL Instances",
    "Deploy and Manage Apigee X", "Develop Serverless Apps on Cloud Run",
    "Build a Data Warehouse with BigQuery", "Prepare Data for ML APIs on Google Cloud",
    "Build Serverless Applications with Cloud Run Functions", "Get Started with API Gateway",
    "App Building with AppSheet", "Build Google Cloud Infrastructure for AWS Professionals",
    "Create and Manage Bigtable Instances", "Implement CI/CD Pipelines in Google Cloud",
    "Using Functions, Formulas, and Charts in Google Sheets", "Create and Manage Cloud Spanner Instances",
    "Build Infrastructure with Terraform in Google Cloud", "Perform Predictive Data Analysis in BigQuery",
    "Automate Data Capture at Scale with Document AI", "Develop and Secure APIs with Apigee X",
    "Explore Generative AI in Agent Platform", "Implementing Cloud Load Balancing for Compute Engine",
    "Prompt Design in Agent Platform", "Inspect Rich Documents with Gemini Multimodality and Multimodal RAG",
    "Develop Gen AI Apps with Gemini and Streamlit", "Set Up an App Dev Environment on Google Cloud",
    "Develop Your Google Cloud Network", "Build a Secure Google Cloud Network",
    "Deploy Kubernetes Applications on Google Cloud", "Derive Insights from BigQuery Data",
    "Build LookML Objects in Looker", "Manage Data Models in Looker",
    "Prepare Data for Looker Dashboards and Reports", "Develop Serverless Apps with Firebase",
    "Cloud Architecture: Design, Implement, and Manage", "Build Global and Regional Load Balancing Solutions",
    "Google DeepMind: Train A Small Language Model", "Mitigate Threats and Vulnerabilities with Security Command Center",
    "Build a Data Mesh with Knowledge Catalog", "Deploy Multi-Agent Architectures",
    "Optimize Costs for Google Kubernetes Engine"
];

$startDate = strtotime('2026-07-13 00:00:00');
$endDate = strtotime('2026-09-14 23:59:59');

$options = [
    'http' => [
        'method' => 'GET',
        'header' => [
            'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            'Accept-Language: en-US,en;q=0.9'
        ],
        'timeout' => 8
    ]
];
$context = stream_context_create($options);

foreach ($participants as $p) {
    try {
        $html = @file_get_contents($p['profile_url'], false, $context);
        
        if ($html) {
            $name = $p['name'];
            if (preg_match('/<h1[^>]*class=[\'"]ql-display-small[\'"][^>]*>([\s\S]*?)<\/h1>/i', $html, $nameMatch)) {
                $name = trim($nameMatch[1]);
            }

            $blocks = explode("<div class='profile-badge'>", $html);
            array_shift($blocks);

            $arcadeCount = 0;
            $skillCount = 0;

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
                            foreach ($arcadeGameKeywords as $keyword) {
                                if (strpos($lowerTitle, $keyword) !== false) {
                                    $isArcade = true;
                                    break;
                                }
                            }

                            if ($isArcade) {
                                $arcadeCount++;
                            } else {
                                $isSkill = false;
                                foreach ($officialSkillBadges as $officialSkill) {
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

            $totalPoints = $basePoints + $bonusPoints;

            $updateStmt = $db->prepare("UPDATE leaderboard_participants SET name=?, arcade_count=?, skill_count=?, bonus_points=?, total_points=?, milestone_reached=?, last_checked_at=CURRENT_TIMESTAMP, updated_at=CURRENT_TIMESTAMP WHERE id=?");
            $updateStmt->execute([$name, $arcadeCount, $skillCount, $bonusPoints, $totalPoints, $milestoneReached, $p['id']]);
        }
    } catch (Exception $e) {
        // Skip
    }
}

// Redirect to leaderboard logic
require __DIR__ . '/leaderboard.php';
