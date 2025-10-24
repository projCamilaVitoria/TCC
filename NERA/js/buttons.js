function clickCadastre_se(){
    window.location.href = "cadastro.php"
}

function clickEntrar() {

    const login = document.getElementById("login").value;
    const password = document.getElementById("password").value;
    
    const loginRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    
    if (login === "" || !loginRegex.test(login)) {
        alert("Digite um email válido");
        return 0;
    }
    

    if (password === "") {
        alert("Digite sua senha");
        return 0;
    }

    if(password.length < 8){
        alert("Caractéres insuficientes")
    }
}
    

function clickEntrarGoogle(){
    window.location.href = "home.php"
}

function clickCadastrar() {
    const name = document.getElementById("name").value.trim();
    const date = document.getElementById("date").value.trim(); 
    const login = document.getElementById("login").value.trim();
    const password = document.getElementById("password").value.trim();

    const loginRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!name) {
        alert("Digite seu nome");
        return;
    }

    if (!date) {
        alert("Insira uma data");
        return;
    }

    const dataObj = new Date(date); 
    if (isNaN(dataObj.getTime())) {
        alert("Data inválida");
        return;
    }

    const hoje = new Date();
    if (dataObj > hoje) {
        alert("A data não pode ser no futuro");
        return;
    }

    if (!loginRegex.test(login)) {
        alert("Digite um email válido");
        return;
    }

    if (password.length < 8) {
        alert("A senha deve ter pelo menos 8 caracteres");
        return;
    }

    window.location.href = "login.php";
}

function clickCadastrarGoogle(){
    window.location.href = "login.php"
}