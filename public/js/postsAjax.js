var add = true;
var subid = 0;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(e) {  
    displayCar();
    asd();
    $('#produced_on').datepicker({
            format: 'yyyy-mm-dd', 
            todayHighlight: true,
            autoclose: true,
            orientation: "top",
        }) 

    $("#form-car").submit(function(e) {
        e.preventDefault();  
        if(add == true) 
            insertCar();
        else
            updateCar();  
    }); 

    function insertCar(){  
        console.log($("#produced_on").val());
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: '/create',
            data:{
                make: $("#maker").val(),
                model: $("#model").val(),
                produced: $("#produced_on").val()
            },
            _token: '{{ csrf_token() }}'
        }).done(function(result){
            alert(result.status);
            displayCar(); 
        }); 
    }

    function updateCar(){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: '/update',
            data:{
                id: subid,
                make: $("#maker").val(),
                model: $("#model").val(),
                produced: $("#produced_on").val()
            },
            _token: '{{ csrf_token() }}'
        }).done(function(result){
            alert(result.status);
            displayCar();
        });
    }

    function asd(){
     var str = "How are you doing today?";
    var res = str.split(" ");
    console.log(res[0]);
    }


    
});

function retrieveData(data){
    //console.log(data.getAttribute("data-make"););
    add = false;
   // console.log(add);
    subid = data.getAttribute("data-id");  
    console.log(subid);
    $("#maker").val(data.getAttribute("data-make"));
    $("#model").val(data.getAttribute("data-model")); 
    $("#produced_on").val(data.getAttribute("data-produced"));
   // $("#model").val(model);
}


function deleteCar(id){
    if(confirm("Are you sure you want to delete?") == true){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: '/delete',
            data:{
                id: id, 
            },
            _token: '{{ csrf_token() }}'
        }).done(function(result){
            alert(result.status);
             displayCar();
        });
    }
}

function displayCar(){
    var datatable = $('#tblcar').DataTable();
    datatable.destroy();
    datatable = $('#tblcar').DataTable({
            lengthMenu: [
                [10, 25, 50, 100, 200, -1],
                    ["10 rows", "25 rows", "50 rows", "100 rows", "200 rows", "Show all"]
                ], 
                processing: true,
                serverSide: false,
                async: true,
                ajax: {
                    url: 'display',
                    type: "GET" 
                },
                order: [[ 3, 'desc' ]],
                columns: [
                    { data: 'make', name: 'make'},
                    { data: 'model', name: 'model' },
                    { data: 'produced_on', name: 'produced_on' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    {"mRender": function ( data, type, row ) {
                        return '<a href="#" onclick="retrieveData(this); return false" data-id='+ row.id +' data-make='+ row.make +' data-produced='+ row.produced_on +' data-model='+ row.model +'>Edit</a> | <a href="#" onclick="deleteCar('+ row.id +'); return false">Delete</a>';}
                    } 
                ],
            });
        // $.ajax({
        //     dataType: 'json',
        //     type:'GET',
        //     url: 'display', 
        //     _token: '{{ csrf_token() }}'
        // }).done(function(result){
        //     console.log(result);
                
        // //$("table.tbl-car tbody").html(''); 
        // var rows = '';      
        //     // $.each(result.data, function(i, item) {
        //     //     rows = rows + '<tr>';
        //     //     rows = rows + '<td>' + item.make + '</td>';
        //     //     rows = rows + '<td>' + item.model + '</td>';
        //     //     rows = rows + '<td>' + item.produced_on + '</td>';
        //     //     rows = rows + '<td>' + item.created_at + '</td>';
        //     //     rows = rows + '<td>' + item.updated_at + '</td>';
        //     //     rows = rows + '<td><a href="#" onclick="retrieveData(this); return false" data-id='+ item.id +' data-make='+ item.make +' data-produced='+ item.produced_on +' data-model='+ item.model +'>Edit</a> | <a href="#" onclick="deleteCar('+ item.id +'); return false">Delete</a></td>';                
        //     //     rows = rows + '</tr>';  
        //     // }, "json")
        //     $("table.tbl-car tbody").append(rows); 

            // $('.tbl-car').dataTable({
            //     "bDestroy": true
            // }).fnDestroy(); 
         

            $('#form-car')[0].reset();
            add = true;
        //}); 
    }
