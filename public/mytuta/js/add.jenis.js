
$(document).ready(function(){

  var info_jenis = $('.info-jenis');
  var $_token_jenis = $('#token-jenis').val();

  $("#add-jenis").click(function(){
    $('#modalJenis').modal('show');
  });

    $(".save-jenis").click(function() {
      var jenis = $("#jenis").val();
      $.ajax({
          type: "POST",
          url: "add-jenis/store",
          data: {name: jenis, _token : $_token_jenis},
          dataType: 'json',
          success: function(data) {
                info_jenis.hide().find('ul').empty();

                if(data.success == false)
                {
                    //console.log(url);
                    $.each(data.errors, function(index, error) {
                        info_jenis.find('ul').append('<li>'+error+'</li>');
                    });

                    info_jenis.slideDown();
                    info_jenis.fadeTo(2000, 500).slideUp(500, function(){
                       info_jenis.hide().find('ul').empty();
                    });
                }
                else
                {
                //$("#select-jenis").append('<option value="'+ data.data.id +'">' + data.data.name + '</option>');
                $('#select-jenis option:first').before($('<option>', {
                    value: data.data.id,
                    text: data.data.name
                }));
                $("#select-jenis").val(data.data.id);
                $('#modalJenis').modal('hide');
                }
          }
      });
    });

});
