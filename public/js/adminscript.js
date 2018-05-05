"use strict"

$(document).ready(function(){
    $("#account-dropdown").hover(
        function() {
            $('.account-dropdown-menu', this).not('.in .account-dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');
        },
        function() {
            $('.account-dropdown-menu', this).not('.in .account-dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');
        }
    );
});

$(document).ready(function() {
    $('[data-toggle=offcanvas]').click(function() {
        $('.row-offcanvas').toggleClass('active');
    });
});

$(document).ready(function () {
    $('#districtPS').change(function() {
        $.ajax({
            url     :   '/ajax/psList',
            method  :   'GET',
            data    : { district : $('#districtPS').val() },
            success :   function (response) {
                var psList = "<tr><th>Name</th><th>Action</th></tr>";
                for (var i = 0; i < response.length; i++) {
                    psList = psList.concat('<tr>');
                    psList = psList.concat('<td>'+response[i].name+'</td>');
                    psList = psList.concat('<td><a href="/admin/police-station/'+response[i].id+'">Update</a> | <a href="#">Delete</a>');
                    psList = psList.concat('</tr>');
                }
                $('#ps').html(psList);
            },
            error   : function (data) {
                alert(data);
            }
        })
    }); 
    $('#divisionPS').change(function () {
        $.ajax({
            url     :  '/ajax/districtList',
            method  :   'GET',
            data    : { division : $('#divisionPS').val() },
            success :   function (response) {
                var divisionList = "";
                if (response.length == 0) {
                    $('#ps').html("<tr><th>Name</th><th>Action</th></tr>");
                    $(":submit").attr("disabled", true);
                }else{
                    $(":submit").attr("disabled", false);
                    for (var i = 0; i < response.length; i++) {
                        divisionList = divisionList.concat('<option ');
                        divisionList = divisionList.concat('value='+response[i].id+'>');
                        divisionList = divisionList.concat(response[i].name);
                        divisionList = divisionList.concat('</option>');
                        if (i==0) {
                            setPSList(response[0].id);
                        }
                    }
                }
                $('#districtPS').html(divisionList);
            },
            error   : function (data) {
                alert(data);
            }
        });
    });
    $('#addDivisionPS').change(function () {
        $.ajax({
            url     :  '/ajax/districtList',
            method  :   'GET',
            data    : { division : $('#addDivisionPS').val() },
            success :   function (response) {
                var divisionList = "";
                if (response.length == 0) {
                    $("#submit").attr("disabled", true);
                }else{
                    $("#submit").attr("disabled", false);
                    for (var i = 0; i < response.length; i++) {
                        divisionList = divisionList.concat('<option ');
                        divisionList = divisionList.concat('value='+response[i].id+'>');
                        divisionList = divisionList.concat(response[i].name);
                        divisionList = divisionList.concat('</option>');
                    }
                }
                $('#addDistrictPS').html(divisionList);
            },
            error   : function (data) {
                alert(data);
            }
        });
    });
    $('#division').change(function() {
        $.ajax({
            url     :   '/ajax/districtList',
            method  :   'GET',
            data    : { division : $('#division').val() },
            success :   function (response) {
                var info = "<tr><th>Name</th><th>action</th></tr>";
                for (var i = 0; i < response.length; i++) {
                    info = info.concat('<tr>');
                    info = info.concat('<td>'+response[i].name+'</td>');
                    info = info.concat('<td><a href="/admin/district/'+response[i].id+'">Update</a> | <a href="#">Delete</a>');
                    info = info.concat('</tr>');
                }
                $('#district').html(info);
            },
            error   : function (data) {
                alert(data);
            }
        })
    });
    function setPSList(dist) {
        $.ajax({
            url     :   '/ajax/psList',
            method  :   'GET',
            data    : { district : dist },
            success :   function (response) {
                var psList = "<tr><th>Name</th><th>Action</th></tr>";
                for (var i = 0; i < response.length; i++) {
                    psList = psList.concat('<tr>');
                    psList = psList.concat('<td>'+response[i].name+'</td>');
                    psList = psList.concat('<td><a href="/admin/police-station/'+response[i].id+'">Update</a> | <a href="#">Delete</a>');
                    psList = psList.concat('</tr>');
                }
                $('#ps').html(psList);
            },
            error   : function (data) {
                alert(data);
            }
        });
    }
});

$(document).ready(function () {
    regRequest();
    setInterval(function(){
        regRequest();
    }, 3000);
});
function regRequest() {
    $.ajax({
        url     : "/ajax/regReqNumber",
        type    : "GET",
        success : function (data) {
            if (data == 0){
                $(".regRequest").html("<span style='color: #9d9d9d'>"+data+" </span>");
            }else{
                $(".regRequest").html("<span style='color: red'>"+data+" </span>");
            }
        }
    });
}