$(function(){



    $('#newPost').submit(function(){

      var form = new FormData();
      form.append("title", $('#title').val());
      form.append("content", $('#contenu p').text());
      form.append("post_cover", document.getElementById('file').files[0]);
      $.ajax({
        url : '../../post/new',
        type : 'POST',
        data : form,
        mimeType : "multipart/form-data",
        contentType: false,
        processData: false,
        success : function(responseData){
          $('#newPost').fadeOut();
          var serverMessage = JSON.parse(responseData);
          $('.formdiv').html(serverMessage.message);
        },
        error : function(dataa){
          $('.errors').html(dataa);
        }
      });

      return false;

    });



    $('#editPost').submit(function(){

      var form = new FormData();
      form.append("title", $('#title').val());
      form.append("content", $('#content').val());
      form.append("post_cover", document.getElementById('file').files[0]);
      $.ajax({
        url : '../../post/edit/' + document.getElementById('editPost').dataset.postid,
        type : 'POST',
        data : form,
        mimeType : "multipart/form-data",
        contentType: false,
        processData: false,
        success : function(dataa){
          console.log(dataa);
        },
        error : function(dataa){
          console.error(dataa);
        }
      });

      return false;

    });

    $('#newComment').submit(function(){

      $.ajax({
        url : '../../post/comment',
        type : 'POST',
        data : $(this).serialize(),
        success : function(){
          $('#newComment').html('Commentaire posté');
        },
        error : function(){
          $(this).html('Error');
        }
      })

      return false;

    });

})
