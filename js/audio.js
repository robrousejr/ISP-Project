var song;
var songPlaying = false; // Checks if song is playing

// Pre: x is the number the song is in the array
function playSong(x)
{
    if(songPlaying == false)
    {
        song = new Audio('music/' + (x + 1) + '.mp3');
        song.play();
        songPlaying = true;
    }
}

// Stops a song if it's playing
function stopSong()
{
    song.pause();
    song.currentTime = 0;
    songPlaying = false;
}