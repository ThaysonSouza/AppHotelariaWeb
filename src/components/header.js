export default function Header() {
    const cabecalho = document.createElement('div');

    cabecalho.innerHTML = `
    <div class="container text-center">
  <div class="row">
    <div class="col">
      Column
    </div>
    <div class="col">
      Column
    </div>
    <div class="col">
      Column
    </div>
  </div>
</div>
    `

    return cabecalho;
}