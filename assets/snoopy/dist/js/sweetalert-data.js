/*SweetAlert Init*/

$(function() {
	"use strict";
	
	var SweetAlert = function() {};

    //examples 
    SweetAlert.prototype.init = function() {
        
    //Basic
    $('#sa-basic').on('click',function(e){
	    swal({   
			title: "Here's a message!",   
            confirmButtonColor: "#ed8739",   
        });
		return false;
    });

    //A title with a text under
    $('#sa-title').on('click',function(e){
	    swal({   
			title: "Here's a message!",   
            text: "Lorem ipsum dolor sit amet",
			confirmButtonColor: "#ed8739",   
        });
		return false;
    });

    //Success Message
	$('#sa-success').on('click',function(e){
        swal({   
			title: "good job!",   
             type: "success", 
			text: "Lorem ipsum dolor sit amet",
			confirmButtonColor: "#71aa68",   
        });
		return false;
    });

    //Warning Message
    $('#sa-warning,.sa-warning').on('click',function(e){
	    swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this record!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#e6b034",   
            confirmButtonText: "Yes, delete it!",   
            closeOnConfirm: false 
        }, function(){   
            swal("Deleted!", "Your record has been deleted.", "success"); 
        });
		return false;
    });

    //Parameter
	$('#sa-params').on('click',function(e){
        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this record!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#e6b034",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel plx!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                swal("Deleted!", "Your record has been deleted.", "success");   
            } else {     
                swal("Cancelled", "Your record is safe :)", "error");   
            } 
        });
		return false;
    });

    //Custom Image
	$('#sa-image').on('click',function(e){
		swal({   
            title: "John!",   
            text: "Recently joined twitter",   
            imageUrl: "dist/img/user.png" ,
			confirmButtonColor: "#f33923",   
			
        });
		return false;
    });

    //Auto Close Timer
	$('#sa-close').on('click',function(e){
        swal({   
            title: "Auto close alert!",   
            text: "I will close in 2 seconds.",   
            timer: 2000,   
            showConfirmButton: false 
        });
		return false;
    });


    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert;
	
	$.SweetAlert.init();
});