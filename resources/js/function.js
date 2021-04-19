$(function () {
    $('#delete-btn').on("click", function () {
        let result = window.confirm('削除してもよろしいですか？');
        if (result) {
            $('#delete-btn').submit();
        } else {
            return false;
        }
    });
});
