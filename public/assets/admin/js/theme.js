/*===========================Custom Js============================*/
/**
 * Export route trigger
 * @param export_type
 * @param formId
 */
function exportData(export_type = 'excel', formId = 'export-form') {
    if (export_type.length) {
        let formAction = $('#' + formId).attr('action');
        formAction += location.search.length > 0 ? location.search + '&export_type=' + export_type : '?export_type=' + export_type;
        window.open(formAction, '_blank')
    }
}

$(document).ready(function() {
    $('.select2_input').select2({
        placeholder: "Please select",
        allowClear: true
    });
});

