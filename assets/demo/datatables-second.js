//########################### model 2

// $(document).ready(function() {
//     $('#example').DataTable();
// } );

//########################### model 2

$(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox select-checkbox-all',
            targets: 0
          }],
        dom: 'Bfrtip',
        buttons: [
            
            'copy',
            'csv',
            'excel',
            'pdf',
            {
               
                extend: 'print',
                text: 'Print all (not just selected)',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }
        ],
        
        select: true,
      
    } );
} );

//########################### model 3

// var editor; // use a global for the submit and return data rendering in the examples
 
// $(document).ready(function() {
//     editor = new $.fn.dataTable.Editor( {
//         ajax: "../php/staff.php",
//         table: "#example",
//         fields: [ {
//                 label: "First name:",
//                 name: "first_name"
//             }, {
//                 label: "Last name:",
//                 name: "last_name"
//             }, {
//                 label: "Position:",
//                 name: "position"
//             }, {
//                 label: "Office:",
//                 name: "office"
//             }, {
//                 label: "Extension:",
//                 name: "extn"
//             }, {
//                 label: "Start date:",
//                 name: "start_date",
//                 type: "datetime"
//             }, {
//                 label: "Salary:",
//                 name: "salary"
//             }
//         ]
//     } );
 
//     $('#example').DataTable( {
//         dom: 'Bfrtip',
//         ajax: "../php/staff.php",
//         columns: [
//             { data: null, render: function ( data, type, row ) {
//                 // Combine the first and last names into a single table field
//                 return data.first_name+' '+data.last_name;
//             } },
//             { data: "position" },
//             { data: "office" },
//             { data: "extn" },
//             { data: "start_date" },
//             { data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
//         ],
//         select: true,
//         colReorder: true,
//         buttons: [
//             { extend: 'create', editor: editor },
//             { extend: 'edit',   editor: editor },
//             { extend: 'remove', editor: editor },
//             {
//                 extend: 'collection',
//                 text: 'Export',
//                 buttons: [
//                     'copy',
//                     'excel',
//                     'csv',
//                     'pdf',
//                     'print'
//                 ]
//             }
//         ]
//     } );
// } );