
$(document).on('click', '.tree-item', function (e) {
    if (e.target !== this) // prevent all jquery preventing
        return;
    var item = $(e.target);
    let id = $(item).attr('category-id');
    $.get(`${window.app.url}/tree/${id}`, (res) => {
        $(document).find(item).find('ul').html(res);
    });
    var icon = $(item).children('i:first');
    icon.remove();
    
})