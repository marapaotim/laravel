var add = true;
var subid = 0;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(e) {  
    displayCar();
    $(".crud-submit").click(function(e) {
        e.preventDefault();  
        if(add == true) 
            insertCar();
        else
            updateCar();  
    }); 

    function insertCar(){  
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: '/create',
            data:{
                make: $("#maker").val(),
                model: $("#model").val()
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
                model: $("#model").val()
            },
            _token: '{{ csrf_token() }}'
        }).done(function(result){
            alert(result.status);
            displayCar();
        });
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
        $.ajax({
            dataType: 'json',
            type:'GET',
            url: 'display', 
            _token: '{{ csrf_token() }}'
        }).done(function(result){
        $("table.tbl-car tbody").html(''); 
        var rows = '';
            $.each(result, function(i, item) {
                rows = rows + '<tr>';
                rows = rows + '<td>' + item.make + '</td>';
                rows = rows + '<td>' + item.model + '</td>';
                rows = rows + '<td>' + item.produced_on + '</td>';
                rows = rows + '<td>' + item.created_at + '</td>';
                rows = rows + '<td>' + item.updated_at + '</td>';
                rows = rows + '<td><a href="#" onclick="retrieveData(this); return false" data-id='+ item.id +' data-make='+ item.make +' data-model='+ item.model +'>Edit</a> | <a href="#" onclick="deleteCar('+ item.id +'); return false">Delete</a></td>';                
                rows = rows + '</tr>';  
            }, "json")
             $("table.tbl-car tbody").append(rows);  
            //$('#form-car')[0].reset();
        }); 
    }
