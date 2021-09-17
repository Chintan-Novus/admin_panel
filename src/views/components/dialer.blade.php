@props(['name', 'value'=>25000, 'id','min'=>1000,'max'=>50000,'step'=>1000,'prefix'=>'$','decimals'=>2])

@php
    if(empty($id)) {
        $id = $name;
    }
@endphp

<!--begin::Dialer-->
<div class="position-relative w-md-300px" id="kt_dialer_example_1">
    <!--begin::Decrease control-->
    <button type="button"
            class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0"
            data-kt-dialer-control="decrease">
        <span class="svg-icon svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.25"
                      d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                      fill="#12131A"></path>																		<path
                    d="M8 13C7.44772 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8Z"
                    fill="#12131A"></path>																	</svg></span>
    </button>
    <input type="text"
           class="form-control form-control-solid border-0 ps-12"
           data-kt-dialer-control="input"
           name="{{ $name }}" readonly
           value="{{ $value }}"/>
    <!--end::Input control-->    <!--begin::Increase control-->
    <button type="button"
            class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0"
            data-kt-dialer-control="increase">        <span class="svg-icon svg-icon-1"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">																		<path
                    opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                    d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                    fill="#12131A"></path>																		<path
                    fill-rule="evenodd" clip-rule="evenodd"
                    d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                    fill="#12131A"></path></svg></span>
    </button>    <!--end::Increase control--></div><!--end::Dialer-->
@push('scripts')
    <script>
        $(document).ready(function () {
            // Dialer container element
            var dialerElement = document.querySelector("#kt_dialer_example_1");

            // Create dialer object and initialize a new instance
            var dialerObject = new KTDialer(dialerElement, {
                min: {{ $min }},
                max: {{ $max }},
                step: {{ $step }},
                prefix: '$',
                decimals: {{ $decimals }}
            });
        });
    </script>
@endpush

