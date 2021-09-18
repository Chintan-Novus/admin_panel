<x-admin_panel-guest-layout>
    <form method="POST" action="{{ route('password.email') }}" class="form w-100" novalidate="novalidate"
          id="forgot_password_form">
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Forgot Password ?</h1>
            <div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
        </div>

        <!-- Validation Errors -->
        <x-admin_panel::auth-validation-errors :errors="$errors"/>

        <div class="fv-row mb-10">
            <x-admin_panel::label for="email" :value="__('Email')" class="required"/>
            <x-admin_panel::input type="email" name="email" :value="old('email')" placeholder="Email" autofocus autocomplete="off"/>
        </div>
        <div class="text-center">
            <x-admin_panel::button class="btn-primary" id="submit_btn">{{ __('Email Password Reset Link') }}</x-admin_panel::button>
        </div>
    </form>

    @push('scripts')
        <script>
            $(document).ready(function () {
                const form = document.querySelector('#forgot_password_form');
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
