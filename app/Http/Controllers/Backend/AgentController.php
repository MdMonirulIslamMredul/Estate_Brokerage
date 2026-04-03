<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AgentCommission;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->latest()->get();
        return view('backend.agent.agent_setting', compact('users'));
    }

    public function userActive($id)
    {
        User::where('id', $id)->update(['status' => 1]);
        return back()->with('success', 'User activated successfully.');
    }

    public function userInactive($id)
    {
        User::where('id', $id)->update(['status' => 0]);
        return back()->with('success', 'User deactivated successfully.');
    }

    public function userDetails($id)
    {
        $user = User::findOrFail($id);
        return view('backend.agent.user_details', compact('user'));
    }

    //agent commission methods --- IGNORE ---
    public function addAgentCommission()
    {
        $agents = User::where('role', 'user')->get();
        $projects = Project::where('status', 1)->get();
        return view('backend.agent.add_agent_commission', compact('agents', 'projects'));
    }
    public function storeAgentCommission()
    {
        //logic to store agent commission
        $data = request()->validate([
            'agent_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'amount' => 'required|numeric',
        ]);
        //store the commission in the database (you can create a new model for this)
        AgentCommission::create($data);
        return back()->with('success', 'Agent commission added successfully.');
    }
    public function listAgentCommissions()
    {
        //logic to list agent commissions
        $commissions = AgentCommission::with('agent', 'project')->latest()->get();
        return view('backend.agent.agent_commission_settings', compact('commissions'));
    }

    public function editAgentCommission($id)
    {
        $commission = AgentCommission::findOrFail($id);
        $agents = User::where('role', 'user')->get();
        $projects = Project::where('status', 1)->get();
        return view('backend.agent.edit_agent_commission', compact('commission', 'agents', 'projects'));
    }
    public function updateAgentCommission()
    {
        $data = request()->validate([
            'id' => 'required|exists:agent_commissions,id',
            'agent_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'amount' => 'required|numeric',
        ]);
        $commission = AgentCommission::findOrFail($data['id']);
        $commission->update($data);
        return back()->with('success', 'Agent commission updated successfully.');
    }
    public function deleteAgentCommission($id)
    {
        $commission = AgentCommission::findOrFail($id);
        $commission->delete();
        return back()->with('success', 'Agent commission deleted successfully.');
    }

    // Agent dashboard routes
    public function agentDashboard()
    {
        if (auth()->user()->role !== 'user') {
            return redirect()->route('dashboard');
        }
        $commissions = AgentCommission::with('agent', 'project')->where('agent_id', auth()->id())->latest()->get();
        return view('frontend.Agent_Dashboard.index', compact('commissions'));
    }

    public function agentProfile()
    {
        if (auth()->user()->role !== 'user') {
            return redirect()->route('dashboard');
        }
        return view('frontend.Agent_Dashboard.agent_profile');
    }

    public function agentProfileUpdate()
    {
        if (auth()->user()->role !== 'user') {
            return redirect()->route('dashboard');
        }
        $data = request()->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email,' . auth()->id(),
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);
        auth()->user()->update($data);
        return back()->with('success', 'Profile updated successfully.');
    }


    public function agentChangePassword()
    {
        if (auth()->user()->role !== 'user') {
            return redirect()->route('dashboard');
        }
        return view('frontend.Agent_Dashboard.agent_changepassword');
    }

    public function agentUpdatePassword()
    {
        $data = request()->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!password_verify($data['current_password'], auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        auth()->user()->update(['password' => bcrypt($data['new_password'])]);
        return back()->with('success', 'Password updated successfully.');
    }

    public function agentLogout()
    {
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
