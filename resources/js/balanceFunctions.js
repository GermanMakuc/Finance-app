import $ from 'jquery';
window.$ = window.jQuery = $;

$(window).on('load', function () {

    $("#selectMonth").on('change', function(e){
        e.preventDefault();

        let select = $(this);
        let incomeTotal = $('#incomeTotal');
        let expenseTotal = $('#expenseTotal');
        let balanceTotal = $('#balanceTotal');
        let stateTotal = $('#stateTotal');

        $.ajax({

            url: 'balance/'+select.val(),
            type: 'get',

            beforeSend: function() {
                select.attr('disabled',true);
                $(".loading").append('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');
            },
            success: function(data) {
                incomeTotal.text('$' + data.incomes);
                expenseTotal.text('$' + data.expenses);
                balanceTotal.text('$' + data.balance);
                stateTotal.text(data.state);
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            },
            complete: function() {
                select.attr('disabled',false);
                $(".spinner-border").remove();
            }
            }); // end ajax


    });

});
