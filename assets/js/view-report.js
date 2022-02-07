var handler = function () {
	var initialize = function () {
		initTableDashboard();
	}

	var initTableDashboard = function () {

		$('#submit').click(function () {
			var date_start = $('#datestart').val();
			var date_end = $('#dateend').val();
			var status = $('#exampleFormControlSelect1').val();
            $.ajax({
                url: "report/generate_report",
                method: "POST",
                data: $('#generate_report').serialize(),
                beforeSend: function () {
                    $('#response').html('<span class="text-info">Loading response...</span>');
                },
                success: function (data) {
                    $('form').trigger("reset");
                    $('#response').fadeIn().html(data);
                    setTimeout(function () {
                        $('#response').fadeOut("slow");
                    }, 5000);
                }
            });
		});

	}

	return {

		init: function () {
			initialize();
		}

	};
}();

jQuery(document).ready(function () {
	handler.init();
});
