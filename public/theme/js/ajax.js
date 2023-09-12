// LOGIN FORM

$("#loginform").on('submit',function(e){
    e.preventDefault();
    $('button.submit-btn').prop('disabled',true);
    $('.alert-info').show();
    $('.alert-info p').html($('#authdata').val());
        $.ajax({
         method:"POST",
         url:$(this).prop('action'),
         data:new FormData(this),
         dataType:'JSON',
         contentType: false,
         cache: false,
         processData: false,
         success:function(data)
         {
            if ((data.errors)) {
            $('.alert-success').hide();
            $('.alert-info').hide();
            $('.alert-danger').show();
            $('.alert-danger ul').html('');
              for(var error in data.errors)
              {
                $('.alert-danger').html(data.errors[error]);
              }
            }
            else
            {
              $('.alert-info').hide();
              $('.alert-danger').hide();
              $('.alert-success').show();
              $('.alert-success').html('Success !');
              window.location = data;
            }
            $('button.submit-btn').prop('disabled',false);
         }
  
        });
  
  });
  
  
  // LOGIN FORM ENDS
  
  
  // FORGOT FORM
  
  $("#forgotform").on('submit',function(e){
    e.preventDefault();
    $('button.submit-btn').prop('disabled',true);
    $('.alert-info').show();
    $('.alert-info p').html($('#authdata').val());
        $.ajax({
         method:"POST",
         url:$(this).prop('action'),
         data:new FormData(this),
         dataType:'JSON',
         contentType: false,
         cache: false,
         processData: false,
         success:function(data)
         {
            if ((data.errors)) {
            $('.alert-success').hide();
            $('.alert-info').hide();
            $('.alert-danger').show();
            $('.alert-danger ul').html('');
              for(var error in data.errors)
              {
                $('.alert-danger p').html(data.errors[error]);
              }
            }
            else
            {
              $('.alert-info').hide();
              $('.alert-danger').hide();
              $('.alert-success').show();
              $('.alert-success p').html(data);
              $('input[type=email]').val('');
            }
            $('button.submit-btn').prop('disabled',false);
         }
  
        });
  
  });
  