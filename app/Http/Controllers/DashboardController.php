<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Stat;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $servicesCount = Service::count();
        $statsCount = Stat::count();
        $contactsCount = Contact::count();

        return view('dashboard.home', compact('usersCount', 'servicesCount', 'statsCount', 'contactsCount'));
    }

    public function users()
    {
        $users = User::latest()->get();
        return view('dashboard.users', compact('users'));
    }

    public function contacts()
    {
        $contacts = Contact::latest()->get();
        return view('dashboard.contacts', compact('contacts'));
    }
}
