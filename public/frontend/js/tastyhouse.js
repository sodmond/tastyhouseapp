function getSubCategories(cat_url, level) {
    $.ajax({
        type: 'GET',
        url: cat_url,
        success: function(data) {
            if ($.isEmptyObject(data.error)) {
                result = '<option value="">- - - Select - - -</option>';
                data.categories.forEach(element => {
                    result += '<option value="' + element.id + '">' + element.title + '</option>';
                });
                console.log(result);
                $('#category'+level).html(result)
            }
        }
    });
}