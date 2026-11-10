@extends('layout.site')

@section('body_class', 'contact-page')

@section('content')
  @include('site._partial.ticker')

  <main>
    @include('site._partial.breadcrumb', [
      'title' => 'Contact Munaa Krishi',
      'nepali_title' => 'सम्पर्क',
      'subtitle' => 'Get in touch with our head office or reach out for bulk orders, farm partnerships, and general enquiries.',
      'bg_image' => 'assets/images/gallery/outlet-interior.jpg',
      'breadcrumbs' => ['Contact Us' => '']
    ])

    <!-- Main Contact Section -->
    <section class="section-padding">
      <div class="container">
        <div class="contact-layout">

          <!-- Left: Head Office Info -->
          <aside class="contact-sidebar">
            <p class="section-label">Head office</p>
            <h2 class="section-title">We are here to help</h2>
            <p class="section-copy" style="font-size: 1rem; margin-top: 0.5rem;">
              Whether you are looking for specific mountain farm products, want to discuss wholesale delivery for an institution, or want to partner with our rural aggregation network, our team is ready to talk.
            </p>

            <ul class="contact-info-list">
              <li class="contact-info-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                <div>
                  <strong>Location</strong>
                  <span>Sanepa, Lalitpur, Nepal</span>
                </div>
              </li>
              <li class="contact-info-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                <div>
                  <strong>Direct Phone</strong>
                  <a href="tel:+9779803165605">+977-98031 65605</a>
                </div>
              </li>
              <li class="contact-info-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                <div>
                  <strong>Email Address</strong>
                  <a href="mailto:info@munaa.com.np">info@munaa.com.np</a>
                </div>
              </li>
              <li class="contact-info-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                <div>
                  <strong>Hours of Operation</strong>
                  <span>Sunday – Friday: 9:00 AM – 5:00 PM<br><small style="color: var(--color-muted);">Closed on Saturdays and Public Holidays</small></span>
                </div>
              </li>
            </ul>
          </aside>

          <!-- Right: Tabbed Forms Card -->
          <div class="contact-card">

            <!-- Tabs Switcher -->
            <div class="contact-tabs-nav" role="tablist">
              <button type="button" class="contact-tab-btn active" data-tab="general" role="tab" aria-selected="true">
                General & Bulk Enquiry
              </button>
              <button type="button" class="contact-tab-btn" data-tab="farmer" role="tab" aria-selected="false">
                Farmer Partnership Application
              </button>
            </div>

            <!-- TAB 1: General Inquiry Form -->
            <div id="tab-pane-general">
              <form id="general-inquiry-form" class="form-grid-2" novalidate>
                <div class="form-group">
                  <label class="form-label" for="gi-name">Full name <span class="required">*</span></label>
                  <input id="gi-name" name="name" type="text" class="form-control" autocomplete="name" placeholder="Ram Bahadur Shrestha" required>
                  <div class="form-error"></div>
                </div>

                <div class="form-group">
                  <label class="form-label" for="gi-phone">Phone number <span class="required">*</span></label>
                  <input id="gi-phone" name="phone" type="tel" class="form-control" autocomplete="tel" placeholder="98XXXXXXXX" required>
                  <div class="form-error"></div>
                </div>

                <div class="form-group">
                  <label class="form-label" for="gi-email">Email address <span class="required">*</span></label>
                  <input id="gi-email" name="email" type="email" class="form-control" autocomplete="email" placeholder="name@example.com" required>
                  <div class="form-error"></div>
                </div>

                <div class="form-group">
                  <label class="form-label" for="gi-subject">Subject</label>
                  <select id="gi-subject" name="subject" class="form-control">
                    <option value="General question">General question</option>
                    <option value="Product enquiry">Product enquiry</option>
                    <option value="Farmer or cooperative supply">Farmer or cooperative supply</option>
                    <option value="Institutional supply">Institutional supply</option>
                    <option value="Outlet feedback">Outlet feedback</option>
                  </select>
                </div>

                <div class="form-group form-col-span-2">
                  <label class="form-label" for="gi-message">Message <span class="required">*</span></label>
                  <textarea id="gi-message" name="message" rows="5" class="form-control" placeholder="Please write a little about what you are looking for..." required></textarea>
                  <div class="form-error"></div>
                </div>

                <div class="form-group form-col-span-2">
                  <div class="math-challenge" data-answer="7">
                    <span class="math-challenge-text">What is 4 + 3?</span>
                    <input type="number" name="math_answer" class="form-control" placeholder="Answer" required>
                    <div class="form-error"></div>
                  </div>
                </div>

                <div class="form-col-span-2" style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; border-top: 1px solid var(--color-line); padding-top: 1rem; gap: 1rem;">
                  <p style="font-size: 0.82rem; color: var(--color-muted);">
                    By sending this form you agree to our <a href="{{ route('privacy.policy') }}" style="color: var(--color-forest); text-decoration: underline; font-weight: 600;">Privacy Policy</a>.
                  </p>
                  <button type="submit" class="btn btn-primary" style="min-width: 160px;">
                    Send message
                  </button>
                </div>
              </form>
            </div>

            <!-- TAB 2: Farmer Partnership Application Form -->
            <div id="tab-pane-farmer" style="display: none;">
              <form id="farmer-onboarding-form" novalidate>

                <!-- About You -->
                <fieldset class="form-fieldset">
                  <legend class="form-legend">1. About you</legend>
                  <div class="form-grid-2">
                    <div class="form-group">
                      <label class="form-label" for="fo-name">Your name or group name <span class="required">*</span></label>
                      <input id="fo-name" name="name" type="text" class="form-control" placeholder="Farmer / Sahakari name" required>
                      <div class="form-error"></div>
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="fo-phone">Mobile number <span class="required">*</span></label>
                      <input id="fo-phone" name="phone" type="tel" class="form-control" placeholder="98XXXXXXXX" required>
                      <div class="form-error"></div>
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="fo-district">District <span class="required">*</span></label>
                      <select id="fo-district" name="district" class="form-control" required>
                        <option value="">Choose district</option>
                        <optgroup label="Koshi Province">
                          <option>Bhojpur</option><option>Dhankuta</option><option>Ilam</option><option>Jhapa</option><option>Khotang</option><option>Morang</option><option>Okhaldhunga</option><option>Panchthar</option><option>Sankhuwasabha</option><option>Solukhumbu</option><option>Sunsari</option><option>Taplejung</option><option>Terhathum</option><option>Udayapur</option>
                        </optgroup>
                        <optgroup label="Madhesh Province">
                          <option>Bara</option><option>Dhanusha</option><option>Mahottari</option><option>Parsa</option><option>Rautahat</option><option>Saptari</option><option>Sarlahi</option><option>Siraha</option>
                        </optgroup>
                        <optgroup label="Bagmati Province">
                          <option>Bhaktapur</option><option>Chitwan</option><option>Dhading</option><option>Dolakha</option><option>Kathmandu</option><option>Kavrepalanchok</option><option>Lalitpur</option><option>Makwanpur</option><option>Nuwakot</option><option>Ramechhap</option><option>Rasuwa</option><option>Sindhuli</option><option>Sindhupalchok</option>
                        </optgroup>
                        <optgroup label="Gandaki Province">
                          <option>Baglung</option><option>Gorkha</option><option>Kaski</option><option>Lamjung</option><option>Manang</option><option>Mustang</option><option>Myagdi</option><option>Nawalpur</option><option>Parbat</option><option>Syangja</option><option>Tanahun</option>
                        </optgroup>
                        <optgroup label="Lumbini Province">
                          <option>Arghakhanchi</option><option>Banke</option><option>Bardiya</option><option>Dang</option><option>Eastern Rukum</option><option>Gulmi</option><option>Kapilvastu</option><option>Palpa</option><option>Parasi</option><option>Pyuthan</option><option>Rolpa</option><option>Rupandehi</option>
                        </optgroup>
                        <optgroup label="Karnali Province">
                          <option>Dailekh</option><option>Dolpa</option><option>Humla</option><option>Jajarkot</option><option>Jumla</option><option>Kalikot</option><option>Mugu</option><option>Salyan</option><option>Surkhet</option><option>Western Rukum</option>
                        </optgroup>
                        <optgroup label="Sudurpashchim Province">
                          <option>Achham</option><option>Baitadi</option><option>Bajhang</option><option>Bajura</option><option>Dadeldhura</option><option>Darchula</option><option>Doti</option><option>Kailali</option><option>Kanchanpur</option>
                        </optgroup>
                      </select>
                      <div class="form-error"></div>
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="fo-village">Municipality and ward</label>
                      <input id="fo-village" name="village" type="text" class="form-control" placeholder="For example Panauti 7">
                      <span class="form-hint">Ward number & local town</span>
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="fo-group">You are applying as</label>
                      <select id="fo-group" name="group_type" class="form-control">
                        <option value="Individual farmer">Individual farmer</option>
                        <option value="Cooperative (sahakari)">Cooperative (sahakari)</option>
                        <option value="Women's or mothers' group">Women's or mothers' group</option>
                        <option value="Producer company">Producer company</option>
                      </select>
                    </div>

                    <div id="fo-members-wrap" class="form-group" style="display: none;">
                      <label class="form-label" for="fo-members">Number of member farmers</label>
                      <input id="fo-members" name="members" type="number" class="form-control" placeholder="25">
                    </div>
                  </div>
                </fieldset>

                <!-- Crops -->
                <fieldset class="form-fieldset">
                  <legend class="form-legend">2. What you grow <span class="required">*</span></legend>
                  <p style="font-size: 0.85rem; color: var(--color-muted); margin-bottom: 0.5rem;">Click all crop types that you harvest and wish to supply:</p>
                  <div class="crop-pills-wrap">
                    <label class="crop-pill-label"><input type="checkbox" name="crop" value="Rice and grains">Rice and grains</label>
                    <label class="crop-pill-label"><input type="checkbox" name="crop" value="Vegetables">Vegetables</label>
                    <label class="crop-pill-label"><input type="checkbox" name="crop" value="Fruits">Fruits</label>
                    <label class="crop-pill-label"><input type="checkbox" name="crop" value="Honey">Honey</label>
                    <label class="crop-pill-label"><input type="checkbox" name="crop" value="Dairy and cheese">Dairy and cheese</label>
                    <label class="crop-pill-label"><input type="checkbox" name="crop" value="Tea">Tea</label>
                    <label class="crop-pill-label"><input type="checkbox" name="crop" value="Spices">Spices</label>
                    <label class="crop-pill-label"><input type="checkbox" name="crop" value="Pickles and dried food">Pickles and dried food</label>
                    <label class="crop-pill-label"><input type="checkbox" name="crop" value="Other">Other</label>
                  </div>
                  <div id="fo-crops-error" class="form-error" style="margin-top: 0.5rem;"></div>
                </fieldset>

                <!-- Land and Harvest -->
                <fieldset class="form-fieldset">
                  <legend class="form-legend">3. Land area and production capacity</legend>
                  <div class="form-grid-2">
                    <div class="form-group">
                      <label class="form-label" for="fo-land">Land area <span class="required">*</span></label>
                      <div style="display: flex; gap: 0.5rem;">
                        <input id="fo-land" name="land" type="number" step="any" class="form-control" placeholder="10" required>
                        <select name="land_unit" class="form-control" style="max-width: 130px;">
                          <option value="Ropani">Ropani</option>
                          <option value="Aana">Aana</option>
                          <option value="Bigha">Bigha</option>
                          <option value="Kattha">Kattha</option>
                          <option value="Hectare">Hectare</option>
                        </select>
                      </div>
                      <div class="form-error"></div>
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="fo-harvest">Expected harvest quantity <span class="required">*</span></label>
                      <div style="display: flex; gap: 0.5rem;">
                        <input id="fo-harvest" name="harvest" type="number" step="any" class="form-control" placeholder="500" required>
                        <select name="harvest_unit" class="form-control" style="max-width: 130px;">
                          <option value="kg">kg</option>
                          <option value="Quintal">Quintal</option>
                          <option value="Tonne">Tonne</option>
                          <option value="Muri">Muri</option>
                          <option value="Litre">Litre</option>
                        </select>
                      </div>
                      <div class="form-error"></div>
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="fo-month">Peak harvest month</label>
                      <select id="fo-month" name="month" class="form-control">
                        <option value="Baisakh">Baisakh</option>
                        <option value="Jestha">Jestha</option>
                        <option value="Asar">Asar</option>
                        <option value="Shrawan">Shrawan</option>
                        <option value="Bhadra">Bhadra</option>
                        <option value="Asoj">Asoj</option>
                        <option value="Kartik" selected>Kartik</option>
                        <option value="Mangsir">Mangsir</option>
                        <option value="Poush">Poush</option>
                        <option value="Magh">Magh</option>
                        <option value="Falgun">Falgun</option>
                        <option value="Chaitra">Chaitra</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="fo-practice">Farming practice</label>
                      <select id="fo-practice" name="practice" class="form-control">
                        <option value="Certified organic">Certified organic</option>
                        <option value="Chemical free, not certified" selected>Chemical free, not certified</option>
                        <option value="Moving to organic">Moving to organic</option>
                        <option value="Conventional">Conventional</option>
                      </select>
                    </div>

                    <div class="form-group form-col-span-2">
                      <label class="form-label" for="fo-message">Anything else we should know?</label>
                      <textarea id="fo-message" name="message" rows="3" class="form-control" placeholder="Road access, irrigation, cold storage, current buyers, or specific produce varieties..."></textarea>
                    </div>
                  </div>
                </fieldset>

                <!-- Anti Spam Check & Consent -->
                <div style="border-top: 1px solid var(--color-line); padding-top: 1.5rem; display: flex; flex-direction: column; gap: 1.25rem;">
                  <div class="math-challenge" data-answer="9">
                    <span class="math-challenge-text">What is 5 + 4?</span>
                    <input type="number" name="math_answer" class="form-control" placeholder="Answer" required>
                    <div class="form-error"></div>
                  </div>

                  <div>
                    <label style="display: flex; align-items: flex-start; gap: 0.6rem; cursor: pointer; font-size: 0.92rem; color: var(--color-ink);">
                      <input type="checkbox" name="consent" style="margin-top: 0.2rem; width: 18px; height: 18px; accent-color: var(--color-forest);" required>
                      <span>
                        I agree that Munaa Krishi may store these farm details and contact me about partnership, as described in the <a href="{{ route('privacy.policy') }}" style="color: var(--color-forest); text-decoration: underline; font-weight: 600;">Privacy Policy</a>.
                      </span>
                    </label>
                    <div id="fo-consent-error" class="form-error" style="margin-top: 0.25rem;"></div>
                  </div>

                  <div>
                    <button type="submit" class="btn btn-primary" style="min-width: 200px;">
                      Submit application
                    </button>
                  </div>
                </div>

              </form>
            </div>

          </div>

        </div>
      </div>
    </section>

    {{-- Dynamic Admin-Configured Components for Contact Page --}}
    @include('site._partial.dynamic_sections', ['page' => 'contact'])
  </main>
@endsection