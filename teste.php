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
    
    // CRIAR USUÁRIO
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
    // UserController::buscarPorId($connect, 1);
    
    // ATUALIZAR USUÁRIO
    // $dataUsuarioAtualizado = [
    //     "id_role_fk" => 2,
    //     "nome" => "Maria Santos Silva",
    //     "email" => "maria.silva@hotel.com",
    //     "senha" => PasswordController::generateHash("novaSenha123")
    // ];
    // UserController::atualizar($connect, 1, $dataUsuarioAtualizado);
    
    // DELETAR USUÁRIO
    // UserController::delete($connect, 1);
    
    //          CRUD CLIENTES 
    
    // CRIAR CLIENTE
    // $dataCliente = [
    //     "id_roles_fk" => 2,
    //     "nome" => "João Silva",
    //     "email" => "joao.silva@email.com",
    //     "cpf" => "123.456.789-00",
    //     "telefone" => "(11) 99999-9999",
    //     "senha" => PasswordController::generateHash("joao123")
    // ];
    // ClienteController::criar($connect, $dataCliente);
    
    // LISTAR TODOS OS CLIENTES
    // ClienteController::listarTodos($connect);
    
    // BUSCAR CLIENTE POR ID
    // ClienteController::buscarPorId($connect, 1);
    
    // ATUALIZAR CLIENTE
    // $dataClienteAtualizado = [
    //     "id_roles_fk" => 2,
    //     "nome" => "João Silva Santos",
    //     "email" => "joao.santos@email.com",
    //     "cpf" => "123.456.789-00",
    //     "telefone" => "(11) 98888-8888",
    //     "senha" => PasswordController::generateHash("novaSenha456")
    // ];
    // ClienteController::atualizar($connect, 1, $dataClienteAtualizado);
    
    // DELETAR CLIENTE
    // ClienteController::delete($connect, 1);
    
    //          CRUD QUARTOS

    // CRIAR QUARTO
    // $dataQuarto = [
    //     "nome" => "Suíte Presidencial",
    //     "numero" => "501",
    //     "tipo" => "Suíte",
    //     "camaSolteiro" => "0",
    //     "camaCasal" => "1",
    //     "disponível" => 1,
    //     "preco" => 500.00,
    //     "id_imagem_fk" => 1
    // ];
    // QuartoController::criar($connect, $dataQuarto);
    
    // LISTAR TODOS OS QUARTOS
    // QuartoController::listarTodos($connect);
    
    // BUSCAR QUARTO POR ID
    // QuartoController::buscarPorId($connect, 1);
    
    // ATUALIZAR QUARTO
    // $dataQuartoAtualizado = [
    //     "nome" => "Suíte Presidencial Luxo",
    //     "numero" => "501",
    //     "tipo" => "Suíte Premium",
    //     "camaSolteiro" => "0",
    //     "camaCasal" => "1",
    //     "disponível" => 1,
    //     "preco" => 600.00,
    //     "id_imagem_fk" => 2
    // ];
    // QuartoController::atualizar($connect, 1, $dataQuartoAtualizado);
    
    // DELETAR QUARTO
    // QuartoController::delete($connect, 1);
    
    //          CRUD ADICIONAIS 

    // CRIAR ADICIONAL
    // $dataAdicional = [
    //     "nome" => "Massagem Relaxante",
    //     "descricao" => "Sessão de 60 minutos com óleos essenciais",
    //     "preco" => 120.00,
    //     "disponivel" => 1
    // ];
    // AdicionalController::criar($connect, $dataAdicional);
    
    // LISTAR TODOS OS ADICIONAIS
    // AdicionalController::listarTodos($connect);
    
    // BUSCAR ADICIONAL POR ID
    // AdicionalController::buscarPorId($connect, 1);
    
    // ATUALIZAR ADICIONAL
    // $dataAdicionalAtualizado = [
    //     "nome" => "Massagem Premium",
    //     "descricao" => "Sessão de 90 minutos com óleos essenciais e música relaxante",
    //     "preco" => 150.00,
    //     "disponivel" => 1
    // ];
    // AdicionalController::atualizar($connect, 1, $dataAdicionalAtualizado);
    
    // DELETAR ADICIONAL
    // AdicionalController::delete($connect, 1);
    
    //          CRUD PEDIDOS
    
    // CRIAR PEDIDO
    // $dataPedido = [
    //     "id_usuario_fk" => 1,
    //     "id_cliente_fk" => 1,
    //     "pagamento" => "Pix"
    // ];
    // PedidoController::criar($connect, $dataPedido);
    
    // LISTAR TODOS OS PEDIDOS
    // PedidoController::listarTodos($connect);
    
    // BUSCAR PEDIDO POR ID
    // PedidoController::buscarPorId($connect, 1);
    
    // ATUALIZAR PEDIDO
    // $dataPedidoAtualizado = [
    //     "id_usuario_fk" => 2,
    //     "id_cliente_fk" => 1,
    //     "pagamento" => "Credito"
    // ];
    // PedidoController::atualizar($connect, 1, $dataPedidoAtualizado);
    
    // DELETAR PEDIDO
    // PedidoController::delete($connect, 1);
    
    //          CRUD RESERVAS 

    // CRIAR RESERVA
    // $dataReserva = [
    //     "id_pedido_fk" => 1,
    //     "id_quarto_fk" => 1,
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