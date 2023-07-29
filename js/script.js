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


var editBtns = document.querySelectorAll('#adminEditBtn')
editBtns.forEach(editBtn => {
    editBtn.addEventListener('click', function() {
        var rowId = this.getAttribute('data_id');
        console.log("Row clicked = " + rowId);
    })
});

var deleteBtns = document.querySelectorAll('#adminDeleteBtn')
deleteBtns.forEach(deleteBtn => {
    deleteBtn.addEventListener('click', function() {
        var rowId = this.getAttribute('data_id');
        console.log('Delete button ' + rowId);
    })
});