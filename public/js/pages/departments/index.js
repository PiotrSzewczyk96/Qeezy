$(document).ready(function() {
    $('#table').DataTable( {
        responsive: true,
        processing: true,
        serverSide: true,
        dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
        lengthMenu: [5, 15, 25, 50],
        pageLength: 15,
        ajax: {
            url: HOST_URL + '/api/datatables/departments',
            type: 'POST',
            datatype: 'json'
        },
        columns: [
            {
                data: 'name',
                visible: true,
                orderable: true,
                searchable: true
            },{
                data: 'code',
                visible: true,
                orderable: true,
                searchable: true
            },{
                data: 'actions',
                visible: true,
                orderable: false,
                searchable: false,
                defaultContent: '',
                render: function (data, type, full, row) {
                    return_string = '' +
                        '<div class="dropdown dropdown-inline">' +
                            '<a class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-expanded="false" title="Więcej">' +
                                '<i class="flaticon-more-1"></i>' +
                            '</a>' +
                            '<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">' +
                                '<ul class="navi navi-hover flex-column">' +
                                    '<li class="navi-item">' +
                                        '<a class="navi-link" onclick="ShareDepartments(' + full.id + ')"><i class="navi-icon flaticon2-reply-1"></i><span class="navi-text" title="Udostępnij jako link">Udostępnij</span></a>' +
                                    '</li>';
                        if(PERMISSIONS.includes('departments-update')) {
                            return_string += '' + 
                                    '<li class="navi-item">' +
                                        '<a href="' + HOST_URL + '/departments/' + full.id + '/edit" class="navi-link"><i class="navi-icon flaticon2-edit"></i><span class="navi-text">Edytuj</span></a>' +
                                    '</li>';
                        }
                        return_string += '' +
                                '</ul>' +
                            '</div>' +
                        '</div>' + 
                        '<a href="' + HOST_URL + '/departments/' + full.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Wyświetl"><i class="flaticon2-expand"></i></a>';
                        return return_string;
                }
            },{
                data: 'id',
                visible: false,
                orderable: false,
                searchable: false
            },{
                data: 'description',
                visible: false,
                orderable: false,
                searchable: true
            },
        ],
        language: {
            "decimal":        "",
            "emptyTable":     "Brak danych do wyświetlenia",
            "info":           "Wyświetlono _START_ - _END_ z _TOTAL_ rekordów",
            "infoEmpty":      "Wyświetlono 0 z 0 rekordów",
            "infoFiltered":   "(wyszukano z _MAX_ rekordów)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Pokaż _MENU_ rekordów",
            "loadingRecords": "Ładowanie...",
            "processing":     "Procesowanie...",
            "search":         "Szukaj:",
            "zeroRecords":    "Brak pasujących rekordów",
            "paginate": {
                "first":      "<<",
                "last":       ">>",
                "next":       ">",
                "previous":   "<"
            }
        },
        "order": [1, "asc"]
    });

    function filterGlobal () {
        $('#table').DataTable().search(
            $('#global_filter').val()
        ).draw();
    }
    
    function filterColumn (i) {
        $('#table').DataTable().column(i).search(
            $('#col'+i+'_filter').val()
        ).draw();
    }

    $('input.global_filter').on('keyup change click', function() {
        filterGlobal();
    });

    $('input.column_filter').on('keyup change click', function() {
        filterColumn($(this).parents('div').attr('data-column'));
    });
});

function ShareDepartments(id) {
    const el = document.createElement('textarea');
    el.value = HOST_URL + '/departments/' + id;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
  
    $.notify({
          message: 'Skopiowano do schowka!',
      },{
          // settings
          type: 'primary',
          allow_dismiss: false,
          newest_on_top: true
      });
  }