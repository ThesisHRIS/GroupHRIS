$('.submitEdit').click(function() {
    var data_upd = $('.edit').serialize();

    // alert(data_upd);

});
$('.editLeave').click(function() {
    var _getAtt = $(this).attr('data_attr');



    $.ajax({
        type: 'GET',
        url: 'LeaveRequest/getInfo',
        data: {
            _getAtt: _getAtt
        },
        success: function(success) {
            var parse = JSON.parse(success);
            // alert(success);
            $('.leave_start_date').attr('value', parse[0]['start_date']);
            $('.leave_end_date').attr('value', parse[0]['end_date']);
            $('#total').val(parse[0]['days']);
            document.getElementById('leaveType').value = parse[0]['type'];
            document.getElementById('supervisor').value = parse[0]['supervisor_id'];
            $('.reason').val(parse[0]['comments']);
            $('.leaveId').val(parse[0]['leave_id']);
        }
    });
})
$('.editLeaveRequestForm1').click(function() {
    // alert("nico");
    var data = $('.editLeaveRequestForm').serialize();
    // var id = $('.leaveId').val();
    // alert(data);
    $.ajax({
        type: 'GET',
        url: 'LeaveRequest/save',
        data: {
            data: data
        },
        success: function(success) {
            // var parse = JSON.parse(success);
            //alert(success);
            if (success === '1') {
                toastr.success('Successfully Added!', '');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            } else {
                toastr.error('Unsuccessful!', '');

            }

        }
    });

});

function cashAdvance(){
    var data = $('.form1').serialize();
    $.ajax({
        type: 'GET',
        url: 'cashAdvance/add',
        data: {
            data: data
        },
        success: function(success) {
            // var parse = JSON.parse(success);
            // alert(success);
            if (success === '1') {
                toastr.success('Successfully Transact!', '');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            } else {
                toastr.error('Cash Advance Unsuccessful!', '');

            }

        }
    });
}

$('.editLeaveRequest').click(function() {
    var data = $('.editLeaveRequestForm').serialize();
    var id = $('.leaveId').val();
    // alert(data);
    $.ajax({
        type: 'GET',
        url: 'LeaveRequest/update',
        data: {
            data: data,
            id: id
        },
        success: function(success) {
            // var parse = JSON.parse(success);
            // alert(success);
            if (success === '1') {
                toastr.success('Successfully Updated!', '');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            } else {
                toastr.error('Update Unsuccessful!', '');

            }

        }
    });

});
$('.userEditButton').click(function() {
    var data = $('.userEdit').serialize();
    // var file =$('.file')[0].files;
    // alert(file); 
    $.ajax({
        type: 'GET',
        url: 'EditUser/edit',
        data: {
            data: data
            // file: file
        },
        success: function(success) {
            // var parse = JSON.parse(success);
        // alert(success);
            if (success === '1') {
                toastr.success('Successfully Updated!', '');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            } else if(success === '2' ){
                toastr.error('New Password Mismatch!', '');

            }
            else if(success === '3' ){
                toastr.error('Empty new Password!', '');

            }else{
                 toastr.error('Old Password Mismatch!', '');
            }

        }
    });

});
$('.editOtRequestForm').click(function() {
    var data = $('.update_ot').serialize();
    // alert(data);
    $.ajax({
        type: 'GET',
        url: 'OtRequestHistory/save',
        data: {
            data: data
        },
        success: function(success) {
            // var parse = JSON.parse(success);
            // alert(success);
            if (success === '1') {
                toastr.success('Successfully Updated!', '');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            } else {
                toastr.error('Update Unsuccessful!', '');

            }

        }
    });

});
$('.editOtRequest1').click(function() {
    var data = $('.update_ot').serialize();
    var id = $('.ot_id').val();
    // alert(id);
    $.ajax({
        type: 'GET',
        url: 'OtRequestHistory/update',
        data: {
            data: data,
            id: id
        },
        success: function(success) {
            // var parse = JSON.parse(success);
            // alert(success);
            if (success === '1') {
                toastr.success('Successfully Updated!', '');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            } else {
                toastr.error('Update Unsuccessful!', '');

            }

        }
    });

});
$('.cancelLeave').click(function() {

    toastr.info('Cancel Leave?<br/><br/><form class=""><input type="hidden" name="leave_id" class="leave_id" ><button type="button" onClick="leaveCanceled();" class="btn btn-success leaveCanceled">Yes</button></form>', '')
    var _getAtt = $(this).attr('data_attr');
    $.ajax({
        type: 'GET',
        url: 'LeaveRequest/getInfo',
        data: {
            _getAtt: _getAtt
        },
        success: function(success) {
            var parse = JSON.parse(success);
            // alert(success);        
            $('.leave_id').val(parse[0]['leave_id']);
        }
    });

});
$('.cancelOtRequest').click(function() {

    toastr.info('Cancel Leave?<br/><br/><form class=""><input type="hidden" name="leave_id" class="ot_id" ><button type="button" onClick="otCanceled();" class="btn btn-success leaveCanceled">Yes</button></form>', '')
    var _getAtt = $(this).attr('data_attr');
    $.ajax({
        type: 'GET',
        url: 'OtRequest/getInfo',
        data: {
            _getAtt: _getAtt
        },
        success: function(success) {
            var parse = JSON.parse(success);
            // alert(success);        
            $('.ot_id').val(parse[0]['ot_id']);
        }
    });

});

