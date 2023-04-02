let all_check_boxs = document.querySelectorAll("input[type='checkbox']");
console.log(all_check_boxs);

let num = 0;
let max = 4;

all_check_boxs.forEach(element => {
  element.addEventListener("change", function () {

    if (element.checked) {
      num++;
    }
    else {
      num--;
    }
    if (num >= max) {
      all_check_boxs.forEach(element => {
        if (!element.checked) {
          element.disabled = true;
        }
      });
    }
    else {
      all_check_boxs.forEach(element => {
        element.disabled = false;
      });
    }

  });

});



//Number Of essays




