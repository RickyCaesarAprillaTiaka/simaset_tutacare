
$(document).ready(function(){

  var info_cabang = $('.info-cabang');
  var $_token_cabang = $('#token-cabang').val();

  $('#add-cabang').click(function(){
    $('#modalCabang').modal('show');
  });

    $(".save-cabang").click(function() {
      var cabang = $("#cabang").val();
      $.ajax({
          type: "POST",
          url: "add-cabang/store",
          data: {name: cabang, _token : $_token_cabang},
          dataType: 'json',
          success: function(data) {
                info_cabang.hide().find('ul').empty();

                if(data.success == false)
                {
                    //console.log(url);
                    $.each(data.errors, function(index, error) {
                        info_cabang.find('ul').append('<li>'+error+'</li>');
                    });

                    info_cabang.slideDown();
                    info_cabang.fadeTo(2000, 500).slideUp(500, function(){
                       info_cabang.hide().find('ul').empty();
                    });
                }
                else
                {
                $('#select-cabang option:first').before($('<option>', {
                    value: data.data.id,
                    text: data.data.name
                }));
                $("#select-cabang").val(data.data.id);
                $('#modalCabang').modal('hide');
                }
          }
      });
    });

});
