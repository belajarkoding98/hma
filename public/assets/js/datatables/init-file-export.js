$(document).ready(function() {
    $('#datatable').DataTable({
        "columnDefs": [
            { "width": "20%", "targets": 5 }
          ],
        dom: '<"top"<"left-col"B><"center-col"l><"right-col"f>>rtip',
            buttons: [
                {
                    text: 'csv',
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    text: 'excel',
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    text: 'pdf',
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    text: 'print',
                    extend: 'print',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    },
                },
            ],
            columnDefs: [{
                orderable: false,
                targets: -1
            }] 
    });
});

$("#export ul li ul li").click(function() {
var i = $(this).index() + 1
var table = $('#datatable').DataTable();
if (i == 1) {
    table.button('.buttons-csv').trigger();
} else if (i == 2) {
    table.button('.buttons-excel').trigger();
} else if (i == 3) {
    table.button('.buttons-pdf').trigger();
} else if (i == 4) {
    table.button('.buttons-print').trigger();
} 
});