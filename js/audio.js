// On screen DOM elements
var songInfoAlbumPhoto = document.getElementById("songInfoAlbumPhoto");
var songInfoTitle = document.getElementById("songInfoTitle");
var songInfoArtist = document.getElementById("songInfoArtist");
var songInfoAlbum = document.getElementById("songInfoAlbum");
var songInfoYear = document.getElementById("songInfoYear");
var musicTable = document.getElementsByTagName("table")[0];

var song;
var songPlaying = false; // Checks if song is playing
var currentSongNumber = -1; // Holds song as it's in array that's playing

// Pre: x is the number the song is in the array
function playSong(x, year)
{
    // No song is playing
    if(songPlaying == false)
    {
        song = new Audio('music/' + (x + 1) + '.mp3');
        song.play();
        songPlaying = true;
        currentSongNumber = x; // set song number being played 

        // Change song information div
        songInfoAlbumPhoto.src = "img/albumcover/" + (x + 1) + ".jpg"; 
        songInfoYear.innerHTML = year;
        var tmp = musicTable.rows[x + 1].cells[0].innerHTML;
        songInfoTitle.innerHTML = tmp.substring(0, tmp.indexOf('<'));
        songInfoArtist.innerHTML = musicTable.rows[x + 1].cells[1].innerHTML;
        songInfoAlbum.innerHTML = musicTable.rows[x + 1].cells[2].innerHTML;
    }
    // Song is playing 
    else
    {
        // Different song play button
        if(currentSongNumber != x)
        {
            stopSong();
            currentSongNumber = -1; // Reset song number
            songPlaying = false; // No song playing
            playSong(x, year);
        }
    }
}

// Stops a song if it's playing
function stopSong()
{
    song.pause();
    song.currentTime = 0;
    songPlaying = false;
    songInfoAlbumPhoto.src = "img/generic cover.jpg"; // Revert album art back
    songInfoTitle.innerHTML = "Song Title";
    songInfoYear.innerHTML = "Year";
    songInfoArtist.innerHTML = "Artist";
    songInfoAlbum.innerHTML = "Album";
    currentSongNumber = -1; // reset
}