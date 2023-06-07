var box = document.getElementById("box");
var down = false;

function toggleNotifi() {
  if (down) {
    box.style.display = "none";
    box.style.height = "0px";
    box.style.opacity = 0;
    down = false;
  } else {
    box.style.display = "block";
    box.style.height = "510px";
    box.style.overflow = "scroll";
    box.style.opacity = 1;
    down = true;
  }
}
