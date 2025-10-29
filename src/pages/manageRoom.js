import Navbar from "../components/NavBar.js";
import Footer from "../components/Footer.js";
import Modal from "../components/Modal.js";
import Spinner from "../components/Spinner.js";
import { cadastrarQuarto } from "../api/roomAPI.js";

export default function renderRegisterRoomPage() {
    const root = document.getElementById('root');
    root.innerHTML = '';

    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    nav.appendChild(Navbar());

    const titulo = document.createElement('h2');
    titulo.textContent = 'Cadastrar Novo Quarto';
    titulo.style.textAlign = 'center';
    titulo.style.margin = '24px 0';

    const form = document.createElement('form');
    form.enctype = 'multipart/form-data';
    form.style.maxWidth = '720px';
    form.style.margin = '0 auto';
    form.style.display = 'grid';
    form.style.gap = '12px';

    form.innerHTML = `
        <label>Nome do quarto
            <input type=\"text\" name=\"nome\" required />
        </label>
        <label>Número
            <input type=\"number\" name=\"numero\" required />
        </label>
        <label>Camas de casal
            <input type=\"number\" name=\"camaCasal\" min=\"0\" value=\"1\" required />
        </label>
        <label>Camas de solteiro
            <input type=\"number\" name=\"camaSolteiro\" min=\"0\" value=\"0\" required />
        </label>
        <label>Preço (R$)
            <input type=\"number\" step=\"0.01\" name=\"preco\" required />
        </label>
        <label>Disponível
            <select name=\"disponivel\"> 
                <option value=\"1\" selected>Sim</option>
                <option value=\"0\">Não</option>
            </select>
        </label>
        <label>Imagens
            <input type=\"file\" name=\"imagens\" multiple accept=\"image/*\" />
        </label>
        <button type=\"submit\">Cadastrar</button>
    `;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const spinner = Spinner('Cadastrando quarto...');
        spinner.show();

        const fd = new FormData(form);
        const dados = {
            nome: fd.get('nome'),
            numero: fd.get('numero'),
            camaCasal: fd.get('camaCasal'),
            camaSolteiro: fd.get('camaSolteiro'),
            preco: fd.get('preco'),
            disponivel: fd.get('disponivel'),
            imagens: form.querySelector('input[name="imagens"]').files,
        };

        try {
            await cadastrarQuarto(dados);
            spinner.hide();
            Modal('Quarto cadastrado com sucesso!', 'Sucesso');
            form.reset();
        } catch (err) {
            spinner.hide();
            Modal(err?.message || 'Falha ao cadastrar quarto.', 'Erro');
        }
    });

    root.appendChild(titulo);
    root.appendChild(form);

    const rodape = document.getElementById('rodape');
    rodape.innerHTML = '';
    rodape.appendChild(Footer());
}
