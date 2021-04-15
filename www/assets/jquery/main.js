$( document ).ready(function(){
    $( ".add__b" ).click(function(){ 
        $( ".block-input:last" ).clone(true, true).appendTo( ".block-inputs" );
    });

    $( ".del__b" ).click(function(){
        $(this).parents('.block-input').remove();
    });

    $('#add-selected-category').hide(); 

    $(".selected-category").change(function() {   
        if ( $(this).find('option:selected').val() == '0') {
            $('#add-selected-category').show(); 
        }else{
            $('#add-selected-category').hide(); 
        }
    });

    $( ".add__cat" ).click(function(){
        var newOpt = $('.input-add-category').val();
        $('#selected-category').prepend('<option value="'+newOpt+'">'+newOpt+'</option>');
        $('#selected-category option:first').prop('selected', true);
        $('#add-selected-category').hide();  

    });
    


    $('.add-selected-groupe').hide(); 

    $(".selected-groupe").change(function() {   
        if ( $(this).find('option:selected').val() == '0') {
            $('.add-selected-groupe').show(); 
        }else{
            $('.add-selected-groupe').hide(); 
        }
    });

    $( ".add__cat" ).click(function(){
        var newOpt = $('.input-add-groupe').val();
        $('.selected-groupe').prepend('<option value="'+newOpt+'">'+newOpt+'</option>');
        $('.selected-groupe option:first').prop('selected', true);
        $('.add-selected-groupe').hide();  

    });

}); 