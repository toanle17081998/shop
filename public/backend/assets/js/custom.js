$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url){
    if(confirm('Bạn có muốn xóa menu này không?')){
        $.ajax({
            type: 'DELETE',
            dataType: 'json',
            data: {id: id},
            url: url,
            success: function(result){
                if(result.error===false){
                    alert('Xoá thành công')
                    location.reload()
                }else{
                    alert('Xoá lỗi')
                }

            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
            }
        });
    }
}


//UploadImage
$('.uploadfile').change(function(){
    const form = new FormData()
    form.append('file',$(this)[0].files[0])
    console.log(form.get('file'))

    $.ajax({
        processData:false,
        contentType:false,
        type: 'POST',
        dataType: 'json',
        data:form,
        url:'/admin/upload/sevices',
        success: function(results){
            if(results.error == false){
                $('.image_show').html('<a href="'+ results.url +'" target="_blank"><img src="'+ results.url +'" width="100px"></a>')
                $('#fileImg').val(results.url)
            }else{
                alert('Có lỗi khi tải ảnh lên !')
            }
        }
    })
})