// $('#otDate').input(function(){
//     alert('nico');

// });

function otCanceled() {
    var this_id = $('.ot_id').val();
    // alert(this_id);
    $.ajax({
        type: 'GET',
        url: 'OtRequest/cancel_request',
        data: {
            this_id: this_id
        },
        success: function(success) {
            // alert(success);
            if (success === '1') {
                toastr.success('Successfully Canceled!', '');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            } else {
                alert('hi');
            }
        }
    });
}

function leaveCanceled() {
    var this_id = $('.leave_id').val();
    $.ajax({
        type: 'GET',
        url: 'LeaveRequest/cancel_request',
        data: {
            this_id: this_id
        },
        success: function(success) {
            // alert(success);
            if (success === '1') {
                toastr.success('Successfully Canceled!', '');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            } else {
                alert('hi');
            }
        }
    });

}

$('.leaveDecline').click(function() {
    var _getAtt = $(this).attr('data_attr');
    $.ajax({
        type: 'GET',
        url: 'LeaveRequest/getInfo',
        data: {
            _getAtt: _getAtt
        },
        success: function(success) {
            var parse = JSON.parse(success);
            $('.leave_id').val(parse[0]['leave_id']);
        }
    });
});

$('.ACDecline').click(function() {
    var _getAtt = $(this).attr('data_attr');
    $.ajax({
        type: 'GET',
        url: 'CashAdvance/getInfo',
        data: {
            _getAtt: _getAtt
        },
        success: function(success) {
            var parse = JSON.parse(success);
            $('.ca_id').val(parse[0]['ca_id']);
        }
    });
});

$('.declineOT').click(function() {
    var _getAtt = $(this).attr('data_attr');
    $.ajax({
        type: 'GET',
        url: 'OtRequest/getInfo',
        data: {
            _getAtt: _getAtt
        },
        success: function(success) {
            var parse = JSON.parse(success);
            $('.ot_id').val(parse[0]['ot_id']);
        }
    });
});
$('.EditotRequest').click(function() {
    var _getAtt = $(this).attr('data_attr');
    $.ajax({
        type: 'GET',
        url: 'OtRequest/getInfo',
        data: {
            _getAtt: _getAtt
        },
        success: function(success) {
            var parse = JSON.parse(success);
            // alert(parse[0]['supervisor_id']);
            // $('.emp_name').val(parse[0]['first_name'] + ' ' + parse[0]['last_name']);
              $('#otDate').attr('value', parse[0]['ot_date']);
              $('.time_start').attr('value', parse[0]['time_start']);
              $('.time_end').attr('value', parse[0]['time_end']);
              $('#totalHours').val(parse[0]['total_hours']);
              $('.task').val(parse[0]['task']);
              $('.ot_id').val(parse[0]['ot_id']);
            $('#remark').val(parse[0]['remarks']);
            document.getElementById('supervisor_id').value=parse[0]['supervisor_id'];
            // $('.no_days').val(parse[0]['total_hours']);
            // $('.task').val(parse[0]['task']);
            // $('.reason').val(parse[0]['comments']);             
            // $('.ot_id').val(parse[0]['ot_id']);
        }
    });
});
$('.otRequest').click(function() {
    var _getAtt = $(this).attr('data_attr');
    $.ajax({
        type: 'GET',
        url: 'OtRequest/update_ot',
        data: {
            _getAtt: _getAtt
        },
        success: function(success) {

            if (success === '1') {
                //alert(success);
                window.location = 'OtRequest';
            } else {
                alert('error');
            }
        }
    });
});
$('.add201File').click(function() {

    var data_upd = $('.201').serialize();
    var name = $('.last_name').val();
    $.ajax({
        type: 'GET',
        url: 'Add201File/saveForm',
        data: {
            data_upd: data_upd
        },
        success: function(success) {
            if (success === '1') {
                toastr.success('Successfully added File', '');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            } else {
                toastr.error('Error Please Make sure to fill in All necessary fields', '');
            }
        }
    });
});

