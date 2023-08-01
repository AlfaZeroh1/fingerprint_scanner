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

function generateToken() {
  let token = "";
  const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  const charactersLength = characters.length;
  for (let i = 0; i < 10; i++) {
    token += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  console.log(token);
  return token;
}
function token() {
  var tokenBox = document.querySelector('#fingerprint')
  tokenBox.value = generateToken();
  alert('Fingerprint scanned successfully')
  console.log('Done');
  return false
}

var editBtns = document.querySelectorAll('#adminEditBtn')
editBtns.forEach(editBtn => {
  editBtn.addEventListener('click', function (event) {
      event.preventDefault();
      var rowId = this.value;
      console.log("Row clicked = " + rowId);
  })
});

var deleteBtns = document.querySelectorAll('#adminDeleteBtn')
deleteBtns.forEach(deleteBtn => {
  deleteBtn.addEventListener('click', function() {
      var rowId = this.value;
      console.log('Delete button ' + rowId);
  })
});