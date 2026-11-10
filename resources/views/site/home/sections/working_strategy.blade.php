<!-- Working Strategy Interactive Journey -->
<section class="section-padding">
  <div class="container">
    <div>
      <p class="section-label">{{ $settings['subtitle'] ?? 'Working strategy' }}</p>
      <h2 class="section-title">{{ $settings['title'] ?? 'How products move' }}</h2>
      <p class="section-copy">{{ $settings['copy'] ?? 'From direct collection to domestic outlets and international markets.' }}</p>
    </div>

    <div class="journey-wrap">
      <div class="journey" role="list">
        <span class="journey-line journey-line-mobile" aria-hidden="true"></span>
        <span class="journey-line journey-line-desktop" aria-hidden="true">
          <span class="journey-line-fill"></span>
        </span>
        <span class="journey-vehicle" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
        </span>

        <article class="journey-step is-complete is-active" role="listitem">
          <div class="journey-mark"><span>1</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 11V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v0"></path><path d="M14 10V4a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v2"></path><path d="M10 10.5V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v8"></path><path d="M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"></path></svg></div>
          <div class="journey-copy"><h3>Collect</h3><p>Direct from farmers & coops.</p></div>
        </article>

        <article class="journey-step" role="listitem">
          <div class="journey-mark"><span>2</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="6" cy="19" r="3"></circle><path d="M9 19h8.5a4.5 4.5 0 0 0 0-9H15"></path><circle cx="18" cy="5" r="3"></circle></svg></div>
          <div class="journey-copy"><h3>Transport</h3><p>Safe transit to facilities.</p></div>
        </article>

        <article class="journey-step" role="listitem">
          <div class="journey-mark"><span>3</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path><path d="m9 12 2 2 4-4"></path></svg></div>
          <div class="journey-copy"><h3>Inspect</h3><p>Quality check & testing.</p></div>
        </article>

        <article class="journey-step" role="listitem">
          <div class="journey-mark"><span>4</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"></path><path d="m3.3 7 8.7 5 8.7-5"></path><path d="M12 22V12"></path></svg></div>
          <div class="journey-copy"><h3>Prepare</h3><p>Clean, grade & package.</p></div>
        </article>

        <article class="journey-step" role="listitem">
          <div class="journey-mark"><span>5</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line><path d="m20 16-4-4 4-4"></path><path d="m4 8 4 4-4 4"></path><path d="m16 4-4 4-4-4"></path><path d="m8 20 4-4 4 4"></path></svg></div>
          <div class="journey-copy"><h3>Cold store</h3><p>Climate controlled fresh.</p></div>
        </article>

        <article class="journey-step" role="listitem">
          <div class="journey-mark"><span>6</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"></path><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"></path><path d="M2 7h20"></path></svg></div>
          <div class="journey-copy"><h3>Distribute</h3><p>Marts & home delivery.</p></div>
        </article>

        <article class="journey-step" role="listitem">
          <div class="journey-mark"><span>7</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z"></path></svg></div>
          <div class="journey-copy"><h3>Export</h3><p>Global Nepali products.</p></div>
        </article>
      </div>

      <div class="journey-detail" aria-live="polite">
        <div class="journey-detail-inner">
          <span>STEP 1 OF 7</span>
          <h3>Collect</h3>
          <p>Collect agricultural products directly from farmers and cooperatives.</p>
        </div>
      </div>
    </div>
  </div>
</section>
