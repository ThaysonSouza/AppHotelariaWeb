// import Modal from "../components/Modal";

export default function FormRoom() {
    const form = document.createElement('form');
    form.className = 'p-4 card shadow-lg m-4';
    form.enctype = 'multipart/form-data';

    // Nome
    const nomeLabel = document.createElement('label');
    nomeLabel.textContent = 'Nome do quarto';
    const nomeInput = document.createElement('input');
    nomeInput.type = 'text';
    nomeInput.name = 'nome';
    nomeInput.className = 'form-control mb-3';
    nomeInput.required = true;

    // Número
    const numeroLabel = document.createElement('label');
    numeroLabel.textContent = 'Número do quarto';
    const numeroInput = document.createElement('input');
    numeroInput.type = 'text';
    numeroInput.name = 'numero';
    numeroInput.className = 'form-control mb-3';
    numeroInput.required = true;

    // Cama de casal
    const casalLabel = document.createElement('label');
    casalLabel.textContent = 'Quantidade de camas de casal';
    const casalInput = document.createElement('input');
    casalInput.type = 'number';
    casalInput.name = 'cama_casal';
    casalInput.className = 'form-control mb-3';
    casalInput.min = 0;
    casalInput.required = true;

    // Cama de solteiro
    const solteiroLabel = document.createElement('label');
    solteiroLabel.textContent = 'Quantidade de camas de solteiro';
    const solteiroInput = document.createElement('input');
    solteiroInput.type = 'number';
    solteiroInput.name = 'cama_solteiro';
    solteiroInput.className = 'form-control mb-3';
    solteiroInput.min = 0;
    solteiroInput.required = true;

    // Disponibilidade
    const dispLabel = document.createElement('label');
    dispLabel.textContent = 'Disponível?';
    dispLabel.className = 'form-label me-3 d-block';

    const dispDiv = document.createElement('div');
    dispDiv.className = 'form-check form-switch mb-3';
    const dispInput = document.createElement('input');
    dispInput.type = 'checkbox';
    dispInput.name = 'disponibilidade';
    dispInput.className = 'form-check-input';
    dispInput.checked = true;

    dispDiv.appendChild(dispInput);

    // Preço
    const precoLabel = document.createElement('label');
    precoLabel.textContent = 'Preço (R$)';
    const precoInput = document.createElement('input');
    precoInput.type = 'number';
    precoInput.name = 'preco';
    precoInput.className = 'form-control mb-3';
    precoInput.min = 0;
    precoInput.step = '0.01';
    precoInput.required = true;

    const imgLabel = document.createElement('label');
    imgLabel.textContent = 'Imagens do quarto';
    const imgInput = document.createElement('input');
    imgInput.type = 'file';
    imgInput.name = 'imagens';
    imgInput.className = 'form-control mb-3';
    imgInput.multiple = true;
    imgInput.accept = 'image/*';

    // Botão de envio
    const btn = document.createElement('button');
    btn.type = 'submit';
    btn.textContent = 'Cadastrar Quarto';
    btn.className = 'btn btn-primary mt-3';

    // Montagem
    form.append(
        nomeLabel, nomeInput,
        numeroLabel, numeroInput,
        casalLabel, casalInput,
        solteiroLabel, solteiroInput,
        dispLabel, dispDiv,
        precoLabel, precoInput,
        imgLabel, imgInput,
        btn
    );

    // Evento de envio
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        console.log('Dados do quarto:', Object.fromEntries(formData.entries()));
        Modal('Quarto cadastrado com sucesso!');
    });

    return form;
}
