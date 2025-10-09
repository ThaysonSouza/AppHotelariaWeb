export default function Modal(message, title = "Aviso") {
    const modalElement = document.createElement('div');
    modalElement.className = 'modal fade';
    modalElement.id = 'alertModal';
    modalElement.tabIndex = '-1';
    modalElement.setAttribute('aria-labelledby', 'alertModalLabel');
    modalElement.setAttribute('aria-hidden', 'true');

    modalElement.innerHTML = `
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">${title}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">${message}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    `;

    const show = () => {
        document.body.appendChild(modalElement);
        const modal = new bootstrap.Modal(modalElement);
        modal.show();
        
        modalElement.addEventListener('hidden.bs.modal', () => {
            document.body.removeChild(modalElement);
        });
    };

    show();
    return { show, element: modalElement };
}

