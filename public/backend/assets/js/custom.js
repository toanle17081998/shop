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