// Basic DataTable
$(function () {
    $('#basicExample').DataTable({
        'iDisplayLength': 4,
        "language": {
            "lengthMenu": "Display _MENU_ Records Per Page",
            "info": "Showing Page _PAGE_ of _PAGES_",
        }
    });
});


// FPrint/Copy/CSV
$(function () {
    $('#copy-print-csv').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        'iDisplayLength': 5,
    });
});

// FPrint/Copy/CSV
$(function () {
    $('#print-table100').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        'iDisplayLength': 100,
    });
});
$(function () {
    $('.dtab').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        'iDisplayLength': 100,
    });
});
$(function () {
    $('#print-table200').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        'iDisplayLength': 200,
    });
});
// $(function () {
//     $('#print-table1').DataTable({
//         dom: 'Bfrtip',
//         buttons: [
//             'copyHtml5',
//             'excelHtml5',
//             'csvHtml5',
//             'pdfHtml5',
//             'print'
//         ],
//         'iDisplayLength': 15,
//     });
// });
$(function () {
    $('#print-table2').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        'iDisplayLength': 5,
    });
});
$(function () {
    $('#print-table3').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        'iDisplayLength': 4,
    });
});
$(function () {
    $('#print-table4').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        'iDisplayLength': 5,
    });
});
$(function () {
    $('#print-table5').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        'iDisplayLength': 5,
    });
});


// Fixed Header
$(document).ready(function () {
    var table = $('#fixedHeader').DataTable({
        fixedHeader: true,
        'iDisplayLength': 4,
        "language": {
            "lengthMenu": "Display _MENU_ Records Per Page",
            "info": "Showing Page _PAGE_ of _PAGES_",
        }
    });
});


// Vertical Scroll
$(function () {
    $('#scrollVertical').DataTable({
        "scrollY": "207px",
        "scrollCollapse": true,
        "paging": false,
        "bInfo": false,
    });
});



// Row Selection
$(function () {
    $('#rowSelection').DataTable({
        'iDisplayLength': 4,
        "language": {
            "lengthMenu": "Display _MENU_ Records Per Page",
            "info": "Showing Page _PAGE_ of _PAGES_",
        }
    });
    var table = $('#rowSelection').DataTable();

    $('#rowSelection tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
    });

    $('#button').on('click', function () {
        alert(table.rows('.selected').data().length + ' row(s) selected');
    });
});



// Highlighting rows and columns
$(function () {
    $('#highlightRowColumn').DataTable({
        'iDisplayLength': 20,
        "language": {
            "lengthMenu": "Display _MENU_ Records",
        }
    });
    var table = $('#highlightRowColumn').DataTable();
    $('#highlightRowColumn tbody').on('mouseenter', 'td', function () {
        var colIdx = table.cell(this).index().column;
        $(table.cells().nodes()).removeClass('highlight');
        $(table.column(colIdx).nodes()).addClass('highlight');
    });
});



// Using API in callbacks
$(function () {
    $('#apiCallbacks').DataTable({
        'iDisplayLength': 4,
        "language": {
            "lengthMenu": "Display _MENU_ Records Per Page",
        },
        "initComplete": function () {
            var api = this.api();
            api.$('td').on('click', function () {
                api.search(this.innerHTML).draw();
            });
        }
    });
});


// Hiding Search and Show entries
$(function () {
    $('#hideSearchExample').DataTable({
        'iDisplayLength': 4,
        "searching": false,
        "language": {
            "lengthMenu": "Display _MENU_ Records Per Page",
            "info": "Showing Page _PAGE_ of _PAGES_",
        }
    });
});