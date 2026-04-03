<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RentRequest;

class RentRequestController extends Controller
{
    public function index()
    {
        $statusFilter = request('status');

        $query = RentRequest::query();
        if ($statusFilter === 'unread' || $statusFilter === 'read') {
            $query->where('status', $statusFilter);
        }

        $rentRequests = $query
            ->orderByRaw("FIELD(status, 'unread', 'read')")
            ->orderByDesc('created_at')
            ->get();

        $unreadCount = RentRequest::where('status', 'unread')->count();
        $readCount = RentRequest::where('status', 'read')->count();
        $totalCount = $unreadCount + $readCount;

        return view('backend.Rent.rent_requests', compact('rentRequests', 'unreadCount', 'readCount', 'totalCount', 'statusFilter'));
    }

    public function show($id)
    {
        $rentRequest = RentRequest::findOrFail($id);

        return view('backend.Rent.rent_request_show', compact('rentRequest'));
    }

    public function markRead($id)
    {
        $rentRequest = RentRequest::findOrFail($id);
        $rentRequest->status = 'read';
        $rentRequest->save();

        return redirect()->route('admin.rent.requests')->with('status', 'Request marked as read.');
    }

    public function markUnread($id)
    {
        $rentRequest = RentRequest::findOrFail($id);
        $rentRequest->status = 'unread';
        $rentRequest->save();

        return redirect()->route('admin.rent.requests')->with('status', 'Request marked as unread.');
    }

    public function destroy($id)
    {
        $rentRequest = RentRequest::findOrFail($id);
        $rentRequest->delete();

        return redirect()->route('admin.rent.requests')->with('status', 'Request deleted successfully.');
    }
}
