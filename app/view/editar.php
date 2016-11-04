<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Desenvolvimento Web com PHP, MySQL e JavaScript</title>

    <!-- Bootstrap Core CSS -->
    <link href="/assets/lib/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assets/css/blog-post.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Blog</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/">Início</a></li>
                    <li><a href="/criar">Criar</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <form action="#" method="POST">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="titulo">Título *</label>
                        <input id="titulo" type="text" name="titulo" class="form-control" placeholder="Informe o título desse post *">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="autor">Autor *</label>
                        <input id="autor" type="text" name="autor" class="form-control" placeholder="Informe o autor desse post *">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="titulo">Categoria *</label>
                        <select class="form-control" name="categoria">
                            <option value="">-- Seleciona uma categoria</option>
                            <option value="1">Filme</option>
                            <option value="2">Série</option>
                            <option value="3">Aventura</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="conteudo">Conteúdo *</label>
                        <textarea id="conteudo" name="conteudo" class="form-control" placeholder="Qual é o conteudo desse post? *" rows="4"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="button" class="btn btn-info">Salvar alterações</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-muted"><strong>*</strong> Esses campos são obrigatórios</a>.</p>
                </div>
            </div>

        </form>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Desenvolvimento Web com PHP, MySQL e JavaScript</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="/assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/lib/js/bootstrap.min.js"></script>
</body>
</html>
