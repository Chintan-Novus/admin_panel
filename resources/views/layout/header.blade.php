<div id="kt_header" style="" class="header align-items-stretch">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                 id="kt_aside_mobile_toggle">
                {!! ThemeHelper::getSVG('assets/media/icons/duotune/abstract/abs015.svg', 'svg-icon-2x mt-1') !!}
            </div>
        </div>
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{ route('dashboard') }}" class="d-lg-none">
                <img alt="Logo" src="{{ asset('assets/media/logos/logo-2.svg') }}" class="h-30px"/>
            </a>
        </div>
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                {{-- Menu --}}
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                     data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                     data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
                        {!! ThemeHelper::headerMenu() !!}
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-stretch flex-shrink-0">
                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <x-admin_panel::symbol class="cursor-pointer symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                            @if (Helper::fileExists('public/uploads/user/avatar/', Auth::user()->avatar))
                                <x-slot name="avatar" style="background-image:url('{!! Helper::glideImage('user/avatar/'.Auth::user()->avatar, 40) !!}')"></x-slot>
                            @else
                                <x-slot name="label" class="bg-info text-inverse-info">{{ Auth::user()->full_name }}</x-slot>
                            @endif
                        </x-admin_panel::symbol>

                        <div
                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <x-admin_panel::symbol class="symbol-50px me-5">
                                        @if (Helper::fileExists('public/uploads/user/avatar/', Auth::user()->avatar))
                                            <x-slot name="avatar" style="background-image:url('{!! Helper::glideImage('user/avatar/'.Auth::user()->avatar, 50) !!}')"></x-slot>
                                        @else
                                            <x-slot name="label" class="bg-info text-inverse-info">{{ Auth::user()->full_name }}</x-slot>
                                        @endif
                                    </x-admin_panel::symbol>
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">
                                            {{ Auth::user()->full_name }}
                                        </div>
                                        <a href="#" class="fw-bold text-muted text-hover-primary fs-8">{{ Auth::user()->email }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5">
                                <a href="{{ route('account.profile.edit') }}" class="menu-link px-5">My Profile</a>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5 my-1">
                                <a href="{{ route('account.change_password.edit') }}" class="menu-link px-5">Change Password</a>
                            </div>
                            <div class="menu-item px-5">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="menu-link px-5" onclick="event.preventDefault();this.closest('form').submit();">
                                        Sign Out
                                    </a>
                                </form>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5">
                                <div class="menu-content px-5">
                                    <form method="POST" action="{{ route('account.profile.update.dark_mode') }}">
                                        @method('PUT')
                                        @csrf
                                        <label
                                            class="form-check form-switch form-check-custom form-check-solid pulse pulse-success"
                                            for="kt_user_menu_dark_mode_toggle">

                                            <input class="form-check-input w-30px h-20px" type="checkbox" value="true" name="dark_mode" onchange="event.preventDefault();this.closest('form').submit();"
                                                   {{ (Session::get('dark_mode')) ? "checked" : "" }}/>
                                            <span class="pulse-ring ms-n1"></span>
                                            <span class="form-check-label text-gray-600 fs-7">Dark Mode</span>
                                        </label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                             id="kt_header_menu_mobile_toggle">
                            <!--begin::Svg Icon | path: -->
                            {!! ThemeHelper::getSVG('assets/media/icons/duotune/text/txt001.svg', 'svg-icon-1') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
