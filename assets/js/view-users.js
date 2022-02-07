var handler = function () {
	var initialize = function(){
		initTableDashboard();
    }

	var initTableDashboard = function(){
        $('#table-users').DataTable( {
            // "processing": true,
            // "serverSide": true,
            "ajax": {
                "url": "users/getUserss",
                "type": "POST"
            },
            "columns": [
                { "data": "id" },
                { "data": "first_name" },
                { "data": "last_name" },
                { "data": "username" },
                { "data": "roles" },
                { "data": "action" }
            ]
        } );
	}

    return {

        init: function () {
			initialize();
        }

    };
}();
 
jQuery(document).ready(function() {
    handler.init();
});
