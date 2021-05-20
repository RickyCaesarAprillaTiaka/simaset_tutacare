
$(document).ready(function(){

  var info_status = $('.info-status');
  var $_token_status = $('#token-status').val();

  $("#add-status").click(function(){
    $('#modalStatus').modal('show');
  });

    $(".save-status").click(function() {
      var status = $("#status").val();
      $.ajax({
          type: "POST",
          url: "/dashboard/asset/add-status/store",
          data: {name: status, _token : $_token_status},
          dataType: 'json',
          success: function(data) {
                info_status.hide().find('ul').empty();

                if(data.success == false)
                {
                    //console.log(url);
                    $.each(data.errors, function(index, error) {
                        info_status.find('ul').append('<li>'+error+'</li>');
                    });

                    info_status.slideDown();
                    info_status.fadeTo(2000, 500).slideUp(500, function(){
                       info_status.hide().find('ul').empty();
                    });
                }
                else
                {
                //$("#select-status").append('<option value="'+ data.data.id +'">' + data.data.name + '</option>');
                $('#select-status option:first').before($('<option>', {
                    value: data.data.id,
                    text: data.data.name
                }));
                $("#select-status").val(data.data.id);
                $('#modalStatus').modal('hide');
                }
          }
      });
    });

});
