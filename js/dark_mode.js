var icon = document.getElementById("moon");

      icon.onclick=function()
      {
        document.body.classList.toggle("dark-mode");
        if (document.body.classList.contains("dark-mode"))
        {
          icon.src="sun.png";
          window.localStorage.removeItem('dmode');
          window.localStorage.setItem('dmode','dark');
        }
        else{
          icon.src="moon.png";

          window.localStorage.removeItem('dmode');
          window.localStorage.setItem('dmode','light');
        }
      }