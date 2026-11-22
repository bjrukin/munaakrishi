@php
    $bType = $b['type'] ?? 'rich_content';
    $bData = $b['data'] ?? [];
    $imgVal = $bData['image'] ?? '';
    if (!empty($imgVal)) {
        if (str_starts_with($imgVal, 'http') || str_starts_with($imgVal, 'assets/')) {
            $imgUrl = asset($imgVal);
        } else {
            $imgUrl = asset('storage/uploads/page/' . $imgVal);
        }
    } else {
        $imgUrl = '';
    }
@endphp

@switch($bType)
    @case('products')
        {{-- 1. Products Block (Dynamic from products table) --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? ($bData['label'] ?? 'Full Catalogue') }}" placeholder="e.g. Full Catalogue">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Explore Indigenous & Organic Crops' }}" placeholder="e.g. Explore Indigenous & Organic Crops">
            </div>
            <div class="col-md-2 mb-2">
                <label class="form-label small font-weight-bold">Query Limit</label>
                <input type="number" class="form-control form-control-sm" name="blocks[{{ $index }}][data][limit]" value="{{ $bData['limit'] ?? 12 }}" min="1" max="50">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Category Filter (Optional)</label>
                <select class="form-select form-select-sm" name="blocks[{{ $index }}][data][category]">
                    <option value="" @if(empty($bData['category'])) selected @endif>All Categories</option>
                    <option value="grains" @if(($bData['category'] ?? '') == 'grains') selected @endif>Grains & Flour</option>
                    <option value="vegetables" @if(($bData['category'] ?? '') == 'vegetables') selected @endif>Vegetables</option>
                    <option value="fruits" @if(($bData['category'] ?? '') == 'fruits') selected @endif>Fruits</option>
                    <option value="honey" @if(($bData['category'] ?? '') == 'honey') selected @endif>Honey</option>
                    <option value="dairy" @if(($bData['category'] ?? '') == 'dairy') selected @endif>Dairy & Cheese</option>
                    <option value="tea-spices" @if(($bData['category'] ?? '') == 'tea-spices') selected @endif>Tea & Spices</option>
                    <option value="pickles-dried" @if(($bData['category'] ?? '') == 'pickles-dried') selected @endif>Pickles & Dried</option>
                </select>
                <small class="text-muted">Pulls live items from the products database table matching this filter.</small>
            </div>
            <div class="col-md-3 mb-2">
                <label class="form-label small font-weight-bold">Button Text (Optional)</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][btn_text]" value="{{ $bData['btn_text'] ?? 'All products →' }}" placeholder="e.g. All products →">
            </div>
            <div class="col-md-3 mb-2">
                <label class="form-label small font-weight-bold">Button Link URL (Optional)</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][btn_link]" value="{{ $bData['btn_link'] ?? '/products' }}" placeholder="e.g. /products">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Description / Summary Copy</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="2" placeholder="Descriptive text for this section...">{{ $bData['copy'] ?? ($bData['content'] ?? '') }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Section Banner / Featured Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Click or drag here to upload image</p>
                        <small class="text-muted">Supports JPG, PNG, WebP or SVG (max 5 MB)</small>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('hero')
        {{-- 2. Hero Slider / Banners Block --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? 'Munaa Krishi Limited' }}" placeholder="e.g. Munaa Krishi Limited">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Main Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Empowering Nepali Farmers, Connecting Every Table' }}">
            </div>
            <div class="col-md-2 mb-2">
                <label class="form-label small font-weight-bold">Slide Limit</label>
                <input type="number" class="form-control form-control-sm" name="blocks[{{ $index }}][data][limit]" value="{{ $bData['limit'] ?? 5 }}" min="1" max="10">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Primary Button (Text & Link)</label>
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" name="blocks[{{ $index }}][data][btn_text]" value="{{ $bData['btn_text'] ?? 'See products →' }}" placeholder="Button Text">
                    <input type="text" class="form-control" name="blocks[{{ $index }}][data][btn_link]" value="{{ $bData['btn_link'] ?? '/products' }}" placeholder="URL (e.g. /products)">
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Secondary Button (Text & Link)</label>
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" name="blocks[{{ $index }}][data][secondary_btn_text]" value="{{ $bData['secondary_btn_text'] ?? 'About Munaa' }}" placeholder="Button Text">
                    <input type="text" class="form-control" name="blocks[{{ $index }}][data][secondary_btn_link]" value="{{ $bData['secondary_btn_link'] ?? '/about' }}" placeholder="URL (e.g. /about)">
                </div>
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Hero Description / Copy</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="2" placeholder="Sub-heading or summary statement...">{{ $bData['copy'] ?? '' }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Fallback Hero Banner Image</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload custom hero banner image</p>
                        <small class="text-muted">Supports JPG, PNG, WebP or SVG (max 5 MB)</small>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('farms')
        {{-- 3. Farmer Origin / Partner Farms Block --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? 'Farmer origin' }}">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Partner cooperatives and smallholders' }}">
            </div>
            <div class="col-md-2 mb-2">
                <label class="form-label small font-weight-bold">Query Limit</label>
                <input type="number" class="form-control form-control-sm" name="blocks[{{ $index }}][data][limit]" value="{{ $bData['limit'] ?? 4 }}" min="1" max="24">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Description / Summary Copy</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="2">{{ $bData['copy'] ?? '' }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Section Banner / Background Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload section banner image</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('faqs')
        {{-- 4. FAQs Block --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? 'Help Center' }}">
            </div>
            <div class="col-md-8 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Frequently Asked Questions' }}">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Description / Intro</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="2">{{ $bData['copy'] ?? '' }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Section Image / Visual (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload section visual or banner image</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('outlets')
        {{-- 5. Outlets Block --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? 'Our Outlets' }}">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Munaabazar Marts & Collection Centers' }}">
            </div>
            <div class="col-md-2 mb-2">
                <label class="form-label small font-weight-bold">Query Limit</label>
                <input type="number" class="form-control form-control-sm" name="blocks[{{ $index }}][data][limit]" value="{{ $bData['limit'] ?? 20 }}" min="1" max="100">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Description / Summary Copy</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="2">{{ $bData['copy'] ?? '' }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Outlets Map / Banner Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload outlets map or storefront image</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('videos')
        {{-- 6. Videos Block --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? 'Video Highlights' }}">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Field Dispatches & Harvest Stories' }}">
            </div>
            <div class="col-md-2 mb-2">
                <label class="form-label small font-weight-bold">Query Limit</label>
                <input type="number" class="form-control form-control-sm" name="blocks[{{ $index }}][data][limit]" value="{{ $bData['limit'] ?? 6 }}" min="1" max="24">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Description</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="2">{{ $bData['copy'] ?? '' }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Section Banner Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload video section banner image</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('gallery')
        {{-- 7. Photo Gallery Block --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? 'Visual Archive' }}">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Photo Gallery & Field Moments' }}">
            </div>
            <div class="col-md-2 mb-2">
                <label class="form-label small font-weight-bold">Query Limit</label>
                <input type="number" class="form-control form-control-sm" name="blocks[{{ $index }}][data][limit]" value="{{ $bData['limit'] ?? 6 }}" min="1" max="30">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Description</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="2">{{ $bData['copy'] ?? '' }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Gallery Cover Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload gallery cover image</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('news')
        {{-- 8. News & Activities Block --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? 'Field dispatches' }}">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Latest news and activities' }}">
            </div>
            <div class="col-md-2 mb-2">
                <label class="form-label small font-weight-bold">Query Limit</label>
                <input type="number" class="form-control form-control-sm" name="blocks[{{ $index }}][data][limit]" value="{{ $bData['limit'] ?? 3 }}" min="1" max="15">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Description</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="2">{{ $bData['copy'] ?? '' }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Section Banner Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload news section banner image</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('our_team')
        {{-- 9. Our Team Block --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? 'Management & Coordination' }}">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Our Dedicated Team' }}">
            </div>
            <div class="col-md-2 mb-2">
                <label class="form-label small font-weight-bold">Query Limit</label>
                <input type="number" class="form-control form-control-sm" name="blocks[{{ $index }}][data][limit]" value="{{ $bData['limit'] ?? 8 }}" min="1" max="30">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Description</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="2">{{ $bData['copy'] ?? '' }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Team Section Group Photo / Banner (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload team banner or group picture</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('board_of_directors')
        {{-- 10. Board of Directors Block --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? 'Company Governance' }}">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Board of Directors & Governance' }}">
            </div>
            <div class="col-md-2 mb-2">
                <label class="form-label small font-weight-bold">Query Limit</label>
                <input type="number" class="form-control form-control-sm" name="blocks[{{ $index }}][data][limit]" value="{{ $bData['limit'] ?? 8 }}" min="1" max="30">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Description</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="2">{{ $bData['copy'] ?? '' }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Board Banner / Feature Photo (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload board banner or photo</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('testimonials')
        {{-- 11. Testimonials Block --}}
        <div class="alert alert-light border small py-2 mb-3">
            The quotes themselves are managed in
            <a href="{{ route('admin.testimonial') }}">Media → Testimonials</a>.
            Add, edit, hide, or reorder them there. This block only sets the heading and how many quotes the page shows.
        </div>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? 'Voices from the field' }}">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Farmers and consumers trust Munaa' }}">
            </div>
            <div class="col-md-2 mb-2">
                <label class="form-label small font-weight-bold">Query Limit</label>
                <input type="number" class="form-control form-control-sm" name="blocks[{{ $index }}][data][limit]" value="{{ $bData['limit'] ?? 4 }}" min="1" max="20">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Description</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="2">{{ $bData['copy'] ?? '' }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Section Banner Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload testimonials banner image</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('who_we_are')
        {{-- 12. Who We Are (About Us) Block --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Section Label / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][label]" value="{{ $bData['label'] ?? ($bData['subtitle'] ?? 'Who we are') }}">
            </div>
            <div class="col-md-8 mb-2">
                <label class="form-label small font-weight-bold">Main Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Building a trusted national agricultural brand' }}">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Registration / Subtitle Info</label>
            <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][reg_info]" value="{{ $bData['reg_info'] ?? 'Registered under the Companies Act of Nepal · Regd. No. 232466/076/077' }}">
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Company Story / Detailed Content</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][content]" rows="4">{{ $bData['content'] ?? '' }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Feature / Story Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload story image</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('vision_mission')
        {{-- 13. Vision & Mission Cards Block --}}
        <div class="row">
            <div class="col-md-6 mb-2">
                <div class="p-2 border rounded bg-white">
                    <label class="form-label small font-weight-bold text-primary mb-1">Vision Title</label>
                    <input type="text" class="form-control form-control-sm mb-2" name="blocks[{{ $index }}][data][vision_title]" value="{{ $bData['vision_title'] ?? 'Vision' }}">
                    <label class="form-label small font-weight-bold">Vision Statement</label>
                    <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][vision_content]" rows="3">{{ $bData['vision_content'] ?? '' }}</textarea>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="p-2 border rounded bg-white">
                    <label class="form-label small font-weight-bold text-success mb-1">Mission Title</label>
                    <input type="text" class="form-control form-control-sm mb-2" name="blocks[{{ $index }}][data][mission_title]" value="{{ $bData['mission_title'] ?? 'Mission' }}">
                    <label class="form-label small font-weight-bold">Mission Statement</label>
                    <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][mission_content]" rows="3">{{ $bData['mission_content'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Vision / Mission Section Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload section banner or illustration</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('org_structure')
        {{-- 14. Organizational Structure Block --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Section Label</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? ($bData['label'] ?? 'Governance & Team') }}">
            </div>
            <div class="col-md-8 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Organizational structure' }}">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Subtitle / Description</label>
            <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" value="{{ $bData['copy'] ?? ($bData['subtitle'] ?? 'From the Board of Directors down to operations and logistics.') }}">
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Organizational Chart Image (SVG, PNG, JPG, or WebP)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload chart image (supports vector SVG, high-res PNG, WebP)</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 220px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Chart Caption</label>
            <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][caption]" value="{{ $bData['caption'] ?? 'Scroll horizontally to view the full organizational structure.' }}">
        </div>
        @break

    @case('aims_to_achieve')
    @case('implementation')
    @case('who_can_invest')
        {{-- 15. Repeatable List Blocks (Objectives, Strategies, Who Can Invest) --}}
        @php
            $fieldNames = [
                'aims_to_achieve' => ['label' => 'Objectives', 'title' => 'What Munaa Krishi aims to achieve', 'btn' => 'Add Objective'],
                'implementation'  => ['label' => 'Implementation', 'title' => 'Implementation strategies', 'btn' => 'Add Strategy Point'],
                'who_can_invest'  => ['label' => 'Investment opportunities', 'title' => 'Who can invest', 'btn' => 'Add Investor Category'],
            ][$bType];
            $items = is_array($bData['items'] ?? null) ? $bData['items'] : [];
        @endphp
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Section Label</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? ($bData['label'] ?? $fieldNames['label']) }}">
            </div>
            <div class="col-md-8 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? $fieldNames['title'] }}">
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-1">
            <label class="form-label small font-weight-bold mb-0">List Items</label>
            <button type="button" class="btn btn-xs btn-outline-primary btn-add-block-item" data-block-index="{{ $index }}" style="font-size: 0.78rem; padding: 2px 8px;">
                <i class="fa fa-plus me-1"></i> {{ $fieldNames['btn'] }}
            </button>
        </div>

        <div class="block-items-container d-flex flex-column gap-2 mb-2" data-block-index="{{ $index }}">
            @forelse($items as $iIdx => $item)
                <div class="input-group input-group-sm repeater-item-row">
                    <span class="input-group-text bg-light text-muted row-number">{{ str_pad($iIdx + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <input type="text" class="form-control" name="blocks[{{ $index }}][data][items][]" value="{{ $item }}" placeholder="Enter item statement...">
                    <button type="button" class="btn btn-outline-danger btn-remove-block-item" title="Delete item"><i class="fa fa-trash"></i></button>
                </div>
            @empty
                <div class="input-group input-group-sm repeater-item-row">
                    <span class="input-group-text bg-light text-muted row-number">01</span>
                    <input type="text" class="form-control" name="blocks[{{ $index }}][data][items][]" value="" placeholder="Enter item statement...">
                    <button type="button" class="btn btn-outline-danger btn-remove-block-item" title="Delete item"><i class="fa fa-trash"></i></button>
                </div>
            @endforelse
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Section Background / Feature Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload section banner or graphic</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('cta_banner')
        {{-- 16. Call to Action Banner --}}
        <div class="row">
            <div class="col-md-8 mb-2">
                <label class="form-label small font-weight-bold">Banner Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Partner with Munaa Krishi' }}">
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Button Text</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][btn_text]" value="{{ $bData['btn_text'] ?? 'Contact us →' }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Banner Style / Presentation</label>
                <select class="form-select form-select-sm" name="blocks[{{ $index }}][data][style]">
                    <option value="default" @if(($bData['style'] ?? 'default') === 'default') selected @endif>Full-width Forest Dark Banner</option>
                    <option value="youtube_callout" @if(($bData['style'] ?? '') === 'youtube_callout') selected @endif>Leaf Soft Callout Box (YouTube Channel / Accent Border)</option>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Tagline (Optional)</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? '' }}" placeholder="e.g. Watch & Learn">
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mb-2">
                <label class="form-label small font-weight-bold">Banner Copy / Text</label>
                <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="2">{{ $bData['copy'] ?? '' }}</textarea>
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Button Link URL</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][btn_link]" value="{{ $bData['btn_link'] ?? '/contact' }}" placeholder="e.g. /contact">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Banner Background Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload background image</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('contact_box')
        {{-- 17. Contact Hotline Box --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? 'Quick Contact' }}">
            </div>
            <div class="col-md-8 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Customer Hotline & Enquiries' }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Phone Number</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][phone]" value="{{ $bData['phone'] ?? '+977-1-5970000' }}">
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Email Address</label>
                <input type="email" class="form-control form-control-sm" name="blocks[{{ $index }}][data][email]" value="{{ $bData['email'] ?? 'info@munaakrishi.com' }}">
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">WhatsApp / Mobile</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][whatsapp]" value="{{ $bData['whatsapp'] ?? '9801111111' }}">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Address / Location</label>
            <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][address]" value="{{ $bData['address'] ?? 'Kathmandu, Nepal' }}">
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Section Banner Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload contact banner image</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @case('ways_to_shop')
        {{-- 18. Ways to Shop Cards --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? 'How to order' }}">
            </div>
            <div class="col-md-8 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? 'Three simple ways to shop' }}">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Description / Summary Copy</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="2">{{ $bData['copy'] ?? '' }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Section Banner Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Upload section banner image</p>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
        @break

    @default
        {{-- Default / Custom Rich Content Block --}}
        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-label small font-weight-bold">Subtitle / Kicker</label>
                <input type="text" class="form-control form-control-sm" name="blocks[{{ $index }}][data][subtitle]" value="{{ $bData['subtitle'] ?? '' }}" placeholder="e.g. Overview">
            </div>
            <div class="col-md-8 mb-2">
                <label class="form-label small font-weight-bold">Section Heading / Title</label>
                <input type="text" class="form-control form-control-sm block-title-input" name="blocks[{{ $index }}][data][title]" value="{{ $bData['title'] ?? ucwords(str_replace('_', ' ', $bType)) }}">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Content Copy / Paragraphs</label>
            <textarea class="form-control form-control-sm" name="blocks[{{ $index }}][data][copy]" rows="3" placeholder="Enter paragraph or descriptive text...">{{ $bData['copy'] ?? ($bData['content'] ?? '') }}</textarea>
        </div>

        <div class="mb-2">
            <label class="form-label small font-weight-bold">Block Image (Optional)</label>
            <div class="drag-container">
                <button type="button" class="{{ !empty($imgVal) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="deleteBlockImage(this)"><i class="fa fa-times"></i></button>
                <div class="drag-area" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 18px; border-radius: 6px; text-align: center; background: #f8fafc;">
                    <div class="dropify-message {{ !empty($imgVal) ? 'd-none' : 'd-block' }}">
                        <span class="material-symbols-outlined text-muted" style="font-size: 32px;">cloud_upload</span>
                        <p class="mt-1 mb-0 text-muted small font-weight-bold">Click or drag here to upload image</p>
                        <small class="text-muted">Supports JPG, PNG, WebP or SVG (max 5 MB)</small>
                    </div>
                    <div class="image-preview">
                        <img src="{{ $imgUrl }}" class="{{ !empty($imgVal) ? '' : 'd-none' }} preview-image img-fluid" style="max-height: 180px; object-fit: contain;">
                    </div>
                </div>
                <input type="hidden" name="blocks[{{ $index }}][data][image]" class="file-input block-image-input" value="{{ $imgVal }}">
                <input type="file" style="display:none" class="drag-image" accept="image/*,.svg" />
            </div>
        </div>
@endswitch
