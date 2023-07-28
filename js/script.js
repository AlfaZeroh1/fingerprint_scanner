function toggle_darkmode(){
    const bodyElement = document.body;
    const computedStyle = getComputedStyle(bodyElement);

    // Get the value of the --main-color CSS variable
    const priColor = computedStyle.getPropertyValue('--pri');
    const root = document.documentElement.style;
    if(priColor=='#000'){
        // Modify the CSS variables
        root.setProperty('--pri', '#fff');
        root.setProperty('--sec', '#000');
        root.setProperty('--inv', '100%');
        // alert(priColor+'if')
    }
    else{
        // Modify the CSS variables
        root.setProperty('--pri', '#000');
        root.setProperty('--sec', '#fff');
        root.setProperty('--inv', '0%');
        // alert(priColor+'else')
        

    }

}
let fingerprint = document.querySelector(".fingerprint-value");
function generatCode(event) {
  const chars =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  let code = "";
  for (let index = 0; index < 10; index++) {
    let randomIndex = Math.floor(Math.random() * chars.length);
    // console.log(randomIndex)
    code += chars.charAt(randomIndex);
  }
  fingerprint.value = code;
  console.log(fingerprint);
}
