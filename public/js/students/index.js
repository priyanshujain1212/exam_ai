/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */
"use strict";

$(function() {
    var table = $('#maintable').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('#maintable').attr('data-url'),
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'organization', name: 'organization' },
            { data: 'exam', name: 'exam' },
            { data: 'free_mock_tests', name: 'free mock tests' },
            { data: 'is_registered', name: 'registered' },
            { data: 'action', name: 'action' },
        ],
        "ordering": false
    });

    let hidecolumn = $('#maintable').data('hidecolumn');
    if(!hidecolumn) {
        table.column( 6 ).visible( false );
    }

});

$('#maintable').on('draw.dt', function () {
    $('[data-toggle="tooltip"]').tooltip();
})
