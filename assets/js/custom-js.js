$(document).ready(function () {
    $('#tbl-mycollection-trx').DataTable();
    $('#tbl-user-monitoring').DataTable();
    
    $('#tbl-trx-monitoring').DataTable({
        ajax: base_url + "admin/trx-management/get-transaction/all",
        serverSide: true,
        processing: true,
        scrollX: true,
        scrollY: 500,
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: 0
            }
        ],
        columns: [
            {
                "data": "transaction_id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {data: "transaction_num"},
            {data: "book_name"},
            {data: "start_date"},
            {data: "end_date"},
            {data: "submitted_date"},
            {data: "username"},
            {
                data: "status",
                render: function(data, type){
                    if (type == "display"){
                        var status = data.split("|")[0];
                        var button = data.split("|")[1];
                        // return '<button type="button" class="btn btn-sm btn-' + button + '">' + status + '</button>';
                        return `<td class="text-center">
                            <button type="button" class="btn btn-sm btn-${button}">${status}</button>
                        </td>`
                    }
                    return data;
                }
            }
        ],
        createdRow: function(row) {
            $(row).addClass("text-center");
        }
    });

    $('#slc-book-create-type').selectpicker();
    $('#slc-book-create-author').selectpicker();
    $('#slc-book-create-language').selectpicker();
    $('.slc-assign-penalty').selectpicker();

    $('.slc-user-addres').selectpicker();

    // submit_profile_edit = function(){
    //     document.getElementById("form-profile-update-right").submit();
    //     document.getElementById("form-profile-update-left").submit();
    // };

});