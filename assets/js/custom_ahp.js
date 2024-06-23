$(document).ready(function () {
    $('#tbl-raw-book').DataTable({
        fixedColumns: {
            start: 2
        },
        scrollCollapse: true,
        scrollX: true,
        scrollY: 400
    });
    
    $("#tbl-rating-comparison, #tbl-weight-book, .tbl-var-comparison, #tbl-each-score-data, #tbl-ordering-data").DataTable({
        fixedColumns: {
            start: 1
        },
        searching: false,
        paging: false,
        scrollCollapse: true,
        ordering : false,
        scrollX: true,
        scrollY: 300,
        info: false
    });

});