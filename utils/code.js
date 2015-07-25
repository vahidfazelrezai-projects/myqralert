function runCode() {

	var qrcode = new QRCode(document.getElementById("qrcode"), {
	    width : 300,
	    height : 300
	});

    value = window.location.href;
    qrcode.makeCode(value);

}