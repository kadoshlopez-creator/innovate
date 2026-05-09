<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Contact;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();

        $this->view('admin/dashboard', [
            'title'           => 'Dashboard',
            'total_services'  => Service::count(),
            'total_contacts'  => Contact::count(),
            'unread_contacts' => Contact::unreadCount(),
            'recent_contacts' => Contact::recent(5),
        ], 'admin');
    }
}
