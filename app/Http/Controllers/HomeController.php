<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Static data for document management system
        $data = [
            'folders' => [
                [
                    'id' => 1,
                    'name' => 'Inbox',
                    'email_count' => 24,
                    'icon' => 'inbox',
                    'active' => true
                ],
                [
                    'id' => 2,
                    'name' => 'Project Alpha',
                    'file_count' => 12,
                    'icon' => 'folder',
                    'active' => false
                ],
                [
                    'id' => 3,
                    'name' => 'Legal Documents',
                    'file_count' => 8,
                    'icon' => 'document',
                    'active' => false
                ],
                [
                    'id' => 4,
                    'name' => 'Contracts',
                    'file_count' => 15,
                    'icon' => 'contract',
                    'active' => false
                ],
                [
                    'id' => 5,
                    'name' => 'Financial Reports',
                    'file_count' => 6,
                    'icon' => 'chart',
                    'active' => false
                ]
            ],
            'emails' => [
                [
                    'id' => 1,
                    'sender_name' => 'John Doe',
                    'sender_email' => 'john.doe@company.com',
                    'subject' => 'Project Alpha - Final Documents',
                    'preview' => 'Please find attached the final project documents for review. We need your approval by end of week...',
                    'timestamp' => '2h ago',
                    'attachments' => 3,
                    'linked' => true,
                    'selected' => true,
                    'avatar_color' => 'blue-indigo',
                    'initials' => 'JD'
                ],
                [
                    'id' => 2,
                    'sender_name' => 'Sarah Miller',
                    'sender_email' => 'sarah.miller@company.com',
                    'subject' => 'Contract Amendment Request',
                    'preview' => 'I\'ve reviewed the contract and have some amendments to propose. Can we schedule a meeting...',
                    'timestamp' => '4h ago',
                    'attachments' => 1,
                    'linked' => false,
                    'selected' => false,
                    'avatar_color' => 'purple-pink',
                    'initials' => 'SM'
                ],
                [
                    'id' => 3,
                    'sender_name' => 'Mike Johnson',
                    'sender_email' => 'mike.johnson@company.com',
                    'subject' => 'Q4 Financial Report',
                    'preview' => 'The Q4 financial report is ready for your review. Please see attached spreadsheets...',
                    'timestamp' => '6h ago',
                    'attachments' => 2,
                    'linked' => false,
                    'selected' => false,
                    'avatar_color' => 'green-teal',
                    'initials' => 'MJ'
                ],
                [
                    'id' => 4,
                    'sender_name' => 'Anna Lee',
                    'sender_email' => 'anna.lee@company.com',
                    'subject' => 'Legal Compliance Update',
                    'preview' => 'Updates on the new compliance requirements and necessary documentation changes...',
                    'timestamp' => '1d ago',
                    'attachments' => 0,
                    'linked' => true,
                    'selected' => false,
                    'avatar_color' => 'red-orange',
                    'initials' => 'AL'
                ]
            ],
            'current_email' => [
                'id' => 1,
                'sender_name' => 'John Doe',
                'sender_email' => 'john.doe@company.com',
                'subject' => 'Project Alpha - Final Documents',
                'content' => 'Hi Team,\n\nI hope this email finds you well. Please find attached the final project documents for Project Alpha. We\'ve completed all the requirements and deliverables as discussed in our previous meetings.\n\nThe documents include:\n• Project specifications and requirements\n• Technical documentation and architecture\n• User manuals and training materials\n\nPlease review these documents and provide your approval by the end of this week. If you have any questions or need clarifications, please don\'t hesitate to reach out.\n\nBest regards,\nJohn Doe',
                'timestamp' => 'Today at 2:30 PM',
                'attachments' => [
                    [
                        'name' => 'project-specifications.pdf',
                        'size' => '2.4 MB',
                        'type' => 'pdf',
                        'icon_color' => 'red'
                    ],
                    [
                        'name' => 'technical-documentation.docx',
                        'size' => '1.8 MB',
                        'type' => 'docx',
                        'icon_color' => 'blue'
                    ],
                    [
                        'name' => 'user-manual.pdf',
                        'size' => '3.2 MB',
                        'type' => 'pdf',
                        'icon_color' => 'green'
                    ]
                ],
                'ai_summary' => [
                    'status' => 'Project Alpha is complete and ready for final approval',
                    'action_required' => 'Review and approve documents by end of week',
                    'key_documents' => '3 attachments including specifications, technical docs, and user manual',
                    'priority' => 'High - Approval deadline approaching',
                    'linked_files' => 'This email has been linked to 2 existing project files'
                ],
                'related_files' => [
                    [
                        'name' => 'Project Alpha - Initial Proposal',
                        'created_from' => 'email',
                        'timestamp' => '5 days ago',
                        'color' => 'blue'
                    ],
                    [
                        'name' => 'Project Alpha - Meeting Notes',
                        'created_from' => 'linked',
                        'timestamp' => '3 days ago',
                        'color' => 'green'
                    ]
                ]
            ]
        ];

        return view('welcome', compact('data'));
    }
}