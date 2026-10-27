-- Conteúdos do site (app/Language/pt/Site.php) para a tabela `Conteudo`
-- Rodar no phpMyAdmin: banco a28305 > aba SQL > colar e Executar

SET NAMES utf8mb4;

-- Corrige o título "Quem sou" (estava com muitos espaços no final)
UPDATE `Conteudo` SET `Titulo` = TRIM(`Titulo`);

-- Atualiza o Contato que já existe (Id 3)
UPDATE `Conteudo`
SET `Texto` = 'Entre em contato pelo e-mail seu-email@exemplo.com.'
WHERE `Id` = 3;

INSERT INTO `Conteudo` (`Titulo`, `Texto`) VALUES
('Início', 'Bem-vinda ao meu site!

Meu nome é Rhayane Freitas, sou de Minas Gerais e curso Tecnologia em Análise e Desenvolvimento de Sistemas. Desde o início da minha jornada na área de tecnologia, desenvolvi um grande interesse por desenvolvimento de software, projetos web e segurança da informação, sempre buscando entender como a tecnologia pode ser usada para criar soluções que façam sentido na prática.

Tenho experiência com projetos acadêmicos e pessoais, que me permitiram aplicar e expandir meus conhecimentos em diferentes áreas da tecnologia. Gosto de aprender continuamente, me desafiar e explorar novas ferramentas e metodologias. Tenho contato com linguagens como C/C++, Java, Flutter, SQL, PHP, Lua, JavaScript, além de HTML, CSS e frameworks como CodeIgniter, e também me interesso por cybersecurity, redes de computadores e boas práticas de desenvolvimento.

Este site é um espaço para compartilhar um pouco da minha trajetória, os projetos que desenvolvo, minhas certificações, estudos e ideias. Aqui você também encontra meu currículo e algumas publicações sobre temas que estou aprendendo ou que me interessam. Meu objetivo é continuar evoluindo profissionalmente na área de tecnologia e contribuir com projetos que gerem impacto positivo.

Seja bem-vinda(o) e sinta-se à vontade para explorar!'),

('Projetos', 'Site pessoal com CodeIgniter 4 (2026)
Este site: rotas, controllers, views, layout e versão em dois idiomas.'),

('Certificações', 'Nome da certificação (2026)
Instituição que emitiu o certificado.'),

('Publicações', 'Título do seu trabalho ou artigo (2026)
Onde foi publicado ou apresentado (faculdade, evento, revista...).

Outro trabalho de exemplo (2025)
Ex.: trabalho de conclusão de disciplina, projeto de extensão...'),

('Blog', 'Meu primeiro site com CodeIgniter 4 (01/10/2026)
Como criei este site para a faculdade: rotas, controllers, views e layout.

O que aprendi sobre CSS (25/09/2026)
Classes, cores, flexbox e como deixar o site bonito no celular.'),

('CV', 'Formação
- Nome do seu curso, Nome da faculdade (2025 – atual)

Experiência
- Seu cargo, Nome da empresa (ano – ano)

Habilidades
- PHP e CodeIgniter 4
- HTML e CSS
- MySQL
- Git

Idiomas
- Português (nativo)');
