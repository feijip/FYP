function start(){
    const register = document.getElementsByClassName("registerbar")[0];
    const main = document.getElementsByClassName("main")[0];
    if (register && main) {
        register.style.display = "block";
        main.style.display = "none";
    }
}