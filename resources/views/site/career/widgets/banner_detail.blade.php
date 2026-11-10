@if($banner)
<section class="pg-header_sec">
    <header class="banner-img" style="background: url({{ $banner->url_image }})">
        <div class="banner-opacity"></div>
        <div class="container">
            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item">{{ $page_title }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $row->name }}</li>
                </ol>
            </div>
            <div class="banner-content">
                <div class="heading-style">{{ $row->name  }}</div>
            </div>
        </div>
    </header>
</section>
@endif