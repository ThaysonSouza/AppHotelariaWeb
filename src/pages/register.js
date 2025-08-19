// src/pages/Register.js
import LoginForm from '../components/LoginForm.js';
import Navbar from '../components/Navbar.js';

export default function renderRegisterPage() {
    // Renderiza a navbar
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    // Limpa e prepara a área de conteúdo
    const divRoot = document.getElementById('root');
    divRoot.innerHTML = '';

    // Obtém o formulário base do LoginForm
    const loginFormContainer = LoginForm();
    
    // Modifica o título
    const titulo = loginFormContainer.querySelector('h1');
    titulo.textContent = 'Crie sua conta';

    // Obtém o formulário e o botão
    const formulario = loginFormContainer.querySelector('form');
    const btnSubmit = loginFormContainer.querySelector('button');
    btnSubmit.textContent = "Cadastrar";

    // Adiciona campo Nome
    const nome = document.createElement('input');
    nome.type = 'text';
    nome.placeholder = "Digite seu nome";
    nome.className = 'form-control mb-3';
    formulario.insertBefore(nome, formulario.firstChild); // Coloca como primeiro campo

    // Adiciona campo Confirmar Senha
    const confirmPassword = document.createElement('input');
    confirmPassword.type = 'password';
    confirmPassword.placeholder = "Confirmar senha";
    confirmPassword.className = 'form-control mb-3';
    formulario.insertBefore(confirmPassword, btnSubmit); // Coloca antes do botão

    // Adiciona link para voltar ao login
    const btnVoltar = document.createElement('a');
    btnVoltar.href = 'login.html';
    btnVoltar.textContent = "Voltar ao Login";
    btnVoltar.className = 'btn btn-link mt-2 text-center';
    formulario.appendChild(btnVoltar);

    // Adiciona o formulário modificado ao root
    divRoot.appendChild(loginFormContainer);

    // Previne envio do formulário (apenas para demonstração)
    formulario.addEventListener('submit', (e) => {
        e.preventDefault();
        console.log('Cadastro enviado!');
    });
}
