<x-admin_panel-guest-layout>
    <form method="POST" action="{{ route('login') }}" class="form w-100" novalidate="novalidate" id="login_form">
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Sign In to {{ config('app.name') }}</h1>
        </div>

        <!-- Validation Errors -->
        <x-admin_panel::auth-validation-errors :errors="$errors" />

        <div class="fv-row mb-10">
            <x-label for="email" :value="__('Email')" class="required col-lg-4" />
            <x-input type="email" name="email" :value="old('email')" placeholder="Email" autofocus autocomplete="off" />
        </div>
        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <x-label for="password" :value="__('Password')" class="required col-lg-4" />
                <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">Forgot Password?</a>
            </div>
            <x-input type="password" name="password" placeholder="Password" autocomplete="current-password" />
        </div>
        <div class="text-center">
            <x-button class="btn-primary" id="submit_btn">Sign In</x-button>
        </div>
    </form>

    @push('scripts')
        <script>
            $(document).ready(function () {
                const form = document.querySelector('#login_form');
                const validator = FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            'email': {
                                validators: {
                                    notEmpty: {
                                        message: 'Email address is required'
                                    },
                                    emailAddress: {
                                        message: 'The value is not a valid email address'
                                    }
                                }
                            },
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
                            }
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
