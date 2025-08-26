export default function LoginForm() {


    const divRoot = document.getElementById('root');
    divRoot.innerHTML = '';

    //cria o container do card
    const container = document.createElement('div');
    container.className = 'card p-4 shadow-lg';
    container.style.width = '100%';
    container.style.maxWidth = '400px';
    divRoot.appendChild(container);

    //adiciona o titulo
    const titulo = document.createElement('h1');
    titulo.textContent = 'Log in ';
    titulo.className = 'titulo text-center mb-4';
    container.appendChild(titulo);

    //cria o formulario
    const formulario = document.createElement('form');
    formulario.className = 'd-flex flex-column';

    //cria o campo de email
    const email = document.createElement('input');
    email.type = 'email';
    email.placeholder = "your e-mail";
    formulario.appendChild(email);

    //cria o campo de senha
    const password = document.createElement('input');
    password.type = 'password';
    password.placeholder = "your password";
    formulario.appendChild(password);

    //cria o botao de submit
    const btn = document.createElement('button');
    btn.type = 'submit';
    btn.textContent = "To enter!";
    btn.className = 'btn btn-primary';

    formulario.appendChild(btn);
    container.appendChild(formulario);

    return container;//retorna o container com todo conteudo
}