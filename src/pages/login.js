import LoginForm from "../components/loginForm.js";
import Navbar from "../components/Navbar.js";

export default function renderLoginPage() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    const formulario = LoginForm();

    // Adiciona o link para a página de cadastro
    const btnVoltar = document.createElement('a');
    btnVoltar.textContent = "Register";
    btnVoltar.href = "register";
    btnVoltar.className = 'btn btn-link mt-2';
    btnVoltar.style.textDecoration = 'none';

    formulario.appendChild(btnVoltar);

}