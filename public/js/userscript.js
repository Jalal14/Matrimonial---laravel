'use strict';
/*registration validation*/
$(document).ready(function() {
    $(".loader").hide();
	$( function() {
		$( "#dob" ).datepicker({
			dateFormat: "yy-mm-dd",
			appendText: "yyyy-mm-dd",
			maxDate: "-216M",
			changeMonth: true,
      		changeYear: true
		});
	} );

	$( function() {
		$( "#passing-date" ).datepicker({
			dateFormat: "yy-mm-dd",
			appendText: "yyyy-mm-dd",
			minDate: "-216M",
            maxDate: "-0D",
			changeMonth: true,
      		changeYear: true
		});
	} );
	$('input[value=Login]').click(function() {
		$("#usernameMsg").html('');
		$("#passwordMsg").html('');
		$("#msg").html('');
		var uname = $("input[name=username]").val();
		var pass = $("input[name=password]").val();
		if (uname=="") {
			$("#usernameMsg").html('Username cannot be null');
		}else if (pass=="") {
			$("#passwordMsg").html('Password cannot be null');
		}else{
			$.ajax({
				url		: 	'/ajax/login',
				method	: 	'GET',
				data	: {
					username	: 	uname,
					password	: 	pass
				},
				success	: function(response) {
					if (response==1) {
						window.location="/user";
					}else if(response==2){
						$("#msg").html('<h3>* Account not activated yet </h3>');
					}else{
						$("#msg").html('<h3>* Invalid username or password </h3>');
					}
				},
				error	:function(data) {
					alert('Error occured, please try again');
				}
			});
		}
		return false;
	});

	$('input[value=Signup]').click(function() {
		$("#fNameMsg").html('');
		$("#mNameMsg").html('');
		$("#lNameMsg").html('');
		$("#userNameMsg").html('');
		$("#dobMsg").html('');
		$("#emailMsg").html('');
		$("#contactMsg").html('');
		$("#passMsg").html('');
		$("#cPassMsg").html('');

		var fName = $("input[name=fName]").val();
		var mName = $("input[name=mName]").val();
		var lName = $("input[name=lName]").val();
		var userName = $("input[name=userName]").val();
		var birth = $("input[name=dob]").val();
		var email = $("input[name=email]").val();
		var contact = $("input[name=contact]").val();
		var pass = $("input[name=pass]").val();
		var cPass = $("input[name=cPass]").val();

		if (fName=='') {
			$("#fNameMsg").html('First name cannot be null');
		}else if (lName=='') {
			$("#lNameMsg").html('Last name cannot be null');
		}else if (userName=='') {
			$("#userNameMsg").html('User name cannot be null');
		}else if (email=='') {
			$("#emailMsg").html('Email cannot be null');
		}else if (contact=='') {
			$("#contactMsg").html('Contact cannot be null');
		}else if (pass=='') {
			$("#passMsg").html('Password cannot be null');
		}else if (pass != cPass) {
			$("#cPassMsg").html('Password does not match');
		}else{
			checkUsername();
		}
		return false;
	});
});

function checkUsername() {
	$.ajax({
		url		: 	'/ajax/checkUsername',
		method	: 	'GET',
		data	: {
			username	: 	$("input[name=userName]").val()
		},
		success	: function(response) {
			if (response==0) {
				checkEmail();
			}else{
				$("#userNameMsg").html('* Username not available');
			}
		},
		error	:function(data) {
			alert('Error occured, please try again');
		}
	});
}

function checkEmail() {
	$.ajax({
		url		: 	'/ajax/checkEmail',
		method	: 	'GET',
		data	: {
			email	: 	$("input[name=email]").val()
		},
		success	: function(response) {
			if (response==0) {
				register();
			}else{
				$("#emailMsg").html('* Email already used');
			}
		},
		error	:function(data) {
			alert('Error occured, please try again');
		}
	});
}

