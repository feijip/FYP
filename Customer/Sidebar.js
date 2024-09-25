function sidebar() {
    const sidebar = document.querySelector(".sidebar");  
    const icon = document.querySelector(".icon");
    const body = document.body;
    const width = sidebar.style.width;
    
    if (width === "300px") {
        sidebar.style.width = "0";
        icon.style.display = "none";
        body.style.marginLeft = "0";
    } else {
        sidebar.style.width = "300px";
        icon.style.display = "block";
        body.style.marginLeft = "300px";
    }
}