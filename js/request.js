// JavaScript Document
var xmlHttp = createXmlHttpRequestObject();
// membuat obyek XMLHttpRequest
function createXmlHttpRequestObject()
{
var xmlHttp;
	// cek untuk browser IE
	if(window.ActiveXObject)
	{
		try
		{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
			catch (e)
		{
			xmlHttp = false;
		}
	}
	// cek untuk browser Firefox atau yang lain
	else
	{
		try
		{
			xmlHttp = new XMLHttpRequest();
		}
		catch (e)
		{
			xmlHttp = false;
		}
	}
	// muncul pesan apabila obyek XMLHttpRequest gagal dibuat
	if (!xmlHttp) alert("Obyek XMLHttpRequest gagal dibuat");
	else
	return xmlHttp;
}


function biayabaru()
{
// akan diproses hanya bila obyek XMLHttpRequest tidak sibuk
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		// mengambil nama dari text box (form)
		document.getElementById("respon_biayabaru").innerHTML = '<input style="text-align:right" type="text"  name="biaya" id="biaya" class="input-xlarge"/>';
		nilai =
		encodeURIComponent(document.getElementById("jenis").value);
		// merequest file cek.php di server secara asynchronous
		xmlHttp.open("GET", "inc/biayabaru.php?kode="+nilai, true);
		// mendefinipikan metode yang dilakukan apabila memperoleh
		// response server
		xmlHttp.onreadystatechange = handleServerResponse_biayabaru;
		// membuat request ke server
		xmlHttp.send(null);
	}
	else
	{
		// Jika server sibuk, request akan dilakukan lagi setelah
		// satu detik
		setTimeout('biayabaru()', 10000);
	}
}

// fungsi untuk metode penanganan response dari server
function handleServerResponse_biayabaru()
{
// jika proses request telah selesai dan menerima respon
	if (xmlHttp.readyState == 4)
	{
	// jika request ke server sukses
		if (xmlHttp.status == 200)
		{
			// mengambil dokumen XML yang diterima dari server
			xmlResponse = xmlHttp.responseXML;
			// memperoleh elemen dokumen (root elemen) dari xml
			xmlDocumentElement = xmlResponse.documentElement;
			// membaca data elemen
			hasil = xmlDocumentElement.firstChild.data;
			// akan mengupdate tampilan halaman web pada elemen bernama
			// respon
			document.getElementById("respon_biayabaru").innerHTML = hasil ;
			
			// request akan dilakukan lagi setelah
			// satu detik (automatic request)
			//setTimeout('caribagian()', 500);
			
		}
		else
		{
			// akan muncul pesan apabila terjadi masalah dalam mengakses
			// server (selain respon 200)
			alert("Terjadi masalah dalam mengakses server " +
			xmlHttp.statusText);
		}
	}
}

function biayareguler()
{
// akan diproses hanya bila obyek XMLHttpRequest tidak sibuk
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		// mengambil nama dari text box (form)
		document.getElementById("respon_biayareguler").innerHTML = '<input style="text-align:right" type="text"  name="biaya" id="biaya" class="input-xlarge" value="wait..."/>';
		nilai =
		encodeURIComponent(document.getElementById("jenis").value);
		// merequest file cek.php di server secara asynchronous
		xmlHttp.open("GET", "inc/biayareguler.php?kode="+nilai, true);
		// mendefinipikan metode yang dilakukan apabila memperoleh
		// response server
		xmlHttp.onreadystatechange = handleServerResponse_biayareguler;
		// membuat request ke server
		xmlHttp.send(null);
	}
	else
	{
		// Jika server sibuk, request akan dilakukan lagi setelah
		// satu detik
		setTimeout('biayareguler()', 10000);
	}
}

// fungsi untuk metode penanganan response dari server
function handleServerResponse_biayareguler()
{
// jika proses request telah selesai dan menerima respon
	if (xmlHttp.readyState == 4)
	{
	// jika request ke server sukses
		if (xmlHttp.status == 200)
		{
			// mengambil dokumen XML yang diterima dari server
			xmlResponse = xmlHttp.responseXML;
			// memperoleh elemen dokumen (root elemen) dari xml
			xmlDocumentElement = xmlResponse.documentElement;
			// membaca data elemen
			hasil = xmlDocumentElement.firstChild.data;
			// akan mengupdate tampilan halaman web pada elemen bernama
			// respon

			document.getElementById("respon_biayareguler").innerHTML = hasil ;
			
			// request akan dilakukan lagi setelah
			// satu detik (automatic request)
			//setTimeout('caribagian()', 500);
			
		}
		else
		{
			// akan muncul pesan apabila terjadi masalah dalam mengakses
			// server (selain respon 200)
			alert("Terjadi masalah dalam mengakses server " +
			xmlHttp.statusText);
		}
	}
}

function normal()
{
// akan diproses hanya bila obyek XMLHttpRequest tidak sibuk
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		// mengambil nama dari text box (form)
		//document.getElementById("footer").innerHTML = 'Wait...';
		// merequest file cek.php di server secara asynchronous
		xmlHttp.open("GET", "inc/normal.php", true);
		// mendefinipikan metode yang dilakukan apabila memperoleh
		// response server
		xmlHttp.onreadystatechange = handleServerResponse_normal;
		// membuat request ke server
		xmlHttp.send(null);
	}
	else
	{
		// Jika server sibuk, request akan dilakukan lagi setelah
		// satu detik
		setTimeout('normal()', 500);
	}
}

// fungsi untuk metode penanganan response dari server
function handleServerResponse_normal()
{
// jika proses request telah selesai dan menerima respon
	if (xmlHttp.readyState == 4)
	{
	// jika request ke server sukses
		if (xmlHttp.status == 200)
		{
			// mengambil dokumen XML yang diterima dari server
			xmlResponse = xmlHttp.responseXML;
			// memperoleh elemen dokumen (root elemen) dari xml
			xmlDocumentElement = xmlResponse.documentElement;
			// membaca data elemen
			hasil = xmlDocumentElement.firstChild.data;
			// akan mengupdate tampilan halaman web pada elemen bernama
			// respon
			document.getElementById("footer").innerHTML = hasil ;
			
			// request akan dilakukan lagi setelah
			// satu detik (automatic request)
			//setTimeout('caribagian()', 500);
			
		}
		else
		{
			// akan muncul pesan apabila terjadi masalah dalam mengakses
			// server (selain respon 200)
			//alert("Terjadi masalah dalam mengakses server " +
			//xmlHttp.statusText);
		}
	}
}

function icon()
{
// akan diproses hanya bila obyek XMLHttpRequest tidak sibuk
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		// mengambil nama dari text box (form)
		document.getElementById("respon_icon").innerHTML = '<span class="btn">Wait...</span>';
		nilai =
		encodeURIComponent(document.getElementById("icon_id").value);
		// merequest file cek.php di server secara asynchronous
		xmlHttp.open("GET", "inc/icons.php?kode="+nilai, true);
		// mendefinipikan metode yang dilakukan apabila memperoleh
		// response server
		xmlHttp.onreadystatechange = handleServerResponse_icon;
		// membuat request ke server
		xmlHttp.send(null);
	}
	else
	{
		// Jika server sibuk, request akan dilakukan lagi setelah
		// satu detik
		setTimeout('icon()', 1000);
	}
}

// fungsi untuk metode penanganan response dari server
function handleServerResponse_icon()
{
// jika proses request telah selesai dan menerima respon
	if (xmlHttp.readyState == 4)
	{
	// jika request ke server sukses
		if (xmlHttp.status == 200)
		{
			// mengambil dokumen XML yang diterima dari server
			xmlResponse = xmlHttp.responseXML;
			// memperoleh elemen dokumen (root elemen) dari xml
			xmlDocumentElement = xmlResponse.documentElement;
			// membaca data elemen
			hasil = xmlDocumentElement.firstChild.data;
			// akan mengupdate tampilan halaman web pada elemen bernama
			// respon
			document.getElementById("respon_icon").innerHTML = hasil ;
			
			// request akan dilakukan lagi setelah
			// satu detik (automatic request)
			//setTimeout('caribagian()', 500);
			
		}
		else
		{
			// akan muncul pesan apabila terjadi masalah dalam mengakses
			// server (selain respon 200)
			//alert("Terjadi masalah dalam mengakses server " +
			//xmlHttp.statusText);
		}
	}
}

function icon2()
{
// akan diproses hanya bila obyek XMLHttpRequest tidak sibuk
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		// mengambil nama dari text box (form)
		document.getElementById("respon_icon2").innerHTML = '<span class="btn">Wait...</span>';
		nilai =
		encodeURIComponent(document.getElementById("jenis_id").value);
		// merequest file cek.php di server secara asynchronous
		xmlHttp.open("GET", "inc/icons2.php?kode="+nilai, true);
		// mendefinipikan metode yang dilakukan apabila memperoleh
		// response server
		xmlHttp.onreadystatechange = handleServerResponse_icon2;
		// membuat request ke server
		xmlHttp.send(null);
	}
	else
	{
		// Jika server sibuk, request akan dilakukan lagi setelah
		// satu detik
		setTimeout('icon2()', 1000);
	}
}

// fungsi untuk metode penanganan response dari server
function handleServerResponse_icon2()
{
// jika proses request telah selesai dan menerima respon
	if (xmlHttp.readyState == 4)
	{
	// jika request ke server sukses
		if (xmlHttp.status == 200)
		{
			// mengambil dokumen XML yang diterima dari server
			xmlResponse = xmlHttp.responseXML;
			// memperoleh elemen dokumen (root elemen) dari xml
			xmlDocumentElement = xmlResponse.documentElement;
			// membaca data elemen
			hasil = xmlDocumentElement.firstChild.data;
			// akan mengupdate tampilan halaman web pada elemen bernama
			// respon
			document.getElementById("respon_icon2").innerHTML = hasil ;
			
			// request akan dilakukan lagi setelah
			// satu detik (automatic request)
			//setTimeout('caribagian()', 500);
			
		}
		else
		{
			// akan muncul pesan apabila terjadi masalah dalam mengakses
			// server (selain respon 200)
			//alert("Terjadi masalah dalam mengakses server " +
			//xmlHttp.statusText);
		}
	}
}

function color()
{
// akan diproses hanya bila obyek XMLHttpRequest tidak sibuk
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		// mengambil nama dari text box (form)
		document.getElementById("respon_color").innerHTML = '<span class="btn">Wait...</span>';
		nilai =
		encodeURIComponent(document.getElementById("warna").value);
		icon =
		encodeURIComponent(document.getElementById("icon_id").value);
		title =
		encodeURIComponent(document.getElementById("title").value);
		
		paket=nilai+'/'+icon+'/'+title;
		// merequest file cek.php di server secara asynchronous
		xmlHttp.open("GET", "inc/color.php?kode="+paket, true);
		// mendefinipikan metode yang dilakukan apabila memperoleh
		// response server
		xmlHttp.onreadystatechange = handleServerResponse_color;
		// membuat request ke server
		xmlHttp.send(null);
	}
	else
	{
		// Jika server sibuk, request akan dilakukan lagi setelah
		// satu detik
		setTimeout('color()', 1000);
	}
}

// fungsi untuk metode penanganan response dari server
function handleServerResponse_color()
{
// jika proses request telah selesai dan menerima respon
	if (xmlHttp.readyState == 4)
	{
	// jika request ke server sukses
		if (xmlHttp.status == 200)
		{
			// mengambil dokumen XML yang diterima dari server
			xmlResponse = xmlHttp.responseXML;
			// memperoleh elemen dokumen (root elemen) dari xml
			xmlDocumentElement = xmlResponse.documentElement;
			// membaca data elemen
			hasil = xmlDocumentElement.firstChild.data;
			// akan mengupdate tampilan halaman web pada elemen bernama
			// respon
			document.getElementById("respon_color").innerHTML = hasil ;
			
			// request akan dilakukan lagi setelah
			// satu detik (automatic request)
			//setTimeout('caribagian()', 500);
			
		}
		else
		{
			// akan muncul pesan apabila terjadi masalah dalam mengakses
			// server (selain respon 200)
			//alert("Terjadi masalah dalam mengakses server " +
			//xmlHttp.statusText);
		}
	}
}

function getcities()
{
// akan diproses hanya bila obyek XMLHttpRequest tidak sibuk
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		// mengambil nama dari text box (form)
		document.getElementById("respon_cities").innerHTML = '<input style="text-align:right" type="text"  name="wait" id="wait" value="wait..."/>';
		
		nilai =
		encodeURIComponent(document.getElementById("provinsi").value);		
		
		
		// merequest file jumlahisi.php di server secara asynchronous
		xmlHttp.open("GET", "inc/cities.php?kode="+nilai, true);
		// mendefinipikan metode yang dilakukan apabila memperoleh
		// response server
		xmlHttp.onreadystatechange = handleServerResponse_cities;
		// membuat request ke server
		xmlHttp.send(null);
	}
	else
	{
		// Jika server sibuk, request akan dilakukan lagi setelah
		// satu detik
		//setTimeout('getcities()', 10000);
	}
}

// fungsi untuk metode penanganan response dari server
function handleServerResponse_cities()
{
// jika proses request telah selesai dan menerima respon
	if (xmlHttp.readyState == 4)
	{
	// jika request ke server sukses
		if (xmlHttp.status == 200)
		{
			// mengambil dokumen XML yang diterima dari server
			xmlResponse = xmlHttp.responseXML;
			// memperoleh elemen dokumen (root elemen) dari xml
			xmlDocumentElement = xmlResponse.documentElement;
			// membaca data elemen
			hasil = xmlDocumentElement.firstChild.data;
			// akan mengupdate tampilan halaman web pada elemen bernama
			// respon
			document.getElementById("respon_cities").innerHTML = hasil ;
			
			// request akan dilakukan lagi setelah
			// satu detik (automatic request)
			//setTimeout('getcities()', 10000);
			
		}
		else
		{
			// akan muncul pesan apabila terjadi masalah dalam mengakses
			// server (selain respon 200)
			alert("Terjadi masalah dalam mengakses server " +
			xmlHttp.statusText);
		}
	}
}

function getbayar()
{
// akan diproses hanya bila obyek XMLHttpRequest tidak sibuk
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		// mengambil nama dari text box (form)
		document.getElementById("respon_bayar").innerHTML = '<input style="text-align:right" type="text"  name="total_biaya" id="total_biaya" value="?" class="input-xmedium"/>';
		
		nilai1 =
		encodeURIComponent(document.getElementById("biaya").value);		
		nilai2 =
		encodeURIComponent(document.getElementById("denda").value);
		nilai3 =
		encodeURIComponent(document.getElementById("biaya_buku_baru").value);		
		nilai4 =
		encodeURIComponent(document.getElementById("biaya_buku_hilang").value);
		
		// merequest file jumlahisi.php di server secara asynchronous
		xmlHttp.open("GET", "inc/bayar.php?kode="+nilai1+'/'+nilai2+'/'+nilai3+'/'+nilai4, true);
		// mendefinipikan metode yang dilakukan apabila memperoleh
		// response server
		xmlHttp.onreadystatechange = handleServerResponse_bayar;
		// membuat request ke server
		xmlHttp.send(null);
	}
	else
	{
		// Jika server sibuk, request akan dilakukan lagi setelah
		// satu detik
		//setTimeout('getcities()', 10000);
	}
}

// fungsi untuk metode penanganan response dari server
function handleServerResponse_bayar()
{
// jika proses request telah selesai dan menerima respon
	if (xmlHttp.readyState == 4)
	{
	// jika request ke server sukses
		if (xmlHttp.status == 200)
		{
			// mengambil dokumen XML yang diterima dari server
			xmlResponse = xmlHttp.responseXML;
			// memperoleh elemen dokumen (root elemen) dari xml
			xmlDocumentElement = xmlResponse.documentElement;
			// membaca data elemen
			hasil = xmlDocumentElement.firstChild.data;
			// akan mengupdate tampilan halaman web pada elemen bernama
			// respon
			document.getElementById("respon_bayar").innerHTML = hasil ;
			
			// request akan dilakukan lagi setelah
			// satu detik (automatic request)
			//setTimeout('getcities()', 10000);
			
		}
		else
		{
			// akan muncul pesan apabila terjadi masalah dalam mengakses
			// server (selain respon 200)
			alert("Terjadi masalah dalam mengakses server " +
			xmlHttp.statusText);
		}
	}
}

function jenis()
{
// akan diproses hanya bila obyek XMLHttpRequest tidak sibuk
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		// mengambil nama dari text box (form)
		document.getElementById("anggi").innerHTML = 'wait..';
		nilai =
		encodeURIComponent(document.getElementById("jenis").value);
		// merequest file cek.php di server secara asynchronous
		xmlHttp.open("GET", "inc/jenis.php?kode="+nilai, true);
		// mendefinipikan metode yang dilakukan apabila memperoleh
		// response server
		xmlHttp.onreadystatechange = handleServerResponse_jenis;
		// membuat request ke server
		xmlHttp.send(null);
	}
	else
	{
		// Jika server sibuk, request akan dilakukan lagi setelah
		// satu detik
		setTimeout('jenis()', 500);
	}
}

// fungsi untuk metode penanganan response dari server
function handleServerResponse_jenis()
{
// jika proses request telah selesai dan menerima respon
	if (xmlHttp.readyState == 4)
	{
	// jika request ke server sukses
		if (xmlHttp.status == 200)
		{
			// mengambil dokumen XML yang diterima dari server
			xmlResponse = xmlHttp.responseXML;
			// memperoleh elemen dokumen (root elemen) dari xml
			xmlDocumentElement = xmlResponse.documentElement;
			// membaca data elemen
			hasil = xmlDocumentElement.firstChild.data;
			// akan mengupdate tampilan halaman web pada elemen bernama
			// respon
			document.getElementById("anggi").innerHTML = hasil ;
			
			// request akan dilakukan lagi setelah
			// satu detik (automatic request)
			//setTimeout('caribagian()', 500);
			
		}
		else
		{
			// akan muncul pesan apabila terjadi masalah dalam mengakses
			// server (selain respon 200)
			alert("Terjadi masalah dalam mengakses server " +
			xmlHttp.statusText);
		}
	}
}

function gettanggalhabis()
{
// akan diproses hanya bila obyek XMLHttpRequest tidak sibuk
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		// mengambil nama dari text box (form)
		document.getElementById("respon_tanggalhabis").innerHTML = '<input type="text"  name="tgl_habis" id="tanggal2" size="50" class="input-xlarge"/>';
		
		nilai =
		encodeURIComponent(document.getElementById("tanggal1").value);		
		
		
		// merequest file jumlahisi.php di server secara asynchronous
		xmlHttp.open("GET", "inc/tanggalhabis.php?kode="+nilai, true);
		// mendefinipikan metode yang dilakukan apabila memperoleh
		// response server
		xmlHttp.onreadystatechange = handleServerResponse_tanggalhabis;
		// membuat request ke server
		xmlHttp.send(null);
	}
	else
	{
		// Jika server sibuk, request akan dilakukan lagi setelah
		// satu detik
		//setTimeout('getcities()', 10000);
	}
}

// fungsi untuk metode penanganan response dari server
function handleServerResponse_tanggalhabis()
{
// jika proses request telah selesai dan menerima respon
	if (xmlHttp.readyState == 4)
	{
	// jika request ke server sukses
		if (xmlHttp.status == 200)
		{
			// mengambil dokumen XML yang diterima dari server
			xmlResponse = xmlHttp.responseXML;
			// memperoleh elemen dokumen (root elemen) dari xml
			xmlDocumentElement = xmlResponse.documentElement;
			// membaca data elemen
			hasil = xmlDocumentElement.firstChild.data;
			// akan mengupdate tampilan halaman web pada elemen bernama
			// respon
			document.getElementById("respon_tanggalhabis").innerHTML = hasil ;
			
			// request akan dilakukan lagi setelah
			// satu detik (automatic request)
			//setTimeout('getcities()', 10000);
			
		}
		else
		{
			// akan muncul pesan apabila terjadi masalah dalam mengakses
			// server (selain respon 200)
			alert("Terjadi masalah dalam mengakses server " +
			xmlHttp.statusText);
		}
	}
}