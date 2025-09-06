<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Check authentication
        $authCheck = AdminAuthController::checkAuth();
        if ($authCheck) return $authCheck;

        // Static dashboard data for document management system
        $data = [
            'stats' => [
                'total_users' => 1247,
                'user_growth' => '+12%',
                'total_files' => 15892,
                'file_growth' => '+8%',
                'emails_processed' => 8456,
                'email_growth' => '+15%',
                'storage_used' => '2.4 TB',
                'storage_percentage' => '78%'
            ],
            'recent_activity' => [
                [
                    'type' => 'user_registered',
                    'message' => 'New user registered: john.smith@company.com',
                    'timestamp' => '2 minutes ago',
                    'icon' => 'user',
                    'color' => 'blue'
                ],
                [
                    'type' => 'file_created',
                    'message' => 'File created: "Q4-Financial-Report.pdf" from email',
                    'timestamp' => '5 minutes ago',
                    'icon' => 'document',
                    'color' => 'green'
                ],
                [
                    'type' => 'email_processed',
                    'message' => 'Email processed: "Contract Amendment Request"',
                    'timestamp' => '8 minutes ago',
                    'icon' => 'mail',
                    'color' => 'purple'
                ],
                [
                    'type' => 'files_linked',
                    'message' => 'Files linked: Email connected to 3 existing documents',
                    'timestamp' => '12 minutes ago',
                    'icon' => 'link',
                    'color' => 'orange'
                ],
                [
                    'type' => 'ai_summary',
                    'message' => 'AI Summary generated for Project Alpha documents',
                    'timestamp' => '15 minutes ago',
                    'icon' => 'ai',
                    'color' => 'red'
                ]
            ],
            'system_status' => [
                'email_sync' => ['status' => 'active', 'label' => 'Active', 'color' => 'green'],
                'ai_processing' => ['status' => 'running', 'label' => 'Running', 'color' => 'green'],
                'file_storage' => ['status' => 'warning', 'label' => '78% Full', 'color' => 'yellow'],
                'database' => ['status' => 'healthy', 'label' => 'Healthy', 'color' => 'green'],
                'last_backup' => ['status' => 'success', 'label' => '2 hours ago', 'color' => 'gray']
            ],
            'chart_data' => [
                'file_creation' => [
                    'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    'data' => [120, 190, 300, 500, 420, 630, 750, 890, 920, 1100, 1250, 1400]
                ],
                'user_activity' => [
                    'labels' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    'data' => [850, 920, 1100, 980, 1200, 600, 400]
                ]
            ]
        ];

        return view('admin.dashboard', compact('data'));
    }

    // Placeholder methods for future admin pages
    public function users()
    {
        $authCheck = AdminAuthController::checkAuth();
        if ($authCheck) return $authCheck;

        $data = [
            'users' => [
                [
                    'id' => 1,
                    'name' => 'John Doe',
                    'email' => 'john.doe@company.com',
                    'role' => 'Project Manager',
                    'status' => 'active',
                    'last_login' => '2 hours ago',
                    'files_created' => 45
                ],
                [
                    'id' => 2,
                    'name' => 'Sarah Miller',
                    'email' => 'sarah.miller@company.com',
                    'role' => 'Legal Advisor',
                    'status' => 'active',
                    'last_login' => '1 day ago',
                    'files_created' => 32
                ]
            ]
        ];

        return view('admin.users', compact('data'));
    }

    public function files()
    {
        $authCheck = AdminAuthController::checkAuth();
        if ($authCheck) return $authCheck;

        $data = [
            'files' => [
                [
                    'id' => 1,
                    'name' => 'Project Alpha - Final Documents',
                    'type' => 'PDF',
                    'size' => '2.4 MB',
                    'created_by' => 'John Doe',
                    'created_from' => 'Email',
                    'created_at' => '2 hours ago',
                    'linked_emails' => 3
                ]
            ]
        ];

        return view('admin.files', compact('data'));
    }

    public function emails()
    {
        $authCheck = AdminAuthController::checkAuth();
        if ($authCheck) return $authCheck;

        $data = [
            'emails' => [
                [
                    'id' => 1,
                    'subject' => 'Project Alpha - Final Documents',
                    'sender' => 'john.doe@company.com',
                    'processed_at' => '2 hours ago',
                    'files_created' => 3,
                    'files_linked' => 2,
                    'ai_summary' => true
                ]
            ]
        ];

        return view('admin.emails', compact('data'));
    }

    public function aiSettings()
    {
        $authCheck = AdminAuthController::checkAuth();
        if ($authCheck) return $authCheck;

        $data = [
            'ai_config' => [
                'summary_enabled' => true,
                'auto_categorization' => true,
                'smart_linking' => true,
                'processing_queue' => 24
            ]
        ];

        return view('admin.ai-settings', compact('data'));
    }

    public function analytics()
    {
        $authCheck = AdminAuthController::checkAuth();
        if ($authCheck) return $authCheck;

        $data = [
            'analytics' => [
                'total_processed_emails' => 8456,
                'files_created_this_month' => 1247,
                'ai_summaries_generated' => 3421,
                'user_engagement_rate' => '87%'
            ]
        ];

        return view('admin.analytics', compact('data'));
    }

    public function settings()
    {
        $authCheck = AdminAuthController::checkAuth();
        if ($authCheck) return $authCheck;

        $data = [
            'settings' => [
                'email_sync_interval' => '5 minutes',
                'max_file_size' => '50 MB',
                'storage_limit' => '5 TB',
                'ai_processing_enabled' => true
            ]
        ];

        return view('admin.settings', compact('data'));
    }

    public function reports()
    {
        $authCheck = AdminAuthController::checkAuth();
        if ($authCheck) return $authCheck;

        $data = [
            'reports' => [
                [
                    'name' => 'Monthly Activity Report',
                    'generated_at' => '1 day ago',
                    'type' => 'PDF',
                    'size' => '1.2 MB'
                ],
                [
                    'name' => 'User Engagement Analytics',
                    'generated_at' => '3 days ago',
                    'type' => 'Excel',
                    'size' => '890 KB'
                ]
            ]
        ];

        return view('admin.reports', compact('data'));
    }
}