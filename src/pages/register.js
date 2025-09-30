import LoginForm from "../components/loginForm.js";
import Navbar from "../components/Navbar.js";
import Footer from "../components/footer.js";
import { createRequest } from "../api/clienteAPI.js";

export default function renderRegisterPage() {
    // Renderiza a navbar
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    const rodape = document.getElementById('rodape');
    rodape.innerHTML = '';
    const footer = Footer();
    rodape.appendChild(footer);

    // Obtém o formulário base de LoginForm
    const loginFormContainer = LoginForm();

    // Modifica o título
    const titulo = loginFormContainer.querySelector('h1');
    titulo.textContent = 'Create your account!';
    titulo.className = 'titulo';
    titulo.style.textAlign = 'center';

    const formulario = loginFormContainer.querySelector('form');
    const btnSubmit = formulario.querySelector('button');
    btnSubmit.textContent = 'Register';

    // Cria campos extras
    const inputNome = document.createElement('input');
    inputNome.type = 'text';
    inputNome.placeholder = "Your name";
    inputNome.className = 'form-control mb-3';
    inputNome.required = true;

    const inputCPF = document.createElement('input');
    inputCPF.type = 'text';
    inputCPF.placeholder = "Your CPF";
    inputCPF.className = 'form-control mb-3';
    inputCPF.required = true;

    const inputTelefone = document.createElement('input');
    inputTelefone.type = 'text';
    inputTelefone.placeholder = "Your phone";
    inputTelefone.className = 'form-control mb-3';
    inputTelefone.required = true;

    const inputEmail = formulario.querySelector('input[type="email"]');
    const inputSenha = formulario.querySelector('input[type="password"]');

    formulario.insertBefore(inputNome, inputEmail);
    formulario.insertBefore(inputCPF, inputEmail);
    formulario.insertBefore(inputTelefone, inputEmail);

    // Campo confirmar senha após a senha
    const passwordConfirm = document.createElement('input');
    passwordConfirm.type = 'password';
    passwordConfirm.placeholder = "Confirm your password";
    passwordConfirm.className = 'form-control mb-3';
    passwordConfirm.required = true;
    formulario.insertBefore(passwordConfirm, btnSubmit);

    // Link voltar
    const btnVoltar = document.createElement('a');
    btnVoltar.textContent = "Back to login";
    btnVoltar.href = "login";
    btnVoltar.className = 'btn btn-link mt-2';
    btnVoltar.style.textDecoration = 'none';
    formulario.appendChild(btnVoltar);

    //Monitorar o clique no botao para adicionar um evento de submeter os dados 
    formulario.addEventListener("submit", async(e)=> {
        e.preventDefault();
        const nome = inputNome.value.trim();
        const cpf = inputCPF.value.trim();
        const telefone = inputTelefone.value.trim();
        const email = inputEmail.value.trim();
        const senha = inputSenha.value.trim();

        try{
            const result = createRequest(nome, cpf, telefone, email, senha);
        }
        catch{
            console.log("Erro inesperado!");
        }
    });

    return loginFormContainer;
}
