
export function initStudentEducationDetails(){
 
//  (NO SPACE) input
nameUppercaseOnly(
        'input[name="student_institution_name"], ' +
        'input[name="student_institution_university"]'
        );


let table;
//fetch-table-data
$(document).ready(function () {
    
    table = $('#fetchStudentEducationalDetails').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,

        ajax: {
            url: BASE_URL + "studentprofile/fetch-student-educational-data",
            type: "POST",
            data: function (d) {
                d[csrfName] = csrfHash; // ALWAYS send current token
            },
            complete: function (res) {
                if (res.responseJSON && res.responseJSON.csrfHash) {
                    csrfHash = res.responseJSON.csrfHash; // UPDATE for next request
                }
            }
        }
    });
});

//submit
$("#student-educationaldetails-form").on("submit", function (e) {
   
    e.preventDefault();


    // Hide all validation errors
    $("small.text-danger").text('').hide();

    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});

    $.ajax({
         url: BASE_URL + "studentprofile/add-educational-details",
        type: "POST",
        data: formData,
        dataType: "json",

        success: function (res) {

            csrfHash = res.csrfHash;

            // Validation errors
            if (res.status === 'error') {
                $.each(res.errors, function (field, message) {
                    $("#" + field + "_error").text(message).show();
                });
                return;
            }

            // Success toast
            showToast('success', res.message);

        }
    });
});

}