<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController {

   public function index()
{
    //  Login check
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }

    // Common data for all dashboards
    $data = [
        'jspath' => 'dashboard/dashboard-common',
    ];

    // Permission → Dashboard view mapping
    $dashboards = [
        'viewAdminDashboard'      => 'dashboard/admin-dashboard',
        'viewFacultyDashboard'    => 'dashboard/faculty-dashboard',
        'viewLibrarianDashboard'  => 'dashboard/librarian-dashboard',
        'viewAccountantDashboard' => 'dashboard/accountant-dashboard',
        'viewIqacDashboard'       => 'dashboard/iqac-dashboard',
        'viewStudentDashboard'    => 'dashboard/student-dashboard',
    ];

    foreach ($dashboards as $permission => $view) {
        if (hasPermission($permission)) {
            return render_page($view, $data); 
        }
    }

    return redirect()->to('/forbidden');
}


    public function admin_dashboard() {
        $this->authorize('viewAdminDashboard');
        return render_page('dashboard/admin-dashboard');
    }

    public function faculty_dashboard() {
        $this->authorize('viewFacultyDashboard');
        return render_page('dashboard/faculty-dashboard');
    }

    public function librarian_dashboard() {
        $this->authorize('viewLibrarianDashboard');
        return render_page('dashboard/librarian-dashboard');
    }

    public function accountant_dashboard() {
        $this->authorize('viewAccountantDashboard');
        return render_page('dashboard/accountant-dashboard');
    }

    public function iqac_dashboard() {
        $this->authorize('viewIqacDashboard');
        return render_page('dashboard/iqac-dashboard');
    }

    public function student_dashboard() {
        $this->authorize('viewStudentDashboard');
        return render_page('dashboard/student-dashboard');
    }

    /**
     * Simple authorization helper
     */
    private function authorize(string $permission) {
        if (!hasPermission($permission)) {
            return redirect()->to('/unauthorized')->send();
            exit;
        }
    }
}
