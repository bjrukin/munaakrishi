@extends('layout.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="page-title-main mb-1">Inquiry Details</h4>
                <span class="text-muted">Received {{ $inquiry->created_at->format('M j, Y \a\t g:i A') }}</span>
            </div>
            <a href="{{ route('admin.inquiry') }}" class="btn btn-outline-secondary">Back to inquiries</a>
        </div>

        <div class="row g-3">
            <div class="col-lg-4">
                <div class="card h-100"><div class="card-body">
                    <h5 class="mb-3">Contact</h5>
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Name</dt><dd class="col-sm-8">{{ $inquiry->name }}</dd>
                        <dt class="col-sm-4">Phone</dt><dd class="col-sm-8"><a href="tel:{{ $inquiry->phone }}">{{ $inquiry->phone }}</a></dd>
                        <dt class="col-sm-4">Email</dt><dd class="col-sm-8">@if($inquiry->email)<a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>@else — @endif</dd>
                        <dt class="col-sm-4">Type</dt><dd class="col-sm-8">{{ $inquiry->type === 'farmer' ? 'Farmer partnership' : 'General enquiry' }}</dd>
                        <dt class="col-sm-4">Status</dt><dd class="col-sm-8"><span class="badge bg-success">Read</span></dd>
                    </dl>
                </div></div>
            </div>
            <div class="col-lg-8">
                <div class="card"><div class="card-body">
                    <h5>{{ $inquiry->subject }}</h5>
                    @if($inquiry->message)
                        <div class="mt-3" style="white-space: pre-wrap;">{{ $inquiry->message }}</div>
                    @endif
                </div></div>

                @if($inquiry->type === 'farmer' && $inquiry->details)
                    @php
                        $labels = ['district' => 'District', 'village' => 'Municipality / ward', 'group_type' => 'Applying as', 'members' => 'Member farmers', 'crops' => 'Crops', 'land' => 'Land area', 'land_unit' => 'Land unit', 'harvest' => 'Expected harvest', 'harvest_unit' => 'Harvest unit', 'month' => 'Peak month', 'practice' => 'Farming practice'];
                    @endphp
                    <div class="card"><div class="card-body">
                        <h5 class="mb-3">Farm Details</h5>
                        <dl class="row mb-0">
                            @foreach($labels as $key => $label)
                                @if(isset($inquiry->details[$key]))
                                    <dt class="col-sm-4">{{ $label }}</dt>
                                    <dd class="col-sm-8">{{ is_array($inquiry->details[$key]) ? implode(', ', $inquiry->details[$key]) : $inquiry->details[$key] }}</dd>
                                @endif
                            @endforeach
                        </dl>
                    </div></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
