document.addEventListener("DOMContentLoaded", function () {
    const menuBtn = document.querySelector(".menu-btn");
    const sidebar = document.querySelector("aside");

    menuBtn.addEventListener("click", function () {
        sidebar.classList.toggle("show");
    });

    // Fechar sidebar ao clicar fora (em telas menores)
    document.addEventListener("click", function (event) {
        if (!sidebar.contains(event.target) && !menuBtn.contains(event.target)) {
            sidebar.classList.remove("show");
        }
    });
});

document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Impede o envio do formulário

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const recaptchaResponse = grecaptcha.getResponse(); // grecaptcha é a função global do reCAPTCHA

    if (recaptchaResponse.length === 0) {
        alert('Por favor, verifique se você não é um robô.');
        return; // ele vai retorna que não é um robô
    }

    // Simulando login aprovado
    const usuario = {
        email: email,
        status: 'Aprovado',
    };

    // Gerar um Json login
    const blob = new Blob([JSON.stringify(usuario, null, 2)], {
        type: 'application/json'
    }); // blob é um objeto que representa um arquivo de dados brutos
    const link = document.createElement('a'); // cria um elemento <a>
    link.href = URL.createObjectURL(blob); // cria um URL temporário para o blob
    link.download = 'login.json'; // define o nome do arquivo
    link.click(); // simula um clique no link para baixar o arquivo

   
});



function recaptchaCallback(token) {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.classList.remove('card-disabled');
        card.style.pointerEvents = 'auto';
        card.style.opacity = '1';
        card.onclick = () => {
            window.location.href = card.getAttribute('data-href');
        };
    });
    document.getElementById('recaptcha-container').style.display = 'none';
}


window.onload = function() {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.classList.add('card-disabled');
        card.style.pointerEvents = 'none';
        card.onclick = function(event) {
            event.preventDefault();
        }
    });
}