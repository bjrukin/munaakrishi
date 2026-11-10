@if($teams->isNotEmpty())
<section class="pg-lay_section team_pg-nepfashion">
    <div class="container">
        <div class="row">
        @foreach ($teams as $team)
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="file-block_box">
                    <div class="avatar">  <img loading="lazy" decoding="async" src="{{ $team->url_image }}" alt="{{ $team->name }}"> </div>
                    <div class="staff_details-txt">
                        <h4>{{ $team->name }}</h4>
                        <p>{{ $team->designation }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif