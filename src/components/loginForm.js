export default function LoginForm() {
    const formulario = document.createElement('form');

    const email = document.createElement('input');
    email.type = 'email';
    email.placeholder = "digite seu email";
    formulario.appendChild(email);

    const passaword = document.createElement('input');
    passaword.type = 'password';
    passaword.placeholder = "digite seu senha";
    formulario.appendChild(passaword);

    const btnAuth = document.createAttribute('button')
    btnAuth.type = 'submit'
    btnAuth.textContent = "entrar"
    formulario.appendChild(btnAuth)


    return formulario;
}