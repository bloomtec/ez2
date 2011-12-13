$(function(){
	BJS = {};

	BJS.get = function(url, params, callback) {
		jQuery.ajax({
			url : url,
			type : "GET",
			cache : false,
			data : params,
			success : callback
		});
	}

	BJS.post = function(url, params, callback) {
		jQuery.ajax({
			url : url,
			type : "POST",
			cache : false,
			data : params,
			success : callback
		});
	}

	BJS.JSON = function(url, params, callback) {
		jQuery.ajax({
			url : url,
			type : "GET",
			cache : false,
			dataType : "json",
			data : params,
			success : callback
		});
	}

	BJS.JSONP = function(url, params, callback) {
		jQuery.ajax({
			url : url,
			type : "POST",
			cache : false,
			dataType : "json",
			data : params,
			success : callback
		});
	}
	BJS.setParam = function(param, value,withUrl) {
		/* añande o modifica un parametro de la forma param:value */
		var url = (typeof(withUrl) == 'undefined' || typeof(withUrl) == null )? document.URL : withUrl;
		var params = url.substring(url.indexOf("/", 0));
		if (params.substring(0, 2) == "//") {
			params = params.substring(params.indexOf("/", 2));
		}
		if (params.slice(-1) != "/") {
			params += "/";
		}
		paramInUrl = params.indexOf(param + ":");// desde donde esta el
		// parametro
		if (paramInUrl >= 0) {
			var indexValue = paramInUrl + param.length + 1/*
															 * incluyo los dos
															 * puntos
															 */;
			var urlTillValue = params.substring(0, indexValue);
			var newValue = params.substring(indexValue, params.indexOf("/",
					paramInUrl));
			var urlAfterValue = params.substring(indexValue + newValue.length);
			return urlTillValue + value + urlAfterValue;
		} else {
			return params + param + ":" + value+'/';
		}
	}
	BJS.removeParam = function(param, withUrl) {
		/* añande o modifica un parametro de la forma param:value */
		var url = (typeof(withUrl) == 'undefined' || typeof(withUrl) == null )? document.URL : withUrl;
		var params = url.substring(url.indexOf("/", 0));
		if (params.substring(0, 2) == "//") {
			params = params.substring(params.indexOf("/", 2));
		}
		
		var initParamInString = params.indexOf(param,0);
		if(initParamInString < 0){
			return params;
		}
		var endParamInString = params.indexOf('/',initParamInString);
		if( endParamInString < 0){
			cosole.log('al final');
			endParamInString = params.length;
		}
		var paramsWithouParam = params.substring(0,initParamInString)+params.substring(endParamInString + 1);
	
		return paramsWithouParam;
	}
	BJS.updateSelect = function($select, $address, $callback){
		$select.html('');
		firstArguments = arguments;
		BJS.JSON($address,{},function(options){
			var count=0;
			var objectSize= BJS.objectSize(options);
			$.each(options,function(i,val){
				$select.append('<option value="'+i+'">'+val+'</option>');
				count += 1;
				if(firstArguments.length == 3 && count ==  objectSize){
					$callback();
				}
				
			});
		});	
	}
	BJS.objectSize = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

});
