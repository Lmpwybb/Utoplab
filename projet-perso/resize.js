// Here the multiplier is equal to the value send by the button
function resizeText(multiplier) {
// Here the basic font size is equal to 1.0em
  if (document.body.style.fontSize == "") {
    document.body.style.fontSize = "1.0em";
  }
// This line will add to the basic value of the font size the value send by the button * 0.1
  document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.1) + "em";
}
