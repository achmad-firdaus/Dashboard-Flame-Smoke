console.log(window.location);
function functionNormal(value,value2) {
    $('#table-dashboard').dataTable().fnDestroy();
    $('#table-dashboard').DataTable( {
        // "processing": true,
        // "serverSide": true,
        "ajax": {
            "url": "dashboard/getMonitoring",
            "type": "POST",
            "data":{
                idwidget: value,
                count: value2
            },
        },
        "columns": [
            { "data": "id" },
            { "data": "locations" },
            { "data": "sensor_type" },
            { "data": "date_time" },
            { "data": "status" }
        ],
        "createdRow": function (td, cellData, rowData, row, col) {
            if (cellData.status == "ALARM") {
                $(td).css('background-color', '#ff9797').css('color', '#000000');
            } else if(cellData.status == "TROUBLE") {
                $(td).css('background-color', '#ffe097').css('color', '#000000');
            }
        }
    } );
}
var handler = function () {
	var initialize = function(){
		initTableDashboard();
		initWidget();
    }

    var initWidget = function(){
		$.ajax({
			url: "dashboard/getWidget",
			type: 'POST',
			dataType: 'JSON',
			data:{
			},
			success: function(response){
				$('#id-normal .card-title').html(response.normal);
				$('#id-alarm .card-title').html(response.alarm);
				$('#id-trouble .card-title').html(response.trouble);
				$('#id-totals .card-title').html(response.totals);
			},
			error: function(response){
                bootbox.alert(response.responseText);
			}
		});
	}

	var initTableDashboard = function(){
        $('#table-dashboard').DataTable( {
            // "processing": true,
            // "serverSide": true,
            "ajax": {
                "url": "dashboard/getMonitoring",
                "type": "POST"
            },
            "columns": [
                { "data": "id" },
                { "data": "locations" },
                { "data": "sensor_type" },
                { "data": "date_time" },
                { "data": "status" }
            ],
            "createdRow": function (td, cellData, rowData, row, col) {
                if (cellData.status == "ALARM") {
                    $(td).css('background-color', '#ff9797').css('color', '#000000');
                } else if(cellData.status == "TROUBLE") {
                    $(td).css('background-color', '#ffe097').css('color', '#000000');
                }
            }
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
