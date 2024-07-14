let link = document.getElementsByClassName("link");
let currValue = 1;

function paggination() {

  for (l of link) {
    l.classList.remove("active");
  }
  event.target.classList.add("active");
  currValue = event.target.value;

}

function backBtn() {

  if (currValue > 1) {
    for (l of link) {
      l.classList.remove("active");
    }
    currValue--;
    link[currValue - 1].classList.add("active");
  }
}

function nextbtn() {

  if (currValue < 6) {
    for (l of link) {
      l.classList.remove("active");
    }
    currValue++;
    link[currValue - 1].classList.add("active");
  }
}