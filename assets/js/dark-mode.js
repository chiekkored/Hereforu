(function() {
  var darkSwitch = document.getElementById("darkSwitch");
  if (darkSwitch) {
    initTheme();
    darkSwitch.addEventListener("change", function(event) {
      resetTheme();
    });
    function initTheme() {
      var darkThemeSelected =
        localStorage.getItem("darkSwitch") !== null &&
        localStorage.getItem("darkSwitch") === "dark";
      darkSwitch.checked = darkThemeSelected;
      if (darkThemeSelected) {
        document.body.setAttribute("data-theme", "dark");
        $(".card").addClass('text-white bg-dark');
        $(".list-group .list-group-item").addClass('text-white bg-dark');
      } else {
        document.body.removeAttribute("data-theme");
        $(".card").removeClass('text-white bg-dark');
        $(".list-group .list-group-item").removeClass('text-white bg-dark');
      }
    }
    function resetTheme() {
      if (darkSwitch.checked) {
        document.body.setAttribute("data-theme", "dark");
        localStorage.setItem("darkSwitch", "dark");
        $(".card").addClass('text-white bg-dark');
        $(".list-group .list-group-item").addClass('text-white bg-dark');
      } else {
        document.body.removeAttribute("data-theme");
        $(".card").removeClass('text-white bg-dark');
        $(".list-group .list-group-item").removeClass('text-white bg-dark');
        localStorage.removeItem("darkSwitch");
      }
    }
  }
})();
