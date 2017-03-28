function checkAll(source) {
  checkboxes = document.getElementsByName('sales_category[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
$(document).ready(function(){
    $('#edit_sl').click(function(){
         // alert("hello");
            var data_upd = $('#saleForm').serialize()
            var this_id = $('#salesId').val();
            // var nme = $('#contact_name').val();
            $.ajax({
                type:'GET',
                url:'Sale_List/updSales',
                data:{data_upd:data_upd,this_id:this_id},
                success:function(success)
                {
                   
                    setTimeout(function(){ location.reload(); },100);
                    $('.message').html(success);
                }
            });
     });

    $('.edit_sale').click(function(){
        var _getAtt = $(this).attr('data_attr');
        $.ajax({
            type:'GET',
            url:'Sale_List/getSales',
            data:{_getAtt:_getAtt},
            success:function(success){
                var parse = JSON.parse(success);
                $('#company_name').val(parse.company_name);
                $('#project_name').val(parse.project_name);
                $('#value').val(parse.amount);
                $('#salesId').val(parse.sales_id);
            }   
        });
    });
        $('.edit_Proposals').click(function(){
        var _getAtt = $(this).attr('data_attr');
        $.ajax({
            type:'GET',
            url:'Proposals_List/lol',
            data:{_getAtt:_getAtt},
            success:function(success){
                var parse = JSON.parse(success);
                var array =  parse.service_category.split(',');
                $('#prime').val(parse.proposals_id);
                $('#project_name').val(parse.project_name);
                $('#value').val(parse.amount);
                $('#salesId').val(parse.sales_id);
                 checkboxes = document.getElementsByName('sales_category[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = $('this').checked;
  }
                
                $.each(array, function(i, val){ 
                    $("input[value='" + val + "']").prop('checked', true);
                    // alert(val);
                });
              
            }       
        });
           // alert(_getAtt);
    });
        $('.edit_OnSale').click(function(){

            alert("cant be updated because it already in sale");
        });
       
//         $('.edit_pro').click(function(){
//            var val= $('#proposalsCmd').serialize();
//            var upload = $('#file').val();
//            var id = $('#unq').val();
//            // alert(upload);
//            $.ajax({


//                 type:'GET',
//                 url:'Proposals_List/update_proposals',
//                 data:{val:val,id:id,upload:upload},
//                 success:function(success){
// alert(success);
//                 //    if(success==1)
//                 // {   
//                 //     // alert(success);
//                 //     setTimeout(function(){ location.reload(); },1000);
//                 //     $('.message').html(" Successfully updated.");
//                 // }else{
//                 //    $('.message').html(" Can't Be Updated.");
//                 // }

//                 }

//            });



//         });
        $('.view_proposals').click(function(){
              var _getAtt = $(this).attr('data_attr');
                $.ajax({
                    type:'GET',
                    url:'Proposals_List/viewProposals',
                    data:{_getAtt:_getAtt},
                    success:function(success){
                      // alert(success);
                      var parse = JSON.parse(success);
                      $('#QuotationNo').val(parse.proposals_id);
                      $('#clientName').val(parse.contact_name);
                      $('#serviceCategory').val(parse.service_category);
                      $('#amount').val(parse.amount);
                      $('#dateSent').val(parse.date_sent);
                      $('#Pro').val(parse.project_name);
                      $('#date_created').val(parse.date_created);
                      $('#date_LastModified').val(parse.date_lastModified);
                    }   
                });
        });
           $('.delete_proposals').click(function(){
         var answer = confirm('Are you sure you want to delete this data?');
        if (answer)
        {
        var _getAtt = $(this).attr('mAtt');
        
        $.ajax({

            type:'GET',
            url:'Proposals_List/delete_proposals',
            data:{_getAtt:_getAtt},
            success:function(success){

                if(success==1)
                {   
                    setTimeout(function(){ location.reload(); },100);
                    $('.message').html("Successfully deletion.");
                }else{
                    $('.message').html("Can't Be Deleted");
                }
            }

        })
    }
    });
    $('.delete_sale').click(function(){
         var answer = confirm('Are you sure you want to delete this data?');
        if (answer)
        {
        var _getAtt = $(this).attr('mAtt');
        $.ajax({

            type:'GET',
            url:'Sale_List/deleteSale',
            data:{_getAtt:_getAtt},
            success:function(success){

                if(success==1)
                {   
                    setTimeout(function(){ location.reload(); },100);
                    $('.message').html(" Successfully Deleted.");
                }else{
                    $('.message').html(" Can't Be Deleted.");
                }
            }

        })
    }
    });
    $('.amount').on('input',function(){
        $val= $(this).val();
        
        if(parseInt($val.charCodeAt($val.length-1))==44){
            $('.amount').val($val);
            // alert(parseInt($val.charCodeAt($val.length-1)));
        }
        else if(parseInt($val.charCodeAt($val.length-1))<58
            &&parseInt($val.charCodeAt($val.length-1))>47){
              $('.amount').val($val);
        }else{
            $val=$val.slice(0,-1);
            $('.amount').val($val);
        }
    });
    $('.deal1').click(function(){
        $('._percentage').prop('readonly',true);

    });
     $('.deal').click(function(){
        $('._percentage').prop('readonly',false);

    });
    $('._percentage').on('input',function(){
        $val= $(this).val();
        alert($('.deal').val());
        if($val<101){
        if(parseInt($val.charCodeAt($val.length-1))<58
            &&parseInt($val.charCodeAt($val.length-1))>47||
            parseInt($val.charCodeAt($val.length-1))==46){
              $('._percentage').val($val);
        }else{
            $val=$val.slice(0,-1);
            $('._percentage').val($val);
        }}else{
            $val=$val.slice(0,-1);
            $('._percentage').val($val);
            alert("error input ");
        }
    });
    $('.contactNumber').on('input',function(){
        $val= $(this).val();
        if($val.length-1!==11){
            if(parseInt($val.charCodeAt($val.length-1))<58
                &&parseInt($val.charCodeAt($val.length-1))>47){
                  $('.contactNumber').val($val);
            }else{
                $val=$val.slice(0,-1);
                $('.contactNumber').val($val);
            }
        }else{
            $val=$val.slice(0,-1);
            $('.contactNumber').val($val);
        }
    });
    $('.contactName') .on('input',function(){
        $val=$(this).val();
        // alert(parseInt($val.charCodeAt($val.length-1)));
        if(parseInt($val.charCodeAt($val.length-1))<91
            && parseInt($val.charCodeAt($val.length-1))>64 
            || parseInt($val.charCodeAt($val.length-1))<123
            && parseInt($val.charCodeAt($val.length-1))>96
            ||parseInt($val.charCodeAt($val.length-1))==45
            ||parseInt($val.charCodeAt($val.length-1))==32
            ){
              $('.contactName').val($val);
        }else{
              $val=$val.slice(0,-1);
            $('.contactName').val($val);
        }
    });
    // filter by date
    $('._filter').click(function(){
        var val1= $('._from').val();
        var val2= $('._to').val();
        var val3= $('._year').val();
        $.ajax({
            type:'GET',
            url:'Commissionable/listByFrom',
            data:{val3:val3,val1:val1,val2:val2},
            dataType: 'json',
            success:function(result){
                if(result!=''){
                    $('td').fadeOut();
                    for(var i = 0; i < result.length; i++){

                        var date = result[i].date_collected;
                        var porj_name = result[i].project_name;
                        var payment_terms = result[i].description;
                        var amount = result[i].amount_collected;
                        

                        var tr_start = "<tr class='trs'>";
                        var td_start = "<td>";
                        var td_end = "</td>";
                        var tr_end = "</tr>";
                        $('#tbody').append(tr_start
                            +td_start+date+td_end
                            +td_start+porj_name+td_end
                            +td_start+payment_terms+td_end
                            +td_start+amount+td_end
                            +tr_end);
                    }
                }else{
                    alert('Sorry no data matched.');
                    location.reload();
                }
            }
        });
    });
    //
    // log
    //log
  $('.form-signin').keypress(function (e) {
     var key = e.which;
     if(key == 13)  // the enter key code
      {
        $('.btn-login').trigger("click");
        return false;
      }
  });
    $('.btn-login').on('click',function(){
        logs();
        return false;
  });
    function logs(){
        var _u = $('#uname').val();
        var _p = $('#pass').val();
        if(_u==''){
            $('#uname').css('border','1px solid red');
            setTimeout(function(){
                $('#uname').css('border','1px solid #eaeaea');
            },2000);
        }
        if(_p==''){
            $('#pass').css('border','1px solid red');
            setTimeout(function(){
                $('#pass').css('border','1px solid #eaeaea');
            },2000);
        }
        if(_u!='' && _p!=''){
            var count_err = 0;
            $.ajax({
                type:'GET',
                url:'Login/sign_in',
                data:{_u:_u,_p:_p},
                success:function(succ_msg){
                    // alert(succ_msg);
                    if(succ_msg==0){
                        count_err++;
                        if(count_err>2){
                            location.reload();
                        }else{
                            alert('Either Username or Password is/are incorrect!');
                        }
                    }else{
                        $('.btn-login').attr('disabled','').text('Signing in..');
                        if(succ_msg==2){
                             window.location="Finance";
                        }
                        if(succ_msg==1){
                             window.location="Dashboard";
                        }
                       
                    }
                }
            });
        }
    }
    // get client
    $('.edit_client').click(function(){
        var _getAtt = $(this).attr('data_attr');
        $.ajax({
            type:'GET',
            url:'Clients_List/getClient',
            data:{_getAtt:_getAtt},
            success:function(success){
                var parse = JSON.parse(success);
                var emails = parse.email.split(',');
                var email_personal = emails[0];
                var email_work = emails[1];
                var email_company = emails[2];
                var cont_nums = parse.contact_no.split(',');
                var cont_cel = cont_nums[1];
                var cont_tel = cont_nums[0];
                $('#phone_number').val(cont_tel);
                $('#cel_number').val(cont_cel);
                $('#contact_name').val(parse.contact_name);
                $('#value').val(parse.value);
                $('#personal_email').val(email_personal);
                $('#work_email').val(email_work);
                $('#company_email').val(email_company);
                
                $('#unq').val(parse.client_id);

            }
        });
    });
    // update client
    $('.edit_cl').click(function(){
        var data_upd = $('#lstCmd').serialize();
        var this_id = $('#unq').val();
        var nme = $('#contact_name').val();
        $.ajax({
            type:'GET',
            url:'Clients_List/updClient',
            data:{data_upd:data_upd,this_id:this_id},
            success:function(success)
            {
                if(success==1)
                {   
                    setTimeout(function(){ location.reload(); },1000);
                    // alert(nme+ " successfully updated.");
                    $('.message').html(nme+ " Successfully updated.");
                }else{
                    $('.message').html("Can't update "+nme);
                }
            }
        });
    });
    // sale
    // $('.client').click(function(){
    //         var name= $('.client').val();
    //         $.ajax({
    //                 type:'GET',
    //                 url:'Sales/auto',
    //                 data:{name:name},
    //                 dataType:'json',
    //                 success:function(success){
    //                     alert(success);
    //                 }

    //         });

    // });
    $('.client').on('click',function(){
        var name= $('.client').val();
            $.ajax({
               type:'GET',
               url:'Sales/autoSe',
               data:{'name':name},
               dataType:'html',
               success:function(success)
               {
                $('.quotationSel>option').fadeOut();
                var parseID = JSON.parse(success);
                for (var i = 0; i < parseID.length; i++) {
                var quotation= parseInt(parseID[i].proposals_id)+1000;
             
                $('.quotationSel').append("<option selected value="+parseID[i].proposals_id+">"+quotation+"</option>");
                
           
                }
            }
            });
    });
    $('.clients').on('click',function(){
        var name= $('.clients').val();
            $.ajax({
               type:'GET',
               url:'Bills/autoSe',
               data:{'name':name},
               dataType:'html',
               success:function(success)
               {
                // alert(success);
                $('.quotationSel>option').fadeOut();
                var parseID = JSON.parse(success);
                // alert(parseID[0].payment_terms_id);
                var count=0;
                for (var i = parseID.length-1; i >=0; i--) {
                    if(parseID[i].qb_ref_no<1){
                        count=i;
                var quotation= parseInt(parseID[i].proposals_id)+1000;
             
                    $('.quotationSel').append("<option selected value="+parseID[i].proposals_id+">"+quotation+"</option>");
                    $('.percent').val(parseID[count].percentage);     
                    $('.exDeal').val(parseID[count].ex_deal>0?"yes":"no");     
                    $('.description').html(parseID[count].description);   
                    $('.payment_terms_id').val(parseID[count].payment_terms_id);
                }
            }
                // $('.quotationSel').append("<option selected value="+parseID[0].proposals_id+">"+quotation+"</option>");
                
            }
            });
            var val=  $('.quotationSel').val();
     
    });
 $('.billClient').on('click',function(){
        var name= $('.billClient').val();
            $.ajax({
               type:'GET',
               url:'Bills/autoSe',
               data:{'name':name},
               dataType:'html',
               success:function(success)
               {
                // alert(success);
                $('.quotationSel>option').fadeOut();
                $('tr>td').fadeOut();
                var parseID = JSON.parse(success);
                // alert(parseID[0].folder_name);
                for (var i = parseID.length-1; i >=0; i--) {
                var array=parseID[i].filename.split(',');
                
                $('table').append("<tr><td>"+ parseID[i].payment_terms_id+"</td><td>"+ parseID[i].description+"</td><td>"+ parseID[i].percentage+"</td><td>"+ parseID[i].date_collected+"</td><td>"+ parseID[i].date_billed+"</td><td>"+ parseID[i].qb_ref_no+"</td><td>Invoice Copy:<a href ="+"uploads/"+parseID[i].folder_name+"/"+array[0]+">"+ array[0]+"</a><br>Check Copy:<a href ="+"uploads/"+parseID[i].folder_name+"/"+array[1]+">"+array[1]+"</a><br>Deposit Slip:<a href ="+"uploads/"+parseID[i].folder_name+"/"+array[2]+">"+array[2]+"</a></td></tr>");
                $('.quotationSel').append("<option selected value="+parseID[i].project_name+">"+parseID[i].project_name+"</option>");
                }
            }
            });
            var val=  $('.quotationSel').val();
        // $.ajax({
        //     type:'GET',
        //     url:'Bills/reg',
        //     data:{'val':val},
        //     dataType:'html',
        //     success:function(success){
               
        //        alert(success);
                 
        //     }
        // });
    });
     // $('.quotationSel').click(function(){
     //    var val=  $('.quotationSel').val();
     //    $.ajax({
     //        type:'GET',
     //        url:'Bills/reg',
     //        data:{'val':val},
     //        dataType:'html',
     //        success:function(success){
     //            alert(success);
     //        }
     //    });
     // });
    // delete client
    $('.delete_client').click(function(){
        var _d = $(this).attr('mAtt');
        var answer = confirm('Are you sure you want to delete this data?');
        if (answer)
        {
        $.ajax({
            type:'GET',
            url:'Clients_List/delItem',
            data:{_d:_d},
            success:function(success)
            {
                if(success==1)
                {   
                     setTimeout(function(){ location.reload(); },1000);
                    // alert(nme+ " successfully updated.");
                    $('.message').html(" Successful deletion.");
                }else{
                    $('.message').html("Can't Delete ");
                }
            }
        });

        }
        
    });
});

$('.click').click(function(){

   alert($('.proposals_id').val());

});
$('.date').datepicker({
});
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $("#add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="wrapThis'+x+'"><div class="form-group col-lg-3 pull-left"><input type="text" name="mypercent[]" placeholder="%"class="form-control"></div><div class="space"></div><div class="form-group col-lg-6 pull-left"><input type="text" placeholder="Description"name="mydescription[]" class="form-control"></div><div class="space"></div><div class="form-group  pull-left">Ex Deal<br><input type="checkbox" checked name="myexdeal[]"  onClick="check();" class="exdeal" value="1"><div class="pull-right" style="margin-left:-97%!important"><button  class="remove_field btn btn-danger" id="rem" value="'+x+'" onClick="lol();">Remove</button></div><div class="form-group  pull-left"><br><input type="hidden" checked  name="exdeal[]" value="1"><div class="pull-right"></div></div></div>'); //add input box
        }
    });
});
$('#vat').click(function(){
    if($('#vat').val()!=1){
        $('#vat').val(1);
    }else{
        $('#vat').val(0);
    }
    // alert("$('.exdeal').val(1);");
});
function check(source) {
  checkboxes = document.getElementsByName('myexdeal[]');
  input = document.getElementsByName('exdeal[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
        if(checkboxes[i].checked ){
            $(input[i]).val(1);
        }else{
            $(input[i]).val(0);
        }
  }
}
$('.quotationSel').on('click',function(){
        var quotation= $('.quotationSel').val();
            $.ajax({
               type:'GET',
               url:'Bills/quotation',
               data:{'quotation':quotation},
               dataType:'html',
               success:function(success)
               {
                // alert(success);
                var parseID = JSON.parse(success);
                 $('.percent').val(parseID[0].percentage);     
                 $('.exDeal').val(parseID[0].ex_deal>0?"yes":"no");     
                 $('.description').html(parseID[0].description);   
                 $('.payment_terms_id').val(parseID[0].payment_terms_id);
            }
            });
    });