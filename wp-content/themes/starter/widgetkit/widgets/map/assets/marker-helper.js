var MapsMarkerHelper = {
	colors: {
		black: [0, 0, 0, 1],
		blue: [0, 0, 255, 1],
		brown: [165, 42, 42, 1],
		cyan: [0, 255, 255, 1],
		fuchsia: [255, 0, 255, 1],
		gold: [255, 215, 0, 1],
		green: [0, 128, 0, 1],
		indigo: [75, 0, 130, 1],
		khaki: [240, 230, 140, 1],
		lime: [0, 255, 0, 1],
		magenta: [255, 0, 255, 1],
		maroon: [128, 0, 0, 1],
		navy: [0, 0, 128, 1],
		olive: [128, 128, 0, 1],
		orange: [255, 165, 0, 1],
		pink: [255, 192, 203, 1],
		purple: [128, 0, 128, 1],
		violet: [128, 0, 128, 1],
		red: [255, 0, 0, 1],
		silver: [192, 192, 192, 1],
		white: [255, 255, 255, 1],
		yellow: [255, 255, 0, 1],
		transparent: [255, 255, 255, 0],
	},
	getSVG: function (e, s) {
		return (
			(e = this.parseColor(e || "#E65857")),
			(s = this.parseColor(s || "rgba(255,255,255,0)")),
			'<?xml version="1.0" encoding="utf-8"?>            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"             width="22px" height="34px" viewBox="0 0 22 34" enable-background="new 0 0 22 34" xml:space="preserve">             <circle id="circle" fill="' +
				s +
				'" cx="11" cy="11" r="6.5"/>            <path id="path" d="M11,0C4.94,0,0,4.876,0,10.9C0,19.458,11,34,11,34s11-14.581,11-23.1C22,4.876,17.061,0,11,0z M11,16.5             c-3.038,0-5.5-2.463-5.5-5.5c0-3.038,2.462-5.5,5.5-5.5c3.037,0,5.5,2.462,5.5,5.5C16.5,14.037,14.037,16.5,11,16.5z" fill="' +
				e +
				'"/>            </svg>'
		);
	},
	parseColor: function (e) {
		var s, a;
		return (
			(a = (s = /#([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})/.exec(e))
				? [parseInt(s[1], 16), parseInt(s[2], 16), parseInt(s[3], 16), 1]
				: (s = /#([0-9a-fA-F])([0-9a-fA-F])([0-9a-fA-F])/.exec(e))
				? [17 * parseInt(s[1], 16), 17 * parseInt(s[2], 16), 17 * parseInt(s[3], 16), 1]
				: (s = /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(e))
				? [parseInt(s[1]), parseInt(s[2]), parseInt(s[3]), 1]
				: (s = /rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9\.]*)\s*\)/.exec(e))
				? [parseInt(s[1], 10), parseInt(s[2], 10), parseInt(s[3], 10), parseFloat(s[4])]
				: this.colors[e] || [230, 88, 87, 1]),
			"rgba(" + a[0] + ", " + a[1] + ", " + a[2] + ", " + a[3] + ")"
		);
	},
	setIcon: function (e, s) {
		var a,
			r = new google.maps.Point(11, 40),
			t = function () {
				e.setIcon({ url: a, anchor: r });
			};
		if (!s.trim()) return (a = "https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png"), t();
		if (s.indexOf("/") != -1) {
			var n = new Image();
			(n.onload = function () {
				(a = n.src), (r = new google.maps.Point(Math.ceil(n.width / 2), n.height)), t();
			}),
				(n.onerror = function () {
					return (a = "https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png"), t();
				}),
				(n.src = s);
		} else (a = "data:image/svg+xml;base64," + btoa(this.getSVG.apply(this, s.split(" ")))), (r = new google.maps.Point(11, 34)), t();
	},
};