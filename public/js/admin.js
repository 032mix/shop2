function changeStatus(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var status = $('#status').val();
    $.post("/admin/order/changeStatus", {id: id, status: status});
}
