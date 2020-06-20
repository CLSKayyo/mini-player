<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Player</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/abf19b79f0.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="object">
        <div class="data">
            <div class="musicName">
                <span>Right//Left</span>
            </div>
            <div>
                <span class="authorName">André Abner</span>
            </div>
            <div class="slideMusic">
                <input type="range" min="1" max="100" onchange="changeMusicRange()" id="musicRange">
            </div>
            
        </div>
        <div class="player">
            <img src="media/cover.png" alt="Music">
            <div class="menu">
                <i class="fas fa-step-backward fa-2x"></i>
                <i id="playButton" onclick="changePlay()" class="fas fa-play fa-2x"></i>
                <i class="fas fa-step-forward fa-2x"></i>
                <i id="muteButton" onclick="changeMute()" class="fas fa-volume-up fa-2x"></i>
            </div>
        </div>
    </div>

    <audio id="musicPlayer">
        <source src="media/24.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio> 

    <script>

        var t = setInterval(()=>checkValue(),500);

        window.onload = ()=>{
            document.getElementById('musicRange').min = 0;
            document.getElementById('musicRange').max = document.getElementById('musicPlayer').duration;
            document.getElementById('musicRange').value = 0;
        }

        function changeMusicRange(){
            document.getElementById('musicPlayer').currentTime = document.getElementById('musicRange').value;
        }

        function changePlay(){
            if(document.getElementById('playButton').classList.contains("fa-play")){
                document.getElementById('musicPlayer').play();
                document.getElementById('playButton').classList.remove("fa-play");
                document.getElementById('playButton').classList.add("fa-pause");
            } else{
                document.getElementById('musicPlayer').pause();
                document.getElementById('playButton').classList.remove("fa-pause");
                document.getElementById('playButton').classList.add("fa-play");
            }
        }

        function changeMute(){
            if(document.getElementById('muteButton').classList.contains("fa-volume-up")){
                document.getElementById('musicPlayer').muted = true;
                document.getElementById('muteButton').classList.remove("fa-volume-up");
                document.getElementById('muteButton').classList.add("fa-volume-mute");
            } else{
                document.getElementById('musicPlayer').muted = false;
                document.getElementById('muteButton').classList.remove("fa-volume-mute");
                document.getElementById('muteButton').classList.add("fa-volume-up");
            }
        }

        function checkValue(){
            console.log(document.getElementById('musicPlayer').currentTime);
            document.getElementById('musicRange').value = document.getElementById('musicPlayer').currentTime;
            if(document.getElementById('musicPlayer').ended){
                document.getElementById('musicPlayer').currentTime = 0;
                changePlay();
            }
            
        }
    </script>
    
</body>
</html>