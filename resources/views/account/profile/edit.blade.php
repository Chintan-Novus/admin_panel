<x-admin_panel-app-layout toolbar-title="Update Profile" page-title="Update profile">
    <div class="mb-4">
        <!-- Validation Errors -->
        <x-admin_panel::auth-validation-errors :errors="$errors" />
    </div>

    <form method="POST" action="{{ route('account.profile.update') }}" id="profile_form" class="form">
        @method('PUT')
        @csrf

        <x-admin_panel::card title="Update Profile">

            <div class="row mb-6">
                <x-admin_panel::label for="email" value="Email" />
                <div class="col-lg-10 fv-row">
                    <x-admin_panel::input type="email" name="email" placeholder="Email" :value="Auth::user()->email" readonly/>
                </div>
            </div>
            <div class="row mb-6">
                <x-admin_panel::label for="name" value="name" class="required" />
                <div class="col-lg-10 fv-row">
                    <x-admin_panel::input name="name" placeholder="Name" :value="Auth::user()->name"/>
                </div>
            </div>

            <x-admin_panel::slot name="footer" class="d-flex justify-content-end py-6 px-9">
                <x-admin_panel::button class="btn-primary">Save</x-admin_panel::button>
            </x-admin_panel::slot>
        </x-admin_panel::card>
    </form>

    @push('scripts')
        <script>
            $(document).ready(function () {
                const form = document.querySelector('#profile_form');
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
                            'name': {
                                validators: {
                                    notEmpty: {
                                        message: 'The password is required'
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
</x-admin_panel-app-layout>
