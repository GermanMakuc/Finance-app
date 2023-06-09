import $ from 'jquery';
window.$ = window.jQuery = $;

import Swal from 'sweetalert2';

$(window).on('load', function () {

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
      });

      const confirmToast = Swal.mixin({
        showCancelButton: true,
        confirmButtonText: 'Borrar',
        cancelButtonText: 'Cancelar',
        reverseButtons: false
      });

      /*
      function reloadPrices()
      {
        let sumIncome = 0;
        $(".amountIncome").each(function(){
            let price = $(this).text();
            price = price.slice(1);
            price = parseInt(price);
            sumIncome += price;
        });

        $('#calculateIncome').text(sumIncome);
      }
      */

    $("button[name=deleteIncome]").on('click', function(e){
        e.preventDefault();

        let button = $(this);
        let id = button.attr("data-id");
        let token = $("input[name=_token]");

        confirmToast.fire({
            title: '¿Estás seguro?',
            text: "Sí lo borras, no podrás recuperarlo de nuevo",
            icon: 'warning',
          }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: 'income/delete/'+id,
                    type: 'post',
                    data: {
                        '_token' : token.val(),
                        'id' : id
                    },

                    success: function(data) {
                      if(data.state)
                      {

                        Toast.fire(
                            'Borrado',
                            data.message,
                            'success'
                        );
                      }

                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        console.log(err.Message);
                    },
                    complete: function() {
                        button.closest('tr').remove();
                    }
                  }); // end ajax

            }
          })

    });

    $("#updateIncome").on('submit', function (e) {
        e.preventDefault();

        let url = $(this).attr("action");
        let btnSubmit = $("input[name=btnUpdateIncome]");
        let amount = $("input[name=amount]");
        let amount_date = $("input[name=amount_date]");
        let token = $("input[name=_token]");
        //let formData = new FormData(this);

        $.ajax({

            url: url,
            type: 'post',
            data: {
                '_token' : token.val(),
                'amount' : amount.val(),
                'amount_date' : amount_date.val()
            },

            beforeSend: function() {
                btnSubmit.attr("disabled", true);
            },
            success: function(data) {

              if(data.state)
              {
                Toast.fire({
                  icon: 'success',
                  title: data.message,
                });

                amount.val('');
                amount_date.val('');

              }
              else
              {
                Toast.fire({
                  icon: 'error',
                  title: data.message,
                });
              }

            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            },
            complete: function() {
                btnSubmit.attr("disabled", false);
            }
          }); // end ajax

    });


    $("#addIncome").on('submit', function (e) {
        e.preventDefault();

        let url = $(this).attr("action");
        let btnSubmit = $("input[name=btnAddIncome]");
        let amount = $("input[name=amount]");
        let amount_date = $("input[name=amount_date]");
        let token = $("input[name=_token]");
        //let formData = new FormData(this);

        $.ajax({

            url: url,
            type: 'post',
            data: {
                '_token' : token.val(),
                'amount' : amount.val(),
                'amount_date' : amount_date.val()
            },

            beforeSend: function() {
                btnSubmit.attr("disabled", true);
            },
            success: function(data) {

              if(data.state)
              {
                Toast.fire({
                  icon: 'success',
                  title: data.message,
                });

                amount.val('');
                amount_date.val('');
              }
              else
              {
                Toast.fire({
                  icon: 'error',
                  title: data.message,
                });
              }

            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            },
            complete: function() {
                btnSubmit.attr("disabled", false);
            }
          }); // end ajax

    });

});
