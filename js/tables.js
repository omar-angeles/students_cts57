$(document).ready(function() {
 
    $('#data').DataTable( {
            columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets: 0,
            data: null,
            defaultContent: ''
        } ],
        select: {
            style:    'multi',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
     
        "processing": true,
 
        "serverSide": true,
         
        "pageLength": -1,
         
        "lengthMenu": [[100, 250, 500, -1], [100, 250, 500, "All"]],
 
        "ajax": "datatables.php"
 
    } );
     
 
} );