$('.cancel_201').click(function() {
    $('input').val('');
    $('input[type=date]').val('');
    $('select option:first-child').attr("selected", "selected");

});
$('.update_leave_button').click(function() {
    var this_id = $('.leave_id').val();
    $.ajax({
        type: 'GET',
        url: 'LeaveRequest/update_request',
        data: {
            this_id: this_id
        },
        success: function(success) {
            if (success === '1') {
                $(".message").css("display", "block");
                $(".message").css("font-weight", "bold");
                $(".message").css("text-align", "center");
                $('.message').text("Successfully approved Leave Request");
            } else {
                alert('hi');
            }
        }
    });
});
$('.declineLeave').click(function() {
    var this_id = $('.leave_id').val();
    var reason = $('.reason').val();
    $.ajax({
        type: 'GET',
        url: 'LeaveRequest/deleteRequest',
        data: {
            this_id: this_id,
            reason: reason
        },
        success: function(success) {
            if (success === '1') {
                $(".message").css("display", "block");
                $(".message").css("font-weight", "bold");
                $(".message").css("text-align", "center");
                $('.message').text("Successfully Decline Leave Request");
            } else {
                alert('hi');
            }
        }
    });
});
$('.declineAC').click(function() {
    var this_id = $('.ca_id').val();
    var reason = $('.reason').val();
    $.ajax({
        type: 'GET',
        url: 'CashAdvance/declineCA',
        data: {
            this_id: this_id,
            reason: reason
        },
        success: function(success) {
            if (success === '1') {
                $(".message").css("display", "block");
                $(".message").css("font-weight", "bold");
                $(".message").css("text-align", "center");
                $('.message').text("Successfully Decline Leave Request");
            } else {
                alert('hi');
            }
        }
    });
});
$('.OTdeclined').click(function() {
    var this_id = $('.ot_id').val();
    var reason = $('.reason').val();
    // alert(this_id);
    $.ajax({
        type: 'GET',
        url: 'OtRequest/deleteRequest',
        data: {
            this_id: this_id,
            reason: reason
        },
        success: function(success) {
            if (success === '1') {
                $(".message").css("display", "block");
                $(".message").css("font-weight", "bold");
                $(".message").css("text-align", "center");
                $('.message').text("Successfully Decline OT Request");
            } else {
                alert('hi');
            }
        }
    });
});
$('.update_Ot_button').click(function() {
    var this_id = $('.ot_id').val();
    $.ajax({
        type: 'GET',
        url: 'OtRequest/update_ot',
        data: {
            this_id: this_id
        },
        success: function(success) {
            if (success === '1') {
                $(".message").css("display", "block");
                $(".message").css("font-weight", "bold");
                $(".message").css("text-align", "center");
                $('.message').text("Successfully approved OT Request");
            } else {
                alert('hi');
            }
        }
    });
});

$('#approved').on('hidden.bs.modal', function() {
    location.reload();
})
$('#ACDecline').on('hidden.bs.modal', function() {
    location.reload();
})
$('#declinedOt').on('hidden.bs.modal', function() {
    location.reload();
})
$('#declinedLeave').on('hidden.bs.modal', function() {
    location.reload();
})
$('#otRequest').on('hidden.bs.modal', function() {
    location.reload();
})
$('.emp_no').on('input', function() {
    val = $(this).val();
    if (isNaN(val % 10)) {
        $val = val.slice(0, -1);
        $(this).val($val);
    } else {
        $(this).val(val)
    }
});
$('.mobile').on('input', function() {
    val = $(this).val();
    if (val.length != 12) {
        if (isNaN(val % 10)) {
            $val = val.slice(0, -1);
            $(this).val($val);
        } else {
            $(this).val(val)
        }
    } else {
        $val = val.slice(0, -1);
        $(this).val($val);
    }
});
$('.yearsGraduated').on('input', function() {
    val = $(this).val();
    if (val.length != 5) {
        if (isNaN(val % 10)) {
            $val = val.slice(0, -1);
            $(this).val($val);
        } else {
            $(this).val(val)
        }
    } else {
        $val = val.slice(0, -1);
        $(this).val($val);
    }
});
$('.homeNumber').on('input', function() {
    val = $(this).val();

    if (isNaN(val % 10)) {
        $val = val.slice(0, -1);
        $(this).val($val);
    } else {
        $(this).val(val)
    }
});

