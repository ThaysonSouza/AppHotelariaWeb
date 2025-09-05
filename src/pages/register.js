import LoginForm from "../components/loginForm.js";
import Navbar from "../components/Navbar.js";
import Footer from "../components/footer.js";

export default function renderRegisterPage() {
    //Renderiza a navbar
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    const rodape = document.getElementById('rodape');
    rodape.innerHTML = '';
    const footer = Footer();
    rodape.appendChild(footer);

    //Obtém o fomrulário base de LoginForm
    const loginFormContainer = LoginForm();

    //Modifica o titulo
    const titulo = loginFormContainer.querySelector('h1');
    titulo.textContent = 'Dont you have an account?';
    titulo.textContent = 'Create your account!';
    titulo.className = 'titulo';
    titulo.style.textAlign = 'center';

    const formulario = loginFormContainer.querySelector('form');
    const btnSubmit = loginFormContainer.querySelector('button');
    btnSubmit.textContent = 'Register';

    // Adiciona o campo de 'Nome' antes do campo de e-mail
    const nome = document.createElement('input');
    nome.type = 'text';
    nome.placeholder = "your name";
    nome.className = 'form-control mb-3';
    nome.required = true;
    formulario.insertBefore(nome, formulario.firstChild); //Coloca antes dentro do formulario, como nome em primeiro

    // Adiciona o campo 'Confirmar Senha' após o campo de senha
    const passwordConfirm = document.createElement('input');
    passwordConfirm.type = 'password';
    passwordConfirm.placeholder = "Confirm your password";
    passwordConfirm.required = true;
    formulario.insertBefore(passwordConfirm, btnSubmit); //coloca como ultimo o campo confirma senha

    // Cria e adiciona o link para a página de login
    const btnVoltar = document.createElement('a');
    btnVoltar.textContent = "Back to login";
    btnVoltar.href = "login";
    btnVoltar.className = 'btn btn-link mt-2';
    btnVoltar.style.textDecoration = 'none';
    formulario.appendChild(btnVoltar);
}