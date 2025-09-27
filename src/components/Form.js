export default function Form() {
    const formContainer = document.createElement('div');
    formContainer.className = 'form-container';
    
    formContainer.innerHTML = `
        <div class="form-wrapper">
            <form id="dynamicForm" class="form">
                <div class="form-group">
                    <label for="formTitle">Título:</label>
                    <input type="text" id="formTitle" name="title" required>
                </div>
                
                <div class="form-group">
                    <label for="formDescription">Descrição:</label>
                    <textarea id="formDescription" name="description" rows="4" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="formType">Tipo:</label>
                    <select id="formType" name="type" required>
                        <option value="">Selecione um tipo</option>
                        <option value="manutencao">Manutenção</option>
                        <option value="limpeza">Limpeza</option>
                        <option value="servico">Serviço</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="formPriority">Prioridade:</label>
                    <select id="formPriority" name="priority" required>
                        <option value="baixa">Baixa</option>
                        <option value="media">Média</option>
                        <option value="alta">Alta</option>
                    </select>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Enviar Solicitação</button>
                    <button type="button" class="btn btn-secondary" id="cancelForm">Cancelar</button>
                </div>
            </form>
        </div>
    `;
    
    // Adicionar event listeners
    const form = formContainer.querySelector('#dynamicForm');
    const cancelBtn = formContainer.querySelector('#cancelForm');
    
    form.addEventListener('submit', handleFormSubmit);
    cancelBtn.addEventListener('click', handleCancel);
    
    return formContainer;
}

function handleFormSubmit(e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData);
    
    // Adicionar cliente_id se disponível
    const user = JSON.parse(localStorage.getItem('user') || '{}');
    if (user.id) {
        data.cliente_id = user.id;
    }
    
    // Enviar solicitação
    fetch('/PrimeSite/api/request', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message);
            if (data.message.includes('sucesso')) {
                e.target.reset();
                // Opcional: redirecionar ou fechar formulário
            }
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao enviar solicitação');
    });
}

function handleCancel() {
    const form = document.getElementById('dynamicForm');
    if (form) {
        form.reset();
        // Opcional: fechar formulário ou redirecionar
        window.history.back();
    }
}