function getTime() {
    var time_start = ($('.time_start').val());
    var time_end = ($('.time_end').val());

    var split = time_start.split(':');
    var split1 = time_end.split(':');
    var totalMinuteTimeStart = split[0] * 60 + Number(split[1]);
    var totalMinuteTimeEnd = split1[0] * 60 + Number(split1[1]);

    $totalHours = ((totalMinuteTimeEnd - totalMinuteTimeStart));



    if (time_start != "" && time_end != "") {
        // $hours = time_end - time_start;

        if (totalMinuteTimeEnd > totalMinuteTimeStart) {
            $('.hours').val($totalHours / 60);
            // $('#total').val(day);
            $('.error_time').text('');
        } else {
            $('.error_time').text('Please input the right time.');
            $('.error_time').css('color', 'red');
            $('.hours').val('');
        }

    }

}

function resetFieldsLeaveForm() {

    $('textarea').val('');
    $('input[type=date], #total').val('');
    $('select option:first-child').attr("selected", "selected");
    return false;
}

function resetFieldsOtForm() {
    $('textarea').val('');
    document.getElementById("remark").value = "";
    document.getElementById("totalHours").value = "";
    document.getElementById("otDate").value = "";
    $('input[type=time]').val('');
    $('select option:first-child').attr("selected", "selected");
}
function validateDate(){
    // alert($('#otDate').val());
     var date1 = new Date($('.date_filed').val());
    var date2 = new Date($('#otDate').val());


    if(date1>date2){
        $('.error_date').text('Please input the right date.');
        $('.error_date').css('color', 'red');
        $('#otDate').val('')
    }else{
         $('.error_date').text('');
        $('.error_date').css('color', 'red');
    }
}
function getDate() {

    var date1 = $('.leave_start_date').val();
    var date2 = $('.leave_end_date').val();

    $start = new Date(date1);
    $end = new Date(date2);

    $count = 0;

    while ($start <= $end) {

        if ($start.getDay() > 0 && $start.getDay() < 6) {
            $count += 1;
        }

        $start.setDate($start.getDate() + 1);
    }

    var date1parse = Date.parse(date1);
    var date2parse = Date.parse(date2);

    if (Date.parse($('.datefiled').val()) < date1parse) {
        $('#total').val('');
        $('.error_date').text('');

        if (date1 != "" && date2 != "") {
            if (date2parse > date1parse) {
                $('#total').val($count - 1);
                $('.error_date').text('');
            } else {

                $('.error_date').text('Please input the right date.');
                $('.error_date').css('color', 'red');
                $('#total').val('');
            }
        }
    } else {
        $('.error_date').text('Please check the start date');
        $('.error_date').css('color', 'red');
        $('#total').val('');
    }


};

