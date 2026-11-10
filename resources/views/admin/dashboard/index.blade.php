@extends('layout.admin')
@section('content')
<div class="content adm-dash">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title-main float-start">Munaa Krishi Administration Dashboard</h4>
            </div>
        </div>

        <!-- Metric Stat Cards -->
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted text-uppercase fw-bold" style="font-size: 12px;">Agricultural Products</span>
                            <h2 class="mt-2 mb-0 fw-bold text-success">{{ $total_products }}</h2>
                            <a href="{{ route('admin.product') }}" class="small text-muted mt-1 d-inline-block">View products →</a>
                        </div>
                        <div class="bg-success bg-opacity-10 rounded-circle p-3 text-success">
                            <span class="material-symbols-outlined" style="font-size: 36px;">inventory_2</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted text-uppercase fw-bold" style="font-size: 12px;">Partner Farms & Origins</span>
                            <h2 class="mt-2 mb-0 fw-bold text-primary">{{ $total_farms }}</h2>
                            <a href="{{ route('admin.farm') }}" class="small text-muted mt-1 d-inline-block">View partner farms →</a>
                        </div>
                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 text-primary">
                            <span class="material-symbols-outlined" style="font-size: 36px;">agriculture</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted text-uppercase fw-bold" style="font-size: 12px;">Retail Outlets & Hubs</span>
                            <h2 class="mt-2 mb-0 fw-bold text-warning">{{ $total_offices }}</h2>
                            <a href="{{ route('admin.office') }}" class="small text-muted mt-1 d-inline-block">View outlets directory →</a>
                        </div>
                        <div class="bg-warning bg-opacity-10 rounded-circle p-3 text-warning">
                            <span class="material-symbols-outlined" style="font-size: 36px;">storefront</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted text-uppercase fw-bold" style="font-size: 12px;">News & Notices</span>
                            <h2 class="mt-2 mb-0 fw-bold text-danger">{{ $total_notices }}</h2>
                            <a href="{{ route('admin.notice') }}" class="small text-muted mt-1 d-inline-block">Manage announcements →</a>
                        </div>
                        <div class="bg-danger bg-opacity-10 rounded-circle p-3 text-danger">
                            <span class="material-symbols-outlined" style="font-size: 36px;">campaign</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted text-uppercase fw-bold" style="font-size: 12px;">Photo Albums</span>
                            <h2 class="mt-2 mb-0 fw-bold text-info">{{ $total_galleries }}</h2>
                            <a href="{{ route('admin.gallery') }}" class="small text-muted mt-1 d-inline-block">Manage gallery →</a>
                        </div>
                        <div class="bg-info bg-opacity-10 rounded-circle p-3 text-info">
                            <span class="material-symbols-outlined" style="font-size: 36px;">photo_library</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted text-uppercase fw-bold" style="font-size: 12px;">Team & Leadership</span>
                            <h2 class="mt-2 mb-0 fw-bold text-secondary">{{ $total_teams }}</h2>
                            <a href="{{ route('admin.team') }}" class="small text-muted mt-1 d-inline-block">View staff & team →</a>
                        </div>
                        <div class="bg-secondary bg-opacity-10 rounded-circle p-3 text-secondary">
                            <span class="material-symbols-outlined" style="font-size: 36px;">group</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Records Tables -->
        <div class="row mt-3">
            <div class="col-xl-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title mb-0">Recent Products</h5>
                            <a href="{{ route('admin.product') }}" class="btn btn-sm btn-outline-secondary">View all</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0 align-middle">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recent_products as $rp)
                                        <tr>
                                            <td>
                                                <strong>{{ $rp->name }}</strong>
                                                <br><small class="text-muted">{{ $rp->district }}</small>
                                            </td>
                                            <td><span class="badge bg-light text-dark">{{ ucfirst($rp->category) }}</span></td>
                                            <td>{{ $rp->price ? 'Rs. ' . number_format($rp->price, 2) : '-' }}</td>
                                            <td>
                                                <span class="badge {{ $rp->status ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ $rp->status ? 'Active' : 'Hidden' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="4" class="text-center text-muted">No products recorded yet.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title mb-0">Recent Notices & Announcements</h5>
                            <a href="{{ route('admin.notice') }}" class="btn btn-sm btn-outline-secondary">View all</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0 align-middle">
                                <thead>
                                    <tr>
                                        <th>Notice Title</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recent_notices as $rn)
                                        <tr>
                                            <td>
                                                <strong>{{ Str::limit($rn->name, 40) }}</strong>
                                            </td>
                                            <td><small class="text-muted">{{ date('d M Y', strtotime($rn->date)) }}</small></td>
                                            <td>
                                                <span class="badge {{ $rn->status ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ $rn->status ? 'Active' : 'Hidden' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="3" class="text-center text-muted">No notices recorded yet.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection