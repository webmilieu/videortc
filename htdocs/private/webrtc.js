
var constraintObj={
audio:true,
video:{
facingMode:"user",
width:640,
height:480}}
var video=document.querySelector('video');
navigator.mediaDevices.getUserMedia(constraintObj)
.then(function(mediaStreamObj){
if("srcObject" in video){
video.srcObject=mediaStreamObj;
}

var mediaRecorder= new MediaRecorder(mediaStreamObj);
setInterval(function(){
var chunks=[];
  
mediaRecorder.start();

setTimeout(()=>mediaRecorder.stop(),4000);
mediaRecorder.ondataavailable=function(ev){
chunks.push(ev.data);
}
mediaRecorder.onstop=(ev)=>
{
var blob=new Blob(chunks,{type:'video/mp4'});
chunks=[];
var videoURL=URL.createObjectURL(blob);



//saving file to server
var xhr=new XMLHttpRequest();
var fd=new FormData();
fd.append("video",videoURL);
xhr.open("POST","video.php");
xhr.send(fd);

//ssaving ends
}

//vid1
$.ajax({
url:"vid1.php",
success: function(result)
{
var vidp=document.getElementById("vid1");
vidp.src=result;
}
});
//vid1


//vid2
$.ajax({
url:"vid1.php",
success: function(result)
{
var vidp=document.getElementById("vid2");
vidp.src=result;
}
});
//vid2
});
});//end record