$('.approved').click(function() {
    toastr.info('Approve Leave?<br/><br/><form class="update_leave"><input type="hidden" name="leave_id" class="leave_id" ><button type="button" class="btn btn-success approved" id="yes">Yes</button></form>', '')
    var _getAtt = $(this).attr('data_attr');
    // alert(_getAtt);
    $.ajax({
        type: 'GET',
        url: 'LeaveRequest/getInfo',
        data: {
            _getAtt: _getAtt
        },
        success: function(success) {
            var parse = JSON.parse(success);
            $('.leave_id').val(parse[0]['leave_id']);
        }
    });

    $('#yes').click(function() {
        var this_id = $('.leave_id').val();
        // alert(this_id);
        $.ajax({
            type: 'GET',
            url: 'LeaveRequest/update_request',
            data: {
                this_id: this_id
            },
            success: function(success) {
                if (success === '1') {
                    toastr.success('Successfully Updated!', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    alert('hi');
                }
            }
        });

    });
});
$('.approvedCA').click(function() {
    toastr.info('Approve Cash Advance?<br/><br/><form class="update_ca"><input type="hidden" name="leave_id" class="ca_id" ><button type="button" class="btn btn-success approved" id="yes">Yes</button></form>', '')
    var _getAtt = $(this).attr('data_attr');
    $.ajax({
        type: 'GET',
        url: 'CashAdvance/getInfo',
        data: {
            _getAtt: _getAtt
        },
        success: function(success) {
            // alert(success);
            var parse = JSON.parse(success);
            $('.ca_id').val(parse[0]['ca_id']);
        }
    });

    $('#yes').click(function() {
        var this_id = $('.ca_id').val();
        // alert(this_id);
        $.ajax({
            type: 'GET',
            url: 'CashAdvance/get',
            data: {
                this_id: this_id
            },
            success: function(success) {
                // alert(success);
                if (success === '1') {
                    toastr.success('Successfully Updated!', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    alert('hi');
                }
            }
        });

    });
})

$('.otRequest').click(function() {
    toastr.info('Approve Leave?<br/><br/><form class="update_leave"><input type="hidden" name="leave_id" class="ot_id" ><button type="button" class="btn btn-success approved" id="yes">Yes</button></form>', '')
    $('.approved').click(function() {
        var _getAtt = $(this).attr('data_attr');
        $.ajax({
            type: 'GET',
            url: 'OtRequest/getInfo',
            data: {
                _getAtt: _getAtt
            },
            success: function(success) {
                var parse = JSON.parse(success);
                $('.ot_id').val(parse[0]['ot_id']);
            }
        });
    });

    $('#yes').click(function() {
        var this_id = $('.ot_id').val();
        $.ajax({
            type: 'GET',
            url: 'OtRequest/update_ot',
            data: {
                this_id: this_id
            },
            success: function(success) {
                if (success === '1') {
                    toastr.success('Successfully Updated!', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    alert('hi');
                }
            }
        });
    });
});

function view201($id){
    // alert($id);
    var id = $id;

    $.ajax({
            type: 'GET',
            url: 'View_201/getInfo',
            data: {
                id: id
            },
            success: function(success) {
               var parse = JSON.parse(success);
               if(parse[0]['company']===1){
                    $company = "Agorra";
               }else{
                     $company = "Optimind";
               }
               $('.emp_no').val(parse[0]['emp_no']);
               $('.company').val($company);
               $('.name').val(parse[0]['last_name']+','+parse[0]['first_name']);
               $('.date_birth').val(parse[0]['birth_date']);
               $('.mstatus').val(parse[0]['civil_status']);
               $('.placeDate').val(parse[0]['birth_place']);
               $('.nationality').val(parse[0]['nationality']);
               $('.religion').val(parse[0]['religion']);
               $('.email').val(parse[0]['email']);
               $('.number').val(parse[0]['contact_number']);
               $('.haddress').val(parse[0]['address']);
               $('.hnumber').val(parse[0]['phone']);
            }
        });
    
}
$(document).ready(function() {
    $("#payment_terms").change(function(){
        var divisor = $('#payment_terms option:selected').val();
        var dividend = $('.amount').val();
        var quotient = 0;

        if (divisor == 1){
            quotient = (dividend / divisor) / 2 ;
            $('#pay_amount').val(quotient);
        } else if (divisor == 2){
            quotient = (dividend / divisor) / 2;
            $('#pay_amount').val(quotient);
        } else if (divisor ==3 ){
            quotient = (dividend / divisor) / 2;
            $('#pay_amount').val(quotient);
        } else {
            quotient = (dividend / divisor) / 2;
            $('#pay_amount').val(quotient);
        }
    })
});
function submitActivty(){
    var data = $('.form1').serialize();

    // alert(data);
    $.ajax({
        type: 'GET',
        url: 'Activity/create',
        data: {
            data: data
        },
        success: function(success) {
           if (success === '1') {
                    toastr.success('Successfully Updated!', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
            } else {
                toastr.error('Error Please Make sure to fill in All necessary fields', '');
            }
        }
    });
}

function addVote1(){
    // alert('hello');
    var data = $('.addVote').serialize();
   
    $.ajax({
        type: 'GET',
        url: 'Votation/createVote',
        data: {
            data: data
        },
        success: function(success) {
           if (success === '1') {
                    toastr.success('Successfully Updated!', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
            } else {
                toastr.error('Error Please Make sure to fill in All necessary fields', '');
            }
        }
    });
}

function compute() {
    var divisor = $('#payment_terms option:selected').val();
    var dividend = $('.amount').val();
    var quotient = 0;

    if (isNaN(divisor)){
        if (divisor == 1 && divisor!=null){
            quotient = (dividend / divisor) / 2 ;
            $('#pay_amount').val(quotient);
        } else if (divisor == 2 && divisor!=null){
            quotient = (dividend / divisor) / 2;
            $('#pay_amount').val(quotient);
        } else if (divisor == 3 && divisor!=null){
            quotient = (dividend / divisor) / 2;
            $('#pay_amount').val(quotient);
        } else {
            quotient = (dividend / divisor) / 2;
            $('#pay_amount').val(quotient);
        } 
    } else {
        $('#pay_amount').val(0);
    }
}
// $('.addVote1').click(function(){
//     // alert('hello');
//     $data = $('.addVote').serialize();

//     alert($data);
// });
function submitCSV(filename){
    $.ajax({
        type: 'GET',
        url: 'UploadCsv/save',
        data: {
            filename: filename
        },
        success: function(success) {
            // alert(success);
           if (success === '1') {
                    toastr.success('Successfully Done!', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
            } else {
                toastr.error('Error Please Make sure to fill in All necessary fields', '');
            }
        }
    });
}



    

function generate(id){
    $.ajax({
        type: 'GET',
        url: 'Activity/generate',
        data: {
            id: id
        },
        success: function(success) {
           alert(success);
        }
    });
}

$('.deleteItem').click(function() {
    toastr.info('Delete Item?<br/><br/><form class="update_item"><input type="hidden" name="item_id" class="item_id" ><button type="button" class="btn btn-success update" id="yes">Yes</button></form>', '')
    
    var _getAtt = $(this).attr('data_attr');

    $.ajax({
        type: 'GET',
        url: 'ViewItem/getInfo',
        data: {
            _getAtt: _getAtt
        },
        success: function(success) {
            var parse = JSON.parse(success);
            $('.item_id').val(parse[0]['id']);
        }
    });
    $('#yes').click(function() {
        var this_id = $('.item_id').val();
        // alert(this_id);
        $.ajax({
            type: 'GET',
            url: 'ViewItem/deleteItem',
            data: {
                this_id: this_id
            },
            success: function(success) {
                if (success === '1') {
                    toastr.success('Successfully Updated!', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    alert('hi');
                }
            }
        });

    });
});

$('.update201file').click(function(){
    var data_upd = $('.update201').serialize();
    // alert(data_upd);
    $.ajax({
            type: 'GET',
            url: 'update_201',
            data: {
                data_upd: data_upd
            },
            success: function(success) {
                if (success === '1') {
                    toastr.success('Successfully Updated!', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    alert('hi');
                }
            }
        });
})


$('.editholidaybutton').click(function() {
    var id = $(this).attr('data_attr');
    // alert(id);
    $.ajax({
        type: 'GET',
        url: 'HolidayList/getInfo',
        data: {
            id: id
        },
        success: function(success) {
            var parse = JSON.parse(success);
            $('.holidayId').val(parse[0]['holiday_id']);
            $('.holidayname').val(parse[0]['holiday_name']);
            $('.holidaydate').val(parse[0]['holiday_date']);
            $('.type').val(parse[0]['holiday_type']);
            $('.company').val(parse[0]['company']);
        }
    });

});

$('.updateHoliday').click(function(){
    var data_upd = $('.editHoliday').serialize();
    alert(data_upd);
    $.ajax({
            type: 'GET',
            url: 'HolidayList/updateHoliday',
            data: {
                data_upd: data_upd
            },
            success: function(success) {
                if (success === '1') {
                    toastr.success('Successfully Updated!', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    alert('hi');
                }
            }
        });
})

$('.delete_holiday').click(function() {
    var id = $(this).attr('data_attr');
    // alert(id);
    $.ajax({
        type: 'GET',
        url: 'HolidayList/deleteHoliday',
        data: {
            id: id
        },
        success: function(success) {
            toastr.success('Successfully Deleted!', '');
            setTimeout(function() {
                location.reload();
            }, 1000);
        }
    });

});


$('.startActivity').click(function() {
    toastr.info('Start Game?<br/><br/><button type="button" class="btn btn-success approved" id="yes">Yes</button>', '')
    var _getAtt = $(this).attr('data_attr');

    $('#yes').click(function() {
        $.ajax({
            type: 'GET',
            url: 'ActivityList/start',
            data: {
                _getAtt: _getAtt
            },
            success: function(success) {
                if (success === '1') {
                    alert('hi');
                } else {
                    toastr.success('Game has Officially Started!', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }
            }
        });
    });
});

$('.endActivity').click(function() {
    toastr.info('End Game?<br/><br/><button type="button" class="btn btn-success approved" id="yes">Yes</button>', '')
    var _getAtt = $(this).attr('data_attr');

    $('#yes').click(function() {
        $.ajax({
            type: 'GET',
            url: 'ActivityList/end',
            data: {
                _getAtt: _getAtt
            },
            success: function(success) {
                if (success === '1') {
                    alert('hi');
                } else {
                    toastr.success('Game has Ended!', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }
            }
        });
    });
});

$('.joinOngoing').click(function(){
    toastr.info('Cannot join Game it has already started!', '')
});

$('.joinGame').click(function(){
    var activity_id = $(this).attr('data_attr');
        $.ajax({
            type: 'GET',
            url: 'UserActivityList/save',
            data: {
                activity_id: activity_id
            },
            success: function(success) {
                if (success === '1') {
                   toastr.success('Joined Successfully!', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    alert('hi');
                }
            }
        });
});

$('#selectGame').change(function(){
    var game_id = $('#selectGame').val();

    $.ajax({
        type: 'GET',
        url: 'Activity/getPlayerList',
        data: {
            game_id: game_id
        },
        success: function(result) {
                console.log(result[0]);
                var listStr = '';
                for (var key in result) {
                    if (result.hasOwnProperty(key)) {
                      var val = result[key];
                      if(val.status)
                      listStr += '<tr><td>'+val.first_name+ ' '+val.last_name+'</td>';
                      listStr += '<td><div id="test1'+val.emp_id+'">'+val.points+'</div></td>';
                      if (val.status == 0) {
                          listStr += '<td><div id="test'+val.emp_id+'"><button class="btn btn-success btn-sm" onclick=approvePlayer('+val.emp_id+','+game_id+','+val.game_points+','+val.points+')>Approve</button> <button class="btn btn-danger btn-sm" onclick=rejectPlayer('+val.emp_id+','+game_id+','+val.game_points+')>Reject</button></div></td>'
                      } else if(val.status == 1){
                          listStr += '<td>Approved</td>'
                      } else {
                         listStr += '<td>Rejected</td>'
                      }
                      listStr += '</tr>';
                    }
                }
                $('#playerList').html(listStr);
            }
        });

});

function approvePlayer(emp_id, game_id, game_points, points)  {
    $.ajax({
        type: 'GET',
        url: 'Activity/approvePlayer',
        data: {
            game_id: game_id,
            emp_id : emp_id,
            game_points : game_points
        },
        success: function(result) {
              if (result === '1') {
                   toastr.success('Approved', '');
                   $('#test' + emp_id).html('Approved');
                   $('#test1' + emp_id).html(game_points);
                } else {
                    alert('hi');
                }
            }
        });
}

function rejectPlayer(emp_id, game_id, game_points)  {
    $.ajax({
        type: 'GET',
        url: 'Activity/rejectPlayer',
        data: {
            game_id: game_id,
            emp_id : emp_id
        },
        success: function(result) {
              if (result === '1') {
                   toastr.error('Rejected', '');
                   $('#test' + emp_id).html('Rejected');
                } else {
                    alert('hi');
                }
            }
        });
}

$('#claimPrice').click(function(){
    var id = $(this).attr('data_attr');
        $.ajax({
            type: 'GET',
            url: 'UserDashboard/claimPrice',
            data: {
                id: id
            },
            success: function(success) {
                if (success === '1') {
                   toastr.success('Claim your token at HR!', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    alert('hi');
                }
            }
        });
});

$('#confirm').click(function(){
    var id = $(this).attr('data_attr')

        $.ajax({
            type: 'GET',
            url: 'Dashboard/confirmItemClaim',
            data: {
                id:id
            },
            success: function(success) {
                if(success === '1'){
                    toastr.success('Confirmed', '');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    toastr.error('Nothing here', '');
                }
            }
        });
});

$('.viewPayroll').click(function(){
    var id = $(this).attr('data_attr')
    var term = $('#term').val();
    var month = $('#month').val();
    var year = $('#year').val();

    alert(id);
    alert(term);
    alert(month);
    alert(year);

});



