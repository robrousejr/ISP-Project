var songInfoAlbumPhoto = document.getElementById("songInfoAlbumPhoto");
var songInfoTitle = document.getElementById("songInfoTitle");
var songInfoArtist = document.getElementById("songInfoArtist");
var songInfoAlbum = document.getElementById("songInfoAlbum");
var songInfoYear = document.getElementById("songInfoYear");

var song;
var songPlaying = false; // Checks if song is playing

// Pre: x is the number the song is in the array
function playSong(x, year)
{
    // No song is playing
    if(songPlaying == false)
    {
        song = new Audio('music/' + (x + 1) + '.mp3');
        song.play();
        songPlaying = true;

        // Change song information div
        songInfoAlbumPhoto.src = "img/albumcover/" + (x + 1) + ".jpg"; 
        songInfoYear.innerHTML = year;
    }
}

// Stops a song if it's playing
function stopSong()
{
    song.pause();
    song.currentTime = 0;
    songPlaying = false;
    songInfoAlbumPhoto.src = "img/generic cover.jpg"; // Revert album art back
}