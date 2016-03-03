$(function(){

  $('#loginForm').submit(function(){

    $.ajax({
      url : '../../user/connect',
      type : 'POST',
      data : $(this).serialize(),
      success : function(){
        window.location.replace("../../profile");
      },
      error : function(errorData){
        var responseData = JSON.parse(errorData.responseText);
        $('.error').html(responseData.error);
      }

    })

    return false;

  });

  $('#registerForm').submit(function(){

    $.ajax({
      url : '../../user/register',
      type : 'POST',
      data : $(this).serialize(),
      success : function(){
        window.location.replace("../../login");
      },
      error : function(errorData){
        var responseData = JSON.parse(errorData.responseText);
        console.log(responseData);
        var errorDislay = document.getElementById('error');
        errorDislay.innerHTML = '';
        for(var i in responseData){
          errorDislay.innerHTML += responseData[i] + '<br>';
        }

      }

    })

    return false;

  });

  $('#updateUser').submit(function(){

    $.ajax({
      url : '../../profile',
      type : 'POST',
      data : $(this).serialize(),
      success : function(){
        $('#updateUser').html('Informations mises à jour');
        setTimeout(function(){
          window.location.reload();
        }, 5000);
      },
      error : function(){
        console.error('Update error');
      }
    })

    return false;

  })

  $('#disconnect').click(function(){

    $.ajax({
      url : '../../user/disconnect',
      type : 'GET',
      success : function(){
        window.location.replace('../../login');
      },
      error : function(){
        console.error('Cannot disconnect');
      }
    })

  })

});
