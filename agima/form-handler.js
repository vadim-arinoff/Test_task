$(document).ready(function() {
    $("form").submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "form.php", 
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                    $("form")[0].reset();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + " - " + error);
                alert("Произошла ошибка при отправке данных. Пожалуйста, попробуйте позже.");
            }
        });
    });
});