function register() {
	$.ajax({
		url		: 	'/ajax/store',
		method	: 	'GET',
		data	: {
			fname 	: 	$("input[name=fName]").val(),
			mname 	: 	$("input[name=mName]").val(),
			lname 	: 	$("input[name=lName]").val(),
			uname 	: 	$("input[name=userName]").val(),
			dob 	: 	$("input[name=dob]").val(),
			blood 	: 	$("#blood :selected").val(),
			gender 	: 	$("input[name=gender]:checked").val(),
			email	: 	$("input[name=email]").val(),
			religion: 	$("#religion :selected").val(),
			number 	: 	$("input[name=contact]").val(),
			password: 	$("input[name=pass]").val()
		},
        beforeSend	: function(){
            $(".loader").show();
		},
		success	: function(response) {
            $(".loader").hide();
			if (response==1) {
				$( "#regMsg" ).addClass( "success" );
				$("#regMsg").html('<h3>*Successfully registered.<br>Mail has been sent, please verify your email.</h3>');
			}else{
				$( "#regMsg" ).addClass( "error" );
				$("#regMsg").html('<h3>*Error occured, please try again</h3>');
			}
		},
		error	:function(data) {
            $(".loader").hide();
            $( "#regMsg" ).addClass( "error" );
            $("#regMsg").html('<h3>*Error occured, please try again</h3>');
		}
	});
}


$(document).ready(function () {
    $('#district').change(function() {
        $.ajax({
            url     :   '/ajax/psList',
            method  :   'GET',
            data    : { district : $('#district').val() },
            success :   function (response) {
                var psList = "";
                for (var i = 0; i < response.length; i++) {
                    psList = psList.concat('<option ');
                    psList = psList.concat('value='+response[i].id+'>');
                    psList = psList.concat(response[i].name);
                    psList = psList.concat('</option>');
                }
                $('#ps').html(psList);
            }
        })
    }); 
    $('#division').change(function () {
        $.ajax({
            url     :  '/ajax/districtList',
            method  :   'GET',
            data    : { division : $('#division').val() },
            success :   function (response) {
                var divisionList = "";
                if (response.length == 0) {
                	$('#ps').html('');
                }else{
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
                $('#district').html(divisionList);
            }
        });
    });
    function setPSList(dist) {
        $.ajax({
            url     :   '/ajax/psList',
            method  :   'GET',
            data    : { district : dist },
            success :   function (response) {
                var psList = "";
                for (var i = 0; i < response.length; i++) {
                    psList = psList.concat('<option ');
                    psList = psList.concat('value='+response[i].id+'>');
                    psList = psList.concat(response[i].name);
                    psList = psList.concat('</option>');
                }
                $('#ps').html(psList);
            }
        });
    }
});

$(document).ready(function () {
    /*send message*/
    $('#send-button').click(function () {
        var message = $('input[name=messageContent]').val();
        if (message!=''){
            $.ajax({
                url     : '/ajax/send-message',
                method  : 'POST',
                data    : {
                    '_token'    : $('input[name=_token]').val(),
                    friendId    : $('input[name=friendId]').val(),
                    message     : $('input[name=messageContent]').val(),
                },
                success : function (data) {
                    $('input[name=messageContent]').val("");
                }
            });
        }
        return false;
    });

    $('#conversation-area').ready(function () {
        $('#conversation-area').animate({
            scrollTop: $('#conversation-area').get(0).scrollHeight}, 10);
        /* load message */
        setInterval(function () {
            $.ajax({
                url     : '/ajax/message-contents',
                method  : 'POST',
                data    : {
                    '_token'    : $('input[name=_token]').val(),
                    friendId    : $('input[name=friendId]').val(),
                },
                success : function (data) {
                    $('.jquery-message-area').html(data);
                }
            });
        }, 1000);
        $('#text-box').focus(function () {
            readMessage();
        });
    });
});

$(document).ready(function () {
    unseenMessage();
    friendReq();
    setInterval(function(){
        unseenMessage();
        friendReq();
    }, 3000);
});

function friendReq() {
    $.ajax({
        url     : "/ajax/friend-reqs",
        type    : "GET",
        success : function (data) {
            if (data == 0){
                $("#friendReq").html("<span style='color: #e1ffff'>( "+data+" ) REQUEST</span>");
            }else{
                $("#friendReq").html("<span style='color: red'>( "+data+" ) REQUEST</span>");
            }
        }
    });
}

function unseenMessage() {
    $.ajax({
        url     : "/ajax/unseen-message",
        type    : "GET",
        success : function (data) {
            if (data == 0){
                $("#new-message").html("<span style='color: #e1ffff'> "+data+" </span>");
            }else{
                $("#new-message").html("<span style='color: red'> "+data+" </span>");
            }
        }
    });
}

function readMessage() {
    $.ajax({
        url     : '/ajax/read-message',
        method  : 'POST',
        data    : {
            '_token'    : $('input[name=_token]').val(),
            friendId    : $('input[name=friendId]').val(),
        }
    });
}