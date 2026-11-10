<section class="pg-career_col">
    <div class="container">
        <div class="career_lst-row">
            <div class="jb-detailSm" style="border-bottom: none; padding: 0">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="jb-title-lt">
                            <h1 class="jb-title">Marketing Manager</h1>
                            <div class="share-dis__job">
                                <p>Share this job</p>
                                <div class="social_icon-link"> <a href="https://www.facebook.com/sharer.php?u={{ route('careers.detail', [$row->slug]) }}" class="fb-logo" target="_blank"
                                        rel="noopener noreferrer" aria-label="Share this job on Facebook"
                                        title="Share this job on Facebook"></a> <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('careers.detail', [$row->slug]) }}" class="in-logo"
                                        target="_blank" rel="noopener noreferrer"
                                        aria-label="Share this job on LinkedIn" title="Share this job on LinkedIn"></a>
                                </div>
                            </div>
                            <div class="jb-overview">
                                <div class="overview_lst">
                                    <label>Location</label>
                                    <div>{{ $row->location }}</div>
                                </div>
                                <div class="overview_lst">
                                    <label>Department</label>
                                    <div>{{ $row->department }}</div>
                                </div>
                                <div class="overview_lst">
                                    <label>Employment type</label>
                                    <div>{{ $row->employment_type }}</div>
                                </div>
                                <div class="overview_lst">
                                    <label>Minimum experience</label>
                                    <div>{{ $row->experience }}+ Years</div>
                                </div>
                                <div class="overview_lst">
                                    <label>Application Closing Date</label>
                                    <div>{{ Carbon\Carbon::parse($row->expiry_date)->format('F d, Y') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-4 col-sm-12 col-12">
                        <div class="jobs-overview">
                            <div class="job-details_row">
                                <h3>Responsibilities</h3>
                                <div>{!! $row->responsibility !!} </div>
                            </div>
                            <div class="job-details_row">
                                <h3>Requirements and skills</h3>
                                <div>{!! $row->requirement !!} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>