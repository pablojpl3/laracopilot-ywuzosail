@extends('layouts.app')

@section('title', 'DocManager Pro - Advanced Document Management System')

@section('content')
<div class="flex h-screen bg-slate-50">
    <!-- Left Sidebar - Folders & Navigation -->
    <div class="w-64 bg-white shadow-lg border-r border-slate-200 flex flex-col">
        <!-- Sidebar Header -->
        <div class="p-4 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-800">Folders</h2>
            <button class="mt-2 w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition-all duration-300 text-sm">
                + New Folder
            </button>
        </div>

        <!-- Folder List -->
        <div class="flex-1 p-4 space-y-2 overflow-y-auto scrollbar-thin">
            <div class="folder-item p-3 rounded-lg hover:bg-blue-50 cursor-pointer transition-colors duration-200 border-l-4 border-blue-500 bg-blue-50">
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-slate-800">Inbox</p>
                        <p class="text-xs text-slate-500">24 emails</p>
                    </div>
                </div>
            </div>

            <div class="folder-item p-3 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors duration-200">
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-slate-800">Project Alpha</p>
                        <p class="text-xs text-slate-500">12 files</p>
                    </div>
                </div>
            </div>

            <div class="folder-item p-3 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors duration-200">
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-slate-800">Legal Documents</p>
                        <p class="text-xs text-slate-500">8 files</p>
                    </div>
                </div>
            </div>

            <div class="folder-item p-3 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors duration-200">
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-slate-800">Contracts</p>
                        <p class="text-xs text-slate-500">15 files</p>
                    </div>
                </div>
            </div>

            <div class="folder-item p-3 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors duration-200">
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-slate-800">Financial Reports</p>
                        <p class="text-xs text-slate-500">6 files</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Center Panel - Email List -->
    <div class="w-96 bg-white border-r border-slate-200 flex flex-col">
        <!-- Email List Header -->
        <div class="p-4 border-b border-slate-200">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-slate-800">Emails</h2>
                <button class="bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white px-3 py-1 rounded-lg font-medium transition-all duration-300 text-sm">
                    Sync
                </button>
            </div>
            
            <!-- Filter Tabs -->
            <div class="flex space-x-1 bg-slate-100 rounded-lg p-1">
                <button class="flex-1 px-3 py-2 text-sm font-medium bg-white text-blue-600 rounded-md shadow-sm">All</button>
                <button class="flex-1 px-3 py-2 text-sm font-medium text-slate-600 hover:text-slate-800">Unread</button>
                <button class="flex-1 px-3 py-2 text-sm font-medium text-slate-600 hover:text-slate-800">Linked</button>
            </div>
        </div>

        <!-- Email List -->
        <div class="flex-1 overflow-y-auto scrollbar-thin">
            <div class="email-item selected p-4 border-b border-slate-100 cursor-pointer">
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white text-sm font-semibold">JD</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1">
                            <p class="text-sm font-semibold text-slate-800 truncate">John Doe</p>
                            <span class="text-xs text-slate-500">2h ago</span>
                        </div>
                        <p class="text-sm font-medium text-slate-700 truncate mb-1">Project Alpha - Final Documents</p>
                        <p class="text-xs text-slate-500 line-clamp-2">Please find attached the final project documents for review. We need your approval by end of week...</p>
                        <div class="flex items-center mt-2 space-x-2">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-800">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.586-6.586a2 2 0 00-2.828-2.828z"/>
                                </svg>
                                3 files
                            </span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-green-100 text-green-800">
                                Linked
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="email-item p-4 border-b border-slate-100 cursor-pointer">
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white text-sm font-semibold">SM</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1">
                            <p class="text-sm font-semibold text-slate-800 truncate">Sarah Miller</p>
                            <span class="text-xs text-slate-500">4h ago</span>
                        </div>
                        <p class="text-sm font-medium text-slate-700 truncate mb-1">Contract Amendment Request</p>
                        <p class="text-xs text-slate-500 line-clamp-2">I've reviewed the contract and have some amendments to propose. Can we schedule a meeting...</p>
                        <div class="flex items-center mt-2 space-x-2">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-orange-100 text-orange-800">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.586-6.586a2 2 0 00-2.828-2.828z"/>
                                </svg>
                                1 file
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="email-item p-4 border-b border-slate-100 cursor-pointer">
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-teal-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white text-sm font-semibold">MJ</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1">
                            <p class="text-sm font-semibold text-slate-800 truncate">Mike Johnson</p>
                            <span class="text-xs text-slate-500">6h ago</span>
                        </div>
                        <p class="text-sm font-medium text-slate-700 truncate mb-1">Q4 Financial Report</p>
                        <p class="text-xs text-slate-500 line-clamp-2">The Q4 financial report is ready for your review. Please see attached spreadsheets...</p>
                        <div class="flex items-center mt-2 space-x-2">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-800">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.586-6.586a2 2 0 00-2.828-2.828z"/>
                                </svg>
                                2 files
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="email-item p-4 border-b border-slate-100 cursor-pointer">
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-red-500 to-orange-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white text-sm font-semibold">AL</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1">
                            <p class="text-sm font-semibold text-slate-800 truncate">Anna Lee</p>
                            <span class="text-xs text-slate-500">1d ago</span>
                        </div>
                        <p class="text-sm font-medium text-slate-700 truncate mb-1">Legal Compliance Update</p>
                        <p class="text-xs text-slate-500 line-clamp-2">Updates on the new compliance requirements and necessary documentation changes...</p>
                        <div class="flex items-center mt-2 space-x-2">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-green-100 text-green-800">
                                Linked
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Panel - Email Preview & Actions -->
    <div class="flex-1 bg-white flex flex-col">
        <!-- Email Preview Header -->
        <div class="p-6 border-b border-slate-200">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold">JD</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800">Project Alpha - Final Documents</h3>
                        <p class="text-sm text-slate-600">From: John Doe &lt;john.doe@company.com&gt;</p>
                        <p class="text-sm text-slate-500">To: team@docmanager.com</p>
                        <p class="text-xs text-slate-500 mt-1">Received: Today at 2:30 PM</p>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition-all duration-300">
                        Create Files
                    </button>
                    <button class="bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white px-4 py-2 rounded-lg font-medium transition-all duration-300">
                        Link Files
                    </button>
                </div>
            </div>
        </div>

        <!-- Email Content -->
        <div class="flex-1 p-6 overflow-y-auto scrollbar-thin">
            <div class="prose max-w-none">
                <p class="text-slate-700 mb-4">Hi Team,</p>
                <p class="text-slate-700 mb-4">
                    I hope this email finds you well. Please find attached the final project documents for Project Alpha. 
                    We've completed all the requirements and deliverables as discussed in our previous meetings.
                </p>
                <p class="text-slate-700 mb-4">
                    The documents include:
                </p>
                <ul class="list-disc list-inside text-slate-700 mb-4 space-y-1">
                    <li>Project specifications and requirements</li>
                    <li>Technical documentation and architecture</li>
                    <li>User manuals and training materials</li>
                </ul>
                <p class="text-slate-700 mb-4">
                    Please review these documents and provide your approval by the end of this week. If you have any questions 
                    or need clarifications, please don't hesitate to reach out.
                </p>
                <p class="text-slate-700 mb-6">
                    Best regards,<br>
                    John Doe
                </p>
            </div>

            <!-- Attachments Section -->
            <div class="border-t border-slate-200 pt-6">
                <h4 class="text-lg font-semibold text-slate-800 mb-4">Attachments (3)</h4>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg border border-slate-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-800">project-specifications.pdf</p>
                                <p class="text-xs text-slate-500">2.4 MB</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Download</button>
                            <button class="text-green-600 hover:text-green-800 text-sm font-medium">Create File</button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg border border-slate-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-800">technical-documentation.docx</p>
                                <p class="text-xs text-slate-500">1.8 MB</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Download</button>
                            <button class="text-green-600 hover:text-green-800 text-sm font-medium">Create File</button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg border border-slate-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-800">user-manual.pdf</p>
                                <p class="text-xs text-slate-500">3.2 MB</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Download</button>
                            <button class="text-green-600 hover:text-green-800 text-sm font-medium">Create File</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- AI Summary Section -->
            <div class="border-t border-slate-200 pt-6 mt-6">
                <div class="bg-gradient-to-r from-purple-50 to-indigo-50 rounded-lg p-6 border border-purple-200">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-slate-800">AI Summary</h4>
                        <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs font-medium">Auto-generated</span>
                    </div>
                    <div class="text-sm text-slate-700 space-y-2">
                        <p><strong>Status:</strong> Project Alpha is complete and ready for final approval</p>
                        <p><strong>Action Required:</strong> Review and approve documents by end of week</p>
                        <p><strong>Key Documents:</strong> 3 attachments including specifications, technical docs, and user manual</p>
                        <p><strong>Priority:</strong> High - Approval deadline approaching</p>
                        <p><strong>Linked Files:</strong> This email has been linked to 2 existing project files</p>
                    </div>
                </div>
            </div>

            <!-- Related Files Section -->
            <div class="border-t border-slate-200 pt-6 mt-6">
                <h4 class="text-lg font-semibold text-slate-800 mb-4">Related Files (2)</h4>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg border border-blue-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-800">Project Alpha - Initial Proposal</p>
                                <p class="text-xs text-slate-500">Created from email • 5 days ago</p>
                            </div>
                        </div>
                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">View File</button>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg border border-green-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-800">Project Alpha - Meeting Notes</p>
                                <p class="text-xs text-slate-500">Linked to email • 3 days ago</p>
                            </div>
                        </div>
                        <button class="text-green-600 hover:text-green-800 text-sm font-medium">View File</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Email selection functionality
    $('.email-item').on('click', function() {
        $('.email-item').removeClass('selected');
        $(this).addClass('selected');
        
        // Here you would typically load the email content
        // For now, we'll just show a loading state
        console.log('Email selected:', $(this).find('.font-medium').first().text());
    });

    // Folder selection
    $('.folder-item').on('click', function() {
        $('.folder-item').removeClass('border-l-4 border-blue-500 bg-blue-50');
        $(this).addClass('border-l-4 border-blue-500 bg-blue-50');
        
        console.log('Folder selected:', $(this).find('.font-medium').text());
    });

    // File creation from attachments
    $('button:contains("Create File")').on('click', function() {
        const fileName = $(this).closest('.flex').find('.font-medium').text();
        
        // Show modal or redirect to file creation
        if (confirm(`Create a new file from "${fileName}"?`)) {
            console.log('Creating file from:', fileName);
            // Here you would implement the file creation logic
        }
    });

    // File linking functionality
    $('button:contains("Link Files")').on('click', function() {
        alert('File linking modal would open here, allowing users to link this email to existing files.');
    });

    // Create Files functionality
    $('button:contains("Create Files")').on('click', function() {
        alert('File creation modal would open here, allowing users to create new files from this email.');
    });

    // Smooth scrolling for all scrollable areas
    $('.scrollbar-thin').each(function() {
        $(this).on('scroll', function() {
            // Add any scroll-based functionality here
        });
    });
});
</script>
@endsection