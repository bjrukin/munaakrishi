@extends('layout.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <div>
                        <h4 class="page-title-main mb-1">Inquiries</h4>
                        <span class="badge bg-danger">{{ $unreadCount }} unread</span>
                    </div>
                    <form method="get" action="{{ route('admin.inquiry') }}" class="row g-2 align-items-center">
                        <div class="col-auto">
                            <input type="search" name="q" value="{{ request('q') }}" class="form-control" placeholder="Name, phone, email or subject">
                        </div>
                        <div class="col-auto">
                            <select name="type" class="form-select">
                                <option value="">All types</option>
                                <option value="general" @selected(request('type') === 'general')>General</option>
                                <option value="farmer" @selected(request('type') === 'farmer')>Farmer partnership</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select name="status" class="form-select">
                                <option value="">All statuses</option>
                                <option value="unread" @selected(request('status') === 'unread')>Unread</option>
                                <option value="read" @selected(request('status') === 'read')>Read</option>
                            </select>
                        </div>
                        <div class="col-auto"><button class="btn btn-primary" type="submit">Filter</button></div>
                        @if(request()->hasAny(['q', 'type', 'status']))
                            <div class="col-auto"><a href="{{ route('admin.inquiry') }}" class="btn btn-light">Clear</a></div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                @if($inquiries->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Status</th>
                                    <th>Received</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Type</th>
                                    <th>Subject</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inquiries as $inquiry)
                                    <tr class="{{ $inquiry->status === 'unread' ? 'fw-semibold table-light' : '' }}">
                                        <td><span class="badge {{ $inquiry->status === 'unread' ? 'bg-danger' : 'bg-secondary' }}">{{ ucfirst($inquiry->status) }}</span></td>
                                        <td>{{ $inquiry->created_at->format('M j, Y g:i A') }}</td>
                                        <td>{{ $inquiry->name }}</td>
                                        <td>
                                            <a href="tel:{{ $inquiry->phone }}">{{ $inquiry->phone }}</a>
                                            @if($inquiry->email)<br><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>@endif
                                        </td>
                                        <td>{{ $inquiry->type === 'farmer' ? 'Farmer partnership' : 'General' }}</td>
                                        <td>{{ $inquiry->subject }}</td>
                                        <td class="text-end"><a class="btn btn-sm btn-primary" href="{{ route('admin.inquiry.show', $inquiry) }}">View</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $inquiries->links('pagination::bootstrap-5') }}</div>
                @else
                    <div class="alert alert-light mb-0">No inquiries found.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
