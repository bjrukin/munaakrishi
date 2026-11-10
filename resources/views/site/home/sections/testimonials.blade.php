<!-- Voices from the Field / Farmer Testimonials -->
<section class="section-padding bg-cream-deep border-line-y">
  <div class="container">
    <div>
      <p class="section-label">{{ $settings['subtitle'] ?? 'Voices from the field' }}</p>
      <h2 class="section-title">{{ $settings['title'] ?? 'Trust & partnership across Nepal' }}</h2>
      <p class="section-copy">{{ $settings['copy'] ?? 'Hear directly from farmer cooperatives, local growers and community leaders.' }}</p>
    </div>

    <div style="margin-top: 2.5rem; display: grid; gap: 1.75rem; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));">
      @if(isset($testimonials) && $testimonials->isNotEmpty())
        @foreach($testimonials as $t)
          <div style="background: #ffffff; border: 1px solid var(--color-line); border-top: 4px solid var(--color-haldi); padding: 2rem; box-shadow: var(--shadow-sm); display: flex; flex-direction: column; justify-content: space-between; border-radius: var(--radius-md);">
            <p style="font-size: 1.05rem; line-height: 1.75; color: var(--color-ink); font-style: italic;">
              “{{ $t->reviews }}”
            </p>
            <div style="margin-top: 1.5rem; display: flex; align-items: center; gap: 1rem; border-top: 1px solid var(--color-line); padding-top: 1rem;">
              <img loading="lazy" decoding="async" src="{{ $t->url_image }}" alt="{{ $t->name }}" style="width: 52px; height: 52px; border-radius: 50%; object-fit: cover; border: 2px solid var(--color-haldi);">
              <div>
                <h4 style="font-size: 1.05rem; font-weight: 800; color: var(--color-forest); margin: 0;">{{ $t->name }}</h4>
                <p style="font-size: 0.88rem; color: var(--color-muted); margin: 0.15rem 0 0;">{{ $t->company }}</p>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <!-- Fallback Testimonial 1 -->
        <div style="background: #ffffff; border: 1px solid var(--color-line); border-top: 4px solid var(--color-haldi); padding: 2rem; box-shadow: var(--shadow-sm); display: flex; flex-direction: column; justify-content: space-between; border-radius: var(--radius-md);">
          <p style="font-size: 1.05rem; line-height: 1.75; color: var(--color-ink); font-style: italic;">
            “Before partnering with Munaa, our Marsi rice would sit waiting for buyers while middlemen negotiated rock bottom rates. Today, our 140 farm families receive guaranteed fair prices and advance scheduling.”
          </p>
          <div style="margin-top: 1.5rem; display: flex; align-items: center; gap: 1rem; border-top: 1px solid var(--color-line); padding-top: 1rem;">
            <img loading="lazy" decoding="async" src="{{ asset('assets/images/team/team-field.jpg') }}" alt="Prakash Rokaya" style="width: 52px; height: 52px; border-radius: 50%; object-fit: cover; border: 2px solid var(--color-haldi);">
            <div>
              <h4 style="font-size: 1.05rem; font-weight: 800; color: var(--color-forest); margin: 0;">Prakash Rokaya</h4>
              <p style="font-size: 0.88rem; color: var(--color-muted); margin: 0.15rem 0 0;">Sinja High Altitude Cooperative, Jumla</p>
            </div>
          </div>
        </div>

        <!-- Fallback Testimonial 2 -->
        <div style="background: #ffffff; border: 1px solid var(--color-line); border-top: 4px solid var(--color-haldi); padding: 2rem; box-shadow: var(--shadow-sm); display: flex; flex-direction: column; justify-content: space-between; border-radius: var(--radius-md);">
          <p style="font-size: 1.05rem; line-height: 1.75; color: var(--color-ink); font-style: italic;">
            “The cold-chain transit Munaa introduced preserves the crisp texture of our Mustang apples down to the valley markets. Farmers now focus entirely on organic orchard care without worrying about post-harvest spoilage.”
          </p>
          <div style="margin-top: 1.5rem; display: flex; align-items: center; gap: 1rem; border-top: 1px solid var(--color-line); padding-top: 1rem;">
            <img loading="lazy" decoding="async" src="{{ asset('assets/images/team/team-director.jpg') }}" alt="Karma Thakali" style="width: 52px; height: 52px; border-radius: 50%; object-fit: cover; border: 2px solid var(--color-haldi);">
            <div>
              <h4 style="font-size: 1.05rem; font-weight: 800; color: var(--color-forest); margin: 0;">Karma Thakali</h4>
              <p style="font-size: 0.88rem; color: var(--color-muted); margin: 0.15rem 0 0;">Muktinath Orchard Collective, Marpha</p>
            </div>
          </div>
        </div>

        <!-- Fallback Testimonial 3 -->
        <div style="background: #ffffff; border: 1px solid var(--color-line); border-top: 4px solid var(--color-haldi); padding: 2rem; box-shadow: var(--shadow-sm); display: flex; flex-direction: column; justify-content: space-between; border-radius: var(--radius-md);">
          <p style="font-size: 1.05rem; line-height: 1.75; color: var(--color-ink); font-style: italic;">
            “As a mother of two in Lalitpur, knowing my vegetables come straight from Panauti without heavy chemical sprays gives me total peace of mind. The taste is remarkably fresh.”
          </p>
          <div style="margin-top: 1.5rem; display: flex; align-items: center; gap: 1rem; border-top: 1px solid var(--color-line); padding-top: 1rem;">
            <img loading="lazy" decoding="async" src="{{ asset('assets/images/team/team-quality.jpg') }}" alt="Radha Bajracharya" style="width: 52px; height: 52px; border-radius: 50%; object-fit: cover; border: 2px solid var(--color-haldi);">
            <div>
              <h4 style="font-size: 1.05rem; font-weight: 800; color: var(--color-forest); margin: 0;">Radha Bajracharya</h4>
              <p style="font-size: 0.88rem; color: var(--color-muted); margin: 0.15rem 0 0;">Munaabazar Regular Customer, Sanepa</p>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
</section>
