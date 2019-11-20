var helpBtn = document.getElementById("helpBtn"); 
var helpModal = document.getElementById("helpModal");
var close = document.getElementsByClassName("close")[0];

// Open modal on help button click
helpBtn.onclick = function(){
    helpModal.style.display = "block";
}

// Close modal on close button click
close.onclick = function() {
    helpModal.style.display = "none";
}