$(document).ready(function(){

    /********Filteration*******/
    var minPrice = parseInt($('#hidden_minimum_price').val());
    var maxPrice = parseInt($('#hidden_maximum_price').val());

    filter_data();

    function filter_data()
    {
        
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var cat = get_filter('cat');
        var search = $('#search').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/filter",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, cat:cat,search:search},
            success:function(data){
                
                $('.filter_data').html(data);
                
                $(".cartForm").on('submit',function(e){
                    e.preventDefault();
                    product_id = $(this).find('#product_id').val();
                    product_qty = $(this).find('#product_qty').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "/addToCart",
                        type:"get",
                        data:{
                          "_token": "{{ csrf_token() }}",
                          product_id:product_id,
                          product_qty:product_qty,
                        },
                        success:function(response){
                            $('.cart-data').append(response);

                            $('.cart-data').on('click', '.itemDelete', function() {
                                $(this).closest('li').remove();
                            });
                        },
                    });
                    
                });
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min: minPrice,
        max: maxPrice,
        values:[minPrice, maxPrice],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0]+ ' EGP' + ' - ' + ui.values[1]+' EGP');
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

    $('#search').keyup(function(){
        filter_data();
    });



    /*********Add To Cart*********/
    
    
});

$(document).ready(function(){
    
});