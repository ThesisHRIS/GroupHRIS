// $('.approved').click(function(){
//       $('#approved').modal({
//         show: 'false'
//     }); 
//     alert('hello');

// });
$('.submitEdit').click(function(){
  var data_upd = $('.edit').serialize();

  alert(data_upd);
    // $.ajax({
    //         type:'GET',
    //         url:'EditUser/edit',
    //         data:{data_upd:data_upd},
    //         success:function(success){
    //             // var parse = JSON.parse(success);
    //             alert(success);
                          
    //         }       
    //     });

});
$('.editLeave').click(function(){
  // alert('hello');
        var _getAtt = $(this).attr('data_attr');
        // alert(_getAtt);
        $.ajax({
            type:'GET',
            url:'LeaveRequest/getInfo',
            data:{_getAtt:_getAtt},
            success:function(success){
                var parse = JSON.parse(success);
                $('.emp_name').val(parse[0]['first_name']+' '+parse[0]['last_name']);
                $('.leave_dates').val(parse[0]['start_date']+' to '+parse[0]['end_date']);
                $('.date_requested').val(parse[0]['date_filed']);
                $('.no_days').val(parse[0]['days']);
                $('.leave_type').val(parse[0]['type']);
                $('.reason').val(parse[0]['comments']);             
                $('.leave_id').val(parse[0]['leave_id']);             
            }       
        });
    })
$('.approved').click(function(){
        var _getAtt = $(this).attr('data_attr');
        $.ajax({
            type:'GET',
            url:'LeaveRequest/getInfo',
            data:{_getAtt:_getAtt},
            success:function(success){
                var parse = JSON.parse(success);
                $('.emp_name').val(parse[0]['first_name']+' '+parse[0]['last_name']);
                $('.leave_dates').val(parse[0]['start_date']+' to '+parse[0]['end_date']);
                $('.date_requested').val(parse[0]['date_filed']);
                $('.no_days').val(parse[0]['days']);
                $('.leave_type').val(parse[0]['type']);
                $('.reason').val(parse[0]['comments']);             
                $('.leave_id').val(parse[0]['leave_id']);             
            }       
        });
    });

$('.EditotRequest').click(function(){
        var _getAtt = $(this).attr('data_attr');
        $.ajax({
            type:'GET',
            url:'OtRequest/getInfo',
            data:{_getAtt:_getAtt},
            success:function(success){
                var parse = JSON.parse(success);

                $('.emp_name').val(parse[0]['first_name']+' '+parse[0]['last_name']);
                $('.leave_dates').val(parse[0]['ot_date']);
                $('.date_requested').val(parse[0]['date_filed']);
                $('.no_days').val(parse[0]['total_hours']);
                $('.task').val(parse[0]['task']);
                // $('.reason').val(parse[0]['comments']);             
                $('.ot_id').val(parse[0]['ot_id']);             
            }       
        });
    });
