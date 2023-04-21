import $ from 'jquery';
window.$ = window.jQuery = $;

$(window).on('load', function () {

    $("#selectMonth").on('change', function(e){
        e.preventDefault();

        let selectValue = $(this).val();
        let incomeTotal = $('#incomeTotal');
        let expenseTotal = $('#expenseTotal');
        let balanceTotal = $('#balanceTotal');
        let stateTotal = $('#stateTotal');

        $.ajax({

            url: 'balance/'+selectValue,
            type: 'get',
            data: {
                'month' : selectValue
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
            }
            }); // end ajax


    });

});
