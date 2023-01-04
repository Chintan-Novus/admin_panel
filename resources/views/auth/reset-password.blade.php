<x-admin_panel-guest-layout>
    <form method="POST" action="{{ route('password.update') }}" class="form w-100" novalidate="novalidate"
          id="reset_password_form">
        @csrf

        <!-- Password Reset Token -->
        <x-admin_panel::input type="hidden" name="token" :value="$request->route('token')"/>

        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">{{ __('Setup New Password') }}</h1>
            <div class="text-gray-400 fw-bold fs-4">
                {{ __('Already have reset your password') }} ?
                <a href="{{ route('login') }}" class="link-primary fw-bolder">{{ __('Log in') }} {{ __('here') }}</a>
            </div>
        </div>

        <!-- Validation Errors -->
        <x-admin_panel::auth-validation-errors :errors="$errors"/>

        <div class="fv-row mb-10">
            <x-admin_panel::label for="email" value="Email" class="required col-lg-6"/>
            <x-admin_panel::input type="email" name="email" placeholder="{{ __('Email') }}" :value="old('email', $request->email)" readonly/>
        </div>

        <div class="mb-10 fv-row" data-kt-password-meter="true">
            <div class="mb-1">
                <x-admin_panel::label for="password" value="Password" class="required col-lg-6"/>
                <div class="position-relative mb-3">
                    <x-admin_panel::input type="password" name="password" placeholder="{{ __('Password') }}" autofocus/>
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                          data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
            </div>
            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
        </div>
        <div class="fv-row mb-10">
            <x-admin_panel::label for="password_confirmation" value="Confirm Password" class="required col-lg-6"/>
            <x-admin_panel::input type="password" name="password_confirmation" placeholder="{{ __('Confirm password') }}"/>
        </div>
        <div class="text-center">
            <x-admin_panel::button class="btn-primary" id="submit_btn">{{ __('Reset Password') }}</x-admin_panel::button>
        </div>
    </form>

    @push('scripts')
        <script>
            $(document).ready(function () {
                const form = document.querySelector('#reset_password_form');
                const validator = FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            'password': {
                                validators: {
                                    notEmpty: {
                                        message: 'The password is required'
                                    },
                                    regexp: {
                                        regexp: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/i,
                                        message: 'Minimum eight characters, at least one letter, one number and one special character'
                                    }
                                }
                            },
                            'password_confirmation': {
                                validators: {
                                    notEmpty: {
                                        message: 'The password confirmation is required'
                                    },
                                    identical: {
                                        compare: function () {
                                            return form.querySelector('[name="password"]').value;
                                        },
                                        message: 'The password and its confirm are not the same'
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: 'border border-danger',
                                eleValidClass: 'border border-success'
                            })
                        },
                    }
                );

                $('#submit_btn').click(function (e) {
                    e.preventDefault();
                    validator.validate().then(function (status) {

                        if(status === 'Valid') {
                            form.submit();
                        }
                    });
                })
            });
        </script>
    @endpush
</x-admin_panel-guest-layout>
