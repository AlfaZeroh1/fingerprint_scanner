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
        // alert(priColor+'if')
    }
    else{
        // Modify the CSS variables
        root.setProperty('--pri', '#000');
        root.setProperty('--sec', '#fff');
        // alert(priColor+'else')
        

    }

}