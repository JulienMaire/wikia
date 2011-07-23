var Geo = {
	cookieName : 'Geo',
	geoData : ''
}

Geo.getGeoData = function () {
	if (Geo.geoData == '') {
		var jsonData = $.cookies.get(Geo.cookieName);
		Geo.geoData = JSON.parse(jsonData);
	}
	return Geo.geoData;
}

