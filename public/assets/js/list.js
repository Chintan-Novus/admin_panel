const List = function () {
    let table;
    let datatable;
    const multiDeleteFormEle = $('#multi_delete_form');
    const selectedIdEle = $('#selected_id');

    const handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[datatable-filter="search"]');

        $(filterSearch).keyup(function(){
            datatable.search($(filterSearch).val()).draw();
        });
    }

    const initToggleToolbar = () => {
        // Toggle selected action toolbar
        // Select all checkboxes
        const checkboxes = table.querySelectorAll('[type="checkbox"]');

        // Select elements
        const deleteSelected = document.querySelector('[datatable-select="delete_selected"]');

        // Toggle delete selected toolbar
        checkboxes.forEach(c => {
            // Checkbox on click event
            c.addEventListener('click', function () {
                setTimeout(function () {
                    toggleToolbars();
                }, 50);
            });
        });

        // Deleted selected rows
        deleteSelected.addEventListener('click', function () {
            Swal.fire({
                text: "Are you sure you want to delete selected rows?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    multiDeleteFormEle.submit();
                }
            });
        });
    }

    const handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[datatable-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                const selected_id = $(d).attr('data-id');

                Swal.fire({
                    text: "Are you sure you want to delete selected rows?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        selectedIdEle.val(selected_id);
                        multiDeleteFormEle.submit();
                    }
                });
            })
        });
    }

    const toggleToolbars = () => {
        // Define variables
        const toolbarBase = document.querySelector('[datatable-toolbar="base"]');
        const toolbarSelected = document.querySelector('[datatable-toolbar="selected"]');
        const selectedCount = document.querySelector('[datatable-select="selected_count"]');

        // Select refreshed checkbox DOM elements
        const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

        // Detect checkboxes state & count
        let checkedState = false;
        let count = 0;

        let selectedIds = [];
        // Count checked boxes
        allCheckboxes.forEach(c => {
            if (c.checked) {
                selectedIds.push($(c).val())
                checkedState = true;
                count++;
            }
        });
        selectedIdEle.val(selectedIds.toString());

        // Toggle toolbars
        if (checkedState) {
            selectedCount.innerHTML = count.toString();
            if (toolbarBase) {
                toolbarBase.classList.add('d-none');
            }
            toolbarSelected.classList.remove('d-none');
        } else {
            if (toolbarBase) {
                toolbarBase.classList.remove('d-none');
            }
            toolbarSelected.classList.add('d-none');
        }
    }

    return {
        init: function (tableSelector, dt) {
            table = document.querySelector(tableSelector);
            datatable = dt;

            if (!table) {
                return;
            }
            initToggleToolbar();
            handleSearchDatatable();
            handleDeleteRows();
        }
    }
}();
