var r = jQuery.noConflict();
r(document).ready(function($) {
	//GET THE VALUES FROM THE HIDDEN FIELD
	json_vals = $(".units").val();
	rates = JSON.parse(json_vals);
	$(".form-item-amount input").keyup(function(){
		amount = $(".form-item-amount input").val();
		from = $(".form-item-convert-from select").val();
		to = $(".form-item-convert-to select").val();
		calc = bom_convert_currency(amount, from, to);
		$("#currency-result span").text(calc);
	});
	$(".form-item-convert-from select").change(function(){
		amount = $(".form-item-amount input").val();
		from = $(".form-item-convert-from select").val();
		to = $(".form-item-convert-to select").val();
		calc = bom_convert_currency(amount, from, to);
		$("#currency-result span").text(calc);
	});
	$(".form-item-convert-to select").change(function(){
		amount = $(".form-item-amount input").val();
		from = $(".form-item-convert-from select").val();
		to = $(".form-item-convert-to select").val();
		calc = bom_convert_currency(amount, from, to);
		$("#currency-result span").text(calc);
	});
	$( document ).ajaxComplete(function( event,request, settings ) {
		$(".form-item-amount input").focus();
	});
});
function bom_convert_currency(amount, from, to){
	calc = "";
	if(from == to){
		calc = amount;
	}
	else if(from == "MUR"){
		factor = rates[to];
		if(to == "JPY"){
			amount = amount * 100;
		}
		calc = amount / factor;
		calc = calc.toFixed(2);
	}
	else if(to == "MUR"){
		factor = rates[from];
		if(from == "JPY"){
			factor = factor / 100;
		}
		calc = amount * factor;
		calc = calc.toFixed(2);
	}
	else{
		factor = rates[from] / rates[to];
		if(to == "JPY"){
			factor = factor * 100;
		}
		if(from == "JPY"){
			factor = factor / 100;
		}
		calc = amount * factor;
		calc = calc.toFixed(2);
	}
	return calc;
}