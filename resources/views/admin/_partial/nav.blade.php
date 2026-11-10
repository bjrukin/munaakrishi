<div class="left-side-menu mt-3">
    <div class="h-100" data-simplebar>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="@if($nav == 'dashboard') menuitem-active @endif">
                    <a href="{{route('admin.dashboard')}}">
                        <span class="material-symbols-outlined md-22">space_dashboard</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Page & Component Builder -->
                <li class="@if($nav == 'homepage') menuitem-active @endif">
                    <a href="{{route('admin.homepage')}}">
                        <span class="material-symbols-outlined md-22">view_quilt</span>
                        <span>Component Builder</span>
                    </a>
                </li>

                <!-- Business (Products, Farms, Outlets) -->
                <li class="@if($nav == 'business') menuitem-active @endif">
                    <a href="#business" data-bs-toggle="collapse">
                        <span class="material-symbols-outlined md-22">inventory_2</span>
                        <span>Business</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse @if($nav == 'business') show @endif" id="business">
                        <ul class="nav-second-level">
                            <li class="@if($sub_nav == 'product') menuitem-active @endif">
                                <a href="{{route('admin.product')}}">Products</a>
                            </li>
                            <li class="@if($sub_nav == 'farm') menuitem-active @endif">
                                <a href="{{route('admin.farm')}}">Partner Farms</a>
                            </li>
                            <li class="@if($sub_nav == 'office') menuitem-active @endif">
                                <a href="{{route('admin.office')}}">Outlets & Offices</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- About Us -->
                <li class="@if($nav == 'about') menuitem-active @endif">
                    <a href="#about" data-bs-toggle="collapse">
                        <span class="material-symbols-outlined md-22">group</span>
                        <span>About</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse @if($nav == 'about') show @endif" id="about">
                        <ul class="nav-second-level">
                            <li class="@if($sub_nav == 'leadership') menuitem-active @endif">
                                <a href="{{route('admin.leadership')}}">Leadership</a>
                            </li>
                            <li class="@if($sub_nav == 'team') menuitem-active @endif">
                                <a href="{{route('admin.team')}}">Team</a>
                            </li>
                            <li class="@if($sub_nav == 'history') menuitem-active @endif">
                                <a href="{{route('admin.history')}}">History</a>
                            </li>
                            <li class="@if($sub_nav == 'achievement') menuitem-active @endif">
                                <a href="{{route('admin.achievement')}}">Achievement</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Media -->
                <li class="@if($nav == 'media') menuitem-active @endif">
                    <a href="#media" data-bs-toggle="collapse">
                        <span class="material-symbols-outlined md-22">perm_media</span>
                        <span>Media</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse @if($nav == 'media') show @endif" id="media">
                        <ul class="nav-second-level">
                            <li class="@if($sub_nav == 'banner') menuitem-active @endif">
                                <a href="{{route('admin.banner')}}">Banners</a>
                            </li>
                            <li class="@if($sub_nav == 'notice') menuitem-active @endif">
                                <a href="{{route('admin.notice')}}">News & Notices</a>
                            </li>
                            <li class="@if($sub_nav == 'gallery') menuitem-active @endif">
                                <a href="{{route('admin.gallery')}}">Gallery</a>
                            </li>
                            <li class="@if($sub_nav == 'video') menuitem-active @endif">
                                <a href="{{route('admin.video')}}">Videos</a>
                            </li>
                            <li class="@if($sub_nav == 'testimonial') menuitem-active @endif">
                                <a href="{{route('admin.testimonial')}}">Testimonials</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Support & Content -->
                <li class="@if($nav == 'support') menuitem-active @endif">
                    <a href="#support" data-bs-toggle="collapse">
                        <span class="material-symbols-outlined md-22">help</span>
                        <span>Support & CMS</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse @if($nav == 'support') show @endif" id="support">
                        <ul class="nav-second-level">
                            <li class="@if($sub_nav == 'faq') menuitem-active @endif">
                                <a href="{{route('admin.faq')}}">FAQs</a>
                            </li>
                            <li class="@if($sub_nav == 'page') menuitem-active @endif">
                                <a href="{{route('admin.page')}}">CMS Pages</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Settings -->
                <li class="@if($nav == 'settings') menuitem-active @endif">
                    <a href="#settings" data-bs-toggle="collapse">
                        <span class="material-symbols-outlined md-22">settings</span>
                        <span>Settings</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse @if($nav == 'settings') show @endif" id="settings">
                        <ul class="nav-second-level">
                            <li class="@if($sub_nav == 'generalsetting') menuitem-active @endif">
                                <a href="{{ route('admin.generalsetting') }}">General Settings</a>
                            </li>
                            <li class="@if($sub_nav == 'sociallink') menuitem-active @endif">
                                <a href="{{ route('admin.sociallink') }}">Social Links</a>
                            </li>
                            <li class="@if($sub_nav == 'seo') menuitem-active @endif">
                                <a href="{{ route('admin.seo') }}">SEO</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>