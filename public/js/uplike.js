$('.uplike').click(function(e){
    var token = $('meta[name="csrf-token"]').attr('content');
    var slug = $('.slug').val();
    var options = {
        dataType: 'json',
        url: '/like',
        method: 'POST',
        data: {
            slug: slug,
            _token: token,
        },

        success:function(response){
            if (response.likes_count)
            {
                $('.uplike').html('<i class="fas fa-thumbs-up" aria-hidden="true"></i> ' + response.likes_count);
            }
            console.log(response.likes_count);
        },

        error:function(){
            window.location.href = '/login';
        }
    }
    
    e.preventDefault();
    $.ajax(options);
});