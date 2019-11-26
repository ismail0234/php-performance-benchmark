<footer class="text-muted">
  	<div class="container">
	    <p class="float-right">
	      	<a href="#">{$lang.index.uptoHead}</a>
	    </p>
	    <p>{$lang.index.copyright}</p>
	    <p>{$lang.index.suggestion}</p>
  	</div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){

	var PHPBenchmark = {

		queueJobs: new Array(),

		ajaxGonderFunction: function(formid, successFunction, failFunction)
		{

			var formData = formid;
			if(!jQuery.isPlainObject(formid)){
				formData = $(formid).serialize();
			}

			$.ajax({
				type: 'POST',
				url: typeof $(formid).attr('action') == "undefined" ? '{$site.url}Ajax/' + formid.ajax_type : $(formid).attr('action'),
				data: formData,
				timeout: 10000 
			}).done(function(response) {

				if(response.error){
					if (typeof failFunction != "undefined" && failFunction !== null) {
						failFunction(response);
					}
				}else{
					successFunction(response);
				}

			}).fail(function(response) {

				if (typeof failFunction != "undefined" && failFunction !== null) {
					failFunction(response);
				}

			});

		},

		rowFormat: function(name)
		{
			var html = '<div class="col-md-6" id="' + name + '">';
					html += '<div class="media text-muted pt-3">';
						html += '<div class="bg-primary b-capsule rounded mr-2"></div>';
						html += '<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">';
						html += '<strong class="d-block text-gray-dark">' + name + '</strong>';
						html += '<span class="text-muted">' + system.lang.index.benchmarkStartWarning + '</span>';
						html += '</p>';
					html += '</div>';
				html += '</div>';
			return html;
		},

		changeRowStatusProcessing: function(jobType)
		{
			$('#' + jobType + ' span').text(system.lang.index.benchmarkProcessing);
			$('#' + jobType + ' .b-capsule').removeClass('bg-primary bg-success bg-warning bg-danger').addClass('bg-warning');
		},

		changeRowStatusCompleted: function(jobType, data)
		{
			$('#' + jobType + ' span').html(system.lang.index.workDone + ' <span class="text-success font-weight-middle">' + data[jobType].tpsText + '</span>, ' + system.lang.index.workAmountDone + ' <span class="text-success font-weight-middle">' + data[jobType].ott + '</span>');
			$('#' + jobType + ' .b-capsule').removeClass('bg-primary bg-success bg-warning bg-danger').addClass('bg-success');
			$('.completedBenchmark').text($('#benchmarkContainer .bg-success').length);
		},

		changeRowStatusError: function(jobType, msg)
		{
			$('#' + jobType + ' span').html(msg);
			$('#' + jobType + ' .b-capsule').removeClass('bg-primary bg-success bg-warning bg-danger').addClass('bg-danger');
		},

		consumeFinished: function()
		{
			$('#startBenchmark, #benchmarkType').prop('disabled', false);
			return true;
		},

		loadingProcessBenchmark: function()
		{
			$('#benchmarkContainer .media span').text(system.lang.index.benchmarkAddedQueue);
			$('#benchmarkContainer .b-capsule').removeClass('bg-primary bg-success bg-warning bg-danger').addClass('bg-primary');
			$('.completedBenchmark').text(0);
			$('#benchmarkDescriptionTwo').removeClass('d-none');
			$('#benchmarkDescriptionOne').addClass('d-none');
		},

		consumeJobs: function(maxJob)
		{

			if (this.queueJobs.length <= 0) {
				return this.consumeFinished();
			}

			for (var i = 0; i < maxJob; i++) {
				var item = this.queueJobs[0];
				if (typeof item == "undefined") {
					break;
				}

				this.queueJobs.shift();
				this.changeRowStatusProcessing(item.job);

				PHPBenchmark.ajaxGonderFunction({ ajax_type: 'benchmark', job: item.job, type: item.type }, function(response){
					PHPBenchmark.changeRowStatusCompleted(response.job, response.data);
					PHPBenchmark.consumeJobs(1);
				}, function(response){
					PHPBenchmark.changeRowStatusError(response.job, response.msg);
					PHPBenchmark.consumeJobs(1);
				});

			}

		},

		listenSelectType: function()
		{

			$('#benchmarkType').change(function(){

				PHPBenchmark.ajaxGonderFunction({ ajax_type: 'benchmarkList', benchmark: $(this).val() }, function(response){
					
					$('#benchmarkContainer').empty();
					for (var index in response.data) {
						$('#benchmarkContainer').append(PHPBenchmark.rowFormat(response.data[index]));
					}

					$('#benchmarkName').text($('#benchmarkType option:selected').data('value'));
					$('.maxBenchmarkNumber').text(response.data.length);
					$('#benchmarkDescriptionTwo').addClass('d-none');
					$('#benchmarkDescriptionOne').removeClass('d-none');

				}, function(response){
					alert(response.msg);
				});

			});

		},

		listenStart()
		{

			$('#startBenchmark').click(function(){

				PHPBenchmark.loadingProcessBenchmark();
				$('#startBenchmark, #benchmarkType').prop('disabled', true);

				$('#benchmarkContainer .media').each(function(){
					PHPBenchmark.queueJobs.push({
						job: $(this).find('strong').text(),
						type: $('#benchmarkType').val()
					});
				});

				PHPBenchmark.consumeJobs(1);
			});

			$('#benchmarkType').change();
		}

	};

	PHPBenchmark.listenSelectType();
	PHPBenchmark.listenStart();

});
</script>