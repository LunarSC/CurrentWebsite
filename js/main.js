function openNav() {
  var navBar = document.getElementsByClassName("navBar")[0];
  var iconTexts = document.getElementsByClassName("iconText");

  navBar.style.width = "260px";
  document.getElementsByClassName("grid")[0].style.marginLeft = "260px";
  for (var i = 0; i < iconTexts.length; i++) {
    iconTexts[i].style.visibility = "visible";
  }
}

function closeNav() {
  var navBar = document.getElementsByClassName("navBar")[0];
  var iconTexts = document.getElementsByClassName("iconText");

  navBar.style.width = "60px";
  document.getElementsByClassName("grid")[0].style.marginLeft = "0px";
  for (var i = 0; i < iconTexts.length; i++) {
    iconTexts[i].style.visibility = "hidden";
  }
}
