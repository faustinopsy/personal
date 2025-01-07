<?php

namespace app\library;

readonly class Route
{
    public function __construct(
        public string $uri,
        public string $request,
        public string $controller,
    ) {
    }

    private function currentUri()
    {
        return $_SERVER['REQUEST_URI'] !== '/' ? rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') : '/';
    }

    private function currentRequest()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function match()
    {
        //Substitui parâmetros dinâmicos no formato {param} dentro da rota registrada ($this->uri) por uma expressão regular que captura valores.
        /*
        Exemplo:
          Rota registrada: /blog/{id}
          Após preg_replace: /blog/([a-zA-Z0-9_-]+)
          O trecho ([a-zA-Z0-9_-]+) significa "qualquer sequência de caracteres alfanuméricos, hífens ou underscores".
        */
        $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_-]+)', $this->uri);
        
        //Substitui as barras / por \/ para que a string possa ser usada como expressão regular.
        /*
        Exemplo:
          /blog/([a-zA-Z0-9_-]+) → \/blog\/([a-zA-Z0-9_-]+)
        */
        $pattern = str_replace('/', '\/', $pattern);
        
        //Adiciona delimitadores ^ (início) e $ (fim) à expressão regular para garantir que a URL corresponda exatamente ao padrão.
        /*Exemplo:
          \/blog\/([a-zA-Z0-9_-]+) → /^\/blog\/([a-zA-Z0-9_-]+)$/
        */
        $pattern = '/^' . $pattern . '$/';
        
        if (
            preg_match($pattern, $this->currentUri(), $matches) &&
            strtolower($this->request) === $this->currentRequest()
        ) {
          /*
            Usa preg_match para verificar se a URL atual ($this->currentUri()) 
            corresponde ao padrão gerado.
            Verifica se o método HTTP ($this->request) também corresponde ao método da rota registrada.
            Exemplo de Correspondência:
            Rota registrada: /blog/{id}
            Método registrado: GET
            URL atual: /blog/42
              [
                  '/blog/42', // URL completa
                  '42'        // Valor capturado para o parâmetro {id}
              ]
            */

            // Extrair os parâmetros dinâmicos da URL
            /*
              Extrai os nomes dos parâmetros dinâmicos registrados na rota.
              Exemplo:
              Rota registrada: /blog/{id}
              Resultado de $paramKeys:
              [
                  ['{id}'], // Com as chaves
                  ['id']    // Sem as chaves
              ]
            */
            preg_match_all('/\{([a-zA-Z0-9_]+)\}/', $this->uri, $paramKeys);
            array_shift($matches); 
            // Remove o primeiro elemento (URL completa)
            /*
            Exemplo:
              Antes: ['/blog/42', '42']
              Depois: ['42']
              */
            $params = array_combine($paramKeys[1], $matches);
            /*
            Adiciona os parâmetros capturados ao array global $_GET.
            Exemplo de Resultado Final do $_GET:
            [
                'id' => '42',
                // Outros parâmetros GET do formulário
            ]
            */
            $_GET = array_merge($_GET, $params);

            return $this;
        }

        return null;
    }
}
