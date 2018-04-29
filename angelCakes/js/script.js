
$(function(){
    // $(".show").show();

$(window).load(function(){
   
  //========================================================
  // Adds the active class to selected Pokemon
  //========================================================
    function changeActive() {
    var nav = $(".btnNav");
  
    nav.click(function(){
    nav.removeClass("active");
     $(this).addClass("active");
   });
  }
 
 //========================================================
 // Sets up scrolling functionality for next/prev buttons
 //========================================================
  function setScroll() {
        $(document).on("click", "#prevThumb", function() {
            var leftPos = $("#productWrapper").scrollLeft();

            if ($("#productWrapper").scrollLeft() > "0") {
                $("#productWrapper").animate({scrollLeft: leftPos - 500}, 300);
            }

            else {
                event.preventDefault();
            }
        });

        $(document).on("click", "#nextThumb", function() {
            var leftPos = $("#productWrapper").scrollLeft();

            if (leftPos < $("#productWrapper")[0].scrollWidth) {
                $("#productWrapper").animate({scrollLeft: leftPos + 500}, 300);
            }

            else {
                event.preventDefault();
            }
        });
    }
  

  
  changeActive();
    setScroll();
  
});

        // When a product is clicked, the product is shown in a popup

    $(".product").click(function(){
        var $src = $(this).find('img').attr("src");  
        var $id = $(this).find('.id').text();
        $(".show").fadeIn();

        $.post('processPopUp.php',{id : $id}, function(data){
                $('#descripton').html(data);
              
        });

        $(".imgShow img").attr("src", $src);


    });

    $("span").click(function(){
        
    $(".show").fadeOut();  
    });

    // when btnProceed in cart is clicked the overlay is show up

      $(".btnProceed").click(function(){
      $(".showshipping").fadeIn();  
    });

    $("span").click(function(){        
        $(".showshipping").fadeOut();
        
    });

    $(".btnpayment").click(function(){
        
        $(".showPayment").fadeIn();

    });

    $("span").click(function(){        
        $(".showPayment").fadeOut();
        
    });




    $('#search').keyup(function(){
        var $txt = $(this).val();
        if ($txt !='') {

        }else{
            $('#result').html('');
            $.ajax({
                url: "product.php",
                method: "post",
                data:{search:$txt},
                dataType:"text",
                success:function(data){
                    $('#result').html(data);
                }

            });
        }
    });


    $(".product").click(function(){
        var $src = $(this).find('img').attr("src");  
        var $id = $(this).find('.id').text();
        $(".show").fadeIn();

        $.post('processPopUp.php',{id : $id}, function(data){
                $('#descripton').html(data);
              
        });

        $(".imgShow img").attr("src", $src);


    });

    
    $(".featureImg").click(function(){
        var $src = $(this).find('img').attr("src");  
        var $id = $(this).find('.id').text();
        
        $(".show").fadeIn();
        $("#slider_container").fadeOut();
        $("#promo").fadeOut();

        $.post('popupFeatured.php',{id : $id}, function(data){
                $('#descriptonFeaured').html(data);
              
        });

        $(".imgShow img").attr("src", $src);


    });

    $("span").click(function(){
        
    $(".show").fadeOut(); 
    $("#slider_container").fadeIn();
    $("#promo").fadeIn(); 
    });





});







