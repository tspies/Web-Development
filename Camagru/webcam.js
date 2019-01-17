
const player = document.getElementById('player');
const canvas = document.getElementById('canvas');
const context = canvas.getContext('2d');
const captureButton = document.getElementById('capture');

const constraints = {
	video: true,
};

navigator.mediaDevices.getUserMedia(constraints)
.then((stream) => {
player.srcObject = stream;
});
var video = document.getElementsByTagName("video")[0];
video.height = 280;
video.width = 380;

function snapshot()
{
	context.drawImage(player, 0, 0, canvas.width, canvas.height);
};