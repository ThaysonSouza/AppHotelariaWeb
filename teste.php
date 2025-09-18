<?php
    require_once __DIR__ . "/config/database.php";
    require_once __DIR__ . "/controllers/quartoController.php";
    require_once __DIR__ . "/controllers/PasswordController.php";
    require_once __DIR__ . "/controllers/clienteController.php";
    require_once __DIR__ . "/controllers/adicionalController.php";
    require_once __DIR__ . "/controllers/pedidoController.php";
    require_once __DIR__ . "/controllers/reservaController.php";
    require_once __DIR__ . "/controllers/userController.php";

    //    $data = [
    //    "email" => "thayson.silva@gmail.com",
    //   "senha" => 123 
//    ];

    
    //          CRUD USUÁRIOS
    
    //CRIAR USUÁRIO
    // $dataUsuario = [
    //     "id_role_fk" => 1,
    //     "nome" => "Maria Santos",
    //     "email" => "maria@hotel.com",
    //     "senha" => PasswordController::generateHash("maria123")
    // ];
    // UserController::criar($connect, $dataUsuario);
    
    // LISTAR TODOS OS USUÁRIOS
    // UserController::listarTodos($connect);
    
    // BUSCAR USUÁRIO POR ID
    // UserController::buscarPorId($connect, 2);
    
    // ATUALIZAR USUÁRIO
    // $dataUsuarioAtualizado = [
    //     "id_role_fk" => 2,
    //     "nome" => "Maria Santos Silva",
    //     "email" => "maria.silva@hotel.com",
    //     "senha" => PasswordController::generateHash("novaSenha123")
    // ];
    // UserController::atualizar($connect, 1, $dataUsuarioAtualizado);
    
    // // DELETAR USUÁRIO
    // UserController::delete($connect, 6);
    
    //          CRUD CLIENTES 
    
    // CRIAR CLIENTE
    // $dataCliente = [
    //     "nome" => "João Silva",
    //     "email" => "joao.silva@email.cm",
    //     "cpf" => "123.456.789-01",
    //     "telefone" => "(11) 99999-9999",
    //     "senha" => "joao13"
    // ];
    // ClienteController::criar($connect, $dataCliente);
    
    // LISTAR TODOS OS CLIENTES
    // ClienteController::listarTodos($connect);
    
    // BUSCAR CLIENTE POR ID
    // ClienteController::buscarPorId($connect, 1);
    
    // ATUALIZAR CLIENTE
    // $dataClienteAtualizado = [
    //     "nome" => "João Silva Santos",
    //     "email" => "joao.santos@email.com",
    //     "cpf" => "123.456.789-00",
    //     "telefone" => "(11) 98888-8888",
    //     "senha" => PasswordController::generateHash("novaSenha456")
    // ];
    // ClienteController::atualizar($connect, 1, $dataClienteAtualizado);
    
    // DELETAR CLIENTE
    // ClienteController::delete($connect, 3);
    
    //          CRUD QUARTOS

    // CRIAR QUARTO
    // $dataQuarto = [
    //     "nome" => "Suíte Presidencial",
    //     "numero" => "501",
    //     "tipo" => "Suíte",
    //     "camaSolteiro" => "0",
    //     "camaCasal" => "1",
    //     "disponivel" => 1,
    //     "preco" => 500.00
    // ];
    // QuartoController::criar($connect, $dataQuarto);
    
    // LISTAR TODOS OS QUARTOS
    // QuartoController::listarTodos($connect);
    
    // BUSCAR QUARTO POR ID
    // QuartoController::buscarPorId($connect, 3);
    
    // ATUALIZAR QUARTO
    // $dataQuartoAtualizado = [
    //     "nome" => "Suíte Presidencial Luxo",
    //     "numero" => "501",
    //     "tipo" => "Suíte Premium",
    //     "camaSolteiro" => "0",
    //     "camaCasal" => "1",
    //     "disponivel" => 1,
    //     "preco" => 600.00,
    //     "id_imagem_fk" => 2
    // ];
    // QuartoController::atualizar($connect, 3, $dataQuartoAtualizado);
    
    // DELETAR QUARTO
    // QuartoController::delete($connect, 3);
    
    //          CRUD ADICIONAIS 

    // CRIAR ADICIONAL
    // $dataAdicional = [
    //     "nome" => "Massagem Relaxante",
    //     "preco" => 120.00
    // ];
    // AdicionalController::criar($connect, $dataAdicional);
    
    // LISTAR TODOS OS ADICIONAIS
    // AdicionalController::listarTodos($connect);
    
    // BUSCAR ADICIONAL POR ID
    // AdicionalController::buscarPorId($connect, 1);
    
    // ATUALIZAR ADICIONAL
    // $dataAdicionalAtualizado = [
    //     "nome" => "Massagem Premium",
    //     "preco" => 150.00
    // ];
    // AdicionalController::atualizar($connect, 1, $dataAdicionalAtualizado);
    
    // DELETAR ADICIONAL
    // AdicionalController::delete($connect, 2);
    
    //          CRUD PEDIDOS
    
    // CRIAR PEDIDO
    // $dataPedido = [
    //     "id_usuario_fk" => 7,
    //     "id_cliente_fk" => 1,
    //     "pagamento" => 2
    // ];
    // PedidoController::criar($connect, $dataPedido);
    
    // LISTAR TODOS OS PEDIDOS
    // PedidoController::listarTodos($connect);
    
    // BUSCAR PEDIDO POR ID
    // PedidoController::buscarPorId($connect, 7);
    
    // ATUALIZAR PEDIDO
    // $dataPedidoAtualizado = [
    //     "pagamento" => 2
    // ];
    // PedidoController::atualizar($connect, 2, $dataPedidoAtualizado);
    
    // DELETAR PEDIDO
    // PedidoController::delete($connect, 6);
    
    //          CRUD RESERVAS 

    // CRIAR RESERVA
    // $dataReserva = [
    //     "id_pedido_fk" => 7,
    //     "id_quarto_fk" => 7,
    //     "valor_total" => 500.00
    // ];
    // ReservaController::criar($connect, $dataReserva);
    
    // LISTAR TODAS AS RESERVAS
    // ReservaController::listarTodos($connect);
    
    // BUSCAR RESERVA POR ID
    // ReservaController::buscarPorId($connect, 1);
    
    // ATUALIZAR RESERVA
    // $dataReservaAtualizada = [
    //     "id_pedido_fk" => 1,
    //     "id_quarto_fk" => 2,
    //     "valor_total" => 600.00
    // ];
    // ReservaController::atualizar($connect, 1, $dataReservaAtualizada);
    
    // DELETAR RESERVA
    // ReservaController::delete($connect, 1);
    
    // BUSCAR RESERVAS POR PEDIDO
    // ReservaController::listarPorPedido($connect, 1);

?>    