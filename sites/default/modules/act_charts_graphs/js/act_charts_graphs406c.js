var j = jQuery.noConflict();
j(document).ready(function($) {
	//Inflation
	var inflation = $("textarea.inflation-graph-data");
	if($(inflation).length == 1){
		var inflation_text = inflation.text();
		json_inflation_options = JSON.stringify(eval("(" + inflation_text + ")"));
		var inflation_obj = JSON.parse(json_inflation_options);
		$('#inflation').highcharts(inflation_obj);
	}
	
	//GET TEXT AREA
	var options = $("textarea.exchange-hp-options");
	if($(options).length == 1){
		var options_text = options.text();
		json_options = JSON.stringify(eval("(" + options_text + ")"));
		var obj = JSON.parse(json_options);
		$('#exchange_hp').highcharts(obj);
	}
	var history_options = $("textarea.exchange-rates-options");
	if($(history_options).length == 1){
		var options_text = history_options.text();
		json_options = JSON.stringify(eval("(" + options_text + ")"));
		var obj = JSON.parse(json_options);
		$('#exchange-rates').highcharts(obj);
	}
	//GET DEALTH RATE
	dealth_rate = $("textarea.dealth-rate-options");
	if($(dealth_rate).length == 1){
		var dealth_rate_text = dealth_rate.text();
		json_dealth_options = JSON.stringify(eval("(" + dealth_rate_text + ")"));
		//console.log(json_dealth_options);
		var dealth_obj = JSON.parse(json_dealth_options);
		$('#dealth_rate_hp').highcharts(dealth_obj);
	}
	//GET GMTB RATE
	gmtb_rate = $("textarea.full-gmtb-options");
	if($(gmtb_rate).length == 1){
		var dealth_rate_text = gmtb_rate.text();
		json_dealth_options = JSON.stringify(eval("(" + dealth_rate_text + ")"));
		//console.log(json_dealth_options);
		var dealth_obj = JSON.parse(json_dealth_options);
		$('#full-gmtb-chart-container').highcharts(dealth_obj);
	}
	//FULL DEALTH RATE
	full_dealth_rate = $("textarea.full-dealth-options");
	if($(full_dealth_rate).length == 1){
		var dealth_rate_text = full_dealth_rate.text();
		json_dealth_options = JSON.stringify(eval("(" + dealth_rate_text + ")"));
		//console.log(json_dealth_options);
		var dealth_obj = JSON.parse(json_dealth_options);
		$('#full-dealth-chart-container').highcharts(dealth_obj);
	}
	//GET PLIBOR
	plibor_rate = $("textarea.plibor-options");
	if($(plibor_rate).length == 1){
		var plibor_rate_text = plibor_rate.text();
		json_plibor_options = JSON.stringify(eval("(" + plibor_rate_text + ")"));
		var plibor_obj = JSON.parse(json_plibor_options);
		$('#plibor-chart-container').highcharts(plibor_obj);
	}
	//GET KEY INDICATORS
	key_indicators_rate = $("textarea.key-indicators-options");
	if($(key_indicators_rate).length == 1){
		var key_indicators_rate_text = key_indicators_rate.text();
		json_key_indicators_rate_options = JSON.stringify(eval("(" + key_indicators_rate_text + ")"));
		var key_indicators_rate_obj = JSON.parse(json_key_indicators_rate_options);
		$('#key-indicators-chart-container').highcharts(key_indicators_rate_obj);
	}
	//GET BANK RATE
	bank_rate = $("textarea.bank-rate-options");
	if($(bank_rate).length == 1){
		var bank_rate_text = bank_rate.text();
		json_bank_rate_options = JSON.stringify(eval("(" + bank_rate_text + ")"));
		var bank_rate_obj = JSON.parse(json_bank_rate_options);
		$('#bank-rate-chart-container').highcharts(bank_rate_obj);
	}
	//GET GOLD COINS
	gold_coins = $("textarea.gold-coins-options");
	if($(gold_coins).length == 1){
		var gold_coins_text = gold_coins.text();
		json_gold_coins_options = JSON.stringify(eval("(" + gold_coins_text + ")"));
		var gold_coins_obj = JSON.parse(json_gold_coins_options);
		$('#gold-coins-chart-container').highcharts(gold_coins_obj);
	}
	//GET INDUSTRIAL GOLD
	industrial_gold = $("textarea.industrial-gold-options");
	if($(industrial_gold).length == 1){
		var industrial_gold_text = industrial_gold.text();
		json_industrial_gold_options = JSON.stringify(eval("(" + industrial_gold_text + ")"));
		var industrial_gold_obj = JSON.parse(json_industrial_gold_options);
		$('#industrial-gold-chart-container').highcharts(industrial_gold_obj);
	}
	$( document ).ajaxComplete(function( event,request, settings ) {
		//GET TEXT AREA
		options = $("textarea.exchange-hp-options");
		if($(options).length == 1){
			var options_text = options.text();
			json_options = JSON.stringify(eval("(" + options_text + ")"));
			var obj = JSON.parse(json_options);
			//console.log(obj);
			$('#exchange_hp').highcharts(obj);
		}
		var history_options = $("textarea.exchange-rates-options");
		if($(history_options).length == 1){
			var options_text = history_options.text();
			json_options = JSON.stringify(eval("(" + options_text + ")"));
			var obj = JSON.parse(json_options);
			$('#exchange-rates').highcharts(obj);
		}
		//GET DEALTH RATE
		dealth_rate = $("textarea.dealth-rate-options");
		if($(dealth_rate).length == 1){
			var dealth_rate_text = dealth_rate.text();
			json_dealth_options = JSON.stringify(eval("(" + dealth_rate_text + ")"));
			var dealth_obj = JSON.parse(json_dealth_options);
			$('#dealth_rate_hp').highcharts(dealth_obj);
		}
		//GET PLIBOR
		plibor_rate = $("textarea.plibor-options");
		if($(plibor_rate).length == 1){
			var plibor_rate_text = plibor_rate.text();
			json_plibor_options = JSON.stringify(eval("(" + plibor_rate_text + ")"));
			var plibor_obj = JSON.parse(json_plibor_options);
			$('#plibor-chart-container').highcharts(plibor_obj);
		}
		//FULL DEALTH RATE
		full_dealth_rate = $("textarea.full-dealth-options");
		if($(full_dealth_rate).length == 1){
			var dealth_rate_text = full_dealth_rate.text();
			json_dealth_options = JSON.stringify(eval("(" + dealth_rate_text + ")"));
			//console.log(json_dealth_options);
			var dealth_obj = JSON.parse(json_dealth_options);
			$('#full-dealth-chart-container').highcharts(dealth_obj);
		}
		//GET GMTB RATE
		gmtb_rate = $("textarea.full-gmtb-options");
		if($(gmtb_rate).length == 1){
			var dealth_rate_text = gmtb_rate.text();
			json_dealth_options = JSON.stringify(eval("(" + dealth_rate_text + ")"));
			//console.log(json_dealth_options);
			var dealth_obj = JSON.parse(json_dealth_options);
			$('#full-gmtb-chart-container').highcharts(dealth_obj);
		}
		//GET PLIBOR
		key_indicators_rate = $("textarea.key-indicators-options");
		if($(key_indicators_rate).length == 1){
			var key_indicators_rate_text = key_indicators_rate.text();
			json_key_indicators_rate_options = JSON.stringify(eval("(" + key_indicators_rate_text + ")"));
			var key_indicators_rate_obj = JSON.parse(json_key_indicators_rate_options);
			$('#key-indicators-chart-container').highcharts(key_indicators_rate_obj);
		}
		//GET BANK RATE
		bank_rate = $("textarea.bank-rate-options");
		if($(bank_rate).length == 1){
			var bank_rate_text = bank_rate.text();
			json_bank_rate_options = JSON.stringify(eval("(" + bank_rate_text + ")"));
			var bank_rate_obj = JSON.parse(json_bank_rate_options);
			$('#bank-rate-chart-container').highcharts(bank_rate_obj);
		}
		//GET GOLD COINS
		gold_coins = $("textarea.gold-coins-options");
		if($(gold_coins).length == 1){
			var gold_coins_text = gold_coins.text();
			json_gold_coins_options = JSON.stringify(eval("(" + gold_coins_text + ")"));
			var gold_coins_obj = JSON.parse(json_gold_coins_options);
			$('#gold-coins-chart-container').highcharts(gold_coins_obj);
		}
		//GET INDUSTRIAL GOLD
		industrial_gold = $("textarea.industrial-gold-options");
		if($(industrial_gold).length == 1){
			var industrial_gold_text = industrial_gold.text();
			json_industrial_gold_options = JSON.stringify(eval("(" + industrial_gold_text + ")"));
			var industrial_gold_obj = JSON.parse(json_industrial_gold_options);
			$('#industrial-gold-chart-container').highcharts(industrial_gold_obj);
		}
	});
});