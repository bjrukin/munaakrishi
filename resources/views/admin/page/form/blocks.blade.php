<div class="card mb-4" id="page_blocks_card">
    <div class="card-header bg-light d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h5 class="card-title mb-0 d-flex align-items-center">
                <span class="material-symbols-outlined me-2 text-primary">view_quilt</span>
                Modular Page Blocks (JSON Architecture)
            </h5>
            <small class="text-muted">Dynamic blocks automatically link to database tables (products, faqs, banners, outlets, etc.). Each block features dedicated fields and image uploaders.</small>
        </div>
        <div class="dropdown">
            <button class="btn btn-primary btn-sm rounded-pill dropdown-toggle" type="button" id="addBlockDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-plus me-1"></i> Add Block to Page
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="addBlockDropdown" style="max-height: 420px; overflow-y: auto;">
                <li class="dropdown-header text-uppercase font-weight-bold text-success">Dynamic Blocks (From Database Tables)</li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="hero" data-label="Banners / Hero Slider"><i class="fa fa-image me-2 text-success"></i> Banners / Hero Slider <small class="text-muted d-block ms-4">Pulls from banners table</small></a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="products" data-label="Products Showcase"><i class="fa fa-shopping-basket me-2 text-success"></i> Products Showcase <small class="text-muted d-block ms-4">Pulls from products table</small></a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="farms" data-label="Farmer Origin / Partner Farms"><i class="fa fa-leaf me-2 text-success"></i> Farmer Origin / Partner Farms <small class="text-muted d-block ms-4">Pulls from farms table</small></a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="faqs" data-label="FAQs Accordion"><i class="fa fa-question-circle me-2 text-success"></i> FAQs Accordion <small class="text-muted d-block ms-4">Pulls from faqs table</small></a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="outlets" data-label="Outlets & Locations"><i class="fa fa-store me-2 text-success"></i> Outlets & Locations <small class="text-muted d-block ms-4">Pulls from offices table</small></a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="videos" data-label="Videos Showcase"><i class="fa fa-play-circle me-2 text-success"></i> Videos Showcase <small class="text-muted d-block ms-4">Pulls from videos table</small></a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="gallery" data-label="Photo Gallery"><i class="fa fa-camera me-2 text-success"></i> Photo Gallery <small class="text-muted d-block ms-4">Pulls from galleries table</small></a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="news" data-label="News & Activities"><i class="fa fa-newspaper me-2 text-success"></i> News & Activities <small class="text-muted d-block ms-4">Pulls from notices table</small></a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="our_team" data-label="Our Team"><i class="fa fa-users me-2 text-success"></i> Our Team <small class="text-muted d-block ms-4">Pulls from teams table</small></a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="board_of_directors" data-label="Board of Directors"><i class="fa fa-user-tie me-2 text-success"></i> Board of Directors <small class="text-muted d-block ms-4">Pulls from leaderships table</small></a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="testimonials" data-label="Voices from the Field"><i class="fa fa-quote-left me-2 text-success"></i> Voices from the Field <small class="text-muted d-block ms-4">Pulls from testimonials table</small></a></li>
                <li><hr class="dropdown-divider"></li>
                <li class="dropdown-header text-uppercase font-weight-bold text-primary">Content & Layout Blocks</li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="who_we_are" data-label="Who We Are"><i class="fa fa-building me-2 text-primary"></i> Who We Are Narrative</a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="vision_mission" data-label="Vision & Mission"><i class="fa fa-eye me-2 text-primary"></i> Vision & Mission Cards</a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="org_structure" data-label="Organizational Structure"><i class="fa fa-sitemap me-2 text-primary"></i> Organizational Structure Chart</a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="aims_to_achieve" data-label="Aims to Achieve"><i class="fa fa-flag me-2 text-primary"></i> Aims to Achieve (Objectives)</a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="implementation" data-label="Implementation Strategies"><i class="fa fa-road me-2 text-primary"></i> Implementation Strategies</a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="who_can_invest" data-label="Who Can Invest"><i class="fa fa-dollar-sign me-2 text-primary"></i> Who Can Invest</a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="ways_to_shop" data-label="Ways to Shop"><i class="fa fa-shopping-cart me-2 text-primary"></i> Ways to Shop Cards</a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="contact_box" data-label="Contact Hotline Box"><i class="fa fa-phone me-2 text-primary"></i> Contact Hotline Box</a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="cta_banner" data-label="Call to Action Banner"><i class="fa fa-bullhorn me-2 text-primary"></i> Call to Action Banner</a></li>
                <li><a class="dropdown-item add-block-btn" href="javascript:void(0)" data-type="rich_content" data-label="Custom Rich Text Block"><i class="fa fa-file-alt me-2 text-primary"></i> Custom Rich Content Block</a></li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div id="blocks_accordion_container" class="d-flex flex-column gap-3">
            @php
                $pageBlocks = is_array($row->blocks ?? null) ? $row->blocks : (json_decode($row->blocks ?? '[]', true) ?: []);
            @endphp

            @forelse($pageBlocks as $index => $b)
                @include('admin.page.form.block_card', ['b' => $b, 'index' => $index])
            @empty
                <div class="alert alert-light text-center py-4 text-muted" id="no_blocks_alert">
                    <span class="material-symbols-outlined d-block mb-2" style="font-size: 36px;">widgets</span>
                    No blocks added yet. Click <strong>Add Block to Page</strong> above to add dynamic or content blocks.
                </div>
            @endforelse
        </div>
    </div>
</div>
