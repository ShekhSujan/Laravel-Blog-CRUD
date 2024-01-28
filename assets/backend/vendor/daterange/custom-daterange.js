// Daterange
$(function() {
	var start = moment().subtract(29, 'days');
	var end = moment();
	function cb(start, end) {
		$('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
		$('#s').val(start.format('YYYY-MM-DD'));
		$('#e').val(end.format('YYYY-MM-DD'));
	}
	$('#reportrange').daterangepicker({
		opens: 'left',
		startDate: start,
		endDate: end,
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
			'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
			'Next 7 Days': [moment(), moment().add(6, 'days')],
			'Next 30 Days': [moment(), moment().add(29, 'days')],
		}
	}, cb);
	cb(start, end);
});
