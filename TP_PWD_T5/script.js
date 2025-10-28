// $(document).ready(function(){
//     $('#tombol').on('change',function(){
//         if($(this).is(':checked')){
//             $('#Password').attr('type','text');
//         }else{
//              $("#Password").attr('type', 'password');
//         }
//     })
// })

$(document).ready(function(){
    $('#tombol').on('change',function(){
        if($(this).is(':checked')){
            $('#Password').attr('type','text');
        }else{
            $('#Password').attr('type','password');
        }
    })
})