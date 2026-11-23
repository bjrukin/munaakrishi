@if(isset($testimonials) && $testimonials->isNotEmpty())
<!-- Voices from the Field / Farmer Testimonials -->
<section class="section-padding bg-cream-deep border-line-y">
  <div class="container">
    <div>
      <p class="section-label">{{ $settings['subtitle'] ?? 'Voices from the field' }}</p>
      <h2 class="section-title">{{ $settings['title'] ?? 'Farmers and consumers trust Munaa' }}</h2>
      <p class="section-copy">{{ $settings['copy'] ?? 'Hear directly from farmer cooperatives, local growers and community leaders.' }}</p>
    </div>

    <div style="margin-top: 2.5rem; display: grid; gap: 1.75rem; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));">
      @foreach($testimonials as $t)
        <div style="background: #ffffff; border: 1px solid var(--color-line); border-top: 4px solid var(--color-haldi); padding: 2rem; box-shadow: var(--shadow-sm); display: flex; flex-direction: column; justify-content: space-between; border-radius: var(--radius-md);">
          <p style="font-size: 1.05rem; line-height: 1.75; color: var(--color-ink); font-style: italic;">
            “{{ $t->plain_review }}”
          </p>
          <div style="margin-top: 1.5rem; display: flex; align-items: center; gap: 1rem; border-top: 1px solid var(--color-line); padding-top: 1rem;">
            <img loading="lazy" decoding="async" src="{{ $t->url_image }}" alt="{{ $t->name }}" style="width: 52px; height: 52px; border-radius: 50%; object-fit: cover; border: 2px solid var(--color-haldi);">
            <div>
              <h4 style="font-size: 1.05rem; font-weight: 800; color: var(--color-forest); margin: 0;">{{ $t->name }}</h4>
              @if($t->company)
                <p style="font-size: 0.88rem; color: var(--color-muted); margin: 0.15rem 0 0;">{{ $t->company }}</p>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif
