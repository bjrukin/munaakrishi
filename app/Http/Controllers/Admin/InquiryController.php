<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InquiryController extends Controller
{
    public function index(Request $request): View
    {
        $query = Inquiry::query()->latest();

        if ($search = trim((string) $request->query('q'))) {
            $query->where(function ($builder) use ($search): void {
                $builder->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        if (in_array($request->query('type'), ['general', 'farmer'], true)) {
            $query->where('type', $request->query('type'));
        }

        if (in_array($request->query('status'), ['unread', 'read'], true)) {
            $query->where('status', $request->query('status'));
        }

        return view('admin.inquiry.index', [
            'nav' => 'support',
            'sub_nav' => 'inquiry',
            'page_title' => 'Inquiries',
            'inquiries' => $query->paginate(25)->withQueryString(),
            'unreadCount' => Inquiry::where('status', 'unread')->count(),
        ]);
    }

    public function show(Inquiry $inquiry): View
    {
        if ($inquiry->status === 'unread') {
            $inquiry->update(['status' => 'read', 'read_at' => now()]);
        }

        return view('admin.inquiry.show', [
            'nav' => 'support',
            'sub_nav' => 'inquiry',
            'page_title' => 'Inquiry Details',
            'inquiry' => $inquiry->fresh(),
        ]);
    }
}
