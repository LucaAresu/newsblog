<?php

namespace App\Http\Controllers;

use App\Role;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use function dd;
use function view;

class StaffController extends Controller
{

    public function index()
    {
        return view('staff.template.template');
    }

    public function promoteView()
    {
            return view('staff.promote');
    }
    public function promoteSearch(Request $req, $message = null)
    {
        $oldRequest = $req->name;
        $req->validate([
            'name' => 'required|min:5',
        ]);
        $users = User::where('name', 'like', '%'.$req->name.'%');
        if(!$users->count())
            return back()->withErrors(['name' => 'Utente non trovato']);
        $users = $users->get();
        return view('staff.promote',compact('users','oldRequest', 'message'));
    }

    public function promote(Request $req)
    {
        $user = User::find($req->userId);
        $section = Section::find($req->sectionId);
        $role = Role::find($req->roleId);
        if(!$user || !$section || !$role )
            return back()->withErrors(['name' => 'Errore']);
        //dd($section, $role, $user);

        $user->promote($section, $role);

        return $this->promoteSearch($req, 'Utente Aggiornato');
    }
}