$('.otRequest').click(function(){
        var _getAtt = $(this).attr('data_attr');
        $.ajax({
            type:'GET',
            url:'OtRequest/getInfo',
            data:{_getAtt:_getAtt},
            success:function(success){
                var parse = JSON.parse(success);

                $('.emp_name').val(parse[0]['first_name']+' '+parse[0]['last_name']);
                $('.leave_dates').val(parse[0]['ot_date']);
                $('.date_requested').val(parse[0]['date_filed']);
                $('.no_days').val(parse[0]['total_hours']);
                $('.task').val(parse[0]['task']);
                // $('.reason').val(parse[0]['comments']);             
                $('.ot_id').val(parse[0]['ot_id']);             
            }       
        });
    });
    $('.add201File').click(function(){
      // alert('hello');
          var data_upd = $('.201').serialize();
          var name = $('.last_name').val();
           $.ajax({
            type:'GET',
            url:'Add201File/saveForm',
            data:{data_upd:data_upd},
            success:function(success)
            {
                // alert(success);
               if(success === '1'){
                    $(".message").css("display", "block");
                    $(".message").css("font-weight","bold");
                    $(".message").css("text-align","center");
                    $('.message').text("Successfully Added 201 File of "+ name);
               }else{
                   alert('hi');
               }
            }
        });
    });
    $('.update_leave_button').click(function(){
        var this_id = $('.leave_id').val();
        $.ajax({
            type:'GET',
            url:'LeaveRequest/update_request',
            data:{this_id:this_id},
            success:function(success)
            {
               if(success === '1'){
                    $(".message").css("display", "block");
                    $(".message").css("font-weight","bold");
                    $(".message").css("text-align","center");
                    $('.message').text("Successfully approved Leave Request");
               }else{
                   alert('hi');
               }
            }
        });
    });

      $('.decline_leave_button').click(function(){
        var this_id = $('.leave_id').val();
        $.ajax({
            type:'GET',
            url:'LeaveRequest/decline_leave',
            data:{this_id:this_id},
            success:function(success)
            {
               if(success === '1'){
                    $(".message").css("display", "block");
                    $(".message").css("font-weight","bold");
                    $(".message").css("text-align","center");
                    $('.message').text("Successfully approved Leave Request");
               }else{
                   alert('hi');
               }
            }
        });
    });

    $('.update_Ot_button').click(function(){
        var this_id = $('.ot_id').val();
        $.ajax({
            type:'GET',
            url:'OtRequest/update_ot',
            data:{this_id:this_id},
            success:function(success)
            {
               if(success === '1'){
                    $(".message").css("display", "block");
                    $(".message").css("font-weight","bold");
                    $(".message").css("text-align","center");
                    $('.message').text("Successfully approved OT Request");
               }else{
                   alert('hi');
               }
            }
        });
    });
    
    $('#approved').on('hidden.bs.modal', function () {
 location.reload();
})
    $('#editModal').on('hidden.bs.modal', function () {
 location.reload();
})
     $('#otRequest').on('hidden.bs.modal', function () {
 location.reload();
})
     $('#EditotRequest').on('hidden.bs.modal', function () {
 location.reload();
})
    $('.emp_no').on('input',function(){
      val= $(this).val();
      if(isNaN(val%10)){
         $val=val.slice(0,-1);
         $(this).val($val);
      }else{
         $(this).val(val)
      }  
   });
   $('.mobile').on('input',function(){
      val= $(this).val();
      if(val.length!=12){
         if(isNaN(val%10)){
            $val=val.slice(0,-1);
            $(this).val($val);
         }else{
            $(this).val(val)
         }  
      }else{
          $val=val.slice(0,-1);
          $(this).val($val);
      }
   }); 
   $('.yearsGraduated').on('input',function(){
      val= $(this).val();
      if(val.length!=5){
         if(isNaN(val%10)){
            $val=val.slice(0,-1);
            $(this).val($val);
         }else{
            $(this).val(val)
         }  
      }else{
          $val=val.slice(0,-1);
          $(this).val($val);
      }
   });
    $('.homeNumber').on('input',function(){
      val= $(this).val();
    
         if(isNaN(val%10)){
            $val=val.slice(0,-1);
            $(this).val($val);
         }else{
            $(this).val(val)
         }  
   });
    function getTime(){
        var time_start=($('.time_start').val());
        var time_end=($('.time_end').val());

        var split = time_start.split(':');
        var split1 = time_end.split(':');
        var totalMinuteTimeStart = split[0]*60+Number(split[1]);
        var totalMinuteTimeEnd = split1[0]*60+Number(split1[1]);
        // alert(totalMinuteTimeStart);
        // alert(totalMinuteTimeEnd);


        $totalHours = ((totalMinuteTimeEnd-totalMinuteTimeStart));

        

        if(time_start != "" && time_end != ""){
            // $hours = time_end - time_start;
            
            if(totalMinuteTimeEnd > totalMinuteTimeStart){
                $('.hours').val($totalHours/60);  
                   // $('#total').val(day);
                   $('.error_time').text('');
              }else{
               $('.error_time').text('Please input the right time.');
               $('.error_time').css('color','red');
              $('.hours').val('');
        }

        }

    }
function getDate(){
  var date1 = $('.ot_start_date').val();
  var date2 = $('.ot_end_date').val();
  var date1parse = Date.parse(date1);
  var date2parse = Date.parse(date2);
  
  
  // alert(Date.parse(date1));
  // alert(Date.parse(date2));
  // alert(date2);      
    if(date1 != "" && date2 != ""){
        if(date2parse > date1parse){
            var diff = date2parse- date1parse ;
             var day = Math.round(Math.abs(diff/(24*3600*1000)));
             $('#total').val(day);
             $('.error_date').text('');
        }else{
         $('.error_date').text('Please input the right date.');
         $('.error_date').css('color','red');
          $('#total').val('');
        }
    }     
}

  $('#reset').click(function () {
    // $('input[type=text], textarea').val('');
    // $('select').val('--None--');
    // return false;
    resetFields ();
  });

  function resetFieldsLeaveForm () {
    $('textarea').val('');
    $('input[type=date], #total').val('');
    $('select option:first-child').attr("selected", "selected");
    return false;
  }

  function resetFieldsOtForm(){
    $('textarea').val('');
    document.getElementById("remark").value ="";
    document.getElementById("totalHours").value="";
    document.getElementById("otDate").value="";
    $('input[type=time]').val('');
    $('select option:first-child').attr("selected", "selected");
  }
  

  
