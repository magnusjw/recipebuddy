<?php
/**
 * Created by PhpStorm.
 * User: Tyannah Anderson
 * Date: 18/11/2018
 * Time: 16:34
 */
 
 <section>
	<input type="radio" name="controls" id="start">
	<input type="radio" name="controls" id="stop">
	<input type="radio" name="controls" id="reset">
	<div class="stopwatch">
		<div class="cell">
			<span class="num ten ten_hour">0 1 2 3 4 5 6 7 8 9</span>
		</div>
		<div class="cell">
			<span class="num ten hour">0 1 2 3 4 5 6 7 8 9</span>
		</div>
		<div class="cell">
			<span class="num">:</span>
		</div>
		<div class="cell">
			<span class="num sex ten_minu">0 1 2 3 4 5</span>
		</div>
		<div class="cell">
			<span class="num ten minu">0 1 2 3 4 5 6 7 8 9</span>
		</div>
		<div class="cell">
			<span class="num">:</span>
		</div>
		<div class="cell">
			<span class="num sex ten_sec">0 1 2 3 4 5</span>
		</div>
		<div class="cell">
			<span class="num ten sec">0 1 2 3 4 5 6 7 8 9</span>
		</div>
		<div class="cell">
			<span class="num">:</span>
		</div>
		<div class="cell">
			<span class="num ten hund_mill">0 1 2 3 4 5 6 7 8 9</span>
		</div>
		<div class="cell">
			<span class="num ten ten_mill">0 1 2 3 4 5 6 7 8 9</span>
		</div>
		<div class="cell">
			<span class="num ten mill">0 1 2 3 4 5 6 7 8 9</span>
		</div>
	</div>
	<div class="control">
		<label for="start">Start</label>
		<label for="stop">Stop</label>
		<label for="reset">Reset</label>
	</div>
</section>
 
	<script src='style.js'></script>
 
	<script>
		if (document.location.search.match(/type=embed/gi)) {
		  window.parent.postMessage('resize', "*");
		}
	</script>