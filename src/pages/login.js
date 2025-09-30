import { loginRequest, saveToken } from "../api/authAPI.js";
import LoginForm from "../components/loginForm.js";
import Navbar from "../components/Navbar.js";
import Footer from "../components/footer.js";

export default function renderLoginPage() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    const rodape = document.getElementById('rodape');
    rodape.innerHTML = '';
    const footer = Footer();
    rodape.appendChild(footer);

    const formulario = LoginForm();

    //Pegando inputs e botao do form(email, senha e submit)
    const contentForm = formulario.querySelector('form');
    const inputEmail = contentForm.querySelector('input[type="email"]');
    const inputSenha = contentForm.querySelector('input[type="password"]');



    //Monitora o clique no botao para acionar um evento de submeter os dados do form
    contentForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const email = inputEmail.value.trim();
        const senha = inputSenha.value.trim();

        try {
            const result = await loginRequest(email, senha);
            saveToken(result.token)
            //window.location.href = "/home";
        }
        catch {
            console.error("Erro ao realizar login:");
        }
    });
    // Adiciona o link para a página de cadastro
    const btnVoltar = document.createElement('a');
    btnVoltar.textContent = "Register";
    btnVoltar.href = "register";
    btnVoltar.className = 'btn btn-link mt-2';
    btnVoltar.style.textDecoration = 'none';

    formulario.appendChild(btnVoltar);
}