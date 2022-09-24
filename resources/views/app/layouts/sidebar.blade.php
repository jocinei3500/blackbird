    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-primary" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <a href="{{ route('app.home') }}" class="nav-link px-1 active">
                            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="my-2">
                        <hr class="dropdown-divider bg-light" />
                    </li>

                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#suprimentos">
                            <span class="me-3"><i class="bi bi-cart-plus"></i></span>
                            <span>Suprimentos</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="suprimentos">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="{{ route('produto.index') }}" class="nav-link px-2">
                                        <span class="me-2"></span>
                                        <span>Produtos</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('entrada-produto.index') }}" class="nav-link px-2">
                                        <span class="me-2"></span>
                                        <span>Entrada de Produto</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('saida-produto.index') }}" class="nav-link px-2">
                                        <span class="me-2"></span>
                                        <span>Saída de Produto</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('marca.index') }}" class="nav-link px-2">
                                        <span class="me-2"></span>
                                        <span>Marcas</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('category.index') }}" class="nav-link px-2">
                                        <span class="me-2"></span>
                                        <span>Categorias</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('unidade-medida.index') }}" class="nav-link px-2">
                                        <span class="me-2"></span>
                                        <span>Unidades de Medida</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('produto-fornecedor.create') }}" class="nav-link px-2">
                                        <span class="me-2"></span>
                                        <span>Produto x Fornecedor</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#cadastroGeral">
                            <span class="me-3"><i class="icofont-hard-disk"></i></span>
                            <span>Cadastro Geral</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="cadastroGeral">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="{{ route('empresa.index') }}" class="nav-link px-3">
                                        <span class="me-2"></span>
                                        <span>Empresa</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('fornecedor.index') }}" class="nav-link px-3">
                                        <span class="me-2"></span>
                                        <span>Fornecedores</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('cliente.index') }}" class="nav-link px-3">
                                        <span class="me-2"></span>
                                        <span>Clientes</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('obra.index') }}" class="nav-link px-3">
                                        <span class="me-2"></span>
                                        <span>Obra</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('transportadora.index') }}" class="nav-link px-3">
                                        <span class="me-2"></span>
                                        <span>Transpontadora</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('tipo-veiculo.index') }}" class="nav-link px-3">
                                        <span class="me-2"></span>
                                        <span>Tipo de Veículos</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#producao">
                            <span class="me-3"><i class="icofont-industries-5"></i></span>
                            <span>Produção</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="producao">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="{{ route('ordem-producao.index') }}" class="nav-link px-3">
                                        <span class="me-2"></span>
                                        <span>Ordem de Produção</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('recursos-producao.index') }}" class="nav-link px-3">
                                        <span class="me-2"></span>
                                        <span>Operação de Equipamentos</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('carregamento.index') }}" class="nav-link px-3">
                                        <span class="me-2"></span>
                                        <span>Carregamento de Cargas</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#equipamentos">
                            <span class="me-3"><i class="icofont-vehicle-trucktor"></i></span>
                            <span>Equipamento</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="equipamentos">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="{{ route('equipamento.index') }}" class="nav-link px-3">
                                        <span class="me-2"></span>
                                        <span>Equipamentos</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('recursos-producao.index') }}" class="nav-link px-3">
                                        <span class="me-2"></span>
                                        <span>Operação de Equipamentos</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('parada-equipamento.index') }}" class="nav-link px-3">
                                        <span class="me-2"></span>
                                        <span>Paradas de Equipamentos</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    @can('admin')
                        
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#configuracoes">
                            <span class="me-3"><i class="icofont-settings"></i></span>
                            <span>Configuracoes</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="configuracoes">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="{{ route('user.index') }}" class="nav-link px-3">
                                        <span class="me-2"></span>
                                        <span>Usuários</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @endcan

                </ul>
            </nav>
        </div>
    </div>
    <!-- offcanvas -->