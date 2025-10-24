import Modal from "./Modal.js";

export default function FormRoom() {
    const form = document.createElement('form');
    form.className = 'p-4 card shadow-lg m-4';
    form.enctype = 'multipart/form-data';

    form.innerHTML = `
        <h2 class="mb-4 text-center" style="color: var(--primary-color);">Cadastro de Quarto</h2>
        
        <div class="mb-3">
            <label class="form-label">Nome do quarto</label>
            <input type="text" name="nome" class="form-control" placeholder="Ex: Suíte Master" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Número do quarto</label>
            <input type="text" name="numero" class="form-control" placeholder="Ex: 101" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantidade de camas de casal</label>
            <input type="number" name="cama_casal" class="form-control" min="0" placeholder="0" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantidade de camas de solteiro</label>
            <input type="number" name="cama_solteiro" class="form-control" min="0" placeholder="0" required>
        </div>

        <div class="mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="disponibilidade" id="disponibilidade" checked>
                <label class="form-check-label" for="disponibilidade">
                    Quarto disponível
                </label>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço por diária (R$)</label>
            <input type="number" name="preco" class="form-control" min="0" step="0.01" placeholder="0.00" required>
        </div>

        <div class="mb-3">
            <label for="imagens" class="form-label">Imagens do quarto</label>
            <input class="form-control" type="file" id="imagens" name="imagens" multiple accept="image/*">
            <div class="form-text">Selecione uma ou mais imagens do quarto</div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 w-100">Cadastrar Quarto</button>
        <button type="button" class="btn btn-secondary mt-2 w-100" id="btnVoltar">Voltar</button>
    `;

    // Evento de envio
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const imgInput = form.querySelector('#imagens');
        
        // Validar imagens
        if (imgInput.files.length === 0) {
            Modal('Selecione pelo menos uma imagem do quarto.', 'Erro');
            return;
        }

        // Simular cadastro
        const dados = Object.fromEntries(formData.entries());
        Modal(`Quarto "${dados.nome}" cadastrado com sucesso!`, 'Sucesso');
        form.reset();
        form.querySelector('#disponibilidade').checked = true;
    });

    // Botão voltar
    form.querySelector('#btnVoltar').addEventListener('click', () => {
        window.location.hash = '/home';
    });

    return form;
}