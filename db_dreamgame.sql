-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/04/2025 às 05:33
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_dreamgame`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_generos`
--

CREATE TABLE `tb_generos` (
  `ID_genero` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_generos`
--

INSERT INTO `tb_generos` (`ID_genero`, `genero`) VALUES
(1, 'Ação'),
(2, 'RPG'),
(3, 'Aventura'),
(4, 'FPS'),
(5, 'MOBA'),
(6, 'Battle Royale'),
(7, 'Esportes'),
(8, 'Simulação'),
(9, 'Sandbox');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_info_users`
--

CREATE TABLE `tb_info_users` (
  `ID_info` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ID_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_info_users`
--

INSERT INTO `tb_info_users` (`ID_info`, `email`, `senha`, `ID_users`) VALUES
(1, 'piail@gmail.com', '$2y$10$klSzCf5JVNqUL544ffBedOCI9Zlc..w4ckcqQ0.7N4bSI/ncbpQSm', 1),
(2, 'dbsaFUYG@gamil.com', '$2y$10$0pIWGkvYgOk2079MgC0N0OytBpxO/ixj8iEt.tbRfTYyfNHiWFJ9O', 2),
(3, 'fug@gamil.com', '$2y$10$t/nixRTvoGth7OJu1hU8zeG/7X51d4yAZd1tULQ/aBZnjodLz.T7O', 3),
(4, 'fugikt@gamil.com', '$2y$10$ic9rCc2izB2qrz/83gn1nea2/gP2G1wayxbXYs5f7AnwHm2UlRUzy', 4),
(5, 'piail22@gmail.com', '$2y$10$9xZ2L/vs5Bwm5hjKsxB5sehiKq5hZSMQozZgugr.JL366ZhnaPE5W', 5),
(6, 'piail222@gmail.com', '$2y$10$VNboUeag7TWwr.C.Bn99gehJagS.FvQXnhJsDpdKmmLlv/R.z.g0.', 6),
(7, 'piail5409@gmail.com', '$2y$10$ICaWuoPHPgu0BrUNzZwtvuVZK7UunqKEPqauU5wU9xE.g5/h9uIiq', 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `ID` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `ano` year(4) DEFAULT NULL,
  `desenvolvedor` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `avaliacao` tinyint(1) NOT NULL CHECK (`avaliacao` between 1 and 5),
  `ID_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`ID`, `titulo`, `imagen`, `valor`, `ano`, `desenvolvedor`, `descricao`, `avaliacao`, `ID_genero`) VALUES
(3, 'The Last of Us Part II', 'the_last_of_us_2.jpg', 249.90, '2020', 'Naughty Dog', 'Uma sequência épica de ação e aventura em um mundo pós-apocalíptico.', 5, 3),
(4, 'Cyberpunk 2077', 'cyberpunk_2077.jpg', 199.90, '2020', 'CD Projekt Red', 'Exploração de um futuro distópico em Night City com múltiplos caminhos e escolhas.', 5, 1),
(5, 'God of War', 'god_of_war.jpg', 199.90, '2018', 'Santa Monica Studio', 'Kratos e seu filho Atreus enfrentam mitologia nórdica em uma jornada de redenção.', 5, 3),
(6, 'Red Dead Redemption 2', 'red_dead_redemption_2.jpg', 249.90, '2018', 'Rockstar Games', 'Viva a experiência do Velho Oeste como um foragido tentando sobreviver.', 5, 1),
(7, 'Spider-Man: Miles Morales', 'spiderman_miles_morales.jpg', 179.90, '2020', 'Insomniac Games', 'Acompanhe Miles Morales enquanto ele descobre seu novo papel como o Homem-Aranha.', 5, 2),
(8, 'Horizon Zero Dawn', 'horizon_zero_dawn.jpg', 179.90, '2017', 'Guerrilla Games', 'Aloy enfrenta criaturas mecânicas enquanto busca respostas sobre seu mundo desolado.', 4, 3),
(9, 'The Witcher 3: Wild Hunt', 'witcher_3.jpg', 129.90, '2015', 'CD Projekt Red', 'Jogo de aventura e fantasia, com monstros, política e escolhas difíceis.', 4, 4),
(10, 'Assassin\'s Creed Valhalla', 'assassins_creed_valhalla.jpg', 199.90, '2020', 'Ubisoft', 'Viva a era dos vikings e explore a Inglaterra medieval em uma busca por glória.', 5, 9),
(11, 'Call of Duty: Modern Warfare', 'cod_modern_warfare.jpg', 179.90, '2019', 'Infinity Ward', 'Uma nova versão do clássico Modern Warfare com jogabilidade realista e intensa.', 3, 6),
(12, 'Minecraft', 'minecraft.jpg', 129.90, '2011', 'Mojang', 'Construa e explore mundos em um jogo de blocos infinito e criativo.', 4, 7),
(13, 'Fortnite', 'fortnite.jpg', 0.00, '2017', 'Epic Games', 'Lute até a última pessoa em pé nesse jogo de batalha real com gráficos cartunescos.', 5, 8),
(14, 'FIFA 21', 'fifa_21.jpg', 199.90, '2020', 'EA Sports', 'Jogo de futebol com novas atualizações e melhorias para a temporada atual.', 5, 3),
(15, 'Animal Crossing: New Horizons', 'animal_crossing.jpg', 199.90, '2020', 'Nintendo', 'Viva em uma ilha tropical e interaja com os moradores em um ritmo tranquilo.', 5, 1),
(16, 'Super Mario Odyssey', 'super_mario_odyssey.jpg', 179.90, '2017', 'Nintendo', 'Acompanhe Mario em uma jornada mundial para resgatar a Princesa Peach.', 4, 2),
(17, 'Sekiro: Shadows Die Twice', 'sekiro.jpg', 249.90, '2019', 'FromSoftware', 'Aventure-se no Japão feudal, lutando contra samurais e monstros sobrenaturais.', 4, 5),
(18, 'Fall Guys: Ultimate Knockout', 'fall_guys.jpg', 89.90, '2020', 'Mediatonic', 'Lute para ser o último sobrevivente em uma série de minijogos malucos.', 5, 2),
(19, 'League of Legends', 'league_of_legends.jpg', 0.00, '2009', 'Riot Games', 'Um dos maiores MOBAs do mundo, com competições e campeonatos globais.', 5, 3),
(20, 'Among Us', 'among_us.jpg', 29.90, '2018', 'InnerSloth', 'Jogo de mistério onde você precisa descobrir quem entre os jogadores é o impostor.', 4, 4),
(21, 'Ghost of Tsushima', 'ghost_of_tsushima.jpg', 249.90, '2020', 'Sucker Punch', 'Siga Jin Sakai na luta pela sobrevivência e pela honra no Japão feudal.', 5, 0),
(22, 'Doom Eternal', 'doom_eternal.jpg', 199.90, '2020', 'id Software', 'Lute contra demônios em uma experiência de FPS ultraviolento e intensa.', 2, 0),
(23, 'Final Fantasy VII Remake', 'final_fantasy_7_remake.jpg', 249.90, '2020', 'Square Enix', 'Reinterpretação moderna de um dos maiores clássicos do RPG, com gráficos impressionantes.', 3, 0),
(24, 'Uncharted 4: A Thief\'s End', 'uncharted_4.jpg', 249.90, '2016', 'Naughty Dog', 'Ação e aventura com um dos maiores caçadores de tesouros do mundo.', 5, 1),
(25, 'Tomb Raider', 'tomb_raider.jpg', 149.90, '2013', 'Crystal Dynamics', 'Aventura de ação com Lara Croft, onde ela luta pela sobrevivência.', 5, 1),
(26, 'Batman: Arkham Knight', 'batman_arkham_knight.jpg', 199.90, '2015', 'Rocksteady Studios', 'O Cavaleiro das Trevas enfrenta novos desafios e vilões em Gotham.', 5, 1),
(27, 'Assassin\'s Creed Odyssey', 'assassins_creed_odyssey.jpg', 229.90, '2018', 'Ubisoft', 'Lute nas Guerras Gregas como um mercenário em busca de sua história.', 5, 1),
(28, 'Just Cause 4', 'just_cause_4.jpg', 199.90, '2018', 'Avalanche Studios', 'Ação explosiva e libertação em um mundo aberto gigantesco.', 4, 1),
(29, 'Gears 5', 'gears_5.jpg', 179.90, '2019', 'The Coalition', 'Lute para salvar a humanidade em um jogo de ação intenso e tático.', 4, 1),
(30, 'Red Dead Redemption', 'red_dead_redemption.jpg', 249.90, '2010', 'Rockstar Games', 'Viva o Velho Oeste e enfrente bandidos e aventuras.', 5, 1),
(31, 'Far Cry 5', 'far_cry_5.jpg', 199.90, '2018', 'Ubisoft', 'Enfrente cultos e explore o Montana rural em um mundo aberto.', 4, 1),
(32, 'Battlefield V', 'battlefield_v.jpg', 179.90, '2018', 'EA DICE', 'Vivencie a Segunda Guerra Mundial em batalhas realistas e grandiosas.', 4, 1),
(33, 'Call of Duty: Black Ops Cold War', 'call_of_duty_cold_war.jpg', 199.90, '2020', 'Treyarch', 'Dispute a Guerra Fria em batalhas multiplayer intensas.', 4, 1),
(34, 'Elder Scrolls V: Skyrim', 'skyrim.jpg', 199.90, '2011', 'Bethesda Game Studios', 'Viva em um mundo de fantasia com dragões e magia.', 5, 2),
(35, 'Dragon Age: Inquisition', 'dragon_age_inquisition.jpg', 229.90, '2014', 'BioWare', 'Lute por um mundo dividido com magia e monstros em um RPG épico.', 5, 2),
(36, 'The Witcher 2: Assassins of Kings', 'witcher_2.jpg', 129.90, '2011', 'CD Projekt Red', 'Entre na pele de Geralt, um caçador de monstros em um mundo medieval.', 5, 2),
(37, 'Divinity: Original Sin 2', 'divinity_original_sin_2.jpg', 199.90, '2017', 'Larian Studios', 'RPG tático com liberdade de escolhas e história interativa.', 5, 2),
(38, 'Pillars of Eternity', 'pillars_of_eternity.jpg', 149.90, '2015', 'Obsidian Entertainment', 'Mergulhe em um RPG isométrico clássico com foco em narrativa.', 5, 2),
(39, 'Final Fantasy XV', 'final_fantasy_15.jpg', 249.90, '2016', 'Square Enix', 'Viva uma jornada épica no vasto mundo de Eos com o príncipe Noctis.', 5, 2),
(40, 'Persona 5', 'persona_5.jpg', 179.90, '2016', 'Atlus', 'Enfrente dilemas morais e combata monstros em um RPG japonês clássico.', 5, 2),
(41, 'Kingdom Come: Deliverance', 'kingdom_come_deliverance.jpg', 199.90, '2018', 'Warhorse Studios', 'RPG medieval de mundo aberto com foco em realismo e narrativa.', 4, 2),
(42, 'Dark Souls III', 'dark_souls_3.jpg', 199.90, '2016', 'FromSoftware', 'Desafios e batalhas difíceis em um mundo sombrio e misterioso.', 5, 2),
(43, 'Bloodborne', 'bloodborne.jpg', 179.90, '2015', 'FromSoftware', 'Lute contra criaturas horríveis em um mundo gótico e sombrio.', 5, 2),
(44, 'Uncharted: The Nathan Drake Collection', 'uncharted_drake_collection.jpg', 199.90, '2015', 'Naughty Dog', 'Reúna os três primeiros jogos da série Uncharted em uma coleção remasterizada.', 5, 3),
(45, 'Life is Strange', 'life_is_strange.jpg', 149.90, '2015', 'Dontnod Entertainment', 'Acompanhe uma adolescente com poderes de viagem no tempo em uma história emocionante.', 5, 3),
(46, 'Grim Fandango Remastered', 'grim_fandango.jpg', 129.90, '2015', 'Double Fine Productions', 'Uma aventura de mistério com um estilo visual único em um mundo dos mortos.', 5, 3),
(47, 'The Secret of Monkey Island', 'monkey_island.jpg', 99.90, '1990', 'Lucasfilm Games', 'Clássico de aventura point-and-click com piratas e enigmas.', 5, 3),
(48, 'Broken Age', 'broken_age.jpg', 149.90, '2014', 'Double Fine Productions', 'Uma aventura visual com duas histórias paralelas de dois jovens heróis.', 4, 3),
(49, 'Oxenfree', 'oxenfree.jpg', 129.90, '2016', 'Night School Studio', 'Mistério e aventura com uma trama sobrenatural e escolhas difíceis.', 5, 3),
(50, 'Journey', 'journey.jpg', 179.90, '2012', 'Thatgamecompany', 'Uma aventura curta, mas muito emocional, onde você viaja por um vasto deserto.', 5, 3),
(51, 'Syberia', 'syberia.jpg', 129.90, '2002', 'Microïds', 'Uma aventura de point-and-click com mistérios e cenários fantásticos.', 4, 3),
(52, 'Firewatch', 'firewatch.jpg', 129.90, '2016', 'Campo Santo', 'Aventura em primeira pessoa com mistério e uma bela narrativa.', 5, 3),
(53, 'The Walking Dead', 'the_walking_dead.jpg', 149.90, '2012', 'Telltale Games', 'Jogo de aventura baseado na famosa série de quadrinhos e TV.', 5, 3),
(54, 'Overwatch', 'overwatch.jpg', 199.90, '2016', 'Blizzard Entertainment', 'FPS multiplayer com heróis únicos e jogabilidade dinâmica.', 5, 4),
(55, 'Rainbow Six Siege', 'rainbow_six_siege.jpg', 179.90, '2015', 'Ubisoft', 'Tática de FPS com equipes de operadores especiais contra ameaças em ambientes fechados.', 5, 4),
(56, 'Battlefield 1', 'battlefield_1.jpg', 179.90, '2016', 'EA DICE', 'Viva a experiência da Primeira Guerra Mundial com batalhas épicas e realistas.', 5, 4),
(57, 'Call of Duty: WWII', 'call_of_duty_wwii.jpg', 179.90, '2017', 'Sledgehammer Games', 'Reviva os momentos mais intensos da Segunda Guerra Mundial.', 4, 4),
(58, 'Far Cry 3', 'far_cry_3.jpg', 179.90, '2012', 'Ubisoft', 'FPS de mundo aberto, com ação e aventura em uma ilha tropical.', 5, 4),
(59, 'Destiny 2', 'destiny_2.jpg', 199.90, '2017', 'Bungie', 'FPS com elementos de RPG e um mundo compartilhado de ficção científica.', 5, 4),
(60, 'DOOM (2016)', 'doom_2016.jpg', 179.90, '2016', 'id Software', 'FPS de ação intensa com combate contra demônios e gráficos estilizados.', 5, 4),
(61, 'Halo 5: Guardians', 'halo_5.jpg', 199.90, '2015', '343 Industries', 'O retorno de Master Chief em uma nova aventura intergaláctica.', 5, 4),
(62, 'Call of Duty: Black Ops III', 'black_ops_iii.jpg', 179.90, '2015', 'Treyarch', 'FPS futurista com táticas e habilidades especiais em uma guerra mundial.', 4, 4),
(63, 'Titanfall 2', 'titanfall_2.jpg', 179.90, '2016', 'Respawn Entertainment', 'Combinação de FPS com ação em mechas gigantes e combate de alta velocidade.', 5, 4),
(64, 'Dota 2', 'dota2.jpg', 0.00, '2013', 'Valve', 'O mais popular MOBA do mundo, com gráficos incríveis e uma jogabilidade estratégica profunda.', 5, 5),
(65, 'Heroes of the Storm', 'heroes_of_the_storm.jpg', 0.00, '2015', 'Blizzard Entertainment', 'Lute em equipes de heróis de vários universos da Blizzard, em um MOBA altamente estratégico.', 4, 5),
(66, 'Smite', 'smite.jpg', 0.00, '2014', 'Hi-Rez Studios', 'MOBA onde os jogadores controlam deuses mitológicos em batalhas intensas e emocionantes.', 4, 5),
(67, 'Vainglory', 'vainglory.jpg', 0.00, '2014', 'Super Evil Megacorp', 'MOBA para dispositivos móveis com um foco em jogabilidade estratégica e gráficos impressionantes.', 4, 5),
(68, 'Arena of Valor', 'arena_of_valor.jpg', 0.00, '2016', 'Tencent Games', 'MOBA para dispositivos móveis com uma jogabilidade simples e acessível, mas com profundidade estratégica.', 5, 5),
(69, 'Paladins', 'paladins.jpg', 0.00, '2016', 'Hi-Rez Studios', 'MOBA que mistura elementos de FPS com habilidades únicas de heróis em batalhas dinâmicas.', 4, 5),
(70, 'Mobile Legends', 'mobile_legends.jpg', 0.00, '2016', 'Moonton', 'Um dos MOBAs mais populares para dispositivos móveis, com jogos rápidos e heróis únicos.', 5, 5),
(71, 'League of Legends: Wild Rift', 'wild_rift.jpg', 0.00, '2020', 'Riot Games', 'Versão mobile do popular jogo MOBA, com gráficos e jogabilidade adaptados para celulares.', 5, 5),
(72, 'Battalion 1944', 'battalion_1944.jpg', 0.00, '2018', 'Bulkhead Interactive', 'FPS com forte influência de MOBAs, misturando estratégias de batalha com elementos históricos.', 4, 5),
(73, 'Strife', 'strife.jpg', 0.00, '2015', 'S2 Games', 'MOBA com ênfase em jogabilidade simplificada e foco em equilíbrio e diversão.', 4, 5),
(74, 'Apex Legends', 'apex_legends.jpg', 0.00, '2019', 'Respawn Entertainment', 'Battle royale com heróis únicos e habilidades especiais.', 5, 6),
(75, 'PUBG: Battlegrounds', 'pubg.jpg', 59.90, '2017', 'PUBG Corporation', 'Jogo realista de sobrevivência em estilo battle royale.', 4, 6),
(76, 'Warzone', 'warzone.jpg', 0.00, '2020', 'Infinity Ward', 'Modo battle royale da série Call of Duty com gráficos realistas.', 4, 6),
(77, 'Spellbreak', 'spellbreak.jpg', 0.00, '2020', 'Proletariat Inc.', 'Battle royale mágico com combate de feitiços.', 4, 6),
(78, 'Realm Royale', 'realm_royale.jpg', 0.00, '2018', 'Hi-Rez Studios', 'Mistura de battle royale com classes e montarias.', 3, 6),
(79, 'Hyper Scape', 'hyper_scape.jpg', 0.00, '2020', 'Ubisoft', 'Battle royale futurista com jogabilidade vertical.', 3, 6),
(80, 'Super People', 'super_people.jpg', 0.00, '2022', 'Wonder People', 'Battle royale com personagens de superpoderes.', 4, 6),
(81, 'The Cycle: Frontier', 'the_cycle_frontier.jpg', 0.00, '2022', 'YAGER', 'FPS PvEvP com mecânicas de extração.', 3, 6),
(82, 'Naraka: Bladepoint', 'naraka_bladepoint.jpg', 99.90, '2021', '24 Entertainment', 'Battle royale com combate corpo-a-corpo e parkour.', 5, 6),
(83, 'CRSED: F.O.A.D.', 'crsed.jpg', 0.00, '2019', 'Darkflow Software', 'Battle royale caótico com armas bizarras e poderes.', 3, 6),
(84, 'eFootball 2022', 'efootball_2022.jpg', 0.00, '2021', 'Konami', 'Simulação de futebol gratuita com atualizações constantes.', 3, 7),
(85, 'FIFA 22', 'fifa_22.jpg', 199.90, '2021', 'EA Sports', 'Futebol com jogabilidade realista e modos variados.', 4, 7),
(86, 'NBA 2K22', 'nba_2k22.jpg', 249.90, '2021', 'Visual Concepts', 'Simulação de basquete com jogadores reais.', 5, 7),
(87, 'Madden NFL 22', 'madden_22.jpg', 229.90, '2021', 'EA Sports', 'Jogo de futebol americano com modo carreira.', 4, 7),
(88, 'Rocket League', 'rocket_league.jpg', 0.00, '2015', 'Psyonix', 'Futebol com carros turbinados em arenas futuristas.', 5, 7),
(89, 'Tony Hawk\'s Pro Skater 1+2', 'tony_hawk.jpg', 149.90, '2020', 'Vicarious Visions', 'Remake dos clássicos de skate com gráficos atualizados.', 5, 7),
(90, 'WWE 2K22', 'wwe_2k22.jpg', 249.90, '2022', '2K Games', 'Simulador de luta livre com diversos lutadores e arenas.', 4, 7),
(91, 'F1 2021', 'f1_2021.jpg', 199.90, '2021', 'Codemasters', 'Corridas de Fórmula 1 com equipes oficiais e circuitos reais.', 5, 7),
(92, 'PGA Tour 2K21', 'pga_tour.jpg', 149.90, '2020', 'HB Studios', 'Simulação de golfe com física realista.', 4, 7),
(93, 'Skater XL', 'skater_xl.jpg', 99.90, '2020', 'Easy Day Studios', 'Skate realista com foco em manobras e física.', 4, 7),
(94, 'The Sims 4', 'sims_4.jpg', 199.90, '2014', 'Maxis', 'Crie e controle pessoas em uma simulação de vida.', 5, 8),
(95, 'Cities: Skylines', 'cities_skylines.jpg', 99.90, '2015', 'Colossal Order', 'Simulador de construção e gestão de cidades.', 5, 8),
(96, 'Flight Simulator 2020', 'flight_simulator.jpg', 249.90, '2020', 'Asobo Studio', 'Simulação realista de voo com gráficos impressionantes.', 5, 8),
(97, 'Farming Simulator 22', 'farming_simulator.jpg', 179.90, '2021', 'GIANTS Software', 'Cultive e administre uma fazenda com veículos reais.', 4, 8),
(98, 'Euro Truck Simulator 2', 'euro_truck.jpg', 79.90, '2012', 'SCS Software', 'Dirija caminhões por estradas europeias.', 5, 8),
(99, 'Train Sim World 2', 'train_sim.jpg', 129.90, '2020', 'Dovetail Games', 'Controle trens com precisão realista em diversas linhas.', 4, 8),
(100, 'House Flipper', 'house_flipper.jpg', 69.90, '2018', 'Empyrean', 'Compre, reforme e venda casas.', 4, 8),
(101, 'PowerWash Simulator', 'powerwash.jpg', 59.90, '2022', 'FuturLab', 'Limpeza relaxante de ambientes com lavadora de alta pressão.', 5, 8),
(102, 'PC Building Simulator', 'pc_building.jpg', 49.90, '2019', 'The Irregular Corporation', 'Monte e conserte PCs como na vida real.', 4, 8),
(103, 'Cooking Simulator', 'cooking_simulator.jpg', 69.90, '2019', 'Big Cheese Studio', 'Cozinhe diversos pratos com física realista.', 3, 8),
(104, 'Terraria', 'terraria.jpg', 49.90, '2011', 'Re-Logic', 'Aventura sandbox em 2D com exploração e criação.', 5, 9),
(105, 'Garry\'s Mod', 'garrys_mod.jpg', 19.90, '2006', 'Facepunch Studios', 'Caixa de areia baseada em física com infinitas possibilidades.', 5, 9),
(106, 'Roblox', 'roblox.jpg', 0.00, '2006', 'Roblox Corporation', 'Plataforma de criação de jogos e mundos virtuais.', 4, 9),
(107, 'No Man\'s Sky', 'no_mans_sky.jpg', 199.90, '2016', 'Hello Games', 'Explore planetas infinitos em um universo procedural.', 4, 9),
(108, 'Trove', 'trove.jpg', 0.00, '2015', 'Trion Worlds', 'MMO sandbox com classes e aventuras em blocos.', 4, 9),
(109, 'Astroneer', 'astroneer.jpg', 99.90, '2019', 'System Era Softworks', 'Explore planetas e colete recursos para construir bases.', 4, 9),
(110, 'Besiege', 'besiege.jpg', 29.90, '2015', 'Spiderling Studios', 'Construa máquinas para destruir fortalezas medievais.', 4, 9),
(111, 'Scrap Mechanic', 'scrap_mechanic.jpg', 59.90, '2016', 'Axolot Games', 'Crie veículos e engenhocas em um mundo criativo.', 4, 9),
(112, 'Eco', 'eco.jpg', 89.90, '2018', 'Strange Loop Games', 'Crie uma civilização cooperativa equilibrando ecossistemas.', 4, 9),
(113, 'Portal Knights', 'portal_knights.jpg', 59.90, '2017', 'Keen Games', 'RPG de ação com criação e construção de mundos.', 4, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `ID_users` int(11) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_users`
--

INSERT INTO `tb_users` (`ID_users`, `apelido`, `nome`, `nascimento`) VALUES
(1, 'Leandrooooo', 'leandro peoejfk', '2025-03-30'),
(2, 'aukijo', 'pao', '2016-02-16'),
(3, 'KKK', 'lakaokao', '2016-02-03'),
(4, 'KKKkkk', 'lakaok', '2016-02-03'),
(5, 'Leandrooooo', 'leandro peoejfk', '2025-04-23'),
(6, 'Leandrooooo', 'leandro peoejfk', '2025-04-23'),
(7, 'adimin', 'chrisGreg', '2006-05-04');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_generos`
--
ALTER TABLE `tb_generos`
  ADD PRIMARY KEY (`ID_genero`);

--
-- Índices de tabela `tb_info_users`
--
ALTER TABLE `tb_info_users`
  ADD PRIMARY KEY (`ID_info`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `ID_users` (`ID_users`);

--
-- Índices de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`ID_users`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_generos`
--
ALTER TABLE `tb_generos`
  MODIFY `ID_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_info_users`
--
ALTER TABLE `tb_info_users`
  MODIFY `ID_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `ID_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_info_users`
--
ALTER TABLE `tb_info_users`
  ADD CONSTRAINT `tb_info_users_ibfk_1` FOREIGN KEY (`ID_users`) REFERENCES `tb_users` (`ID_users`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
