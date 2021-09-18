<x-admin_panel-app-layout toolbar-title="Change Password">
    <form method="POST" action="{{ route('account.change_password.update') }}" id="change_password_form" class="form">
        @method('PUT')
        @csrf

        <x-admin_panel::card title="Change password">

            <!-- Validation Errors -->
            <x-admin_panel::auth-validation-errors :errors="$errors" />

            <div class="row mb-6 mt-6">
                <x-admin_panel::label for="current_password" value="Current Password" class="required" />
                <div class="col-lg-10 fv-row">
                    <x-admin_panel::input type="password" name="current_password" placeholder="Current password" autofocus/>
                </div>
            </div>
            <div class="row mb-6" data-kt-password-meter="true">
                <x-admin_panel::label for="password" value="Password" class="required" />
                <div class="col-lg-10 fv-row position-relative">
                    <x-admin_panel::input type="password" name="password" placeholder="Password"/>
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                          data-kt-password-meter-control="visibility">
                            <i class="bi bi-eye-slash fs-2"></i>
                            <i class="bi bi-eye fs-2 d-none"></i>
                        </span>
                    <div class="form-text d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                    </div>
                </div>
            </div>
            <div class="row mb-6">
                <x-admin_panel::label for="confirm_password" value="Confirm Password" class="required" />
                <div class="col-lg-10 fv-row">
                    <x-admin_panel::input type="password" name="password_confirmation" placeholder="Confirm Password"/>
                </div>
            </div>

            <x-slot name="footer" class="d-flex justify-content-end py-6 px-9">
                <x-admin_panel::button class="btn-primary" id="submit_btn">Save</x-admin_panel::button>
            </x-slot>
        </x-admin_panel::card>
    </form>

    @push('scripts')
        <script>
            $(document).ready(function () {
                const form = document.querySelector('#change_password_form');
                const validator = FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            'current_password': {
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
</x-admin_panel-app-layout>
