@if($banner)
<section class="pg-header_sec">
    <header class="banner-img" style="background: url({{ $banner->url_image }})">
        <div class="banner-opacity"></div>
        <div class="container">
            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
                </ol>
            </div>
            <div class="banner-content">
                <div class="heading-style">{{ $page_title }}</div>
            </div>
        </div>
    </header>
</section>
@endif