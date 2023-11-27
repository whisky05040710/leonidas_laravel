// Executes a function after guessing if the page and scripts are completely loaded.
function haba_delay(e) {
  if (document.readyState == 'complete') {
    setTimeout(function () {
      e();
    }, 200);
  } else {
    document.onreadystatechange = function () {
      if (document.readyState === "complete") {
        setTimeout(function () {
          e();
        }, 200);
      }
    }
  }
}