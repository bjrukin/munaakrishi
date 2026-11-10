@if($offices->isNotEmpty())
<section class="contact-pg mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="map_g-frame">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.167625578333!2d85.3416582!3d27.7121103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1983d5ed1d9b%3A0xc33cc0c27dd21874!2sNepal%20Fashion%20Pvt%20Ltd!5e0!3m2!1sne!2snp!4v1755582584766!5m2!1sne!2snp"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"> </iframe>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="con_details-blocks">
                    @foreach ($offices as $office)
                    <div class="block-box">
                        <h3>{{ $office->name }}</h3>
                        <div class="con_detail-row">
                            <p>{{ $office->address }}</p>
                            <p>{{ $office->email }}</p>
                            <p>{{ $office->phone }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif