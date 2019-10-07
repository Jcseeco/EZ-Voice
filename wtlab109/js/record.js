function load(){
	var audio = document.querySelector('audio');

	function captureMicrophone(callback) {
		navigator.mediaDevices.getUserMedia({audio: true}).then(callback).catch(function(error) {
			alert('Unable to access your microphone.');
			console.error(error);
		});
	}

	function stopRecordingCallback() {
		audio.srcObject = null;
		var blob = recorder.getBlob();
		audio.src = URL.createObjectURL(blob);
				
		recorder.microphone.stop();
	}

	var recorder; // globally accessible

	initialization();

	document.getElementById('btn-start-recording').onclick = function() {
		document.getElementById("answerArea").innerHTML =  "";
		this.disabled = true;
		captureMicrophone(function(microphone) {
			audio.srcObject = microphone;

			recorder = RecordRTC(microphone, {
				type: 'audio',
				recorderType: StereoAudioRecorder,
				desiredSampRate: 16000
			});
				
			recorder.startRecording();
				
			// release microphone on stopRecording
			recorder.microphone = microphone;
				
			document.getElementById('btn-stop-recording').disabled = false;
		});
	};
				
	document.getElementById('btn-stop-recording').onclick = function() {
		this.disabled = true;
		recorder.stopRecording(function() { 
			var blob = recorder.getBlob();
			var videoID = getID();
			var acc = getCookie("account");
			var filename =  createTempValue(videoID,acc);
			var xhr=new XMLHttpRequest();
			var fd=new FormData();
			fd.append("audio_data",blob, filename);
			xhr.open("POST","php/upload.php",true);
		  	xhr.send(fd);
		  	while (true){
		  		if (getCookie("score") != ""){
		  			var temp = getCookie("result");
					var score = (getCookie("score") + "%").fontcolor("red");
					var sentence = getSentence(temp).fontcolor("red");
					document.getElementById("answerArea").innerHTML = "辨識結果 : " + sentence + "<br>相似度 : " + score;
					deleteCookie();
					break;
				}
			}
		});
		document.getElementById('btn-start-recording').disabled = false;
	};
}

function initialization(){
	setCookie("score", "", 1);
	getAcc();
}

function createTempValue(ID,account){
	var today = new Date();
	var year = format(today.getFullYear());
	var month = format(today.getMonth() + 1);
	var day = format(today.getDate());
	var hour = format(today.getHours());
	var minute = format(today.getMinutes());
	var second = format(today.getSeconds());
	var millisecond = millisecondFormat(today.getMilliseconds());
	var filename =  year + month + day + hour + minute + second + millisecond + ".wav&" + ID + "&" + account;
	return filename;
}
				
function format(num){
	if(num < 10)
		num = "0" + num.toString();
	return num;
}
				
function millisecondFormat(num){
	if(num < 10)
		num = "00" + num.toString();
	else
		if(num < 100)
			num = "0" + num.toString();
	return num;
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+ d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/wtlab109";
}
				
function getCookie(cname){
	var name = cname + "=";
 	var ca = document.cookie.split(';');
 	for(var i=0; i<ca.length; i++) {
		var c = ca[i].trim();
		if (c.indexOf(name)==0) 
			return c.substring(name.length,c.length);
	}
	return "";
}

function deleteCookie(){
	setCookie("score", "", 1);
	setCookie("result", "", 1);
}
				
function getID(){
	var strUrl = location.search;
	var getPara, ParaVal;

	if (strUrl.indexOf("?") != -1) {
		getPara = strUrl.split("?");
   		ParaVal = getPara[1].split("=");
   	}
   	return ParaVal[1];
}

function getSentence(sentence){
	var result = "";
	if (sentence == null)
		return ""; 
	else{
		for(var i = 0 ; i < sentence.length ; i++){
			if (sentence.charAt(i) == "+")
				result += " ";
			else
				result += sentence.charAt(i);
		}
		return result
	}
}

function getAcc(){
	var obj;
	$.ajax({
		url: "php/navSigninCheck.php",
		type: "GET",
		dataType: "text",
		success: 
		function (account) {
			var date = new Date();
                 	date.setTime(date.getTime() + (5 * 24 * 60 * 60 * 1000));
                 	$.cookie('account', account, { path:'/wtlab109', expires: date });
		},
		error: 
		function (jqXHR, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});
}
window.addEventListener("load", load, false);	
