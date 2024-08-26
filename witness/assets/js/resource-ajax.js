(function ($) {
    "use strict";

    $(document).ready(function() {
        $('.tax_topic').on('change', function() {
          $('.tax_topic').not(this).prop('checked', false);
        });
        $('.tax_cat').on('change', function() {
            $('.tax_cat').not(this).prop('checked', false);
          });
    });
    
        // Get the Selected Topic
        function getSelectedTopic(){
            return $('.tax_topic:checked').val();
            // return topic_name;
        }

        // Get the Selected Cat
        function getSelectedCat(){
            let cat_name = [];
            $('.tax_cat:checked').each(function(){
                cat_name.push($(this).val());
            });
            return cat_name;
        }

        // Get the Selected recourse
        function getSelectedRes(){
            let res = $('.resource-area').data('selected-resource');
            
            return res;
        }
       
        // call the ajax on change checkbox of filter
        $(document).on('keyup','.res_search', function(e){
            $.ajax({
                type: "POST",
                url: rec_ajax.url,
                data : {
                    action: "resource_filter_callback", 
                    nonce : rec_ajax.nonce,
                    f_topic : getSelectedTopic,
                    f_cat : getSelectedCat,
                    search: $('.res_search').val(),
                    selected_res: getSelectedRes
                },
                beforeSend: function() {
                    $('.filter-loader').show();
                },
                success: function (res) {
                    console.log($('.res_search').val())
                    $('.filter-loader').hide();

                    if(res.max_num_page == 1 ){
                        $('#load_more_').hide();
                        
                    }else if(res.max_num_page == 0){
                        $('#load_more_').html('Load More');
                        $('#load_more_').removeAttr('disabled', '');
                    }
                    else{
                        $('#load_more_').show();
                    }

                    var content_wrapper = $('.resource-content');
                    if($.trim(res.posts)){
                        content_wrapper.html(res.posts);
                        $('#load_more_').html('Load More');
                        $('#load_more_').removeAttr('disabled', '');
                   }else{
                    content_wrapper.html('<div class="no-content-res" ><p>No Resources Found.</p></div>');
                        $('#load_more_').hide();
                   }
                    
                }
            });
        });

        $(document).on('change','.filter_class', function(e){
            $.ajax({
                type: "POST",
                url: rec_ajax.url,
                data : {
                    action: "resource_filter_callback", 
                    nonce : rec_ajax.nonce,
                    f_topic : getSelectedTopic,
                    f_cat : getSelectedCat,
                    selected_res: getSelectedRes
                },
                beforeSend: function() {
                    $('.filter-loader').show();
                },
                success: function (res) {
                    $('.filter-loader').hide();

                    if(res.max_num_page == 1 ){
                        $('#load_more_').hide();
                        
                    }else if(res.max_num_page == 0){
                        $('#load_more_').html('Load More');
                        $('#load_more_').removeAttr('disabled', '');
                    }
                    else{
                        $('#load_more_').show();
                    }

                    var content_wrapper = $('.resource-content');
                    if($.trim(res.posts)){
                        content_wrapper.html(res.posts);
                        $('#load_more_').html('Load More');
                        $('#load_more_').removeAttr('disabled', '');
                   }else{
                    content_wrapper.html('<div class="no-content-res" ><p>No Resources Found.</p></div>');
                        $('#load_more_').hide();
                   }
                    
                }
            });
        });

        let page = 2
        let res_max_page = $('#load_more_').data('res-max-page');
        if(res_max_page == 1){
            $('#load_more_').hide();
        }
        $(document).on('click', '#load_more_', function(event){
            event.preventDefault();


            if($(this).data('res-max-page') > 1){
                let new_max_page = parseInt($(this).data('res-max-page')) -1;
                $(this).data('res-max-page', new_max_page);
                $(this).attr('data-res-max-page', new_max_page);
            }
            
            $.ajax({
                type: 'post',
                url: rec_ajax.url,
                data: {
                    action: "resource_filter_callback",
                    nonce :  rec_ajax.nonce,
                    page : page,
                    f_topic : getSelectedTopic,
                    f_cat : getSelectedCat,
                    selected_res: getSelectedRes
                },
                success: function (result) {
                   if($.trim(result.posts)){

                    var content_wrapper = $('.resource-content');
  
                    content_wrapper+=content_wrapper.append(result.posts);
                    page++

                   }else if(!$.trim(result.posts)){
                    $('#load_more_').html('Nothing to show');
                    $('#load_more_').attr('disabled', 'disabled');

                   }
                }
            });
        });

}(jQuery)); 