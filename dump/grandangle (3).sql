-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 26 mars 2024 à 13:47
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `grandangle`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
CREATE TABLE IF NOT EXISTS `artiste` (
  `id_artiste` int NOT NULL AUTO_INCREMENT,
  `nom_artiste` varchar(100) NOT NULL,
  `prenom_artiste` varchar(100) NOT NULL,
  `email_artiste` varchar(150) DEFAULT NULL,
  `num_telephone` varchar(20) DEFAULT NULL,
  `adresse_artiste` varchar(150) DEFAULT NULL,
  `cp_artiste` varchar(25) DEFAULT NULL,
  `ville_artiste` varchar(50) DEFAULT NULL,
  `date_naissance_artiste` date DEFAULT NULL,
  `date_deces_artiste` date DEFAULT NULL,
  `biographie_FR` text NOT NULL,
  `biographie_EN` text NOT NULL,
  `biographie_DE` text NOT NULL,
  `biographie_RU` text NOT NULL,
  `biographie_CH` text NOT NULL,
  `photo_profil` varchar(255) NOT NULL,
  PRIMARY KEY (`id_artiste`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id_artiste`, `nom_artiste`, `prenom_artiste`, `email_artiste`, `num_telephone`, `adresse_artiste`, `cp_artiste`, `ville_artiste`, `date_naissance_artiste`, `date_deces_artiste`, `biographie_FR`, `biographie_EN`, `biographie_DE`, `biographie_RU`, `biographie_CH`, `photo_profil`) VALUES
(1, 'LEBOEUF', 'Bernard', 'bernard.leboeuf@contact.fr', '0600000000', '6 rue des Vignes', '370000', 'Tours', '1985-03-06', NULL, 'Bernard LEBOEUF est un artiste contemporain énigmatique dont le travail transcende les frontières entre l\'abstrait et le concret. Né en 1985 dans un petit village français, son parcours artistique a été marqué par une exploration constante de nouvelles formes d\'expression. Autodidacte passionné, Bernard a développé un style distinctif qui captive l\'imagination de ses spectateurs.\r\nLe travail de Bernard LEBOEUF est caractérisé par une fusion audacieuse de couleurs vibrantes, de textures variées et de formes organiques. Ses œuvres abstraites révèlent une profondeur émotionnelle et un sens de la spontanéité, invitant le spectateur à une introspection contemplative. À travers des techniques mixtes, Bernard explore la dualité de la lumière et de l\'ombre, créant des compositions dynamiques qui oscillent entre l\'ordre et le chaos.', 'Bernard LEBOEUF is an enigmatic contemporary artist whose work transcends the boundaries between the abstract and the concrete. Born in 1985 in a small French village, his artistic journey has been marked by a constant exploration of new forms of expression. A passionate self-taught artist, Bernard has developed a distinctive style that captures the imagination of his viewers.\r\nBernard LEBOEUF\'s work is characterized by a bold fusion of vibrant colors, varied textures and organic shapes. His abstract works reveal emotional depth and a sense of spontaneity, inviting the viewer into contemplative introspection. Through mixed media, Bernard explores the duality of light and shadow, creating dynamic compositions that oscillate between order and chaos.', 'Bernard LEBOEUF ist ein rätselhafter zeitgenössischer Künstler, dessen Werk die Grenzen zwischen Abstrakt und Konkret überschreitet. 1985 in einem kleinen französischen Dorf geboren, war seine künstlerische Reise von der ständigen Erforschung neuer Ausdrucksformen geprägt. Als leidenschaftlicher Autodidakt hat Bernard einen unverwechselbaren Stil entwickelt, der die Fantasie seiner Betrachter anregt.\r\nDie Arbeit von Bernard LEBOEUF zeichnet sich durch eine kühne Verschmelzung lebendiger Farben, vielfältiger Texturen und organischer Formen aus. Seine abstrakten Werke offenbaren emotionale Tiefe und Spontaneität und laden den Betrachter zur kontemplativen Selbstbeobachtung ein. Durch gemischte Medien erforscht Bernard die Dualität von Licht und Schatten und schafft dynamische Kompositionen, die zwischen Ordnung und Chaos oszillieren.', 'Bernard LEBOEUF — загадочный современный художник, чьи работы выходят за границы между абстрактным и конкретным. Он родился в 1985 году в небольшой французской деревне, и его творческий путь был отмечен постоянным исследованием новых форм выражения. Страстный художник-самоучка, Бернар разработал особый стиль, который захватывает воображение зрителей.\r\nРаботы Бернара ЛЕБУФА характеризуются смелым сочетанием ярких цветов, разнообразных текстур и органических форм. Его абстрактные работы раскрывают эмоциональную глубину и ощущение непосредственности, приглашая зрителя к созерцательному самоанализу. С помощью смешанной техники Бернар исследует двойственность света и тени, создавая динамичные композиции, колеблющиеся между порядком и хаосом.', 'Bernard LEBOEUF 一位神秘的当代艺术家，他的作品超越了抽象与具体之间的界限。 1985年出生于法国的一个小村庄，他的艺术之旅以不断探索新的表达形式为标志。伯纳德是一位充满激情的自学成才的艺术家，他形成了一种独特的风格，能够激发观众的想象力。\r\nBernard LEBOEUF 的作品特点是大胆融合鲜艳的色彩、多样的纹理和有机形状。他的抽象作品展现出情感的深度和自发性，邀请观众进行沉思的内省。通过混合媒体，伯纳德探索光与影的二元性，创造出在秩序与混乱之间摇摆的动态构图。\r\n', '../assets/images/artistes/LEBOEUF Bernard.jpg'),
(2, 'PERREIRA', 'Eva', 'eva.perreira@contact.fr', '0600000000', '13 Avenue des rondins', '75000', 'Paris', '1988-01-01', NULL, 'Née en 1988 à Lisbonne, au Portugal, Eva PERREIRA est une artiste visuelle émergente dont le parcours artistique se nourrit de ses expériences multiculturelles. Elle a grandi entre Lisbonne et Paris, une dualité qui a profondément influencé son regard sur l\'art et la vie. Eva a commencé son exploration artistique à un jeune âge, développant rapidement une passion pour l\'expression créative.\r\nLe style artistique d\'Eva PERREIRA est empreint d\'une délicatesse et d\'une sophistication qui transcendent les frontières traditionnelles de l\'art visuel. Ses œuvres, souvent réalisées à l\'aquarelle et à l\'encre, capturent l\'éphémère et l\'intangible avec une sensibilité particulière. Les couleurs subtiles et les lignes fluides de ses créations évoquent une atmosphère onirique, invitant le spectateur à une contemplation calme.', 'Born in 1988 in Lisbon, Portugal, Eva PERREIRA is an emerging visual artist whose artistic journey is nourished by her multicultural experiences. She grew up between Lisbon and Paris, a duality which profoundly influenced her outlook on art and life. Eva began her artistic exploration at a young age, quickly developing a passion for creative expression.\r\nEva PERREIRA\'s artistic style is imbued with a delicacy and sophistication that transcends the traditional boundaries of visual art. His works, often done in watercolor and ink, capture the ephemeral and the intangible with particular sensitivity. The subtle colors and flowing lines of his designs evoke a dreamlike atmosphere, inviting the viewer into calm contemplation.', 'Eva PERREIRA wurde 1988 in Lissabon, Portugal, geboren und ist eine aufstrebende bildende Künstlerin, deren künstlerische Reise von ihren multikulturellen Erfahrungen genährt wird. Sie wuchs zwischen Lissabon und Paris auf, eine Dualität, die ihre Einstellung zu Kunst und Leben tiefgreifend beeinflusste. Eva begann schon in jungen Jahren mit der künstlerischen Auseinandersetzung und entwickelte schnell eine Leidenschaft für den kreativen Ausdruck.\r\nDer künstlerische Stil von Eva PERREIRA ist von einer Zartheit und Raffinesse durchdrungen, die über die traditionellen Grenzen der bildenden Kunst hinausgeht. Seine oft in Aquarell und Tusche ausgeführten Werke fangen das Vergängliche und Immaterielle mit besonderer Sensibilität ein. Die dezenten Farben und fließenden Linien seiner Designs erzeugen eine traumhafte Atmosphäre und laden den Betrachter zur ruhigen Kontemplation ein.', 'Eva PERREIRA, родившаяся в 1988 году в Лиссабоне, Португалия, является начинающей художницей, чей творческий путь основан на ее мультикультурном опыте. Она выросла между Лиссабоном и Парижем, и эта двойственность глубоко повлияла на ее взгляды на искусство и жизнь. Ева начала свои творческие поиски в юном возрасте, быстро развив страсть к творческому самовыражению.\r\nХудожественный стиль Евы ПЕРРЕЙРЫ проникнут деликатностью и утонченностью, выходящими за традиционные границы визуального искусства. Его работы, часто выполненные акварелью и тушью, с особой чувствительностью отражают эфемерное и нематериальное. Нежные цвета и плавные линии его рисунков создают сказочную атмосферу, приглашая зрителя к спокойному созерцанию.', 'Eva PERREIRA 1988 年出生于葡萄牙里斯本，是一位新兴视觉艺术家，她的多元文化经历滋养着她的艺术之旅。她在里斯本和巴黎之间长大，这种二元性深刻地影响了她的艺术和生活观。伊娃（Eva）从小就开始了她的艺术探索，很快就培养了对创意表达的热情。\r\nEva PERREIRA 的艺术风格充满精致和精致，超越了视觉艺术的传统界限。他的作品通常采用水彩和水墨画，以特别的敏感度捕捉短暂和无形的事物。微妙的色彩和流畅的线条营造出梦幻般的氛围，让观者陷入平静的沉思。', '../assets/images/artistes/PEREIRRA Eva.png'),
(3, 'CAILLOU', 'Gislaine', 'gislaine.caillou@contact.fr', '0600000000', '21 boulevard de Ménilmontant', '75020', 'Paris', '1958-12-24', '2020-04-15', 'Gislaine CAILLOU, née en 1958 à Bordeaux, France, est une artiste énigmatique dont la vie et le travail artistique sont imprégnés d\'une atmosphère mystérieuse. Peu d\'informations sont disponibles sur son parcours personnel, et elle préfère laisser son art parler pour elle. Gislaine a émergé progressivement sur la scène artistique, cultivant une aura de mystère autour de son identité.\r\nLe style artistique de Gislaine CAILLOU est caractérisé par une fusion audacieuse de l\'expressionnisme abstrait et de l\'art contemporain. Ses œuvres captivent l\'attention par leur utilisation audacieuse de couleurs vives et de formes dynamiques. Elle utilise des techniques mixtes, incorporant des éléments de collage, de peinture et parfois même de sculpture, créant des compositions complexes et tridimensionnelles.', 'Gislaine CAILLOU, born in 1958 in Bordeaux, France, is an enigmatic artist whose life and artistic work are imbued with a mysterious atmosphere. Little information is available about her personal journey, and she prefers to let her art speak for her. Gislaine gradually emerged on the artistic scene, cultivating an aura of mystery around her identity.\r\nGislaine CAILLOU\'s artistic style is characterized by a bold fusion of abstract expressionism and contemporary art. His works captivate attention with their bold use of bright colors and dynamic shapes. She uses mixed media, incorporating elements of collage, painting and sometimes even sculpture, creating complex, three-dimensional compositions.', 'Gislaine CAILLOU, geboren 1958 in Bordeaux, Frankreich, ist eine rätselhafte Künstlerin, deren Leben und künstlerisches Werk von einer geheimnisvollen Atmosphäre durchdrungen sind. Über ihren persönlichen Werdegang liegen nur wenige Informationen vor und sie lässt lieber ihre Kunst für sich sprechen. Gislaine trat nach und nach in die künstlerische Szene ein und entwickelte eine Aura des Mysteriums um ihre Identität.\r\nDer künstlerische Stil von Gislaine CAILLOU zeichnet sich durch eine kühne Verschmelzung von abstraktem Expressionismus und zeitgenössischer Kunst aus. Seine Werke bestechen durch den kühnen Einsatz leuchtender Farben und dynamischer Formen. Sie verwendet gemischte Medien, die Elemente aus Collage, Malerei und manchmal sogar Skulptur einbeziehen und so komplexe, dreidimensionale Kompositionen schaffen.', 'Gislaine CAILLOU, родившаяся в 1958 году в Бордо, Франция, — загадочная художница, чья жизнь и творчество пронизаны загадочной атмосферой. О ее личном пути мало информации, и она предпочитает, чтобы за нее говорило искусство. Жислен постепенно вышла на артистическую сцену, окружая свою личность ореолом таинственности.\r\nХудожественный стиль Жислен КАЙЮ характеризуется смелым сочетанием абстрактного экспрессионизма и современного искусства. Его работы привлекают внимание смелым использованием ярких цветов и динамичных форм. Она использует смешанную технику, включая элементы коллажа, живописи и иногда даже скульптуры, создавая сложные трехмерные композиции.', '吉斯莱娜·卡尤（Gislaine CAILLOU），1958年出生于法国波尔多，是一位神秘的艺术家，她的生活和艺术作品都充满着神秘的气息。关于她个人旅程的信息很少，她更喜欢让她的艺术为她说话。吉斯莱恩逐渐在艺术舞台上崭露头角，她的身份蒙上了一层神秘的光环。\r\nGislaine CAILLOU 的艺术风格特点是抽象表现主义与当代艺术的大胆融合。他的作品以其大胆的色彩运用和动感的形状吸引了人们的注意。她使用混合媒体，融合拼贴、绘画、有时甚至雕塑的元素，创造出复杂的三维构图。', '../assets/images/artistes/CAILLOU Gisleine.png'),
(4, 'LOUEBIRZ', 'Gwenaël', 'l.gwenael@contact.fr', '0600000000', '82 rue des Moulins', '35000', 'Rennes', '1985-11-23', NULL, 'Gwenaël LOUEBIRZ est un artiste émergent, né en 1985 à Rennes, en Bretagne, France. Son parcours artistique est marqué par une quête incessante d\'exploration et d\'expérimentation. Élevé dans un environnement imprégné de culture celtique, Gwenaël a développé une sensibilité artistique unique qui trouve son inspiration dans la nature, la mythologie et la diversité culturelle.\r\nLe style artistique de Gwenaël LOUEBIRZ est une fusion captivante de l\'art contemporain, de l\'art brut et de l\'influence celtique. Ses œuvres sont souvent caractérisées par des formes organiques, des motifs complexes et une palette de couleurs qui évoque les paysages changeants de la Bretagne. Utilisant des techniques variées, de la peinture à l\'huile à la sculpture, Gwenaël crée des pièces qui incarnent la dualité de la tradition et de l\'innovation.\r\n', 'Gwenaël LOUEBIRZ is an emerging artist, born in 1985 in Rennes, Brittany, France. His artistic journey is marked by a ceaseless quest for exploration and experimentation. Raised in an environment steeped in Celtic culture, Gwenaël developed a unique artistic sensitivity which finds its inspiration in nature, mythology and cultural diversity.\r\nGwenaël LOUEBIRZ\'s artistic style is a captivating fusion of contemporary art, outsider art and Celtic influence. His works are often characterized by organic shapes, complex patterns and a color palette that evokes the changing landscapes of Brittany. Using varied techniques, from oil painting to sculpture, Gwenaël creates pieces that embody the duality of tradition and innovation.', 'Gwenaël LOUEBIRZ ist eine aufstrebende Künstlerin, geboren 1985 in Rennes, Bretagne, Frankreich. Sein künstlerischer Weg ist geprägt von einer unaufhörlichen Suche nach Erkundungen und Experimenten. Gwenaël wuchs in einem von der keltischen Kultur geprägten Umfeld auf und entwickelte eine einzigartige künstlerische Sensibilität, die ihre Inspiration in der Natur, der Mythologie und der kulturellen Vielfalt findet.\r\nDer künstlerische Stil von Gwenaël LOUEBIRZ ist eine fesselnde Mischung aus zeitgenössischer Kunst, Outsider-Kunst und keltischem Einfluss. Seine Werke zeichnen sich oft durch organische Formen, komplexe Muster und eine Farbpalette aus, die an die wechselnden Landschaften der Bretagne erinnert. Mit verschiedenen Techniken, von der Ölmalerei bis zur Skulptur, schafft Gwenaël Stücke, die die Dualität von Tradition und Innovation verkörpern.', 'Gwenaël LOUEBIRZ — начинающая художница, родившаяся в 1985 году в Ренне, Бретань, Франция. Его творческий путь отмечен непрерывным поиском исследований и экспериментов. Выросшая в среде, пропитанной кельтской культурой, Гвенаэль развила уникальную художественную чувствительность, черпающую вдохновение в природе, мифологии и культурном разнообразии.\r\nХудожественный стиль Гвенаэль ЛУБИРЦ представляет собой захватывающее сочетание современного искусства, аутсайдерского искусства и кельтского влияния. Его работы часто характеризуются органичными формами, сложными узорами и цветовой палитрой, напоминающей меняющиеся пейзажи Бретани. Используя разнообразные техники, от живописи маслом до скульптуры, Гвенаэль создает произведения, воплощающие двойственность традиций и инноваций.', 'Gwenaël LOUEBIRZ 是一位新兴艺术家，1985 年出生于法国布列塔尼雷恩。他的艺术之旅以不断追求探索和实验为标志。格维纳尔在充满凯尔特文化的环境中长大，培养了一种独特的艺术敏感性，从自然、神话和文化多样性中寻找灵感。\r\nGwenaël LOUEBIRZ 的艺术风格是当代艺术、局外人艺术和凯尔特影响的迷人融合。他的作品通常以有机的形状、复杂的图案和令人想起布列塔尼不断变化的风景的调色板为特点。 Gwenaël 使用从油画到雕塑等多种技术，创作出体现传统与创新二元性的作品。', '../assets/images/artistes/LOUEBIRZ Gwennael.png'),
(5, 'BRAHIMI ', 'Ines', 'b.ines@contact.fr', '0600000000', '26 quai des Camargue', '13000', 'Marseille', '1990-12-20', NULL, 'Ines BRAHIMI, née en 1990 à Marseille, est une artiste contemporaine française dont le parcours artistique est imprégné de la richesse culturelle et de la diversité de son environnement. Ines a grandi dans un quartier cosmopolite de Marseille, ce qui a profondément influencé sa vision du monde et son approche de l\'art. Elle a développé sa passion précoce pour l\'expression artistique au sein d\'une communauté multiculturelle dynamique.\r\n\r\nLe style artistique d\'Ines BRAHIMI est une célébration de la diversité culturelle et de la complexité humaine. Ses œuvres sont souvent des explorations visuelles qui transcendent les frontières géographiques et culturelles. Ines utilise une variété de médiums, y compris la peinture acrylique, la photographie et la vidéo, pour créer des compositions visuellement dynamiques et émotionnellement riches.\r\n', 'Ines BRAHIMI, born in 1990 in Marseille, is a French contemporary artist whose artistic journey is imbued with the cultural richness and diversity of her environment. Ines grew up in a cosmopolitan neighborhood in Marseille, which profoundly influenced her worldview and approach to art. She developed her early passion for artistic expression within a vibrant multicultural community.\r\n\r\nInes BRAHIMI\'s artistic style is a celebration of cultural diversity and human complexity. His works are often visual explorations that transcend geographic and cultural boundaries. Ines uses a variety of mediums, including acrylic paint, photography and video, to create visually dynamic and emotionally rich compositions.', 'Ines BRAHIMI, geboren 1990 in Marseille, ist eine französische zeitgenössische Künstlerin, deren künstlerische Reise vom kulturellen Reichtum und der Vielfalt ihres Umfelds geprägt ist. Ines wuchs in einem kosmopolitischen Viertel in Marseille auf, was ihre Weltanschauung und Herangehensweise an die Kunst tiefgreifend beeinflusste. Sie entwickelte schon früh ihre Leidenschaft für den künstlerischen Ausdruck in einer lebendigen multikulturellen Gemeinschaft.\r\n\r\nDer künstlerische Stil von Ines BRAHIMI ist eine Hommage an kulturelle Vielfalt und menschliche Komplexität. Seine Arbeiten sind oft visuelle Erkundungen, die geografische und kulturelle Grenzen überschreiten. Ines verwendet eine Vielzahl von Medien, darunter Acrylfarbe, Fotografie und Video, um visuell dynamische und emotional reiche Kompositionen zu schaffen.\r\n', 'Ines BRAHIMI, родившаяся в 1990 году в Марселе, — французская современная художница, чей творческий путь пропитан культурным богатством и разнообразием ее среды. Инес выросла в космополитическом районе Марселя, что глубоко повлияло на ее мировоззрение и подход к искусству. Свою раннюю страсть к художественному самовыражению она развила в ярком мультикультурном сообществе.\r\n\r\nХудожественный стиль Инес БРАХИМИ — это праздник культурного разнообразия и человеческой сложности. Его работы часто представляют собой визуальные исследования, выходящие за пределы географических и культурных границ. Инес использует различные материалы, в том числе акриловые краски, фотографию и видео, для создания визуально динамичных и эмоционально насыщенных композиций.', '伊内斯·布拉希米 (Ines BRAHIMI) 1990 年出生于马赛，是一位法国当代艺术家，她的艺术之旅充满了文化的丰富性和多样性。伊内斯在马赛的一个国际化社区长大，这深刻地影响了她的世界观和艺术态度。她在充满活力的多元文化社区中培养了对艺术表达的早期热情。\r\n\r\n伊内斯·布拉希米 (Ines BRAHIMI) 的艺术风格是对文化多样性和人类复杂性的庆祝。他的作品往往是超越地理和文化界限的视觉探索。伊内斯使用多种媒介，包括丙烯颜料、摄影和视频，创作出视觉上动态且情感丰富的作品。', '../assets/images/artistes/BRAHIMI Ines.png'),
(6, 'GONZALEZ', 'Isabella', 'i.gonzalez@contact.fr', '0600000000', '13 Gran Via', '28013', 'Madrid', '1987-06-01', NULL, 'Isabella GONZALEZ est une artiste contemporaine née en 1987 à Madrid, en Espagne. Son parcours artistique est ancré dans la diversité culturelle de la capitale espagnole, où l\'histoire et la modernité cohabitent de manière saisissante. Isabella a développé son amour pour l\'art dès son plus jeune âge, explorant divers médiums et techniques pour donner vie à ses visions créatives.\r\nLe style artistique d\'Isabella GONZALEZ se distingue par une combinaison subtile de l\'expressionnisme et de l\'art abstrait. Ses œuvres captivent par l\'utilisation audacieuse de couleurs vibrantes et de formes dynamiques, créant des compositions visuelles évocatrices. Elle s\'exprime principalement à travers la peinture à l\'huile, explorant la texture et la profondeur pour transmettre des émotions complexes.\r\n', 'Isabella GONZALEZ is a contemporary artist born in 1987 in Madrid, Spain. His artistic journey is anchored in the cultural diversity of the Spanish capital, where history and modernity coexist in a striking way. Isabella developed her love for art from a young age, exploring various mediums and techniques to bring her creative visions to life.\r\nIsabella GONZALEZ\'s artistic style is distinguished by a subtle combination of expressionism and abstract art. His works captivate with the bold use of vibrant colors and dynamic shapes, creating evocative visual compositions. She expresses herself primarily through oil painting, exploring texture and depth to convey complex emotions.', 'Isabella GONZALEZ ist eine zeitgenössische Künstlerin, geboren 1987 in Madrid, Spanien. Seine künstlerische Reise ist in der kulturellen Vielfalt der spanischen Hauptstadt verankert, wo Geschichte und Moderne auf eindrucksvolle Weise nebeneinander existieren. Schon in jungen Jahren entwickelte Isabella ihre Liebe zur Kunst und erkundete verschiedene Medien und Techniken, um ihre kreativen Visionen zum Leben zu erwecken.\r\nDer künstlerische Stil von Isabella GONZALEZ zeichnet sich durch eine subtile Kombination aus Expressionismus und abstrakter Kunst aus. Seine Werke bestechen durch den kühnen Einsatz lebendiger Farben und dynamischer Formen und schaffen so stimmungsvolle Bildkompositionen. Sie drückt sich hauptsächlich durch Ölgemälde aus und erforscht Textur und Tiefe, um komplexe Emotionen zu vermitteln.', 'Изабелла ГОНСАЛЕС — современная художница, родившаяся в 1987 году в Мадриде, Испания. Его творческий путь основан на культурном разнообразии испанской столицы, где история и современность удивительным образом сосуществуют. Изабелла развила свою любовь к искусству с юных лет, изучая различные средства и методы, чтобы воплотить в жизнь свои творческие замыслы.\r\nХудожественный стиль Изабеллы ГОНСАЛЕС отличается тонким сочетанием экспрессионизма и абстрактного искусства. Его работы очаровывают смелым использованием ярких цветов и динамичных форм, создавая запоминающиеся визуальные композиции. Она выражает себя в первую очередь через живопись маслом, исследуя текстуру и глубину, чтобы передать сложные эмоции.', '伊莎贝拉·冈萨雷斯 (Isabella GONZALEZ) 是一位当代艺术家，1987 年出生于西班牙马德里。他的艺术之旅植根于西班牙首都的文化多样性，历史与现代以惊人的方式共存。伊莎贝拉从小就对艺术产生了热爱，探索各种媒介和技术，将她的创意愿景变为现实。\r\n伊莎贝拉·冈萨雷斯的艺术风格以表现主义和抽象艺术的微妙结合为特色。他的作品大胆运用鲜艳的色彩和动态的形状，创造出令人回味的视觉作品。她主要通过油画来表达自己，探索质感和深度来传达复杂的情感。', '../assets/images/artistes/GONZALEZ Isabella.png'),
(7, 'KAPOOR', 'Ishan', 'i.kapoor@contact.fr', '0600000000', 'A-31 Lajpat Nagar II,', NULL, 'New Delhi', '1993-09-07', NULL, 'Ishan KAPOOR, né en 1993 à New Delhi, en Inde, est un artiste contemporain au parcours captivant. Son histoire artistique débute au sein d\'une famille imprégnée d\'une riche tradition culturelle et artistique, où les couleurs vibrantes de l\'Inde ont façonné son regard sur le monde. Ishan a exploré diverses formes d\'expression artistique depuis son plus jeune âge, cherchant à fusionner l\'héritage culturel de son pays avec une esthétique moderne.\r\nLe style artistique d\'Ishan KAPOOR est un mélange audacieux de l\'abstrait et du réalisme. Ses œuvres, souvent réalisées à l\'aide de techniques mixtes, explorent les textures, les couleurs et les formes qui évoquent la richesse de la culture indienne. Les toiles d\'Ishan sont des compositions dynamiques, où des symboles traditionnels cohabitent avec des éléments contemporains, créant un langage visuel qui transcende les frontières temporelles.', 'Ishan KAPOOR, born in 1993 in New Delhi, India, is a contemporary artist with a captivating career. Her artistic story began in a family steeped in a rich cultural and artistic tradition, where the vibrant colors of India shaped her view of the world. Ishan has explored various forms of artistic expression since a young age, seeking to merge his country\'s cultural heritage with a modern aesthetic.\r\nIshan KAPOOR\'s artistic style is a bold blend of abstract and realism. His works, often created using mixed media, explore textures, colors and shapes that evoke the richness of Indian culture. Ishan\'s paintings are dynamic compositions, where traditional symbols coexist with contemporary elements, creating a visual language that transcends temporal boundaries.', 'Ishan KAPOOR, geboren 1993 in Neu-Delhi, Indien, ist ein zeitgenössischer Künstler mit einer faszinierenden Karriere. Ihre künstlerische Geschichte begann in einer Familie mit einer reichen kulturellen und künstlerischen Tradition, in der die leuchtenden Farben Indiens ihre Sicht auf die Welt prägten. Ishan erforscht seit jungen Jahren verschiedene Formen des künstlerischen Ausdrucks und versucht, das kulturelle Erbe seines Landes mit einer modernen Ästhetik zu verbinden.\r\nDer künstlerische Stil von Ishan KAPOOR ist eine kühne Mischung aus Abstraktion und Realismus. Seine oft in Mischtechnik geschaffenen Werke erforschen Texturen, Farben und Formen, die an den Reichtum der indischen Kultur erinnern. Ishans Gemälde sind dynamische Kompositionen, in denen traditionelle Symbole mit zeitgenössischen Elementen koexistieren und so eine visuelle Sprache schaffen, die zeitliche Grenzen überschreitet.', 'Ishan KAPOOR, родившийся в 1993 году в Нью-Дели, Индия, — современный художник с увлекательной карьерой. Ее творческая история начинается в семье, пропитанной богатыми культурными и художественными традициями, где яркие цвета Индии сформировали ее взгляд на мир. Ишан с юных лет исследовал различные формы художественного самовыражения, стремясь объединить культурное наследие своей страны с современной эстетикой.\r\nХудожественный стиль Ишана Капура представляет собой смелое сочетание абстракции и реализма. Его работы, часто созданные с использованием смешанной техники, исследуют текстуры, цвета и формы, которые напоминают о богатстве индийской культуры. Картины Ишана представляют собой динамичные композиции, в которых традиционные символы сосуществуют с современными элементами, создавая визуальный язык, преодолевающий временные границы.', '伊尚·卡普尔 (Ishan KAPOOR) 1993 年出生于印度新德里，是一位事业辉煌的当代艺术家。她的艺​​术故事始于一个有着丰富文化和艺术传统的家庭，印度的鲜艳色彩塑造了她的世界观。伊山（Ishan）从小就探索各种艺术表现形式，寻求将祖国的文化遗产与现代审美融为一体。\r\n伊尚·卡普尔的艺术风格是抽象与现实主义的大胆融合。他的作品通常使用混合媒体创作，探索纹理、颜色和形状，唤起印度文化的丰富性。 Ishan 的画作充满活力，传统符号与当代元素共存，创造出超越时间界限的视觉语言。', '../assets/images/artistes/KAPOOR Ishan.png'),
(8, 'BANERJEE', 'Jaya', 'j.banerjee@contact.com', '0600000000', '1 Kazi Nazrul Islam  Ave', '700059', 'Kolkata', '1996-09-09', NULL, 'Jaya BANERJEE, née en 1996 à Kolkata, en Inde, est une artiste contemporaine dont le parcours artistique est une exploration passionnante des contrastes et des nuances de l\'expérience humaine. Élevée au cœur de l\'effervescence culturelle de Kolkata, Jaya a été bercée par l\'héritage artistique de la ville, un héritage qui a fortement influencé son parcours artistique.\r\nLe style artistique de Jaya BANERJEE est un mariage harmonieux de la tradition et de l\'innovation. Ses œuvres, souvent réalisées à l\'aquarelle et à l\'acrylique, sont caractérisées par des couleurs riches et des lignes fluides. Jaya puise son inspiration dans la culture indienne, explorant les thèmes de la spiritualité, de la féminité et de la diversité culturelle.', 'Jaya BANERJEE, born in 1996 in Kolkata, India, is a contemporary artist whose artistic journey is an exciting exploration of the contrasts and nuances of the human experience. Raised in the heart of the cultural vibrancy of Kolkata, Jaya was immersed in the artistic heritage of the city, a heritage which strongly influenced her artistic career.\r\nJaya BANERJEE\'s artistic style is a harmonious marriage of tradition and innovation. His works, often done in watercolor and acrylic, are characterized by rich colors and flowing lines. Jaya draws inspiration from Indian culture, exploring themes of spirituality, femininity and cultural diversity.', 'Jaya BANERJEE, geboren 1996 in Kalkutta, Indien, ist eine zeitgenössische Künstlerin, deren künstlerische Reise eine spannende Erkundung der Kontraste und Nuancen der menschlichen Erfahrung ist. Jaya wuchs im Herzen der kulturellen Lebendigkeit von Kalkutta auf und war tief in das künstlerische Erbe der Stadt eingetaucht, ein Erbe, das ihre künstlerische Karriere stark beeinflusste.\r\nDer künstlerische Stil von Jaya BANERJEE ist eine harmonische Verbindung von Tradition und Innovation. Seine Werke, oft in Aquarell und Acryl ausgeführt, zeichnen sich durch satte Farben und fließende Linien aus. Jaya lässt sich von der indischen Kultur inspirieren und erforscht Themen wie Spiritualität, Weiblichkeit und kulturelle Vielfalt.', 'Jaya BANERJEE, родившаяся в 1996 году в Калькутте, Индия, — современная художница, чей творческий путь представляет собой захватывающее исследование контрастов и нюансов человеческого опыта. Выросшая в самом сердце культурного бурления Калькутты, Джая была погружена в художественное наследие города, наследие, которое сильно повлияло на ее творческую карьеру.\r\nХудожественный стиль Джаи БАНЕРДЖИ представляет собой гармоничное сочетание традиций и инноваций. Его работы, часто выполненные акварелью и акрилом, характеризуются насыщенными цветами и плавными линиями. Джая черпает вдохновение в индийской культуре, исследуя темы духовности, женственности и культурного разнообразия.', 'Jaya BANERJEE 1996 年出生于印度加尔各答，是一位当代艺术家，其艺术之旅是对人类体验的对比和细微差别的激动人心的探索。贾亚在加尔各答文化繁荣的中心长大，沉浸在这座城市的艺术遗产中，这种遗产强烈影响了她的艺术生涯。\r\nJaya BANERJEE 的艺术风格是传统与创新的和谐结合。他的作品多用水彩和丙烯创作，特点是色彩丰富、线条流畅。 Jaya 从印度文化中汲取灵感，探索灵性、女性气质和文化多样性等主题。', '../assets/images/artistes/BANERJEE Jaya.png'),
(9, 'YOON', 'Ji-Ah', 'ji-ah.yoon@contact.com', '0600000000', '37 Seosomun-dong', 'Jung-Gu', 'Séoul', '1990-12-13', NULL, 'Ji-ah YOON, née en 1990 à Séoul, en Corée du Sud, est une artiste contemporaine émergente dont le parcours artistique est marqué par la rencontre entre la tradition coréenne et la modernité. Grandissant dans la capitale dynamique, Ji-ah a été inspirée par la riche histoire artistique et culturelle de la Corée, ce qui a façonné son approche artistique unique.\r\nLe style artistique de Ji-ah YOON est une fusion poétique de l\'abstrait et du figuratif. Ses œuvres, souvent réalisées à l\'encre de Chine et à l\'acrylique, captivent par leur élégance et leur simplicité apparente. Ji-ah utilise des lignes épurées et des couleurs douces pour créer des compositions visuellement équilibrées, où chaque élément a sa propre signification.', 'Ji-ah YOON, born in 1990 in Seoul, South Korea, is an emerging contemporary artist whose artistic journey is marked by the meeting between Korean tradition and modernity. Growing up in the vibrant capital, Ji-ah was inspired by Korea\'s rich artistic and cultural history, which shaped her unique artistic approach.\r\nJi-ah YOON\'s artistic style is a poetic fusion of the abstract and the figurative. His works, often produced in Indian ink and acrylic, captivate with their elegance and apparent simplicity. Ji-ah uses clean lines and soft colors to create visually balanced compositions, where each element has its own meaning.', 'Ji-ah YOON, geboren 1990 in Seoul, Südkorea, ist ein aufstrebender zeitgenössischer Künstler, dessen künstlerische Reise von der Begegnung zwischen koreanischer Tradition und Moderne geprägt ist. Ji-ah wuchs in der pulsierenden Hauptstadt auf und ließ sich von der reichen Kunst- und Kulturgeschichte Koreas inspirieren, die ihren einzigartigen künstlerischen Ansatz prägte.\r\nDer künstlerische Stil von Ji-ah YOON ist eine poetische Verschmelzung von Abstraktem und Figurativem. Seine oft in Tusche und Acryl gefertigten Werke bestechen durch ihre Eleganz und scheinbare Einfachheit. Ji-ah verwendet klare Linien und sanfte Farben, um optisch ausgewogene Kompositionen zu schaffen, in denen jedes Element seine eigene Bedeutung hat.', 'Ji-ah YOON, родившаяся в 1990 году в Сеуле, Южная Корея, — начинающая современная художница, чей творческий путь отмечен встречей корейской традиции и современности. Выросшая в оживленной столице, Джи А была вдохновлена ​​богатой художественной и культурной историей Кореи, которая сформировала ее уникальный художественный подход.\r\nХудожественный стиль Джи-а Юна представляет собой поэтическое слияние абстрактного и образного. Его работы, часто выполненные тушью и акрилом, очаровывают своей элегантностью и кажущейся простотой. Джи-а использует чистые линии и мягкие цвета для создания визуально сбалансированных композиций, где каждый элемент имеет свое значение.', '尹智雅（Ji-ah YOON），1990年出生于韩国首尔，是一位新兴的当代艺术家，其艺术旅程以韩国传统与现代的交汇为标志。 Ji-ah 在充满活力的首都长大，受到韩国丰富的艺术和文化历史的启发，这塑造了她独特的艺术方法。\r\nJi-ah YOON 的艺术风格是抽象与具象的诗意融合。他的作品通常用印度墨水和丙烯创作，以其优雅和明显的简洁而令人着迷。 Ji-ah 使用简洁的线条和柔和的色彩来创造视觉平衡的构图，其中每个元素都有自己的含义。', '../assets/images/artistes/YOON Ji-ah.png'),
(10, 'LEBON', 'Marie-Christine', 'm-c.lebon@contact.fr', '0600000000', '7 place de la libération', '92300', 'LEVALLOIS PERRET', '1964-05-06', NULL, 'Marie-Christine LEBON, née en 1964 à Paris, France, est une artiste contemporaine dont le parcours artistique reflète un voyage intérieur profond et une exploration constante de l\'expression artistique. Issu d\'une famille imprégnée d\'une passion pour les arts visuels, Marie-Christine a développé sa propre voie artistique, cherchant à capturer la complexité des émotions humaines à travers son travail.\r\nLe style artistique de Marie-Christine LEBON est une méditation visuelle sur la beauté et la fragilité de la vie. Ses œuvres, souvent créées à l\'aide de techniques mixtes incluant la peinture à l\'huile et le collage, se caractérisent par une palette de couleurs douces et des formes organiques. Elle explore la texture et la lumière pour créer des compositions qui évoquent une atmosphère de rêve.', 'Marie-Christine LEBON, born in 1964 in Paris, France, is a contemporary artist whose artistic journey reflects a deep inner journey and a constant exploration of artistic expression. Coming from a family steeped in a passion for the visual arts, Marie-Christine has developed her own artistic path, seeking to capture the complexity of human emotions through her work.\r\nMarie-Christine LEBON\'s artistic style is a visual meditation on the beauty and fragility of life. Her works, often created using mixed media including oil painting and collage, are characterized by a soft color palette and organic shapes. She explores texture and light to create compositions that evoke a dreamlike atmosphere.\r\n', 'Marie-Christine LEBON, geboren 1964 in Paris, Frankreich, ist eine zeitgenössische Künstlerin, deren künstlerische Reise eine tiefe innere Reise und eine ständige Erforschung des künstlerischen Ausdrucks widerspiegelt. Marie-Christine stammt aus einer Familie mit einer Leidenschaft für bildende Kunst und hat ihren eigenen künstlerischen Weg entwickelt, bei dem sie versucht, die Komplexität menschlicher Emotionen in ihrer Arbeit einzufangen.\r\nDer künstlerische Stil von Marie-Christine LEBON ist eine visuelle Meditation über die Schönheit und Zerbrechlichkeit des Lebens. Ihre Werke, die oft mit gemischten Medien wie Ölgemälden und Collagen erstellt werden, zeichnen sich durch eine sanfte Farbpalette und organische Formen aus. Sie erforscht Textur und Licht, um Kompositionen zu schaffen, die eine traumhafte Atmosphäre hervorrufen.\r\n', 'Marie-Christine LEBON, родившаяся в 1964 году в Париже, Франция, — современная художница, чей творческий путь отражает глубокое внутреннее путешествие и постоянное исследование художественного выражения. Мари-Кристин, выходец из семьи, пропитанной страстью к изобразительному искусству, разработала свой собственный творческий путь, стремясь передать в своих работах сложность человеческих эмоций.\r\nХудожественный стиль Мари-Кристин ЛЕБОН — это визуальное размышление о красоте и хрупкости жизни. Ее работы, часто созданные в смешанной технике, включая масляную живопись и коллаж, характеризуются мягкой цветовой палитрой и органичными формами. Она исследует текстуру и свет, создавая композиции, создающие сказочную атмосферу.', '玛丽-克里斯汀·勒邦（Marie-Christine LEBON），1964年出生于法国巴黎，是一位当代艺术家，她的艺术之旅体现了深刻的内心旅程和对艺术表达的不断探索。玛丽·克里斯蒂娜出身于一个对视觉艺术充满热情的家庭，她开辟了自己的艺术道路，寻求通过她的作品捕捉人类情感的复杂性。\r\nMarie-Christine LEBON 的艺术风格是对生命之美和脆弱的视觉冥想。她的作品通常使用油画和拼贴画等混合媒介创作，其特点是柔和的调色板和有机的形状。她探索纹理和光线，创造出唤起梦幻氛围的构图。', '../assets/images/artistes/LEBON Marie-Christine.jpg'),
(11, 'BRANDU', 'Michel', 'm.brandu@contact.fr', '0600000000', '36Bis Avenue des Azalées', '33000', 'Bordeaux', '1960-07-25', NULL, 'Michel BRANDU, né en 1960 à Bordeaux, France, est un artiste contemporain dont le parcours artistique est un voyage intemporel à travers les différentes facettes de la créativité. Dès son enfance, Michel a été fasciné par le pouvoir de l\'expression artistique, explorant divers médiums pour donner vie à ses visions uniques.\r\nLe style artistique de Michel BRANDU est une fusion captivante du cubisme et de l\'art abstrait. Ses œuvres, souvent réalisées à la peinture acrylique et à l\'encre, se caractérisent par des formes géométriques audacieuses et une palette de couleurs vibrantes. Michel utilise des techniques de superposition et de fragmentation pour créer des compositions visuellement dynamiques qui captent l\'essence de la modernité.', 'Michel BRANDU, born in 1960 in Bordeaux, France, is a contemporary artist whose artistic journey is a timeless journey through the different facets of creativity. Since childhood, Michel has been fascinated by the power of artistic expression, exploring various mediums to bring his unique visions to life.\r\nMichel BRANDU\'s artistic style is a captivating fusion of cubism and abstract art. His works, often done in acrylic paint and ink, are characterized by bold geometric shapes and a vibrant color palette. Michel uses techniques of layering and fragmentation to create visually dynamic compositions that capture the essence of modernity.', 'Michel BRANDU, geboren 1960 in Bordeaux, Frankreich, ist ein zeitgenössischer Künstler, dessen künstlerische Reise eine zeitlose Reise durch die verschiedenen Facetten der Kreativität ist. Seit seiner Kindheit ist Michel von der Kraft des künstlerischen Ausdrucks fasziniert und erkundet verschiedene Medien, um seine einzigartigen Visionen zum Leben zu erwecken.\r\nDer künstlerische Stil von Michel BRANDU ist eine faszinierende Verschmelzung von Kubismus und abstrakter Kunst. Seine Werke, oft in Acrylfarbe und Tusche ausgeführt, zeichnen sich durch kräftige geometrische Formen und eine lebendige Farbpalette aus. Michel nutzt Techniken der Schichtung und Fragmentierung, um visuell dynamische Kompositionen zu schaffen, die die Essenz der Moderne einfangen.', 'Michel BRANDU, родившийся в 1960 году в Бордо, Франция, — современный художник, чей творческий путь — это вечное путешествие через различные грани творчества. С детства Мишель был очарован силой художественного выражения, исследуя различные средства, чтобы воплотить в жизнь свои уникальные видения.\r\nХудожественный стиль Мишеля БРАНДУ представляет собой захватывающий сплав кубизма и абстрактного искусства. Его работы, часто выполненные акриловыми красками и тушью, характеризуются смелыми геометрическими формами и яркой цветовой палитрой. Мишель использует методы наслоения и фрагментации для создания визуально динамичных композиций, отражающих суть современности.', '米歇尔·布兰杜 (Michel BRANDU) 1960 年出生于法国波尔多，是一位当代艺术家，他的艺术之旅是穿越创造力不同方面的永恒之旅。自童年起，米歇尔就对艺术表达的力量着迷，探索各种媒介，将他独特的愿景变为现实。\r\n米歇尔·布兰杜的艺术风格是立体主义和抽象艺术的迷人融合。他的作品通常采用丙烯颜料和墨水完成，其特点是大胆的几何形状和充满活力的调色板。米歇尔使用分层和碎片技术来创造视觉上动态的构图，捕捉现代性的本质。', '../assets/images/artistes/BRANDU Michel.png'),
(12, 'LETOUAREC', 'Sandy', 's.letouarec@contact.fr', '0600000000', NULL, '29000', 'QUIMPER', '1986-12-09', NULL, 'Sandy LETOUAREC, née en 1986 à Quimper, France, est une artiste contemporaine dont le parcours artistique est marqué par une exploration passionnée des formes d\'expression artistique novatrices. Originaire de la région bretonne, Sandy a grandi entourée de paysages inspirants, ce qui a profondément influencé sa vision artistique dès son plus jeune âge.\r\nLe style artistique de Sandy LETOUAREC est une fusion captivante entre l\'art abstrait et le surréalisme. Ses œuvres, souvent créées à l\'aide de techniques mixtes, explorent des paysages imaginaires et des univers oniriques. Sandy utilise des couleurs vives, des formes organiques et des motifs complexes pour créer des compositions visuellement dynamiques, incitant le spectateur à une immersion contemplative.', 'Sandy LETOUAREC, born in 1986 in Quimper, France, is a contemporary artist whose artistic journey is marked by a passionate exploration of innovative forms of artistic expression. Originally from the Brittany region, Sandy grew up surrounded by inspiring landscapes, which deeply influenced her artistic vision from a young age.\r\nSandy LETOUAREC\'s artistic style is a captivating fusion between abstract art and surrealism. His works, often created using mixed media, explore imaginary landscapes and dreamlike universes. Sandy uses bright colors, organic shapes and intricate patterns to create visually dynamic compositions, inviting the viewer into a contemplative immersion.', 'Sandy LETOUAREC, geboren 1986 in Quimper, Frankreich, ist eine zeitgenössische Künstlerin, deren künstlerische Reise von einer leidenschaftlichen Erforschung innovativer künstlerischer Ausdrucksformen geprägt ist. Sandy stammt ursprünglich aus der Bretagne und wuchs umgeben von inspirierenden Landschaften auf, die ihre künstlerische Vision schon in jungen Jahren stark beeinflussten.\r\nSandy LETOUARECs künstlerischer Stil ist eine fesselnde Verschmelzung von abstrakter Kunst und Surrealismus. Seine oft in Mischtechnik geschaffenen Werke erforschen imaginäre Landschaften und traumhafte Universen. Sandy verwendet leuchtende Farben, organische Formen und komplizierte Muster, um visuell dynamische Kompositionen zu schaffen, die den Betrachter zu einem kontemplativen Eintauchen einladen', 'Sandy LETOUAREC, родившаяся в 1986 году в Кемпере, Франция, — современная художница, чей творческий путь отмечен страстным исследованием инновационных форм художественного выражения. Родом из региона Бретань, Сэнди выросла в окружении вдохновляющих пейзажей, которые с юных лет глубоко повлияли на ее художественное видение.\r\nХудожественный стиль Сэнди ЛЕТУАРЕК представляет собой захватывающее сочетание абстрактного искусства и сюрреализма. Его работы, часто созданные в смешанной технике, исследуют воображаемые пейзажи и сказочные вселенные. Сэнди использует яркие цвета, органичные формы и замысловатые узоры для создания визуально динамичных композиций, приглашающих зрителя в созерцательное погружение.', '桑迪·莱图阿雷克 (Sandy LETOUAREC) 1986 年出生于法国坎佩尔，是一位当代艺术家，其艺术之旅的特点是对创新艺术表现形式的热情探索。桑迪来自布列塔尼地区，在鼓舞人心的风景中长大，这深深地影响了她从小的艺术视野。\r\nSandy LETOUAREC 的艺术风格是抽象艺术与超现实主义的迷人融合。他的作品通常使用混合媒体创作，探索想象中的风景和梦幻般的宇宙。桑迪使用明亮的色彩、有机的形状和复杂的图案来创造视觉上动态的构图，邀请观众沉浸在沉思中。', '../assets/images/artistes/LETOUAREC Sandy.png'),
(13, 'WING', 'Xiao', 'x.wing@contact.fr', '0600000000', '49 Di&#039;an men Xidajie', '65001', 'PEKIN', '1998-03-23', NULL, 'Xiao WING, né en 1998 à Pékin, en Chine, est un artiste contemporain dont le parcours artistique reflète l\'intersection entre la tradition chinoise et l\'innovation artistique moderne. Grandissant dans l\'effervescence culturelle de Pékin, Xiao a développé une fascination précoce pour les arts visuels, cherchant à créer un dialogue visuel unique entre son héritage culturel et les tendances artistiques contemporaines.\r\nLe style artistique de Xiao WANG est une fusion subtile de l\'art traditionnel chinois et de l\'expression contemporaine. Ses œuvres, souvent réalisées à l\'encre de Chine, à l\'huile et à l\'aquarelle, se caractérisent par des lignes délicates, des couleurs vibrantes et des motifs symboliques. Xiao puise son inspiration dans la calligraphie chinoise, la philosophie taoïste et la nature, créant des compositions visuelles qui évoquent à la fois sérénité et dynamisme.', 'Xiao WING, born in 1998 in Beijing, China, is a contemporary artist whose artistic journey reflects the intersection between Chinese tradition and modern artistic innovation. Growing up in the cultural buzz of Beijing, Xiao developed an early fascination with the visual arts, seeking to create a unique visual dialogue between his cultural heritage and contemporary artistic trends.\r\nXiao WANG\'s artistic style is a subtle fusion of traditional Chinese art and contemporary expression. His works, often done in Indian ink, oil and watercolor, are characterized by delicate lines, vibrant colors and symbolic patterns. Xiao draws inspiration from Chinese calligraphy, Taoist philosophy and nature, creating visual compositions that evoke both serenity and dynamism.', 'Xiao WING, geboren 1998 in Peking, China, ist ein zeitgenössischer Künstler, dessen künstlerische Reise die Schnittstelle zwischen chinesischer Tradition und moderner künstlerischer Innovation widerspiegelt. Aufgewachsen im kulturellen Trubel Pekings entwickelte Xiao schon früh eine Faszination für die bildende Kunst und versuchte, einen einzigartigen visuellen Dialog zwischen seinem kulturellen Erbe und zeitgenössischen künstlerischen Trends zu schaffen.\r\nDer künstlerische Stil von Xiao WANG ist eine subtile Verschmelzung traditioneller chinesischer Kunst und zeitgenössischem Ausdruck. Seine oft in Tusche, Öl und Aquarell ausgeführten Werke zeichnen sich durch zarte Linien, leuchtende Farben und symbolische Muster aus. Xiao lässt sich von der chinesischen Kalligraphie, der taoistischen Philosophie und der Natur inspirieren und schafft visuelle Kompositionen, die sowohl Gelassenheit als auch Dynamik hervorrufen.', 'Xiao WING, родившийся в 1998 году в Пекине, Китай, — современный художник, чей творческий путь отражает пересечение китайской традиции и современных художественных инноваций. Выросший в культурной суете Пекина, Сяо рано увлекся изобразительным искусством, стремясь создать уникальный визуальный диалог между своим культурным наследием и современными художественными тенденциями.\r\nХудожественный стиль Сяо ВАНГА представляет собой тонкое сочетание традиционного китайского искусства и современного самовыражения. Его работы, часто выполненные индийской тушью, маслом и акварелью, характеризуются тонкими линиями, яркими цветами и символическими узорами. Сяо черпает вдохновение в китайской каллиграфии, даосской философии и природе, создавая визуальные композиции, вызывающие спокойствие и динамизм.', '肖翼，1998年出生于中国北京，是一位当代艺术家，他的艺术历程体现了中国传统与现代艺术创新的交汇。肖在北京的文化喧嚣中长大，很早就对视觉艺术产生了浓厚的兴趣，寻求在他的文化遗产和当代艺术趋势之间创造独特的视觉对话。\r\n小王的艺术风格是中国传统艺术与当代表达的微妙融合。他的作品通常采用印度水墨、油画和水彩画，以细腻的线条、鲜艳的色彩和象征性的图案为特点。肖从中国书法、道家哲学和自然中汲取灵感，创造出既宁静又充满活力的视觉作品。', '../assets/images/artistes/WING Xiao.png');

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

DROP TABLE IF EXISTS `avoir`;
CREATE TABLE IF NOT EXISTS `avoir` (
  `id_expo` int NOT NULL,
  `id_artiste` int NOT NULL,
  PRIMARY KEY (`id_expo`,`id_artiste`),
  KEY `id_artiste` (`id_artiste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `avoir`
--

INSERT INTO `avoir` (`id_expo`, `id_artiste`) VALUES
(2, 1),
(1, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 10),
(2, 11),
(2, 12),
(1, 13);

-- --------------------------------------------------------

--
-- Structure de la table `collaborateur`
--

DROP TABLE IF EXISTS `collaborateur`;
CREATE TABLE IF NOT EXISTS `collaborateur` (
  `id_collab` int NOT NULL AUTO_INCREMENT,
  `nom_collab` varchar(100) NOT NULL,
  `prenom_collab` varchar(100) NOT NULL,
  `email_collab` varchar(150) NOT NULL,
  `adresse_collab` varchar(150) DEFAULT NULL,
  `cp_collab` int DEFAULT NULL,
  `ville_collab` varchar(30) DEFAULT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8mb4 i NOT NULL,
  `id_role` int NOT NULL,
  `id_poste` int NOT NULL,
  PRIMARY KEY (`id_collab`),
  KEY `id_role` (`id_role`),
  KEY `id_poste` (`id_poste`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `collaborateur`
--

INSERT INTO `collaborateur` (`id_collab`, `nom_collab`, `prenom_collab`, `email_collab`, `adresse_collab`, `cp_collab`, `ville_collab`, `mot_de_passe`, `id_role`, `id_poste`) VALUES
(1, 'TAVARD', 'Thierry', 't.tavard@contact.fr', '12 rue de l&#039;olympe', 41000, 'BLOIS', '$argon2id$v=19$m=65536,t=4,p=1$Qlh4V00zdU5vS2t6cHF0eg$mDueecxXx0wXrVFp8g7t5ESFoaYaJyvP7otpcNd9j5A', 4, 1),
(2, 'LECOURT', 'Amandine', 'a.lecourt@contact.fr', '12 avenue de l&#039;europe', 41000, 'BLOIS', '$argon2id$v=19$m=65536,t=4,p=1$dWR2SDRsS1p2NkdaMWVpeA$pVhLVLQiAA5jAfkzqZT/V1mBrG9lKV4kYLKsCeZy2pU', 3, 2),
(3, 'DUBRAC', 'Anthony', 'a.dubrac@contact.fr', '86 Avenue des invalides', 37000, 'TOURS', '$argon2id$v=19$m=65536,t=4,p=1$pMkx1SkFqom/Xi4Pa1jtHw$jR9tlFt5zzyVBLLWxDPBi5lQ/Ly/+cJAUQcAVEcsjno', 1, 3),
(4, 'JARRY', 'Christine', 'c.jarry@contact.fr', '31 rue des vallons', 41000, 'VILLERBON', '$argon2id$v=19$m=65536,t=4,p=1$KmOCOdrGS6seye9pmbKSAw$RKP5FPDk7wWsvWB4MTfHZ3WuEiRpA9Lj+BbWbUUXH7o', 1, 4),
(5, 'AZIZ', 'Tante', 't.aziz@contact.fr', '8 rue du bout des haies', 41000, 'BLOIS', '$argon2id$v=19$m=65536,t=4,p=1$yw5frNt5Oar6GdTBFhKDSg$pSfWn+fNoxriIn6QsEnNVXaKy9dA8ws1Iznov9hinnk', 3, 4),
(6, 'SON', 'Goku', 'g.son@contact.fr', '7 place du nuage magique', 41000, 'BLOIS', '$argon2id$v=19$m=65536,t=4,p=1$L3RoalJMU1VGaDJaSm5SZQ$NDirq/PYcenMzvDU3zdLG/vmXIL7K2aq2Yt2nJxcMC0', 1, 4),
(7, 'FREUD', 'Sigmund', 's.freud@contact.fr', '5 rue de l\'Œdipe', 41000, 'BLOIS', 'abcde123', 1, 4),
(8, 'LE BRICOLEUR', 'Bob', 'b.lebricoleur@contact.fr', '7 rue du Dr ONPEU', 41000, 'BLOIS', 'abcde123', 1, 5),
(9, 'SKYWALKER', 'Anakin', 'a.skywalker@contact.fr', '66 rue de l\'ordre', 41000, 'BLOIS', 'abcde123', 1, 5),
(10, 'KENOBY', 'Obi-Wan', 'o-w.kenoby@contact.fr', '13 rue du General', 41000, 'BLOIS', 'abcde123', 1, 5),
(11, 'MASAMUNE', 'Honjo', 'h.masamune@contact.fr', '86 Avenue du Katana', 41000, 'BLOIS', 'abcde123', 1, 5),
(12, 'CURIE', 'Marie', 'm.curie@contact.fr', '66 rue du Radium', 41000, 'BLOIS', 'abcde123', 1, 5),
(13, 'WAYNE', 'Bruce', 'b.wayne@contact.fr', '32 Avenue de la Justice', 41000, 'BLOIS', 'abcde123', 1, 5),
(14, 'PARKER', 'Peter', 'p.parker@contact.fr', '18 place de l\'araignée', 41000, 'BLOIS', 'abcde123', 1, 5),
(15, 'DE GAULLE', 'Charles', 'c.de-gaulle@contact.fr', '6 rue de la compréhension', 41000, 'BLOIS', 'abcde123', 1, 6),
(16, 'LUTHER KING', 'Martin', 'm.luther-king@contact.fr', '36 rue du rêve', 41000, 'BLOIS', 'abcde123', 1, 6),
(17, 'BAER', 'Edouard', 'e.baer@contact.fr', '8bis rue des bonnes situations', 41000, 'BLOIS', 'abcde123', 1, 6),
(18, 'BOND', 'James', 'j.bond@contact.fr', '007 rue des espions', 41000, 'BLOIS', 'abcde123', 1, 7),
(19, 'ZIMMER', 'Hans', 'h.zimmer@contact.fr', '15 rue des Caraïbes', 41000, 'BLOIS', 'abcde123', 1, 7),
(20, 'DEPARDIEU', 'Gérard', 'g.depardieu@contact.fr', '8 rue de la défiscalisation', 41000, 'BLOIS', 'abcde123', 1, 8),
(21, 'JOBS', 'Steve', 's.jobs@contact.fr', '14 rue de la Pomme', 41000, 'BLOIS', 'abcde123', 1, 6),
(22, 'TROTSKY', 'Léon', 'l.trotsky@contact.fr', '12 rue du Rouge', 41000, 'BLOIS', 'abcde123', 1, 8),
(23, 'GAGARINEN', 'Youri', 'y.gagrinen@contact.fr', '61 Avenue de l\'Espace', 41000, 'BLOIS', 'abcde123', 1, 8),
(24, 'SHARAPOVA', 'Maria', 'm.sharapova@contact.fr', '6 rue de la balle jaune', 41000, 'BLOIS', 'abcde123', 1, 8),
(25, 'KASPAROV', 'Garry', 'g.kasparov@contact.fr', '31 rue de l\'échiquier', 41000, 'BLOIS', 'abcde123', 1, 8),
(26, 'STRAVINSKY', 'Igor', 'i.stravinsky@contact.fr', '21 rue de l\'oiseau de feu', 41000, 'BLOIS', 'abcde123', 1, 8),
(27, 'VODIANOVA', 'Natalia', 'n.vodianova@contact.fr', '29 rue du tapis rouge', 41000, 'BLOIS', 'abcde123', 1, 8),
(28, 'CHAN', 'Jackie', 'j.chan@contact.fr', '54 Avenue de la baston', 41000, 'BLOIS', 'abcde123', 1, 8),
(29, 'SUN', 'Li', 's.li@contact.fr', '26 rue du soleil', 41000, 'BLOIS', 'abcde123', 1, 8),
(30, 'JINPING', 'Xi', 'x.jingping@contact.fr', '12 Rue de Winnie l\'ourson', 41000, 'BLOIS', 'abcde123', 1, 8),
(31, 'YUN', 'Ma', 'm.yun@contact.fr', '36 rue Alibaba', 41000, 'BLOIS', 'abcde123', 1, 8),
(32, 'MING', 'Yao', 'y.ming@contact.fr', '11 rue des Rockets de Houston', 41000, 'BLOIS', 'abcde123', 1, 8),
(33, 'MOUNIER', 'Jean-Benoit', 'jb.mounier@yahoo.com', NULL, NULL, NULL, '$argon2id$v=19$m=65536,t=4,p=1$jpeMXblj0Uvg5BksCqrnwg$xtWghP2TN86d1JgNeAcnUmr2TdIXVVzo9g2NNH/3a+Q', 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `id_expo` int NOT NULL,
  `id_oeuvres` int NOT NULL,
  `id_plan` int NOT NULL,
  `position_y` varchar(50) DEFAULT NULL,
  `position_x` varchar(50) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_expo`,`id_oeuvres`,`id_plan`),
  KEY `id_oeuvres` (`id_oeuvres`),
  KEY `id_plan` (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`id_expo`, `id_oeuvres`, `id_plan`, `position_y`, `position_x`, `etat`) VALUES
(1, 20, 1, NULL, NULL, NULL),
(2, 4, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `espace`
--

DROP TABLE IF EXISTS `espace`;
CREATE TABLE IF NOT EXISTS `espace` (
  `id_plan` int NOT NULL AUTO_INCREMENT,
  `libelle_espace` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `espace`
--

INSERT INTO `espace` (`id_plan`, `libelle_espace`) VALUES
(1, 'espace 1'),
(2, 'espace 2'),
(3, 'espace 3'),
(4, 'hall princpal');

-- --------------------------------------------------------

--
-- Structure de la table `exposition`
--

DROP TABLE IF EXISTS `exposition`;
CREATE TABLE IF NOT EXISTS `exposition` (
  `id_expo` int NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `report_frequentation` int DEFAULT NULL,
  `nom_directeur_artistique` varchar(100) DEFAULT NULL,
  `prenom_directeur_artistique` varchar(100) DEFAULT NULL,
  `email_directeur_artistique` varchar(150) DEFAULT NULL,
  `nombre_oeuvres` int DEFAULT NULL,
  `nom_expo` varchar(100) NOT NULL,
  `id_theme` int NOT NULL,
  PRIMARY KEY (`id_expo`),
  KEY `id_theme` (`id_theme`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `exposition`
--

INSERT INTO `exposition` (`id_expo`, `date_debut`, `date_fin`, `report_frequentation`, `nom_directeur_artistique`, `prenom_directeur_artistique`, `email_directeur_artistique`, `nombre_oeuvres`, `nom_expo`, `id_theme`) VALUES
(1, '2024-03-15', '2024-04-30', NULL, 'VENTURA', 'Charles-Henri', 'ch.ventura@contact.fr', 53, 'Autour du monde', 13),
(2, '2024-05-01', '2024-06-30', NULL, 'VILLEDIEU', 'Edouard', 'e.villedieu@contact.fr', 53, 'Celt\'inks', 16);

-- --------------------------------------------------------

--
-- Structure de la table `flashcode`
--

DROP TABLE IF EXISTS `flashcode`;
CREATE TABLE IF NOT EXISTS `flashcode` (
  `id_flashcode` int NOT NULL AUTO_INCREMENT,
  `ref_flashcode` varchar(50) DEFAULT NULL,
  `chemim_flashcode` text,
  `id_langues` int NOT NULL,
  `id_oeuvres` int NOT NULL,
  PRIMARY KEY (`id_flashcode`),
  KEY `id_langues` (`id_langues`),
  KEY `id_oeuvres` (`id_oeuvres`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Structure de la table `langues_site`
--

DROP TABLE IF EXISTS `langues_site`;
CREATE TABLE IF NOT EXISTS `langues_site` (
  `id_langues` int NOT NULL AUTO_INCREMENT,
  `libelle_langues` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_langues`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `langues_site`
--

INSERT INTO `langues_site` (`id_langues`, `libelle_langues`) VALUES
(1, 'french'),
(2, 'english'),
(3, 'deutsh'),
(4, 'russian'),
(5, 'chinese');

-- --------------------------------------------------------

--
-- Structure de la table `oeuvres_expo`
--

DROP TABLE IF EXISTS `oeuvres_expo`;
CREATE TABLE IF NOT EXISTS `oeuvres_expo` (
  `id_oeuvres` int NOT NULL AUTO_INCREMENT,
  `nom_oeuvre` varchar(100) NOT NULL,
  `chemin_image` varchar(150) DEFAULT NULL,
  `description_oeuvre` text,
  `date_realisation` date NOT NULL,
  `nombre_vues` int DEFAULT NULL,
  `largeur` decimal(15,2) DEFAULT NULL,
  `hauteur` decimal(15,2) DEFAULT NULL,
  `poids` decimal(15,2) DEFAULT NULL,
  `profondeur` decimal(15,2) DEFAULT NULL,
  `duree` time DEFAULT NULL,
  `date_livraison_prevu` date NOT NULL,
  `date_livraison_reel` date DEFAULT NULL,
  `id_type_oeuvre` int NOT NULL,
  PRIMARY KEY (`id_oeuvres`),
  KEY `id_type_oeuvre` (`id_type_oeuvre`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `oeuvres_expo`
--

INSERT INTO `oeuvres_expo` (`id_oeuvres`, `nom_oeuvre`, `chemin_image`, `description_oeuvre`, `date_realisation`, `nombre_vues`, `largeur`, `hauteur`, `poids`, `profondeur`, `duree`, `date_livraison_prevu`, `date_livraison_reel`, `id_type_oeuvre`) VALUES
(1, 'Chaos', '../assets/images/oeuvres/Chaos.jpg', 'Au premier regard, \"Chaos\" semble être une juxtaposition désordonnée d\'éléments disparates. Des couleurs vives et sombres s\'entremêlent de manière chaotique, formant une toile abstraite qui évoque un sentiment d\'urgence et de déséquilibre. Les lignes tourbillonnantes et les formes irrégulières semblent se heurter et se fondre les unes dans les autres, créant une tension visuelle palpable.', '2018-03-13', NULL, 150.00, 150.00, 5.30, 7.50, NULL, '2024-03-13', '2024-03-13', 4),
(2, 'Eclat d\'âme', '../assets/images/oeuvres/éclat d_ame.jpg', 'Dès le premier regard, \"Éclat d\'Âme\" attire l\'attention avec son éclatante palette de couleurs. Des tons vibrants de rouge, de bleu et de jaune se mêlent harmonieusement, créant une symphonie visuelle qui évoque des émotions profondes et variées. Des nuances subtiles et des éclats lumineux dansent à travers la toile, capturant la lumière et projetant une aura de vie et de mouvement.', '2014-09-08', NULL, 150.00, 150.00, 5.90, 7.50, NULL, '2024-03-12', '2024-03-12', 4),
(3, 'Fracture', '../assets/images/oeuvres/Fracture.jpg', '\"Fracture\" est une œuvre audacieuse qui défie les conventions artistiques avec sa composition innovante et ses expressions abstraites. Composée de quatre carrés distincts, chacun renfermant une œuvre abstraite expressionniste unique, cette pièce captivante invite le spectateur à plonger dans un voyage émotionnel et intellectuel.', '2010-06-11', NULL, 150.00, 150.00, 5.30, 7.50, NULL, '2024-02-29', '2024-03-01', 4),
(4, 'Amitié', '../assets/images/oeuvres/amitié.jpg', '\"Amitié\" est une œuvre touchante qui capture l\'essence même des liens profonds entre les êtres vivants à travers la représentation de deux chiens dans leur élément naturel. Cette scène poignante offre une vision de l\'amitié pure et inconditionnelle qui transcende les frontières de l\'espèce.', '2021-12-12', NULL, 100.00, 100.00, 5.00, 5.00, NULL, '2024-03-15', '2024-03-14', 2),
(5, 'Echec et mat', '../assets/images/oeuvres/Echec et Mat.jpg', '\"Échec et Mat\" est une œuvre captivante qui fige un moment de réflexion et de stratégie entre deux hommes âgés, plongés dans une partie d\'échecs intense. Réalisée avec la délicatesse caractéristique de l\'aquarelle, cette scène dégage une aura de nostalgie et de profondeur, invitant le spectateur à contempler le passage du temps et la richesse de l\'expérience humaine.', '2020-09-13', NULL, 150.00, 150.00, 5.30, 7.50, NULL, '2024-03-14', '2024-03-13', 2),
(6, 'Innocence', '../assets/images/oeuvres/Innocence.png', 'Dans cette œuvre douce et évocatrice intitulée \"Innocence\", l\'aquarelle capture l\'essence même de l\'enfance à travers la représentation de trois enfants qui jouent dans une flaque d\'eau. Chaque détail de cette scène dégage une aura de joie pure et d\'émerveillement, transportant le spectateur dans un monde de souvenirs et de nostalgie.', '2018-01-01', NULL, 150.00, 150.00, 5.30, 7.50, NULL, '2024-03-12', '2024-03-12', 2),
(7, 'Nature n°5', '../assets/images/oeuvres/nature n5.jpg', '\"Nature N5\" est une œuvre envoûtante qui capture la majesté et la tranquillité de la nature à travers la représentation de trois cerfs se tenant dans une forêt luxuriante, devant un cours d\'eau sinueux. Réalisée avec la délicatesse caractéristique de l\'aquarelle, cette scène évoque une atmosphère de paix et d\'harmonie, invitant le spectateur à s\'évader dans un monde de beauté naturelle préservée.', '2017-06-02', NULL, 100.00, 50.00, 3.60, 2.80, NULL, '2024-03-15', '2024-03-14', 2),
(8, 'Quai n°13', '../assets/images/oeuvres/Quai n13.jpg', 'Quai Numéro 13\" est une œuvre qui capture l\'atmosphère paisible et pittoresque d\'un quai côtier, où des bateaux sont amarrés tranquillement, bercés par les douces vagues de la marée. Réalisée avec la subtilité caractéristique de l\'aquarelle, cette scène évoque une sensation de calme et d\'émerveillement devant la beauté simple de la vie en bord de mer.', '2018-07-13', NULL, 100.00, 100.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 2),
(9, 'Blossom', '../assets/images/oeuvres/blossom.jpg', '\"Blossom\" est une œuvre expressionniste abstraite qui évoque un éclat de vie et de couleur, capturant l\'énergie vibrante de la nature qui s\'épanouit. Réalisée avec la spontanéité caractéristique de l\'aquarelle, cette composition offre une explosion de formes et de couleurs qui danse sur la toile, invitant le spectateur à plonger dans un tourbillon d\'émotions et de sensations.', '2006-09-15', NULL, 200.00, 200.00, 10.00, 5.00, NULL, '2024-02-29', '2024-03-01', 3),
(10, 'Force', '../assets/images/oeuvres/force.jpg', '\"Force\" est une œuvre expressionniste abstraite qui capture l\'intensité brute et la puissance émotionnelle à travers une explosion de formes et de couleurs. Réalisée avec la spontanéité caractéristique de l\'aquarelle, cette composition offre une vision tourbillonnante et énergique qui évoque un sentiment de dynamisme et de vigueur.', '1998-03-12', NULL, 100.00, 100.00, 5.00, 5.00, NULL, '2024-03-12', '2024-03-13', 3),
(11, 'Incendie', '../assets/images/oeuvres/incendie.jpg', '\"Incendie\" est une œuvre expressionniste abstraite qui capte la fureur et l\'intensité d\'un feu dévorant à travers une explosion de couleurs et de formes tourmentées. Réalisée avec la spontanéité caractéristique de l\'aquarelle, cette composition offre une vision tumultueuse et chaotique qui évoque un sentiment d\'urgence et de danger.', '2017-01-16', NULL, 100.00, 100.00, 5.90, 5.00, NULL, '2024-03-12', '2024-03-13', 3),
(12, 'Route de campagne', '../assets/images/oeuvres/route de campagne.jpg', '\"Route de Campagne\" est une œuvre expressionniste abstraite qui capture l\'essence de la vie rurale à travers une explosion de formes et de couleurs évocatrices. Réalisée avec la spontanéité caractéristique de l\'aquarelle, cette composition offre une vision dynamique et émouvante d\'une route sinueuse traversant la campagne.', '2013-08-14', NULL, 100.00, 100.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 3),
(13, 'Aube', '../assets/images/oeuvres/Aube.jpg', '\"Aube\" est une œuvre d\'art contemporain qui fusionne les influences de l\'art brut et celtique pour créer une expérience visuelle captivante et mystique. Réalisée avec une variété de médiums, cette pièce évoque une sensation de renouveau et de magie alors que le jour naît sur un paysage imprégné de symbolisme celtique.', '2019-03-05', NULL, 200.00, 100.00, 10.00, 5.00, NULL, '2024-03-12', '2024-03-13', 1),
(14, 'Champs', '../assets/images/oeuvres/champs.jpg', '\"Champs\" est une œuvre d\'art contemporain qui marie habilement les influences de l\'art brut et celtique pour créer une expérience visuelle saisissante et émouvante. Réalisée avec une palette de médiums variés, cette pièce évoque une sensation de connexion profonde avec la terre et les éléments, imprégnée de mysticisme celtique.', '2015-03-11', NULL, 150.00, 75.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 1),
(15, 'Comté', '../assets/images/oeuvres/comté.jpg', '\"Comté\" est une œuvre d\'art contemporain qui fusionne les esthétiques de l\'art brut et celtique pour créer une exploration visuelle profonde et envoûtante. Réalisée à travers une variété de médiums, cette pièce évoque un paysage intemporel, imprégné de l\'essence mystique des terres celtiques.', '2017-03-31', NULL, 150.00, 75.00, 5.30, 5.00, NULL, '2024-02-29', '2024-03-01', 1),
(16, 'Dryade', '../assets/images/oeuvres/dryade.jpg', '\"Dryade\" est une œuvre d\'art contemporain qui fusionne habilement les styles de l\'art brut et celtique pour créer une expérience visuelle fascinante et mystique. Réalisée à travers une variété de médiums, cette pièce évoque la présence envoûtante des esprits de la nature, connus sous le nom de dryades, dans les forêts anciennes.', '2015-11-17', NULL, 150.00, 75.00, 5.90, 5.00, NULL, '2024-03-12', '2024-03-13', 1),
(17, 'La demeure', '../assets/images/oeuvres/la demeure.jpg', '\"La Demeure\" est une œuvre d\'art contemporain qui fusionne les esthétiques de l\'art brut et celtique pour créer une expérience visuelle envoûtante et mystique. Réalisée à travers une variété de médiums, cette pièce évoque une demeure ancestrale, imprégnée de la magie et de la mystique des anciens lieux celtiques.', '2017-03-07', NULL, 100.00, 50.00, 5.30, 2.80, NULL, '2024-03-15', '2024-03-12', 1),
(18, 'Nature morte', '../assets/images/oeuvres/nature morte.jpg', '\"Nature Morte\" est une œuvre d\'art contemporain qui marie les styles de l\'art brut et celtique pour créer une exploration visuelle profonde et évocatrice. Cette pièce, réalisée à travers une variété de médiums, offre une interprétation captivante d\'un genre classique, la nature morte, tout en intégrant des éléments symboliques et mystiques propres à la tradition celtique.', '2020-06-12', NULL, 100.00, 100.00, 5.90, 5.00, NULL, '2024-03-13', '2024-03-12', 1),
(19, 'Plage', '../assets/images/oeuvres/plage.jpg', '\"Plage\" est une œuvre d\'art contemporain qui fusionne les styles de l\'art brut et celtique pour créer une exploration visuelle immersive et émotionnelle. Cette pièce, réalisée à travers une variété de médiums, capture l\'essence de la plage comme lieu de connexion entre l\'homme et la nature, tout en intégrant des éléments symboliques propres à la tradition celtique.', '2018-01-01', NULL, 100.00, 100.00, 5.00, 5.00, NULL, '2024-03-15', '2024-03-14', 1),
(20, 'Adam', '../assets/images/oeuvres/Adam.jpg', '\"Adam\" est une sculpture saisissante qui incarne la puissance et la noblesse de la forme humaine. Taillée dans le marbre blanc, cette œuvre présente un homme debout, d\'une stature imposante et d\'une élégance intemporelle.\r\n\r\nLa silhouette d\'Adam est sculptée avec une précision remarquable, chaque muscle, chaque courbe du corps étant finement détaillée pour capturer la grâce et la force de la figure humaine. Son visage est ciselé avec une expression sereine et réfléchie, reflétant une tranquillité intérieure et une profondeur d\'âme.', '2019-02-10', NULL, 50.00, 180.00, 70.00, 38.00, NULL, '2024-02-29', '2024-03-01', 12),
(21, 'Bidonville', '../assets/images/oeuvres/bidonville.jpg', '\"Bidonville\" est une œuvre acrylique qui saisit l\'essence brute et poignante de la vie dans les quartiers informels. Sur une toile de grande dimension, les couleurs vives et contrastées se confrontent pour représenter l\'environnement chaotique et dense d\'un bidonville.', '2018-08-17', NULL, 150.00, 75.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 5),
(22, 'Flamenco', '../assets/images/oeuvres/flamenco.jpg', '\"Flamenco\" est une œuvre acrylique qui capture l\'énergie passionnée et la grâce envoûtante d\'une femme dansant dans la rue. Sur une toile vibrante et colorée, la silhouette élégante de la danseuse est mise en valeur au centre de la composition.', '2018-03-13', NULL, 100.00, 50.00, 5.30, 2.80, NULL, '2024-03-12', '2024-03-13', 5),
(23, 'La femme en rouge', '../assets/images/oeuvres/La femme en rouge.jpg', '\"La Femme en Rouge\" est une œuvre acrylique captivante qui met en scène une femme drapée dans un magnifique tissu rouge. Sur une toile imposante, la silhouette élégante de la femme se détache avec une intensité saisissante, évoquant une présence mystérieuse et envoûtante.', '2021-12-12', NULL, 100.00, 50.00, 3.60, 2.80, NULL, '2024-03-12', '2024-03-13', 5),
(24, 'L\'église', '../assets/images/oeuvres/L_église.jpg', '\"L\'église\" est une œuvre acrylique évocatrice qui capture la majesté et la solennité d\'un édifice religieux. Sur une toile de taille imposante, l\'église se dresse fièrement au centre de la composition, évoquant un lieu de culte empreint de spiritualité et de transcendance.', '2010-06-11', NULL, 100.00, 50.00, 3.60, 5.00, NULL, '2024-03-12', '2024-03-13', 5),
(25, 'Pedraza', '../assets/images/oeuvres/Pedraza.jpg', '\"Pedraza\" est une œuvre acrylique qui capture la beauté pittoresque et l\'atmosphère enchanteresse d\'un village espagnol traditionnel. Sur une toile spacieuse, le village de Pedraza s\'étend sous le ciel bleu azur, évoquant un véritable joyau d\'architecture et de culture.', '2017-10-16', NULL, 100.00, 50.00, 3.60, 5.00, NULL, '2024-03-12', '2024-03-13', 5),
(26, 'Souk', '../assets/images/oeuvres/souk.jpg', '\"Souk\" est une œuvre acrylique qui capture l\'effervescence et la vivacité d\'un marché traditionnel au cœur d\'une ville orientale. Sur une toile généreuse, le souk s\'anime avec une explosion de couleurs, de mouvements et de sons, évoquant un véritable festin pour les sens.', '2018-01-01', NULL, 200.00, 100.00, 10.00, 5.00, NULL, '2024-03-12', '2024-03-13', 5),
(27, 'Concert', '../assets/images/oeuvres/concert.jpg', '\"Concert\" est une œuvre fusionnant l\'expressionnisme et l\'art abstrait pour capturer l\'énergie palpitante et les émotions intenses d\'un concert en live. Sur une toile dynamique, des formes tourbillonnantes et des couleurs vibrantes se fondent pour créer une symphonie visuelle qui évoque le mouvement et la passion de la musique.', '2018-03-13', NULL, 100.00, 50.00, 5.90, 5.00, NULL, '2024-03-12', '2024-03-13', 3),
(28, 'Harmonie', '../assets/images/oeuvres/harmonie.webp', '\"Harmonie\" est une œuvre captivante qui marie l\'expressionnisme et l\'art abstrait pour exprimer un sentiment de cohésion et d\'équilibre dans un tourbillon d\'émotions et de formes. Sur une toile dynamique et audacieuse, des couleurs vives et des textures vibrantes se rencontrent pour créer une symphonie visuelle qui évoque l\'harmonie et l\'unité.', '2023-03-15', NULL, 100.00, 50.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 3),
(29, 'La course au bonheur', '../assets/images/oeuvres/la course au bohneur.jpg', '\"La Course au Bonheur\" est une œuvre saisissante qui fusionne l\'expressionnisme et l\'art abstrait pour explorer la quête incessante de bonheur dans un monde tourmenté. Sur une toile dynamique et expressive, des formes tourbillonnantes et des couleurs éclatantes s\'entrelacent pour créer un paysage émotionnel complexe.', '2020-09-13', NULL, 100.00, 50.00, 5.90, 5.00, NULL, '2024-03-12', '2024-03-13', 3),
(30, 'Passion', '../assets/images/oeuvres/passion.jpg', '\"Passion\" est une œuvre émouvante qui marie l\'expressionnisme et l\'art abstrait pour capturer l\'intensité et la profondeur des émotions humaines. Sur une toile vibrante et dynamique, des couleurs vives et des formes tourbillonnantes s\'entrelacent pour créer un paysage émotionnel captivant.', '2009-03-11', NULL, 100.00, 100.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 3),
(31, 'Cougar', '../assets/images/oeuvres/cougar.jpg', '\"Cougar\" est une œuvre intrigante qui fusionne le réalisme et l\'art abstrait pour capturer la majesté et la puissance de cet animal emblématique. Sur une toile de grande dimension, la silhouette imposante d\'un cougar se détache avec une présence impressionnante, évoquant à la fois sa force physique et son élégance naturelle.', '2020-09-13', NULL, 50.00, 100.00, 5.30, 2.80, NULL, '2024-03-12', '2024-03-13', 6),
(32, 'Dépression', '../assets/images/oeuvres/depression.jpg', '\"Dépression\" est une œuvre puissante qui marie le réalisme et l\'art abstrait pour explorer les profondeurs de l\'expérience humaine face à la maladie mentale. Sur une toile sombre et énigmatique, une silhouette humaine est représentée, enveloppée dans un tourbillon de formes abstraites et de couleurs sombres.', '2014-09-08', NULL, 50.00, 100.00, 5.30, 5.00, NULL, '2024-03-15', '2024-03-12', 6),
(33, 'Le renouveau', '../assets/images/oeuvres/le renouveau.jpg', '\"Le Renouveau\" est une œuvre captivante qui mêle réalisme et art abstrait pour exprimer le cycle infini de la vie et de la transformation. Sur une toile riche en nuances, une scène de renouveau émerge avec une énergie vibrante et une profondeur émotionnelle.', '2018-01-01', NULL, 50.00, 100.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 6),
(34, 'Tiger', '../assets/images/oeuvres/tiger.jpg', '\"Tiger\" est une œuvre qui fusionne habilement le réalisme et l\'art abstrait pour capturer la majesté et la puissance du tigre, un symbole de force et de courage. Sur une toile saisissante, la silhouette imposante d\'un tigre émerge de l\'obscurité avec une présence impressionnante et une aura de mystère.', '2010-06-11', NULL, 50.00, 100.00, 3.60, 2.80, NULL, '2024-03-12', '2024-03-13', 6),
(35, 'Feminity', '../assets/images/oeuvres/feminity.jpg', '\"Feminity\" est une œuvre délicate et évocatrice réalisée à l\'aquarelle, capturant la grâce et la beauté de l\'essence féminine. Sur une toile légère et fluide, des traits délicats et des nuances subtiles se fondent pour créer une représentation éthérée de la féminité.', '2010-06-11', NULL, 150.00, 75.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 7),
(36, 'Oldmen', '../assets/images/oeuvres/oldmen.png', '\"Oldmen\" est une œuvre captivante réalisée à l\'aquarelle, qui met en scène la sagesse et l\'histoire incarnées dans le visage d\'un homme âgé portant un turban. Sur une toile douce et subtile, les couleurs et les nuances se fondent pour créer une représentation émouvante de la vieillesse et de la dignité.', '2018-03-13', NULL, 50.00, 100.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 2),
(37, 'Women speaking', '../assets/images/oeuvres/women speaking.jpg', '\"Women speaking\" est une œuvre vibrante réalisée à l\'aquarelle, qui capture l\'essence de la vie quotidienne et de la camaraderie parmi un groupe de femmes indiennes. Sur une toile lumineuse et colorée, les personnages sont représentés avec une grâce naturelle et une énergie contagieuse alors qu\'elles échangent des conversations animées.', '2010-06-11', NULL, 100.00, 75.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 2),
(38, 'Forest', '../assets/images/oeuvres/women speaking.jpg', '\"Forest\" est une œuvre envoûtante qui combine habilement des éléments abstraits et figuratifs pour capturer l\'essence mystique et l\'immensité de la nature sauvage. Sur une toile expansive, des formes organiques et des motifs tourbillonnants se mêlent à des représentations figuratives d\'arbres et de végétation, créant un paysage onirique et évocateur.', '2014-09-08', NULL, 100.00, 100.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 4),
(39, 'Jeju island fishermen', '../assets/images/oeuvres/jeju island fishermen.png', '\"Jeju island fishermen\" est une œuvre qui marie subtilement des éléments abstraits et figuratifs pour représenter la vie et le travail des pêcheurs sur l\'île de Jeju, en Corée du Sud. Sur une toile dynamique et immersive, des formes organiques et des motifs figuratifs se mêlent pour capturer l\'essence de cette communauté maritime.', '2018-01-01', NULL, 100.00, 100.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 4),
(40, 'Lotus', '../assets/images/oeuvres/lotus flower.png', '\"Lotus\" est une œuvre saisissante réalisée à l\'encre de Chine, où l\'abstrait et le figuratif fusionnent pour capturer l\'essence mystique de cette fleur emblématique. Sur une toile en noir et blanc, des motifs abstraits évoquant les pétales du lotus se mêlent à des représentations figuratives de cette fleur sacrée.', '2018-01-01', NULL, 100.00, 100.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 4),
(41, 'Cosmopolite', '../assets/images/oeuvres/cosmopolite.jpeg', '\"Cosmopolite\" est une œuvre d\'art qui fusionne la peinture à l\'huile et le collage à l\'encre de Chine pour créer une exploration visuelle complexe du concept de mondialisation et de diversité culturelle. Sur une toile en noir et blanc, des éléments figuratifs et abstraits se combinent pour représenter la richesse et la complexité du monde contemporain.', '2010-06-11', NULL, 100.00, 100.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 8),
(42, 'Fall in love', '../assets/images/oeuvres/fall in love.jpg', '\"Fall in Love\" est une œuvre d\'art intrigante qui combine la peinture à l\'huile et le collage pour capturer l\'essence de l\'amour et de la romance. Sur une toile aux tons chauds et riches, des éléments figuratifs et abstraits se mêlent pour créer une représentation visuelle émouvante de ce sentiment universel.', '2014-09-08', NULL, 50.00, 100.00, 5.90, 5.00, NULL, '2024-03-12', '2024-03-13', 7),
(43, 'Jeu et Amour', '../assets/images/oeuvres/jeu et amour.png', '\"Jeu et Amour\" est une œuvre d\'art captivante qui marie la peinture à l\'huile et le collage pour explorer les thèmes de la légèreté, du plaisir et de l\'affection. Sur une toile riche en textures et en couleurs, des éléments figuratifs et abstraits se rencontrent pour créer une scène dynamique et évocatrice.', '2020-09-13', NULL, 150.00, 50.00, 3.60, 5.00, NULL, '2024-03-12', '2024-03-13', 8),
(44, 'Lucy', '../assets/images/oeuvres/Lucy.jpg', '\"Lucy\" est une œuvre d\'art intrigante qui associe la peinture à l\'huile et le collage pour créer une représentation évocatrice d\'un crâne. Sur une toile claire et mystérieuse, des éléments figuratifs et abstraits se combinent pour évoquer la puissance et la fragilité de la vie.', '2021-12-12', NULL, 50.00, 100.00, 3.60, 2.80, NULL, '2024-03-12', '2024-03-13', 7),
(45, 'Le joueur de violon', '../assets/images/oeuvres/Le joueur de violon.jpeg', '\"Le joueur de violon\" est une œuvre fascinante qui mêle les styles du cubisme et de l\'abstrait pour représenter un musicien en train de jouer de son instrument avec passion et émotion. Sur une toile dynamique et expressive, des formes géométriques et des motifs abstraits se combinent pour capturer le mouvement et le rythme de la musique.', '2014-09-08', NULL, 50.00, 100.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 9),
(46, 'Le livreur de lait', '../assets/images/oeuvres/le livreur de lait.png', '\"Le Livreur de Lait\" est une œuvre saisissante qui fusionne les styles du cubisme et de l\'abstrait pour représenter un personnage iconique dans un contexte moderne. Sur une toile dynamique et complexe, des formes géométriques et des motifs abstraits se combinent pour capturer l\'essence de ce travailleur urbain.', '2010-06-11', NULL, 100.00, 100.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 9),
(47, 'Levé du jour', '../assets/images/oeuvres/levé du jour.jpg', '\"Levé du Jour\" est une œuvre intrigante qui combine les styles du cubisme et de l\'abstrait pour capturer l\'aube d\'un nouveau jour avec une perspective unique et dynamique. Sur une toile vibrante et expressive, des formes géométriques et des motifs abstraits s\'entrelacent pour représenter l\'éclat et la promesse d\'un nouveau commencement.', '2014-09-08', NULL, 100.00, 100.00, 5.30, 2.80, NULL, '2024-03-12', '2024-03-13', 9),
(48, 'Concert métal', '../assets/images/oeuvres/concert death metal.jpg', '\"Concert Métal\" est une œuvre surréaliste et abstraite qui plonge le spectateur dans un monde où les frontières entre la réalité et l\'imagination sont brouillées. Sur une toile tourbillonnante et tumultueuse, des éléments surréalistes et abstraits s\'entrelacent pour capturer l\'énergie brute et la puissance émotionnelle d\'un concert de musique métal.', '2021-12-12', NULL, 100.00, 50.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 10),
(49, 'Epanouissement', '../assets/images/oeuvres/épanouissement.jpg', '\"Épanouissement\" est une œuvre surréaliste et abstraite qui explore les notions de croissance, de transformation et de découverte de soi à travers un paysage onirique et évocateur. Sur une toile vibrante et dynamique, des éléments surréalistes et abstraits se fondent pour créer une scène où la réalité et l\'imagination se confondent.', '2018-01-01', NULL, 100.00, 100.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 10),
(50, 'Vacances à la plage', '../assets/images/oeuvres/vacances à la plage.png', '\"Vacances à la plage\" est une œuvre surréaliste et abstraite qui transporte le spectateur dans un monde imaginaire où les souvenirs de vacances se mêlent à l\'expression artistique. Sur une toile vibrante et évocatrice, des éléments surréalistes et abstraits se combinent pour créer une scène où la réalité et l\'imagination se rencontrent.', '2018-01-01', NULL, 100.00, 50.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 10),
(51, 'Prêtresse', '../assets/images/oeuvres/pretresse.jpg', '\"Prêtresse\" est une œuvre qui fusionne l\'art traditionnel chinois avec des éléments de modernité pour créer une représentation mystique et énigmatique d\'une figure féminine empreinte de spiritualité et de puissance. Sur une toile délicate et raffinée, des motifs traditionnels chinois se mêlent à des touches contemporaines pour évoquer la présence imposante de la prêtresse.', '2018-03-13', NULL, 100.00, 100.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 11),
(52, 'Tempête', '../assets/images/oeuvres/tempete.jpg', '\"Tempête\" est une œuvre qui marie l\'art traditionnel chinois avec des éléments modernes pour créer une représentation puissante et évocatrice d\'une tempête tumultueuse. Sur une toile dynamique et expressive, des motifs traditionnels chinois se mêlent à des touches contemporaines pour évoquer la force et la turbulence de la nature déchaînée.', '2014-09-08', NULL, 150.00, 75.00, 5.30, 5.00, NULL, '2024-03-12', '2024-03-13', 11),
(53, 'Temple', '../assets/images/oeuvres/temple.jpg', '\"Temple\" est une œuvre qui allie l\'art traditionnel chinois à des éléments modernes pour créer une représentation impressionnante et émouvante d\'un temple ancien imprégné de spiritualité et de sérénité. Sur une toile imposante et riche en détails, des motifs traditionnels chinois se mêlent à des touches contemporaines pour évoquer la grandeur et la majesté de cet édifice sacré.', '2010-06-11', NULL, 50.00, 150.00, 5.90, 5.00, NULL, '2024-03-12', '2024-03-13', 11);

-- --------------------------------------------------------

--
-- Structure de la table `postes`
--

DROP TABLE IF EXISTS `postes`;
CREATE TABLE IF NOT EXISTS `postes` (
  `id_poste` int NOT NULL AUTO_INCREMENT,
  `libelle_poste` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_poste`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `postes`
--

INSERT INTO `postes` (`id_poste`, `libelle_poste`) VALUES
(1, 'Directeur.rice'),
(2, 'Responsable Communication'),
(3, 'Responsable technique'),
(4, 'Assistant(e)'),
(5, 'Technicien(ne)'),
(6, 'Chargé(e) de Communication'),
(7, 'Traducteur.rice FR/ENG/ALL'),
(8, 'Traducteur.rice FR/RU/CHN');

-- --------------------------------------------------------

--
-- Structure de la table `présenter`
--

DROP TABLE IF EXISTS `présenter`;
CREATE TABLE IF NOT EXISTS `présenter` (
  `id_oeuvres` int NOT NULL,
  `id_artiste` int NOT NULL,
  PRIMARY KEY (`id_oeuvres`,`id_artiste`),
  KEY `id_artiste` (`id_artiste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `présenter`
--

INSERT INTO `présenter` (`id_oeuvres`, `id_artiste`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(26, 5),
(27, 6),
(28, 6),
(29, 6),
(30, 6),
(31, 7),
(32, 7),
(33, 7),
(34, 7),
(35, 8),
(36, 8),
(37, 8),
(38, 9),
(39, 9),
(40, 9),
(41, 10),
(42, 10),
(43, 10),
(44, 10),
(45, 11),
(46, 11),
(47, 11),
(48, 12),
(49, 12),
(50, 12),
(51, 13),
(52, 13),
(53, 13);

-- --------------------------------------------------------

--
-- Structure de la table `recueillir`
--

DROP TABLE IF EXISTS `recueillir`;
CREATE TABLE IF NOT EXISTS `recueillir` (
  `id_expo` int NOT NULL,
  `id_collab` int NOT NULL,
  PRIMARY KEY (`id_expo`,`id_collab`),
  KEY `id_collab` (`id_collab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `libelle_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `libelle_role`) VALUES
(1, 'ADMIN'),
(2, 'USER'),
(3, 'CONTRIBUTEUR'),
(4, 'CREATOR');

-- --------------------------------------------------------

--
-- Structure de la table `stats`
--

DROP TABLE IF EXISTS `stats`;
CREATE TABLE IF NOT EXISTS `stats` (
  `id_stats` int NOT NULL AUTO_INCREMENT,
  `libelle_stats` varchar(50) DEFAULT NULL,
  `valeur` varchar(50) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `id_expo` int NOT NULL,
  PRIMARY KEY (`id_stats`),
  KEY `id_expo` (`id_expo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id_theme` int NOT NULL AUTO_INCREMENT,
  `libelle_theme` varchar(50) NOT NULL,
  PRIMARY KEY (`id_theme`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id_theme`, `libelle_theme`) VALUES
(12, 'Milles couleurs'),
(13, 'Vie de tout les jours'),
(14, 'Nature'),
(15, 'Animaux'),
(16, 'Celtique'),
(17, 'Paysage'),
(18, 'Portrait'),
(19, 'Géométrique'),
(20, 'Cubisme');

-- --------------------------------------------------------

--
-- Structure de la table `traduction`
--

DROP TABLE IF EXISTS `traduction`;
CREATE TABLE IF NOT EXISTS `traduction` (
  `id_traduction` int NOT NULL AUTO_INCREMENT,
  `contenu` text,
  `id_langues` int NOT NULL,
  `id_oeuvres` int NOT NULL,
  PRIMARY KEY (`id_traduction`),
  KEY `id_langues` (`id_langues`),
  KEY `id_oeuvres` (`id_oeuvres`)
) ENGINE=InnoDB AUTO_INCREMENT=267 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `traduction`
--

INSERT INTO `traduction` (`id_traduction`, `contenu`, `id_langues`, `id_oeuvres`) VALUES
(1, 'At first glance, “Chaos” appears to be a messy juxtaposition of disparate elements. Bright and dark colors intertwine chaotically, forming an abstract canvas that evokes a sense of urgency and imbalance. Swirling lines and irregular shapes appear to collide and blend into one another, creating palpable visual tension.', 2, 1),
(2, 'Au premier regard, \"Chaos\" semble être une juxtaposition désordonnée d\'éléments disparates. Des couleurs vives et sombres s\'entremêlent de manière chaotique, formant une toile abstraite qui évoque un sentiment d\'urgence et de déséquilibre. Les lignes tourbillonnantes et les formes irrégulières semblent se heurter et se fondre les unes dans les autres, créant une tension visuelle palpable.', 1, 1),
(3, 'Auf den ersten Blick scheint „Chaos“ ein chaotisches Nebeneinander unterschiedlicher Elemente zu sein. Helle und dunkle Farben vermischen sich chaotisch und bilden eine abstrakte Leinwand, die ein Gefühl von Dringlichkeit und Unausgewogenheit hervorruft. Wirbelnde Linien und unregelmäßige Formen scheinen zu kollidieren und ineinander überzugehen, wodurch eine spürbare visuelle Spannung entsteht.', 3, 1),
(4, 'На первый взгляд «Хаос» кажется беспорядочным сочетанием разрозненных элементов. Яркие и темные цвета хаотично переплетаются, образуя абстрактное полотно, вызывающее ощущение срочности и дисбаланса. Закрученные линии и неправильные формы, кажется, сталкиваются и сливаются друг с другом, создавая ощутимое визуальное напряжение.', 4, 1),
(5, '乍一看，“混沌”似乎是不同元素的混乱并置。明亮和黑暗的颜色混乱地交织在一起，形成一幅抽象的画布，唤起一种紧迫感和不平衡感。旋转的线条和不规则的形状似乎相互碰撞和融合，产生明显的视觉张力。', 5, 1),
(6, '第一眼看上去，“Éclat d’âme”以其令人眼花缭乱的调色板吸引了人们的注意。红、蓝、黄等充满活力的色调和谐地融合在一起，创造出一首视觉交响曲，唤起深刻而多样的情感。微妙的色调和爆发的光线在画布上舞动，捕捉光线并投射出生命和运动的光环。', 5, 2),
(7, 'Dès le premier regard, \"Éclat d\'Âme\" attire l\'attention avec son éclatante palette de couleurs. Des tons vibrants de rouge, de bleu et de jaune se mêlent harmonieusement, créant une symphonie visuelle qui évoque des émotions profondes et variées. Des nuances subtiles et des éclats lumineux dansent à travers la toile, capturant la lumière et projetant une aura de vie et de mouvement.', 1, 2),
(8, 'С первого взгляда «Éclat d’Âme» привлекает внимание своей ослепительной цветовой палитрой. Яркие тона красного, синего и желтого гармонично сочетаются друг с другом, создавая визуальную симфонию, вызывающую глубокие и разнообразные эмоции. Тонкие оттенки и вспышки света танцуют на холсте, улавливая свет и создавая ауру жизни и движения.', 4, 2),
(9, 'Schon auf den ersten Blick fällt „Éclat d’Âme“ durch seine schillernde Farbpalette auf. Lebendige Rot-, Blau- und Gelbtöne verschmelzen harmonisch und schaffen eine visuelle Symphonie, die tiefe und vielfältige Emotionen hervorruft. Subtile Schattierungen und Lichtblitze tanzen über die Leinwand, fangen das Licht ein und projizieren eine Aura von Leben und Bewegung.', 3, 2),
(10, 'From the first glance, “Éclat d’Âme” attracts attention with its dazzling color palette. Vibrant tones of red, blue and yellow blend together harmoniously, creating a visual symphony that evokes deep and varied emotions. Subtle shades and bursts of light dance across the canvas, capturing the light and projecting an aura of life and movement.', 2, 2),
(11, '\"Fracture\" est une œuvre audacieuse qui défie les conventions artistiques avec sa composition innovante et ses expressions abstraites. Composée de quatre carrés distincts, chacun renfermant une œuvre abstraite expressionniste unique, cette pièce captivante invite le spectateur à plonger dans un voyage émotionnel et intellectuel.', 1, 3),
(12, '“Fracture” is a bold work that challenges artistic conventions with its innovative composition and abstract expressions. Comprised of four distinct squares, each enclosing a unique abstract expressionist work, this captivating piece invites the viewer to delve into an emotional and intellectual journey.', 2, 3),
(13, '„Fracture“ ist ein mutiges Werk, das mit seiner innovativen Komposition und seinen abstrakten Ausdrucksformen künstlerische Konventionen herausfordert. Dieses fesselnde Stück besteht aus vier unterschiedlichen Quadraten, die jeweils ein einzigartiges Werk des abstrakten Expressionismus umfassen, und lädt den Betrachter ein, in eine emotionale und intellektuelle Reise einzutauchen.\r\n', 3, 3),
(14, '«Перелом» — это смелая работа, которая бросает вызов художественным условностям благодаря своей новаторской композиции и абстрактным выражениям. Это захватывающее произведение, состоящее из четырех отдельных квадратов, каждый из которых содержит уникальную абстрактную экспрессионистскую работу, приглашает зрителя погрузиться в эмоциональное и интеллектуальное путешествие.', 4, 3),
(15, '《断裂》是一部大胆的作品，以其创新的构图和抽象的表现方式挑战了艺术常规。这个迷人的作品由四个不同的正方形组成，每个正方形都包含一个独特的抽象表现主义作品，邀请观众深入情感和智力的旅程。', 5, 3),
(16, '《友谊》是一部感人至深的作品，通过对两只狗的自然元素的描绘，抓住了生物之间深厚联系的本质。这个令人心酸的场景提供了超越物种界限的纯粹、无条件友谊的愿景。', 5, 4),
(17, '«Дружба» — трогательное произведение, передающее суть глубоких связей между живыми существами через изображение двух собак в их естественной стихии. Эта трогательная сцена предлагает видение чистой, безусловной дружбы, выходящей за пределы видовых границ.', 4, 4),
(18, '„Friendship“ ist ein berührendes Werk, das die Essenz der tiefen Verbindungen zwischen Lebewesen durch die Darstellung zweier Hunde in ihrem natürlichen Element einfängt. Diese ergreifende Szene bietet eine Vision reiner, bedingungsloser Freundschaft, die über Artengrenzen hinausgeht.', 3, 4),
(19, '“Friendship” is a touching work that captures the essence of the deep connections between living beings through the depiction of two dogs in their natural element. This poignant scene offers a vision of pure, unconditional friendship that transcends species boundaries.', 2, 4),
(20, '\"Échec et Mat\" est une œuvre captivante qui fige un moment de réflexion et de stratégie entre deux hommes âgés, plongés dans une partie d\'échecs intense. Réalisée avec la délicatesse caractéristique de l\'aquarelle, cette scène dégage une aura de nostalgie et de profondeur, invitant le spectateur à contempler le passage du temps et la richesse de l\'expérience humaine.', 1, 5),
(21, '“Check and Mate” is a captivating work that captures a moment of reflection and strategy between two elderly men, immersed in an intense game of chess. Created with the characteristic delicacy of watercolor, this scene exudes an aura of nostalgia and depth, inviting the viewer to contemplate the passage of time and the richness of human experience.', 2, 5),
(22, '„Check and Mate“ ist ein fesselndes Werk, das einen Moment der Reflexion und Strategie zwischen zwei älteren Männern einfängt, die in eine intensive Schachpartie vertieft sind. Diese mit der charakteristischen Feinheit des Aquarells geschaffene Szene strahlt eine Aura der Nostalgie und Tiefe aus und lädt den Betrachter ein, über den Lauf der Zeit und den Reichtum menschlicher Erfahrung nachzudenken.', 3, 5),
(23, '«Шах и мат» — это увлекательная работа, в которой запечатлен момент размышлений и стратегии между двумя пожилыми мужчинами, погруженными в напряженную игру в шахматы. Созданная с характерной для акварели нежностью, эта сцена излучает ауру ностальгии и глубины, приглашая зрителя созерцать ход времени и богатство человеческого опыта.', 4, 5),
(24, '《Check and Mate》是一部引人入胜的作品，捕捉了两位老人沉浸在激烈的国际象棋比赛中的反思和策略的时刻。这个场景以水彩画特有的精致创作而成，散发着怀旧和深度的气息，邀请观众思考时间的流逝和人类经验的丰富性。', 5, 5),
(25, 'Dans cette œuvre douce et évocatrice intitulée \"Innocence\", l\'aquarelle capture l\'essence même de l\'enfance à travers la représentation de trois enfants qui jouent dans une flaque d\'eau. Chaque détail de cette scène dégage une aura de joie pure et d\'émerveillement, transportant le spectateur dans un monde de souvenirs et de nostalgie.', 1, 6),
(26, 'In this sweet and evocative work entitled \'Innocence,\' the watercolor captures the very essence of childhood through the depiction of three children playing in a puddle of water. Every detail of this scene exudes an aura of pure joy and wonder, transporting the viewer into a world of memories and nostalgia.', 2, 6),
(27, 'In diesem süßen und evokativen Werk mit dem Titel \'Unschuld\' fängt die Aquarellmalerei die Essenz der Kindheit ein, indem sie drei spielende Kinder in einer Pfütze Wasser darstellt. Jedes Detail dieser Szene strahlt eine Aura reiner Freude und Staunen aus und entführt den Betrachter in eine Welt voller Erinnerungen und Nostalgie.', 3, 6),
(28, 'В этом нежном и вызывающем произведении под названием «Невинность» акварель захватывает самую суть детства через изображение трех детей, играющих в луже воды. Каждая деталь этой сцены излучает ауру чистой радости и удивления, перенося зрителя в мир воспоминаний и ностальгии.', 4, 6),
(29, '在这件名为《纯真》的温柔而引人入胜的作品中，水彩画捕捉到了童年的本质，通过描绘三个孩子在一滩水中玩耍。这场景的每一个细节都散发着纯真的快乐和惊奇的氛围，将观者带入了一个充满回忆和怀旧的世界。', 5, 6),
(30, '\"Nature N5\" est une œuvre envoûtante qui capture la majesté et la tranquillité de la nature à travers la représentation de trois cerfs se tenant dans une forêt luxuriante, devant un cours d\'eau sinueux. Réalisée avec la délicatesse caractéristique de l\'aquarelle, cette scène évoque une atmosphère de paix et d\'harmonie, invitant le spectateur à s\'évader dans un monde de beauté naturelle préservée.', 1, 7),
(31, '\"Nature N5\" is a captivating piece that captures the majesty and tranquility of nature through the depiction of three deer standing in a lush forest, in front of a winding stream. Executed with the characteristic delicacy of watercolor, this scene evokes an atmosphere of peace and harmony, inviting the viewer to escape into a world of preserved natural beauty.', 2, 7),
(32, '\"Natur N5\" ist ein faszinierendes Werk, das die Majestät und die Ruhe der Natur durch die Darstellung von drei Hirschen einfängt, die in einem üppigen Wald vor einem windenden Fluss stehen. Mit der charakteristischen Zartheit der Aquarellmalerei ausgeführt, ruft diese Szene eine Atmosphäre von Frieden und Harmonie hervor und lädt den Betrachter ein, in eine Welt bewahrter natürlicher Schönheit zu entfliehen.', 3, 7),
(33, '\"Природа N5\" - завораживающее произведение, которое захватывает величие и спокойствие природы через изображение трех оленей, стоящих в пышном лесу перед извилистой рекой. Выполненная с характерной нежностью акварелью, эта сцена вызывает атмосферу мира и гармонии, приглашая зрителя погрузиться в мир сохраненной природной красоты.', 4, 7),
(34, '\"自然N5\"是一件迷人的作品，通过描绘三只鹿站在蜿蜒的溪流前的茂密森林中，捕捉到了大自然的雄伟和宁静。用水彩的特有细腻完成，这个场景唤起了和平与和谐的氛围，邀请观众逃离到一个保持自然美丽的世界里。', 5, 7),
(35, '\"Quai Numéro 13\" est une œuvre qui capture l\'atmosphère paisible et pittoresque d\'un quai côtier, où des bateaux sont amarrés tranquillement, bercés par les douces vagues de la marée. Réalisée avec la subtilité caractéristique de l\'aquarelle, cette scène évoque une sensation de calme et d\'émerveillement devant la beauté simple de la vie en bord de mer.', 1, 8),
(36, '\"Quay Number 13\" is a piece that captures the peaceful and picturesque atmosphere of a coastal dock, where boats are quietly moored, gently rocked by the soft waves of the tide. Executed with the characteristic subtlety of watercolor, this scene evokes a sense of calm and wonder at the simple beauty of seaside life.', 2, 8),
(37, '\"Kai Nummer 13\" ist ein Werk, das die friedliche und malerische Atmosphäre eines Küstenkais einfängt, an dem Boote ruhig vertäut sind und sanft von den sanften Wellen der Gezeiten geschaukelt werden. Mit der charakteristischen Subtilität der Aquarellmalerei ausgeführt, ruft diese Szene ein Gefühl von Ruhe und Staunen über die einfache Schönheit des Lebens am Meer hervor.\r\n\r\n', 3, 8),
(38, '\"Причал № 13\" - это произведение, которое захватывает мирную и живописную атмосферу прибрежной пристани, где лодки спокойно причаливают, нежно качаясь на мягких волнах прилива. Выполненная с характерной тонкостью акварелью, эта сцена вызывает чувство спокойствия и удивления перед простой красотой морской жизни.', 4, 8),
(39, '\"13号码头\"是一幅作品，捕捉了海岸码头宁静而风景如画的氛围，船只静静地停泊，被潮汐的柔和波浪轻轻摇动。以水彩的独特细腻表现，这个场景唤起了对海边生活简单美丽的宁静和惊叹。', 5, 8),
(40, '\"Blossom\" est une œuvre expressionniste abstraite qui évoque un éclat de vie et de couleur, capturant l\'énergie vibrante de la nature qui s\'épanouit. Réalisée avec la spontanéité caractéristique de l\'aquarelle, cette composition offre une explosion de formes et de couleurs qui danse sur la toile, invitant le spectateur à plonger dans un tourbillon d\'émotions et de sensations.', 1, 9),
(41, '\"Blossom\" is an abstract expressionist work that evokes a burst of life and color, capturing the vibrant energy of nature in bloom. Executed with the characteristic spontaneity of watercolor, this composition offers an explosion of shapes and colors dancing on the canvas, inviting the viewer to dive into a whirlwind of emotions and sensations.', 2, 9),
(42, '\"Blossom\" ist ein abstraktes expressionistisches Werk, das einen Schwall von Leben und Farbe hervorruft und die lebendige Energie der blühenden Natur einfängt. Mit der charakteristischen Spontaneität der Aquarellmalerei ausgeführt, bietet diese Komposition eine Explosion von Formen und Farben, die auf der Leinwand tanzen und den Betrachter einlädt, in einen Strudel von Emotionen und Empfindungen einzutauchen.', 3, 9),
(43, '\"Блоссом\" - это абстрактное экспрессионистское произведение, вызывающее всплеск жизни и цвета, захватывающее вибрирующую энергию расцветающей природы. Выполненная с характерной спонтанностью акварелью, эта композиция предлагает взрыв форм и цветов, танцующих на холсте, приглашая зрителя окунуться в вихрь эмоций и ощущений.', 4, 9),
(44, '\"花开\"是一件抽象表现主义作品，唤起了生命和色彩的涌动，捕捉到大自然盛开的生机勃勃能量。以水彩的特有自发性完成，这幅作品在画布上呈现出形状和颜色的爆炸般的舞蹈，邀请观者沉浸在情感和感觉的旋涡中。', 5, 9),
(45, '\"Force\" est une œuvre expressionniste abstraite qui capture l\'intensité brute et la puissance émotionnelle à travers une explosion de formes et de couleurs. Réalisée avec la spontanéité caractéristique de l\'aquarelle, cette composition offre une vision tourbillonnante et énergique qui évoque un sentiment de dynamisme et de vigueur.', 1, 10),
(46, '\"Force\" is an abstract expressionist work that captures raw intensity and emotional power through an explosion of shapes and colors. Executed with the characteristic spontaneity of watercolor, this composition offers a swirling and energetic vision that evokes a sense of dynamism and vigor.', 2, 10),
(47, '\"Kraft\" ist ein abstraktes expressionistisches Werk, das rohe Intensität und emotionale Kraft durch eine Explosion von Formen und Farben einfängt. Mit der charakteristischen Spontaneität der Aquarellmalerei ausgeführt, bietet diese Komposition eine wirbelnde und energiegeladene Vision, die ein Gefühl von Dynamik und Vitalität hervorruft.', 3, 10),
(48, '\"Сила\" - это абстрактное экспрессионистское произведение, которое захватывает сырую интенсивность и эмоциональную мощь через всплеск форм и цветов. Выполненная с характерной спонтанностью акварелью, эта композиция предлагает вихревое и энергичное видение, вызывающее ощущение динамизма и энергии.', 4, 10),
(49, '\"力量\"是一件抽象表现主义作品，通过形状和颜色的爆炸捕捉了原始的强度和情感力量。以水彩的特有自发性完成，这幅作品呈现出旋转和充满活力的视觉，唤起了一种动感和活力的感觉。', 5, 10),
(50, '\"Incendie\" est une œuvre expressionniste abstraite qui capte la fureur et l\'intensité d\'un feu dévorant à travers une explosion de couleurs et de formes tourmentées. Réalisée avec la spontanéité caractéristique de l\'aquarelle, cette composition offre une vision tumultueuse et chaotique qui évoque un sentiment d\'urgence et de danger.', 1, 11),
(51, '\"Fire\" is an abstract expressionist work that captures the fury and intensity of a raging fire through an explosion of colors and tortured forms. Executed with the characteristic spontaneity of watercolor, this composition offers a tumultuous and chaotic vision that evokes a sense of urgency and danger.', 2, 11),
(52, '\"Feuer\" ist ein abstraktes expressionistisches Werk, das die Wut und Intensität eines wütenden Feuers durch eine Explosion von Farben und gequälten Formen einfängt. Mit der charakteristischen Spontaneität der Aquarellmalerei ausgeführt, bietet diese Komposition eine tumultartige und chaotische Vision, die ein Gefühl von Dringlichkeit und Gefahr hervorruft.', 3, 11),
(53, '\"Пожар\" - это абстрактное экспрессионистское произведение, которое захватывает ярость и интенсивность бушующего пламени через всплеск цветов и мучительных форм. Выполненная с характерной спонтанностью акварелью, эта композиция предлагает бурную и хаотическую картину, которая вызывает чувство срочности и опасности.', 4, 11),
(54, '《火焰》是一幅抽象表现主义作品，通过颜色和扭曲的形态的爆发捕捉了熊熊燃烧的火焰的愤怒和强烈。以水彩的特有自发性完成，这幅作品呈现出混乱而混乱的视觉，唤起了紧迫感和危险感。', 5, 11),
(55, '\"Route de Campagne\" est une œuvre expressionniste abstraite qui capture l\'essence de la vie rurale à travers une explosion de formes et de couleurs évocatrices. Réalisée avec la spontanéité caractéristique de l\'aquarelle, cette composition offre une vision dynamique et émouvante d\'une route sinueuse traversant la campagne.', 1, 12),
(56, '\"Country Road\" is an abstract expressionist work that captures the essence of rural life through an explosion of evocative shapes and colors. Executed with the characteristic spontaneity of watercolor, this composition offers a dynamic and emotive vision of a winding road traversing the countryside.', 2, 12),
(57, '\"Landstraße\" ist ein abstraktes expressionistisches Werk, das die Essenz des ländlichen Lebens durch eine Explosion eindrucksvoller Formen und Farben einfängt. Mit der charakteristischen Spontaneität der Aquarellmalerei ausgeführt, bietet diese Komposition eine dynamische und bewegende Vision einer kurvenreichen Straße, die das Land durchquert.', 3, 12),
(58, '\"Дорога в деревню\" - это абстрактное экспрессионистское произведение, которое захватывает суть сельской жизни через всплеск выразительных форм и цветов. Выполненная с характерной спонтанностью акварелью, эта композиция предлагает динамичное и эмоциональное видение извилистой дороги, пронизывающей сельскую местность.', 4, 12),
(59, '《乡间小路》是一幅抽象表现主义作品，通过形状和色彩的爆发捕捉了乡村生活的本质。以水彩的特有自发性完成，这幅作品呈现出一条蜿蜒穿越乡村的动态而感人的视觉。', 5, 12),
(60, '\"Aube\" est une œuvre d\'art contemporain qui fusionne les influences de l\'art brut et celtique pour créer une expérience visuelle captivante et mystique. Réalisée avec une variété de médiums, cette pièce évoque une sensation de renouveau et de magie alors que le jour naît sur un paysage imprégné de symbolisme celtique.', 1, 13),
(61, '\"Dawn\" is a contemporary artwork that merges influences from outsider art and Celtic art to create a captivating and mystical visual experience. Executed with a variety of mediums, this piece evokes a sense of renewal and magic as the day dawns over a landscape imbued with Celtic symbolism.', 2, 13),
(62, '\"Morgendämmerung\" ist ein zeitgenössisches Kunstwerk, das Einflüsse der Art Brut und keltischer Kunst verschmilzt, um ein fesselndes und mystisches visuelles Erlebnis zu schaffen. Ausgeführt mit einer Vielzahl von Medien, ruft dieses Stück ein Gefühl von Erneuerung und Magie hervor, während der Tag über einer Landschaft anbricht, die mit keltischer Symbolik durchdrungen ist.', 3, 13),
(63, '\"Рассвет\" - это современное произведение искусства, которое объединяет влияния ар-брют и кельтского искусства, чтобы создать захватывающий и мистический визуальный опыт. Выполненная с использованием различных средств, эта работа вызывает чувство обновления и волшебства, когда наступает день над пейзажем, пропитанным кельтской символикой.', 4, 13),
(64, '《黎明》是一件当代艺术作品，融合了原始艺术和凯尔特艺术的影响，创造出一种引人入胜且神秘的视觉体验。以多种媒介执行，这件作品唤起了一种更新和魔力的感觉，当阳光照耀在充满凯尔特符号的景观上时。', 5, 13),
(65, '\"Champs\" est une œuvre d\'art contemporain qui marie habilement les influences de l\'art brut et celtique pour créer une expérience visuelle saisissante et émouvante. Réalisée avec une palette de médiums variés, cette pièce évoque une sensation de connexion profonde avec la terre et les éléments, imprégnée de mysticisme celtique.', 1, 14),
(66, '\"Fields\" is a contemporary artwork that skillfully blends influences from outsider art and Celtic art to create a striking and emotive visual experience. Executed with a palette of various mediums, this piece evokes a sense of deep connection with the land and elements, infused with Celtic mysticism.', 2, 14),
(67, '\"Felder\" ist ein zeitgenössisches Kunstwerk, das geschickt Einflüsse der Art Brut und keltischer Kunst vereint, um ein eindrucksvolles und bewegendes visuelles Erlebnis zu schaffen. Ausgeführt mit einer Palette verschiedener Medien, ruft dieses Stück ein Gefühl tiefer Verbundenheit mit der Erde und den Elementen hervor, durchdrungen von keltischem Mystizismus.', 3, 14),
(68, '\"Поля\" - это современное произведение искусства, которое умело смешивает влияния ар-брют и кельтского искусства, чтобы создать выразительный и волнующий визуальный опыт. Выполненная с использованием палитры различных средств, эта работа вызывает ощущение глубокой связи с землей и элементами, пронизанное кельтским мистицизмом.', 4, 14),
(69, '《田野》是一件当代艺术作品，巧妙地融合了原始艺术和凯尔特艺术的影响，创造出一种引人注目且感人的视觉体验。以多种媒介执行，这件作品唤起了与土地和元素的深刻联系的感觉，充满了凯尔特神秘主义。', 5, 14),
(70, '\"Comté\" is a contemporary artwork that merges the aesthetics of outsider art and Celtic art to create a profound and mesmerizing visual exploration. Executed through a variety of mediums, this piece evokes a timeless landscape, imbued with the mystical essence of Celtic lands.', 2, 15),
(71, '\"Comté\" est une œuvre d\'art contemporain qui fusionne les esthétiques de l\'art brut et celtique pour créer une exploration visuelle profonde et envoûtante. Réalisée à travers une variété de médiums, cette pièce évoque un paysage intemporel, imprégné de l\'essence mystique des terres celtiques.', 1, 15),
(72, '\"Comté\" ist ein zeitgenössisches Kunstwerk, das die Ästhetik der Art Brut und keltischer Kunst verschmilzt, um eine tiefgründige und faszinierende visuelle Erkundung zu schaffen. Durch eine Vielzahl von Medien umgesetzt, ruft dieses Stück eine zeitlose Landschaft hervor, die von der mystischen Essenz der keltischen Länder durchdrungen ist.', 3, 15),
(73, '\"Конти\" - это современное произведение искусства, объединяющее эстетику искусства аутсайдеров и кельтского искусства, чтобы создать глубокое и завораживающее визуальное исследование. Выполненная с использованием различных средств, эта работа вызывает ощущение вечного пейзажа, пронизанного мистической сущностью кельтских земель.', 4, 15),
(74, '“康蒂” 是一件当代艺术品，将外来艺术与凯尔特艺术的美学融合在一起，创造出一种深刻而迷人的视觉探索。通过各种媒介实现，这件作品唤起了一个永恒的景观，充满了凯尔特土地的神秘本质。', 5, 15),
(75, '\"Dryade\" est une œuvre d\'art contemporain qui fusionne habilement les styles de l\'art brut et celtique pour créer une expérience visuelle fascinante et mystique. Réalisée à travers une variété de médiums, cette pièce évoque la présence envoûtante des esprits de la nature, connus sous le nom de dryades, dans les forêts anciennes.', 1, 16),
(76, '\"Dryad\" is a contemporary artwork that skillfully merges the styles of outsider art and Celtic art to create a fascinating and mystical visual experience. Executed through a variety of mediums, this piece evokes the enchanting presence of nature spirits, known as dryads, in ancient forests.', 2, 16),
(77, '\"Trockade\" ist ein zeitgenössisches Kunstwerk, das gekonnt die Stile der Art Brut und keltischen Kunst verschmilzt, um ein faszinierendes und mystisches visuelles Erlebnis zu schaffen. Durch verschiedene Medien umgesetzt, ruft dieses Stück die bezaubernde Präsenz von Naturgeistern, bekannt als Dryaden, in alten Wäldern hervor.', 3, 16),
(78, '\"Дриада\" - это современное произведение искусства, искусно совмещающее стили арт-брут и кельтского искусства, чтобы создать увлекательный и мистический визуальный опыт. Реализованная через разнообразные средства, эта работа призывает зачаровывающее присутствие природных духов, известных как дриады, в древних лесах.', 4, 16),
(79, '“树灵” 是一件当代艺术品，巧妙地融合了外来艺术和凯尔特艺术的风格，创造出一种迷人而神秘的视觉体验。通过各种媒介实现，这件作品唤起了自然精灵——被称为树灵——在古老森林中的迷人存在。', 5, 16),
(80, '\"La Demeure\" est une œuvre d\'art contemporain qui fusionne les esthétiques de l\'art brut et celtique pour créer une expérience visuelle envoûtante et mystique. Réalisée à travers une variété de médiums, cette pièce évoque une demeure ancestrale, imprégnée de la magie et de la mystique des anciens lieux celtiques.', 1, 17),
(81, '\"La demeure\" is a contemporary artwork that merges the aesthetics of outsider art and Celtic art to create a captivating and mystical visual experience. Executed through a variety of mediums, this piece evokes an ancestral dwelling, imbued with the magic and mystique of ancient Celtic places.', 2, 17),
(82, '\"Das Anwesen\" ist ein zeitgenössisches Kunstwerk, das die Ästhetik der Art Brut und keltischer Kunst verschmilzt, um ein fesselndes und mystisches visuelles Erlebnis zu schaffen. Durch verschiedene Medien umgesetzt, ruft dieses Stück eine Ahnenstätte hervor, durchdrungen von der Magie und Mystik der alten keltischen Orte.\r\n\r\n', 3, 17),
(83, '\"Обитель\" - это современное произведение искусства, объединяющее эстетику искусства аутсайдеров и кельтского искусства, чтобы создать завораживающий и мистический визуальный опыт. Выполненная с использованием различных средств, эта работа вызывает образ древнего жилища, пропитанного магией и мистикой древних кельтских мест.', 4, 17),
(84, '“居所” 是一件当代艺术品，融合了外来艺术和凯尔特艺术的美学，创造出一种迷人而神秘的视觉体验。通过各种媒介实现，这件作品唤起了一个祖先的住所，充满了古老凯尔特地方的魔力和神秘。', 5, 17),
(85, '\"Nature Morte\" est une œuvre d\'art contemporain qui marie les styles de l\'art brut et celtique pour créer une exploration visuelle profonde et évocatrice. Cette pièce, réalisée à travers une variété de médiums, offre une interprétation captivante d\'un genre classique, la nature morte, tout en intégrant des éléments symboliques et mystiques propres à la tradition celtique.', 1, 18),
(86, '\"Nature Morte\" is a contemporary artwork that blends the styles of outsider art and Celtic art to create a profound and evocative visual exploration. This piece, executed through a variety of mediums, offers a captivating interpretation of a classical genre, still life, while integrating symbolic and mystical elements unique to the Celtic tradition.', 2, 18),
(87, '\"Nature Morte\" ist ein zeitgenössisches Kunstwerk, das die Stile der Art Brut und keltischen Kunst vereint, um eine tiefgründige und eindringliche visuelle Erkundung zu schaffen. Dieses Stück, das durch eine Vielzahl von Medien umgesetzt wurde, bietet eine fesselnde Interpretation eines klassischen Genres, dem Stillleben, und integriert dabei symbolische und mystische Elemente, die der keltischen Tradition eigen sind.', 3, 18),
(88, '\"Натюрморт\" - это современное произведение искусства, которое сочетает стили арт-брут и кельтского искусства для создания глубокого и вызывающего визуального исследования. Это произведение, выполненное через различные средства, предлагает захватывающую интерпретацию классического жанра, натюрморта, в то время как интегрирует символические и мистические элементы, характерные для кельтской традиции.', 4, 18),
(89, '“静物” 是一件当代艺术品，融合了外来艺术和凯尔特艺术的风格，创造出一种深刻而引人入胜的视觉探索。这件作品通过各种媒介实现，提供了对经典流派静物的迷人诠释，同时融入了独特于凯尔特传统的象征性和神秘元素。', 5, 18),
(90, '\"Plage\" est une œuvre d\'art contemporain qui fusionne les styles de l\'art brut et celtique pour créer une exploration visuelle immersive et émotionnelle. Cette pièce, réalisée à travers une variété de médiums, capture l\'essence de la plage comme lieu de connexion entre l\'homme et la nature, tout en intégrant des éléments symboliques propres à la tradition celtique.', 1, 19),
(91, '\"Plage\" is a contemporary artwork that merges the styles of outsider art and Celtic art to create an immersive and emotional visual exploration. This piece, executed through a variety of mediums, captures the essence of the beach as a place of connection between humans and nature, while integrating symbolic elements unique to the Celtic tradition.', 2, 19),
(92, '\"Strand\" ist ein zeitgenössisches Kunstwerk, das die Stile der Art Brut und keltischen Kunst vereint, um eine immersive und emotionale visuelle Erkundung zu schaffen. Dieses Stück, das durch eine Vielzahl von Medien umgesetzt wurde, fängt die Essenz des Strandes als Ort der Verbindung zwischen Mensch und Natur ein und integriert dabei symbolische Elemente, die der keltischen Tradition eigen sind.', 3, 19),
(93, '\"Пляж\" - это современное произведение искусства, которое объединяет стили арт-брут и кельтского искусства для создания погружающего и эмоционального визуального исследования. Это произведение, выполненное через различные средства, захватывает суть пляжа как места связи между человеком и природой, интегрируя символические элементы, присущие кельтской традиции.', 4, 19),
(94, '“海滩” 是一件当代艺术品，融合了外来艺术和凯尔特艺术的风格，创造出一种身临其境且富有情感的视觉探索。这件作品通过各种媒介实现，捕捉了海滩作为人类与自然之间联系的本质，同时融入了独特于凯尔特传统的象征性元素。', 5, 19),
(95, '\"Adam\" est une sculpture saisissante qui incarne la puissance et la noblesse de la forme humaine. Taillée dans le marbre blanc, cette œuvre présente un homme debout, d\'une stature imposante et d\'une élégance intemporelle.\r\n\r\nLa silhouette d\'Adam est sculptée avec une précision remarquable, chaque muscle, chaque courbe du corps étant finement détaillée pour capturer la grâce et la force de la figure humaine. Son visage est ciselé avec une expression sereine et réfléchie, reflétant une tranquillité intérieure et une profondeur d\'âme.', 1, 20),
(96, '\"Adam\" is a striking sculpture that embodies the power and nobility of the human form. Carved from white marble, this artwork depicts a standing man, of imposing stature and timeless elegance.\r\n\r\nThe silhouette of Adam is sculpted with remarkable precision, every muscle, every curve of the body finely detailed to capture the grace and strength of the human figure. His face is chiseled with a serene and thoughtful expression, reflecting inner tranquility and depth of soul.', 2, 20),
(97, '\"Adam\" ist eine beeindruckende Skulptur, die die Kraft und Edelmut der menschlichen Form verkörpert. Aus weißem Marmor gemeißelt, zeigt dieses Kunstwerk einen stehenden Mann von imposanter Statur und zeitloser Eleganz.\r\n\r\nDie Silhouette von Adam ist mit bemerkenswerter Präzision geschnitzt, jeder Muskel, jede Kurve des Körpers fein detailliert, um die Anmut und Stärke der menschlichen Figur einzufangen. Sein Gesicht ist mit einem ruhigen und nachdenklichen Ausdruck gemeißelt, der innere Ruhe und Tiefe der Seele widerspiegelt.', 3, 20),
(98, '\"Адам\" - это поразительная скульптура, воплощающая силу и благородство человеческой формы. Вырезанный из белого мрамора, этот арт-объект изображает стоящего мужчину с внушительной статурой и безвременной элегантностью.\r\n\r\nСилуэт Адама вырезан с поразительной точностью, каждая мышца, каждая изгиб тела тщательно проработаны, чтобы запечатлеть грацию и силу человеческой фигуры. Его лицо выточено с мирным и задумчивым выражением, отражающим внутреннюю гармонию и глубину души.', 4, 20),
(99, '“亚当” 是一座引人注目的雕塑，体现了人体的力量和高贵。这件作品是用白色大理石雕刻而成的，描绘了一个站立的男人，身材高大，具有永恒的优雅。\r\n\r\n亚当的轮廓被雕刻得非常精细，每一块肌肉，身体的每一处曲线都被细致地刻画，以捕捉人体的优雅和力量。他的脸上雕刻着宁静而深思的表情，反映出内心的宁静和深度。', 5, 20),
(100, '\"Bidonville\" est une œuvre acrylique qui saisit l\'essence brute et poignante de la vie dans les quartiers informels. Sur une toile de grande dimension, les couleurs vives et contrastées se confrontent pour représenter l\'environnement chaotique et dense d\'un bidonville.', 1, 21),
(101, '\"Bidonville\" is an acrylic artwork that captures the raw and poignant essence of life in informal settlements. On a large canvas, vibrant and contrasting colors clash to represent the chaotic and dense environment of a shantytown.', 2, 21),
(102, '\"Bidonville\" ist ein Acrylkunstwerk, das die rohe und ergreifende Essenz des Lebens in informellen Siedlungen einfängt. Auf einer großen Leinwand prallen lebendige und kontrastreiche Farben aufeinander, um die chaotische und dichte Umgebung eines Slums darzustellen.', 3, 21),
(103, '\"Бидонвиль\" - это акриловая работа, захватывающая сырую и пронзительную сущность жизни в неформальных поселениях. На большом холсте яркие и контрастные цвета сталкиваются, чтобы представить хаотичную и плотную среду трущоб.', 4, 21),
(104, '“贫民窟” 是一幅丙烯画作品，捕捉了非正式定居点生活的原始和令人心酸的本质。在一块大画布上，充满活力和对比强烈的颜色相互碰撞，代表了贫民窟混乱而密集的环境。', 5, 21),
(105, '\"Flamenco\" est une œuvre acrylique qui capture l\'énergie passionnée et la grâce envoûtante d\'une femme dansant dans la rue. Sur une toile vibrante et colorée, la silhouette élégante de la danseuse est mise en valeur au centre de la composition.', 1, 22),
(106, '\"Flamenco\" is an acrylic artwork that captures the passionate energy and enchanting grace of a woman dancing in the street. On a vibrant and colorful canvas, the elegant silhouette of the dancer is highlighted at the center of the composition.', 2, 22),
(107, '\"Flamenco\" ist ein Acrylkunstwerk, das die leidenschaftliche Energie und bezaubernde Anmut einer Frau einfängt, die auf der Straße tanzt. Auf einer lebendigen und farbenfrohen Leinwand wird die elegante Silhouette der Tänzerin im Zentrum der Komposition hervorgehoben.', 3, 22),
(108, '\"Фламенко\" - это акриловая работа, которая запечатлевает пылкую энергию и очаровательную грацию женщины, танцующей на улице. На ярком и красочном холсте элегантная силуэтка танцовщицы выделяется в центре композиции.', 4, 22),
(109, '“弗拉门戈” 是一幅丙烯画作品，捕捉了一位女子在街头热情的能量和迷人的优雅舞姿。在一块充满活力和色彩的画布上，舞者优雅的轮廓在画面中央得到突出。', 5, 22),
(110, '\"La Femme en Rouge\" est une œuvre acrylique captivante qui met en scène une femme drapée dans un magnifique tissu rouge. Sur une toile imposante, la silhouette élégante de la femme se détache avec une intensité saisissante, évoquant une présence mystérieuse et envoûtante.', 1, 23),
(111, '\"La Femme en Rouge\" is a captivating acrylic artwork that features a woman draped in a magnificent red fabric. On an imposing canvas, the elegant silhouette of the woman stands out with striking intensity, evoking a mysterious and enchanting presence.', 2, 23),
(112, '\"Die Frau in Rot\" ist ein fesselndes Acrylkunstwerk, das eine Frau zeigt, die in einem prächtigen roten Stoff gehüllt ist. Auf einer imposanten Leinwand hebt sich die elegante Silhouette der Frau mit beeindruckender Intensität hervor und ruft eine mysteriöse und bezaubernde Präsenz hervor.', 3, 23),
(113, '\"Женщина в красном\" - это захватывающая акриловая работа, на которой изображена женщина, завернутая в великолепную красную ткань. На внушительном холсте элегантная силуэтка женщины выделяется с потрясающей интенсивностью, вызывая таинственное и очаровательное присутствие.', 4, 23),
(114, '“穿红衣的女人” 是一幅迷人的丙烯画作品，描述了一位披着华丽红色布料的女性。在一块庞大的画布上，女性优雅的轮廓以令人惊艳的强度脱颖而出，唤起了神秘而迷人的氛围。', 5, 23),
(115, '\"L\'église\" est une œuvre acrylique évocatrice qui capture la majesté et la solennité d\'un édifice religieux. Sur une toile de taille imposante, l\'église se dresse fièrement au centre de la composition, évoquant un lieu de culte empreint de spiritualité et de transcendance.', 1, 24),
(116, '\"L\'église\" is an evocative acrylic artwork that captures the majesty and solemnity of a religious building. On an imposing canvas, the church stands proudly at the center of the composition, evoking a place of worship imbued with spirituality and transcendence.', 2, 24),
(117, '\"Die Kirche\" ist ein eindringliches Acrylkunstwerk, das die Majestät und Feierlichkeit eines religiösen Gebäudes einfängt. Auf einer imposanten Leinwand erhebt sich die Kirche stolz im Zentrum der Komposition und ruft einen Ort der Anbetung hervor, der von Spiritualität und Transzendenz durchdrungen ist.', 3, 24),
(118, '\"Церковь\" - это выразительная акриловая работа, которая запечатлевает величие и торжественность религиозного здания. На внушительном холсте церковь гордо возвышается в центре композиции, вызывая образ места поклонения, пронизанного духовностью и трансцендентностью.', 4, 24),
(119, '“教堂” 是一幅富有表现力的丙烯画作品，捕捉了宗教建筑的庄严和肃穆。在一块庞大的画布上，教堂傲然屹立于画面中央，唤起了一个充满灵性和超越性的崇拜场所。', 5, 24),
(120, '\"Pedraza\" est une œuvre acrylique qui capture la beauté pittoresque et l\'atmosphère enchanteresse d\'un village espagnol traditionnel. Sur une toile spacieuse, le village de Pedraza s\'étend sous le ciel bleu azur, évoquant un véritable joyau d\'architecture et de culture.', 1, 25),
(121, '\"Pedraza\" is an acrylic artwork that captures the picturesque beauty and enchanting atmosphere of a traditional Spanish village. On a spacious canvas, the village of Pedraza sprawls under the azure blue sky, evoking a true gem of architecture and culture.', 2, 25),
(122, '\"Pedraza\" ist ein Acrylkunstwerk, das die malerische Schönheit und die zauberhafte Atmosphäre eines traditionellen spanischen Dorfes einfängt. Auf einer geräumigen Leinwand erstreckt sich das Dorf Pedraza unter dem azurblauen Himmel und ruft ein wahres Juwel der Architektur und Kultur hervor.', 3, 25),
(123, '\"Педраза\" - это акриловая работа, которая запечатлевает живописную красоту и очаровательную атмосферу традиционной испанской деревни. На просторном холсте деревня Педраза простирается под ярким голубым небом, вызывая настоящий жемчужину архитектуры и культуры.', 4, 25),
(124, '“佩德拉萨” 是一幅丙烯画作品，捕捉了西班牙传统村庄的风景秀丽和迷人氛围。在宽敞的画布上，佩德拉萨村庄展现在湛蓝的天空下，唤起了一种真正的建筑和文化瑰宝。', 5, 25),
(125, '\"Souk\" est une œuvre acrylique qui capture l\'effervescence et la vivacité d\'un marché traditionnel au cœur d\'une ville orientale. Sur une toile généreuse, le souk s\'anime avec une explosion de couleurs, de mouvements et de sons, évoquant un véritable festin pour les sens.', 1, 26),
(126, '\"Souk\" is an acrylic artwork that captures the hustle and bustle of a traditional market at the heart of an oriental city. On a generous canvas, the souk comes to life with a burst of colors, movements, and sounds, evoking a true feast for the senses.', 2, 26),
(127, '\"Souk\" ist ein Acrylkunstwerk, das das geschäftige Treiben eines traditionellen Marktes im Herzen einer orientalischen Stadt einfängt. Auf einer großzügigen Leinwand erwacht der Souk mit einem Farben-, Bewegungs- und Klangfeuerwerk zum Leben und ruft ein wahres Fest für die Sinne hervor.', 3, 26),
(128, '\"Сук\" - это акриловая работа, которая захватывает суету и оживление традиционного рынка в сердце восточного города. На щедром холсте сук оживает взрывом цветов, движений и звуков, вызывая настоящий пир для чувств.', 4, 26),
(129, '“苏克” 是一幅丙烯画作品，捕捉了东方城市中传统市场的喧嚣和活力。在宽敞的画布上，市场以一种色彩、动态和声音的爆发而生动起来，唤起了对感官的真正盛宴。', 5, 26),
(130, '\"Concert\" est une œuvre fusionnant l\'expressionnisme et l\'art abstrait pour capturer l\'énergie palpitante et les émotions intenses d\'un concert en live. Sur une toile dynamique, des formes tourbillonnantes et des couleurs vibrantes se fondent pour créer une symphonie visuelle qui évoque le mouvement et la passion de la musique.', 1, 27),
(131, '\"Concert\" is a work that merges expressionism and abstract art to capture the thrilling energy and intense emotions of a live concert. On a dynamic canvas, swirling forms and vibrant colors blend to create a visual symphony that evokes the movement and passion of music.', 2, 27),
(132, '\"Konzert\" ist ein Werk, das Expressionismus und abstrakte Kunst vereint, um die aufregende Energie und intensiven Emotionen eines Live-Konzerts einzufangen. Auf einer dynamischen Leinwand verschmelzen wirbelnde Formen und lebendige Farben zu einer visuellen Symphonie, die die Bewegung und Leidenschaft der Musik hervorruft.', 3, 27),
(133, '\"Концерт\" - это произведение, объединяющее экспрессионизм и абстрактное искусство, чтобы запечатлеть захватывающую энергию и интенсивные эмоции живого концерта. На динамичном холсте заворачивающиеся формы и яркие цвета сливаются визуальную симфонию, которая вызывает движение и страсть музыки.', 4, 27),
(134, '“音乐会” 是一件作品，融合了表现主义和抽象艺术，捕捉了现场音乐会的激动人心的能量和强烈情感。在一块动态的画布上，旋转的形状和鲜艳的颜色融合在一起，创造出一幅视觉交响曲，唤起了音乐的动感和激情。', 5, 27),
(135, '\"Harmonie\" est une œuvre captivante qui marie l\'expressionnisme et l\'art abstrait pour exprimer un sentiment de cohésion et d\'équilibre dans un tourbillon d\'émotions et de formes. Sur une toile dynamique et audacieuse, des couleurs vives et des textures vibrantes se rencontrent pour créer une symphonie visuelle qui évoque l\'harmonie et l\'unité.', 1, 28),
(136, '\"Harmony\" is a captivating work that blends expressionism and abstract art to express a sense of cohesion and balance in a whirlwind of emotions and shapes. On a dynamic and bold canvas, vibrant colors and vibrant textures come together to create a visual symphony that evokes harmony and unity.', 2, 28),
(137, '\"Harmonie\" ist ein fesselndes Werk, das Expressionismus und abstrakte Kunst vereint, um ein Gefühl von Zusammenhalt und Balance in einem Wirbel von Emotionen und Formen auszudrücken. Auf einer dynamischen und kühnen Leinwand treffen lebendige Farben und lebendige Texturen zusammen, um eine visuelle Symphonie zu schaffen, die Harmonie und Einheit heraufbeschwört.', 3, 28),
(138, '\"Гармония\" - это захватывающее произведение, сочетающее в себе экспрессионизм и абстрактное искусство, чтобы выразить чувство согласия и равновесия в вихре эмоций и форм. На динамичном и смелом холсте яркие цвета и текстуры сливаются воедино, создавая визуальную симфонию, которая вызывает гармонию и единство.', 4, 28),
(139, '“和谐” 是一件迷人的作品，融合了表现主义和抽象艺术，表达了在情感和形状的旋涡中的一种凝聚力和平衡感。在一块动态而大胆的画布上，鲜艳的颜色和充满活力的纹理汇聚在一起，创造出一幅视觉交响曲，唤起了和谐与统一的感觉。', 5, 28),
(140, '\"La Course au Bonheur\" est une œuvre saisissante qui fusionne l\'expressionnisme et l\'art abstrait pour explorer la quête incessante de bonheur dans un monde tourmenté. Sur une toile dynamique et expressive, des formes tourbillonnantes et des couleurs éclatantes s\'entrelacent pour créer un paysage émotionnel complexe.', 1, 29),
(141, '\"La Course au Bonheur\" is a striking work that merges expressionism and abstract art to explore the relentless pursuit of happiness in a troubled world. On a dynamic and expressive canvas, swirling forms and vibrant colors intertwine to create a complex emotional landscape.', 2, 29),
(142, '\"Der Lauf zum Glück\" ist ein beeindruckendes Werk, das Expressionismus und abstrakte Kunst vereint, um die unermüdliche Suche nach Glück in einer zerrütteten Welt zu erkunden. Auf einer dynamischen und ausdrucksstarken Leinwand verweben sich wirbelnde Formen und leuchtende Farben zu einer komplexen emotionalen Landschaft.', 3, 29),
(143, '\"Бег к счастью\" - это впечатляющее произведение, объединяющее экспрессионизм и абстрактное искусство, чтобы исследовать неутомимое стремление к счастью в беспокойном мире. На динамичном и выразительном холсте заворачивающиеся формы и яркие цвета переплетаются, создавая сложный эмоциональный пейзаж.', 4, 29),
(144, '“幸福之途” 是一件引人注目的作品，融合了表现主义和抽象艺术，探索了在动荡的世界中对幸福的不懈追求。在一块动态而富有表现力的画布上，旋转的形状和鲜艳的颜色交织在一起，创造出了一个复杂的情感景观。', 5, 29),
(145, '\"Passion\" est une œuvre émouvante qui marie l\'expressionnisme et l\'art abstrait pour capturer l\'intensité et la profondeur des émotions humaines. Sur une toile vibrante et dynamique, des couleurs vives et des formes tourbillonnantes s\'entrelacent pour créer un paysage émotionnel captivant.', 1, 30),
(146, '\"Passion\" is a moving work that blends expressionism and abstract art to capture the intensity and depth of human emotions. On a vibrant and dynamic canvas, bright colors and swirling forms intertwine to create a captivating emotional landscape.', 2, 30),
(147, '\"Leidenschaft\" ist ein bewegendes Werk, das Expressionismus und abstrakte Kunst vereint, um die Intensität und Tiefe menschlicher Emotionen einzufangen. Auf einer lebendigen und dynamischen Leinwand verweben sich leuchtende Farben und wirbelnde Formen zu einer fesselnden emotionalen Landschaft.', 3, 30),
(148, '\"Страсть\" - это движущее произведение, объединяющее экспрессионизм и абстрактное искусство, чтобы запечатлеть интенсивность и глубину человеческих эмоций. На ярком и динамичном холсте яркие цвета и заворачивающиеся формы переплетаются, создавая захватывающий эмоциональный пейзаж.', 4, 30),
(149, '“激情” 是一件动人的作品，融合了表现主义和抽象艺术，捕捉了人类情感的强烈和深度。在一个充满活力和动态的画布上，明亮的颜色和旋转的形状交织在一起，创造出一个迷人的情感景观。', 5, 30),
(150, '\"Cougar\" est une œuvre intrigante qui fusionne le réalisme et l\'art abstrait pour capturer la majesté et la puissance de cet animal emblématique. Sur une toile de grande dimension, la silhouette imposante d\'un cougar se détache avec une présence impressionnante, évoquant à la fois sa force physique et son élégance naturelle.', 1, 31),
(151, '\"Cougar\" is an intriguing work that blends realism and abstract art to capture the majesty and power of this iconic animal. On a large canvas, the imposing silhouette of a cougar stands out with an impressive presence, evoking both its physical strength and natural elegance.', 2, 31),
(152, '\"Puma\" ist ein faszinierendes Werk, das Realismus und abstrakte Kunst vereint, um die Majestät und Kraft dieses ikonischen Tieres einzufangen. Auf einer großen Leinwand sticht die imposante Silhouette eines Pumas mit beeindruckender Präsenz hervor und ruft sowohl seine körperliche Stärke als auch natürliche Eleganz hervor.', 3, 31),
(153, '\"Пума\" - это интригующее произведение, объединяющее реализм и абстрактное искусство, чтобы запечатлеть величие и мощь этого символичного животного. На большом холсте выделяется внушительная силуэтка пумы с впечатляющим присутствием, вызывая как ее физическую силу, так и естественную элегантность.', 4, 31),
(154, '“美洲狮” 是一件令人着迷的作品，融合了写实主义和抽象艺术，捕捉了这种标志性动物的雄伟和力量。在一块大画布上，美洲狮的庞大轮廓显得极具气势，既唤起了其物理力量，又展现了其自然优雅。', 5, 31),
(155, '\"Dépression\" est une œuvre puissante qui marie le réalisme et l\'art abstrait pour explorer les profondeurs de l\'expérience humaine face à la maladie mentale. Sur une toile sombre et énigmatique, une silhouette humaine est représentée, enveloppée dans un tourbillon de formes abstraites et de couleurs sombres.', 1, 32),
(156, '\"Dépression\" is a powerful work that blends realism and abstract art to explore the depths of the human experience with mental illness. On a dark and enigmatic canvas, a human silhouette is depicted, enveloped in a whirlwind of abstract shapes and dark colors.', 2, 32),
(157, '\"Depression\" ist ein kraftvolles Werk, das Realismus und abstrakte Kunst vereint, um die Tiefen der menschlichen Erfahrung mit psychischen Erkrankungen zu erforschen. Auf einer dunklen und rätselhaften Leinwand ist eine menschliche Silhouette dargestellt, umgeben von einem Wirbel aus abstrakten Formen und dunklen Farben.', 3, 32),
(158, '\"Депрессия\" - это мощное произведение, объединяющее в себе реализм и абстрактное искусство, чтобы исследовать глубины человеческого опыта с психическими расстройствами. На темном и загадочном холсте изображена силуэт человека, окруженный вихрем абстрактных форм и темных цветов.', 4, 32),
(159, '“抑郁” 是一件强大的作品，融合了写实主义和抽象艺术，探索了人类在心理疾病面前的深层经验。在一块黑暗而神秘的画布上，描绘了一个人的轮廓，被一阵抽象形状和深色调包围着。', 5, 32),
(160, '\"Le Renouveau\" est une œuvre captivante qui mêle réalisme et art abstrait pour exprimer le cycle infini de la vie et de la transformation. Sur une toile riche en nuances, une scène de renouveau émerge avec une énergie vibrante et une profondeur émotionnelle.', 1, 33),
(161, '\"Le Renouveau\" is a captivating work that blends realism and abstract art to express the infinite cycle of life and transformation. On a canvas rich in nuances, a scene of renewal emerges with vibrant energy and emotional depth.', 2, 33),
(162, '\"Die Erneuerung\" ist ein fesselndes Werk, das Realismus und abstrakte Kunst vereint, um den unendlichen Kreislauf des Lebens und der Transformation auszudrücken. Auf einer Leinwand, die reich an Nuancen ist, entsteht eine Szene der Erneuerung mit lebendiger Energie und emotionaler Tiefe.', 3, 33),
(163, '\"Обновление\" - это захватывающее произведение, сочетающее в себе реализм и абстрактное искусство, чтобы выразить бесконечный цикл жизни и трансформации. На холсте, богатом оттенками, появляется сцена обновления с яркой энергией и эмоциональной глубиной.', 4, 33),
(164, '“新生” 是一件迷人的作品，融合了写实主义和抽象艺术，表达了生命和变革的无限循环。在一个色彩丰富的画布上，一幅充满活力和情感深度的新生场景呈现出来。', 5, 33),
(165, '\"Tiger\" est une œuvre qui fusionne habilement le réalisme et l\'art abstrait pour capturer la majesté et la puissance du tigre, un symbole de force et de courage. Sur une toile saisissante, la silhouette imposante d\'un tigre émerge de l\'obscurité avec une présence impressionnante et une aura de mystère.', 1, 34),
(166, '\"Tiger\" is a work that skillfully merges realism and abstract art to capture the majesty and power of the tiger, a symbol of strength and courage. On a striking canvas, the imposing silhouette of a tiger emerges from the darkness with an impressive presence and an aura of mystery.', 2, 34),
(167, '\"Tiger\" ist ein Werk, das gekonnt Realismus und abstrakte Kunst vereint, um die Majestät und Kraft des Tigers einzufangen, ein Symbol für Stärke und Mut. Auf einer beeindruckenden Leinwand taucht die imposante Silhouette eines Tigers aus der Dunkelheit auf und strahlt eine beeindruckende Präsenz und ein Aura des Geheimnisvollen aus.', 3, 34),
(168, '\"Тигр\" - это произведение, искусно сочетающее в себе реализм и абстрактное искусство, чтобы запечатлеть величие и силу тигра, символ силы и мужества. На впечатляющем холсте величественная силуэтка тигра выходит из темноты с впечатляющим присутствием и аурой таинственности.', 4, 34),
(169, '“老虎” 是一件巧妙融合了写实主义和抽象艺术的作品，捕捉了老虎的威严和力量，它是力量和勇气的象征。在一块引人注目的画布上，一只威武的老虎轮廓从黑暗中显现出来，具有令人印象深刻的气场和神秘的光环。', 5, 34),
(170, '\"Feminity\" est une œuvre délicate et évocatrice réalisée à l\'aquarelle, capturant la grâce et la beauté de l\'essence féminine. Sur une toile légère et fluide, des traits délicats et des nuances subtiles se fondent pour créer une représentation éthérée de la féminité.', 1, 35),
(171, '\"Feminity\" is a delicate and evocative artwork done in watercolor, capturing the grace and beauty of the feminine essence. On a light and fluid canvas, delicate strokes and subtle shades blend to create an ethereal representation of femininity.', 2, 35);
INSERT INTO `traduction` (`id_traduction`, `contenu`, `id_langues`, `id_oeuvres`) VALUES
(172, '\"Weiblichkeit\" ist ein zartes und eindrucksvolles Aquarellwerk, das die Anmut und Schönheit der weiblichen Essenz einfängt. Auf einer leichten und fließenden Leinwand vermischen sich zarte Striche und subtile Schattierungen zu einer ätherischen Darstellung der Weiblichkeit.', 3, 35),
(173, '\"Женственность\" - это нежное и эмоциональное произведение, выполненное акварелью, которое захватывает изящество и красоту женской сущности. На легком и текучем холсте нежные мазки и тонкие оттенки сливаются, создавая этерическое представление о женственности.', 4, 35),
(174, '“女性美” 是一件用水彩绘制的细腻而引人深思的艺术作品，捕捉到女性精髓的优雅和美丽。在一块轻盈而流畅的画布上，细腻的笔触和微妙的色彩交融，营造出了女性美的空灵表现。', 5, 35),
(175, '\"Oldmen\" est une œuvre captivante réalisée à l\'aquarelle, qui met en scène la sagesse et l\'histoire incarnées dans le visage d\'un homme âgé portant un turban. Sur une toile douce et subtile, les couleurs et les nuances se fondent pour créer une représentation émouvante de la vieillesse et de la dignité.', 1, 36),
(176, '\"Oldmen\" is a captivating watercolor artwork, depicting wisdom and history embodied in the face of an elderly man wearing a turban. On a soft and subtle canvas, colors and nuances blend to create a poignant representation of old age and dignity.', 2, 36),
(177, '\"Altemänner\" ist ein fesselndes Aquarellkunstwerk, das Weisheit und Geschichte verkörpert im Gesicht eines älteren Mannes mit Turban. Auf einer weichen und subtilen Leinwand verschmelzen Farben und Nuancen zu einer ergreifenden Darstellung des Alters und der Würde.', 3, 36),
(178, '\"Старики\" - захватывающее акварельное произведение, изображающее мудрость и историю, воплощенные в лице пожилого мужчины в тюрбане. На мягком и тонком холсте цвета и оттенки сливаются, создавая трогательное представление о старости и достоинстве.', 4, 36),
(179, '“老人” 是一件引人入胜的水彩艺术品，描绘了一位戴着头巾的老年男子脸上体现出的智慧和历史。在一块柔软而细腻的画布上，色彩和细微差别交融在一起，创造出了老年和尊严的感人表现。', 5, 36),
(180, '\"Women speaking\" est une œuvre vibrante réalisée à l\'aquarelle, qui capture l\'essence de la vie quotidienne et de la camaraderie parmi un groupe de femmes indiennes. Sur une toile lumineuse et colorée, les personnages sont représentés avec une grâce naturelle et une énergie contagieuse alors qu\'elles échangent des conversations animées.', 1, 37),
(181, '\"Women Speaking\" is a vibrant watercolor artwork that captures the essence of everyday life and camaraderie among a group of Indian women. On a bright and colorful canvas, the characters are depicted with natural grace and contagious energy as they engage in lively conversations.', 2, 37),
(182, '\"Frauen sprechen\" ist ein lebhaftes Aquarellkunstwerk, das die Essenz des Alltagslebens und der Kameradschaft unter einer Gruppe indischer Frauen einfängt. Auf einer hellen und farbenfrohen Leinwand sind die Charaktere mit natürlicher Anmut und ansteckender Energie dargestellt, während sie lebhafte Gespräche führen.', 3, 37),
(183, '\"Женщины говорят\" - это яркое акварельное произведение, которое запечатлевает суть повседневной жизни и дружбы среди группы индийских женщин. На ярком и красочном холсте персонажи изображены с естественной грацией и заразительной энергией, обмениваясь живыми разговорами.', 4, 37),
(184, '“女性交谈” 是一幅充满活力的水彩艺术品，捕捉了一群印度女性之间日常生活和友情的本质。在一块明亮而色彩丰富的画布上，人物以自然的优雅和具有感染力的能量被描绘出来，她们正在进行着热烈的对话。', 5, 37),
(185, '\"Forest\" est une œuvre envoûtante qui combine habilement des éléments abstraits et figuratifs pour capturer l\'essence mystique et l\'immensité de la nature sauvage. Sur une toile expansive, des formes organiques et des motifs tourbillonnants se mêlent à des représentations figuratives d\'arbres et de végétation, créant un paysage onirique et évocateur.', 1, 38),
(186, '\"Forest\" is a captivating artwork that skillfully combines abstract and figurative elements to capture the mystical essence and vastness of the wilderness. On an expansive canvas, organic shapes and swirling patterns mingle with figurative representations of trees and vegetation, creating a dreamlike and evocative landscape.', 2, 38),
(187, '\"Wald\" ist ein faszinierendes Kunstwerk, das geschickt abstrakte und figurative Elemente kombiniert, um die mystische Essenz und die Weite der Wildnis einzufangen. Auf einer weitläufigen Leinwand vermischen sich organische Formen und wirbelnde Muster mit figurativen Darstellungen von Bäumen und Vegetation, und erschaffen so eine traumhafte und suggestive Landschaft.', 3, 38),
(188, '\"Лес\" - завораживающее произведение, искусно сочетающее абстрактные и фигурные элементы, чтобы запечатлеть мистическую суть и безграничность дикой природы. На обширном полотне органические формы и вихревые узоры сливаются с фигурными изображениями деревьев и растительности, создавая сновидческий и образный пейзаж.', 4, 38),
(189, '“森林” 是一件迷人的艺术品，巧妙地结合了抽象和具象元素，捕捉了神秘的本质和荒野的广阔。在一块宽广的画布上，有机形状和旋转图案与树木和植被的具象化表现交织在一起，营造出一个梦幻般而引人联想的景观。', 5, 38),
(190, '\"Jeju island fishermen\" est une œuvre qui marie subtilement des éléments abstraits et figuratifs pour représenter la vie et le travail des pêcheurs sur l\'île de Jeju, en Corée du Sud. Sur une toile dynamique et immersive, des formes organiques et des motifs figuratifs se mêlent pour capturer l\'essence de cette communauté maritime.', 1, 39),
(191, '\"Jeju Island Fishermen\" is an artwork that subtly blends abstract and figurative elements to depict the life and work of fishermen on Jeju Island, South Korea. On a dynamic and immersive canvas, organic shapes and figurative patterns intertwine to capture the essence of this maritime community.', 2, 39),
(192, '\"Jeju Island Fishermen\" ist ein Kunstwerk, das subtil abstrakte und figurative Elemente kombiniert, um das Leben und die Arbeit der Fischer auf Jeju Island, Südkorea, darzustellen. Auf einer dynamischen und fesselnden Leinwand verschmelzen organische Formen und figurative Muster, um die Essenz dieser maritimen Gemeinschaft einzufangen.', 3, 39),
(193, '\"Рыбаки с острова Чеджу\" - это произведение искусства, которое тонко сочетает абстрактные и фигурные элементы, чтобы изобразить жизнь и работу рыбаков на острове Чеджу, в Южной Корее. На динамичном и погружающем полотне органические формы и фигурные узоры переплетаются, чтобы запечатлеть суть этого морского сообщества.', 4, 39),
(194, '\"济州岛渔民\" 是一件将抽象和具象元素巧妙融合，描绘韩国济州岛渔民生活和工作的艺术品。在动态且引人入胜的画布上，有机形状和具象图案交织在一起，捕捉到了这个海洋社区的精髓。', 5, 39),
(195, '\"Lotus\" est une œuvre saisissante réalisée à l\'encre de Chine, où l\'abstrait et le figuratif fusionnent pour capturer l\'essence mystique de cette fleur emblématique. Sur une toile en noir et blanc, des motifs abstraits évoquant les pétales du lotus se mêlent à des représentations figuratives de cette fleur sacrée.', 1, 40),
(196, '\"Lotus\" is a striking artwork done in India ink, where abstract and figurative elements merge to capture the mystical essence of this emblematic flower. On a black and white canvas, abstract patterns reminiscent of lotus petals blend with figurative representations of this sacred flower.', 2, 40),
(197, '\"Lotus\" ist ein eindrucksvolles Kunstwerk, das mit Tusche realisiert wurde, wo Abstraktion und Figuration verschmelzen, um die mystische Essenz dieser emblematischen Blume einzufangen. Auf einer schwarz-weißen Leinwand vermischen sich abstrakte Muster, die an Lotusblütenblätter erinnern, mit figurativen Darstellungen dieser heiligen Blume.', 3, 40),
(198, '\"Лотос\" - это захватывающее произведение, выполненное китайской тушью, где абстрактные и фигурные элементы сливаются, чтобы запечатлеть мистическую сущность этого символичного цветка. На черно-белом холсте абстрактные узоры, напоминающие лепестки лотоса, сливаются с фигурными изображениями этого священного цветка.', 4, 40),
(199, '“莲花” 是一幅令人印象深刻的作品，用中国墨绘制而成，其中抽象和具象元素融合，捕捉了这种象征性花朵的神秘本质。在一块黑白的画布上，抽象的图案让人联想到莲花的花瓣，与这朵神圣的花的具象化表现融为一体。', 5, 40),
(200, '\"Cosmopolite\" est une œuvre d\'art qui fusionne la peinture à l\'huile et le collage à l\'encre de Chine pour créer une exploration visuelle complexe du concept de mondialisation et de diversité culturelle. Sur une toile en noir et blanc, des éléments figuratifs et abstraits se combinent pour représenter la richesse et la complexité du monde contemporain.\r\n', 1, 41),
(201, '\"Cosmopolite\" is an artwork that merges oil painting and India ink collage to create a complex visual exploration of the concepts of globalization and cultural diversity. On a black and white canvas, figurative and abstract elements combine to represent the richness and complexity of the contemporary world.', 2, 41),
(202, '\"Kosmopolit\" ist ein Kunstwerk, das Ölmalerei und Tusche-Collage vereint, um eine komplexe visuelle Erkundung der Konzepte der Globalisierung und kulturellen Vielfalt zu schaffen. Auf einer Schwarz-Weiß-Leinwand vereinen sich figurative und abstrakte Elemente, um die Reichhaltigkeit und Komplexität der zeitgenössischen Welt darzustellen.', 3, 41),
(203, '\"Космополит\" - это произведение искусства, которое объединяет масляную живопись и коллаж из китайской туши, чтобы создать сложное визуальное исследование концепций глобализации и культурного разнообразия. На черно-белом холсте фигурные и абстрактные элементы объединяются, чтобы представить богатство и сложность современного мира.', 4, 41),
(204, '“国际主义者” 是一件将油画和中国墨水拼贴结合起来，创造出复杂视觉探索全球化和文化多样性概念的艺术品。在黑白画布上，具象和抽象元素相结合，代表了当代世界的丰富和复杂性。', 5, 41),
(205, '\"Fall in Love\" est une œuvre d\'art intrigante qui combine la peinture à l\'huile et le collage pour capturer l\'essence de l\'amour et de la romance. Sur une toile aux tons chauds et riches, des éléments figuratifs et abstraits se mêlent pour créer une représentation visuelle émouvante de ce sentiment universel.', 1, 42),
(206, '\"Fall in Love\" is an intriguing artwork that combines oil painting and collage to capture the essence of love and romance. On a canvas with warm and rich tones, figurative and abstract elements blend to create a moving visual representation of this universal feeling.', 2, 42),
(207, '\"Verlieben\" ist ein faszinierendes Kunstwerk, das Ölmalerei und Collage vereint, um die Essenz von Liebe und Romantik einzufangen. Auf einer Leinwand mit warmen und reichen Farbtönen verschmelzen figurative und abstrakte Elemente zu einer bewegenden visuellen Darstellung dieses universellen Gefühls.', 3, 42),
(208, '\"Влюбиться\" - это интригующее произведение искусства, которое сочетает масляную живопись и коллаж, чтобы запечатлеть сущность любви и романтики. На холсте с теплыми и насыщенными оттенками фигурные и абстрактные элементы сливаются воедино, создавая движущееся визуальное представление этого универсального чувства.', 4, 42),
(209, '“坠入爱河” 是一件引人入胜的艺术品，结合了油画和拼贴，捕捉了爱和浪漫的本质。在色调温暖且丰富的画布上，具象和抽象的元素融合在一起，创造出了这种普遍感情的动人视觉表现。', 5, 42),
(210, '\"Jeu et Amour\" est une œuvre d\'art captivante qui marie la peinture à l\'huile et le collage pour explorer les thèmes de la légèreté, du plaisir et de l\'affection. Sur une toile riche en textures et en couleurs, des éléments figuratifs et abstraits se rencontrent pour créer une scène dynamique et évocatrice.', 1, 43),
(211, '\"Spiel und Liebe\" ist ein fesselndes Kunstwerk, das Ölmalerei und Collage vereint, um Themen wie Leichtigkeit, Vergnügen und Zuneigung zu erforschen. Auf einer Leinwand, die reich an Texturen und Farben ist, treffen figurative und abstrakte Elemente aufeinander, um eine dynamische und evokative Szene zu schaffen.', 3, 43),
(212, '\"Игра и Любовь\" - это захватывающее произведение искусства, которое сочетает масляную живопись и коллаж, чтобы исследовать темы легкости, удовольствия и привязанности. На холсте, богатом текстурами и цветами, фигурные и абстрактные элементы встречаются, чтобы создать динамичную и вызывающую сцену.', 4, 43),
(213, '“游戏与爱” 是一件迷人的艺术品，结合了油画和拼贴，探索了轻松、愉悦和情感等主题。在丰富的纹理和色彩的画布上，具象和抽象的元素相遇，创造出动态而富有感染力的场景。', 5, 43),
(214, '\"Lucy\" est une œuvre d\'art intrigante qui associe la peinture à l\'huile et le collage pour créer une représentation évocatrice d\'un crâne. Sur une toile claire et mystérieuse, des éléments figuratifs et abstraits se combinent pour évoquer la puissance et la fragilité de la vie.', 1, 44),
(215, '\"Lucy\" is an intriguing artwork that combines oil painting and collage to create an evocative representation of a skull. On a clear and mysterious canvas, figurative and abstract elements come together to evoke the power and fragility of life.', 2, 44),
(216, '\"Lucy\" ist ein faszinierendes Kunstwerk, das Ölmalerei und Collage vereint, um eine eindringliche Darstellung eines Schädels zu schaffen. Auf einer klaren und mysteriösen Leinwand vereinen sich figurative und abstrakte Elemente, um die Kraft und Zerbrechlichkeit des Lebens zu beschwören.', 3, 44),
(217, '\"Люси\" - это интригующее произведение искусства, которое сочетает масляную живопись и коллаж, чтобы создать эмоциональное изображение черепа. На светлом и загадочном холсте фигурные и абстрактные элементы сливаются, чтобы вызвать чувство силы и хрупкости жизни.', 4, 44),
(218, '“露西” 是一件引人入胜的艺术品，结合了油画和拼贴，创造了一个富有表现力的头骨形象。在明亮而神秘的画布上，具象和抽象的元素相互融合，唤起了生命的力量和脆弱性。', 5, 44),
(219, '\"Le joueur de violon\" est une œuvre fascinante qui mêle les styles du cubisme et de l\'abstrait pour représenter un musicien en train de jouer de son instrument avec passion et émotion. Sur une toile dynamique et expressive, des formes géométriques et des motifs abstraits se combinent pour capturer le mouvement et le rythme de la musique.', 1, 45),
(220, '\"The Violin Player\" is a fascinating artwork that blends the styles of cubism and abstract art to depict a musician playing his instrument with passion and emotion. On a dynamic and expressive canvas, geometric shapes and abstract patterns combine to capture the movement and rhythm of the music.', 2, 45),
(221, '\"Der Geiger\" ist ein faszinierendes Kunstwerk, das die Stile des Kubismus und der abstrakten Kunst mischt, um einen Musiker darzustellen, der sein Instrument mit Leidenschaft und Emotion spielt. Auf einer dynamischen und ausdrucksstarken Leinwand vereinen sich geometrische Formen und abstrakte Muster, um die Bewegung und den Rhythmus der Musik einzufangen.', 3, 45),
(222, '\"Скрипач\" - это увлекательное произведение искусства, которое смешивает стили кубизма и абстракционизма, чтобы изобразить музыканта, играющего на своем инструменте с страстью и эмоцией. На динамичном и выразительном холсте геометрические формы и абстрактные узоры сочетаются, чтобы запечатлеть движение и ритм музыки.', 4, 45),
(223, '“小提琴手” 是一件迷人的艺术品，将立体主义和抽象艺术的风格融合在一起，以表现一个热情而充满情感的音乐家演奏他的乐器。在一个动态而富有表现力的画布上，几何形状和抽象图案相结合，捕捉到了音乐的节奏和动感。', 5, 45),
(224, '\"Le Livreur de Lait\" est une œuvre saisissante qui fusionne les styles du cubisme et de l\'abstrait pour représenter un personnage iconique dans un contexte moderne. Sur une toile dynamique et complexe, des formes géométriques et des motifs abstraits se combinent pour capturer l\'essence de ce travailleur urbain.', 1, 46),
(225, '\"The Milkman\" is a striking artwork that blends the styles of cubism and abstract art to depict an iconic character in a modern context. On a dynamic and intricate canvas, geometric shapes and abstract patterns combine to capture the essence of this urban worker.', 2, 46),
(226, '\"Der Milchmann\" ist ein beeindruckendes Kunstwerk, das die Stile des Kubismus und der abstrakten Kunst vereint, um eine ikonische Figur in einem modernen Kontext darzustellen. Auf einer dynamischen und komplexen Leinwand vereinen sich geometrische Formen und abstrakte Muster, um die Essenz dieses städtischen Arbeiters einzufangen.', 3, 46),
(227, '\"Молочник\" - это поразительное произведение искусства, которое сочетает стили кубизма и абстракционизма, чтобы изобразить иконичный персонаж в современном контексте. На динамичном и сложном полотне геометрические формы и абстрактные узоры сочетаются, чтобы запечатлеть сущность этого городского работника.', 4, 46),
(228, '“送奶工” 是一件引人注目的艺术品，将立体主义和抽象艺术的风格融合在一起，以展现现代背景下的一个标志性角色。在一个动态而复杂的画布上，几何形状和抽象图案相结合，捕捉到了这个城市工人的本质。', 5, 46),
(229, '\"Levé du Jour\" est une œuvre intrigante qui combine les styles du cubisme et de l\'abstrait pour capturer l\'aube d\'un nouveau jour avec une perspective unique et dynamique. Sur une toile vibrante et expressive, des formes géométriques et des motifs abstraits s\'entrelacent pour représenter l\'éclat et la promesse d\'un nouveau commencement.', 1, 47),
(230, '\"Sunrise\" is an intriguing artwork that combines the styles of cubism and abstract art to capture the dawn of a new day with a unique and dynamic perspective. On a vibrant and expressive canvas, geometric shapes and abstract patterns intertwine to represent the brilliance and promise of a new beginning.', 2, 47),
(231, '\"Sonnenaufgang\" ist ein faszinierendes Kunstwerk, das die Stile des Kubismus und der abstrakten Kunst kombiniert, um das Morgengrauen eines neuen Tages mit einer einzigartigen und dynamischen Perspektive einzufangen. Auf einer lebendigen und ausdrucksstarken Leinwand verschmelzen geometrische Formen und abstrakte Muster, um den Glanz und das Versprechen eines Neuanfangs darzustellen.', 3, 47),
(232, '\"Восход солнца\" - это интригующее произведение искусства, которое сочетает стили кубизма и абстракционизма, чтобы запечатлеть рассвет нового дня с уникальной и динамичной перспективой. На ярком и выразительном холсте геометрические формы и абстрактные узоры переплетаются, чтобы представить великолепие и обещание нового начала.', 4, 47),
(233, '“日出” 是一件引人入胜的艺术品，将立体主义和抽象艺术的风格结合起来，以独特而动态的视角捕捉了新一天的黎明。在充满活力和富有表现力的画布上，几何形状和抽象图案交织在一起，代表了新开始的光辉和希望。', 5, 47),
(234, '\"Concert Métal\" est une œuvre surréaliste et abstraite qui plonge le spectateur dans un monde où les frontières entre la réalité et l\'imagination sont brouillées. Sur une toile tourbillonnante et tumultueuse, des éléments surréalistes et abstraits s\'entrelacent pour capturer l\'énergie brute et la puissance émotionnelle d\'un concert de musique métal.', 1, 48),
(235, '\"Metal Concert\" is a surreal and abstract artwork that immerses the viewer into a world where the boundaries between reality and imagination are blurred. On a swirling and tumultuous canvas, surreal and abstract elements intertwine to capture the raw energy and emotional power of a metal music concert.', 2, 48),
(236, '\"Metal-Konzert\" ist ein surrealistisches und abstraktes Kunstwerk, das den Betrachter in eine Welt entführt, in der die Grenzen zwischen Realität und Vorstellungskraft verschwimmen. Auf einer wirbelnden und tumultartigen Leinwand verweben sich surreale und abstrakte Elemente, um die rohe Energie und emotionale Kraft eines Metal-Musik-Konzerts einzufangen.', 3, 48),
(237, '\"Металлический концерт\" - это сюрреалистическое и абстрактное произведение искусства, которое погружает зрителя в мир, где границы между реальностью и воображением размыты. На вихревой и бурной холсте сюрреалистические и абстрактные элементы переплетаются, чтобы запечатлеть сырую энергию и эмоциональную мощь металлического музыкального концерта.', 4, 48),
(238, '“金属音乐会” 是一件超现实主义和抽象的艺术作品，将观众带入一个现实和想象之间界限模糊的世界。在一个旋转而狂乱的画布上，超现实和抽象的元素交织在一起，捕捉到金属音乐会的原始能量和情感力量。\r\n\r\n\r\n\r\n\r\n', 5, 48),
(239, '\"Épanouissement\" est une œuvre surréaliste et abstraite qui explore les notions de croissance, de transformation et de découverte de soi à travers un paysage onirique et évocateur. Sur une toile vibrante et dynamique, des éléments surréalistes et abstraits se fondent pour créer une scène où la réalité et l\'imagination se confondent.', 1, 49),
(240, '\"Blossoming\" is a surreal and abstract artwork that explores the concepts of growth, transformation, and self-discovery through a dreamlike and evocative landscape. On a vibrant and dynamic canvas, surreal and abstract elements blend to create a scene where reality and imagination merge.', 2, 49),
(241, '\"Aufblühen\" ist ein surrealistisches und abstraktes Kunstwerk, das die Konzepte des Wachstums, der Transformation und der Selbstentdeckung durch eine traumhafte und eindringliche Landschaft erkundet. Auf einer lebendigen und dynamischen Leinwand verschmelzen surrealistische und abstrakte Elemente zu einer Szene, in der Realität und Vorstellungskraft verschwimmen.', 3, 49),
(242, '\"Расцвет\" - это сюрреалистическое и абстрактное произведение искусства, исследующее концепции роста, преображения и самопознания через сновидческий и вызывающий пейзаж. На ярком и динамичном холсте сюрреалистические и абстрактные элементы сливаются, чтобы создать сцену, где реальность и воображение сливаются.', 4, 49),
(243, '“绽放” 是一件超现实主义和抽象的艺术作品，通过一个梦幻般而富有表现力的景观，探索了生长、转变和自我发现的概念。在一个充满活力和动态的画布上，超现实和抽象的元素融合在一起，创造出一个场景，现实与想象融为一体。', 5, 49),
(244, '\"Vacances à la plage\" est une œuvre surréaliste et abstraite qui transporte le spectateur dans un monde imaginaire où les souvenirs de vacances se mêlent à l\'expression artistique. Sur une toile vibrante et évocatrice, des éléments surréalistes et abstraits se combinent pour créer une scène où la réalité et l\'imagination se rencontrent.', 1, 50),
(245, '\"Beach Holiday\" is a surreal and abstract artwork that transports the viewer into an imaginary world where vacation memories intertwine with artistic expression. On a vibrant and evocative canvas, surreal and abstract elements come together to create a scene where reality and imagination meet.', 2, 50),
(246, '\"Strandurlaub\" ist ein surrealistisches und abstraktes Kunstwerk, das den Betrachter in eine imaginäre Welt entführt, in der Urlaubserinnerungen mit künstlerischem Ausdruck verschmelzen. Auf einer lebendigen und eindrucksvollen Leinwand kommen surrealistische und abstrakte Elemente zusammen, um eine Szene zu schaffen, in der Realität und Vorstellungskraft aufeinandertreffen.', 3, 50),
(247, '\"Отпуск на пляже\" - это сюрреалистическое и абстрактное произведение искусства, которое переносит зрителя в мир воображения, где воспоминания о каникулах переплетаются с художественным выражением. На ярком и вызывающем холсте сюрреалистические и абстрактные элементы сочетаются, чтобы создать сцену, где реальность и воображение пересекаются.', 4, 50),
(248, '“海滩假期” 是一件超现实主义和抽象的艺术作品，将观众带入一个想象中的世界，度假的回忆与艺术表达交织在一起。在充满活力和富有表现力的画布上，超现实和抽象的元素融合在一起，创造出一个场景，现实与想象相遇。', 5, 50),
(249, '\"Prêtresse\" est une œuvre qui fusionne l\'art traditionnel chinois avec des éléments de modernité pour créer une représentation mystique et énigmatique d\'une figure féminine empreinte de spiritualité et de puissance. Sur une toile délicate et raffinée, des motifs traditionnels chinois se mêlent à des touches contemporaines pour évoquer la présence imposante de la prêtresse.', 1, 51),
(250, '\"Priestess\" is an artwork that merges traditional Chinese art with elements of modernity to create a mystical and enigmatic representation of a female figure imbued with spirituality and power. On a delicate and refined canvas, traditional Chinese motifs blend with contemporary touches to evoke the imposing presence of the priestess.', 2, 51),
(251, '\"Priesterin\" ist ein Kunstwerk, das traditionelle chinesische Kunst mit Elementen der Moderne verbindet, um eine mystische und rätselhafte Darstellung einer weiblichen Figur voller Spiritualität und Kraft zu schaffen. Auf einer zarten und raffinierten Leinwand verschmelzen traditionelle chinesische Motive mit zeitgenössischen Akzenten, um die imposante Präsenz der Priesterin hervorzurufen.', 3, 51),
(252, '\"Жрица\" - это произведение искусства, которое объединяет традиционное китайское искусство с элементами современности, чтобы создать мистическое и загадочное представление о женской фигуре, проникнутой духовностью и силой. На изящном и утонченном холсте традиционные китайские узоры переплетаются с современными штрихами, вызывая впечатляющее присутствие жрицы.', 4, 51),
(253, '“女祭司” 是一件将中国传统艺术与现代元素融合的艺术品，创造了一个充满神秘和谜团的女性形象，充满了灵性和力量。在一块精致而精致的画布上，传统的中国图案与现代元素融合，唤起了女祭司的威严气息。', 5, 51),
(254, '\"Tempête\" est une œuvre qui marie l\'art traditionnel chinois avec des éléments modernes pour créer une représentation puissante et évocatrice d\'une tempête tumultueuse. Sur une toile dynamique et expressive, des motifs traditionnels chinois se mêlent à des touches contemporaines pour évoquer la force et la turbulence de la nature déchaînée.', 1, 52),
(255, '\"Storm\" is an artwork that blends traditional Chinese art with modern elements to create a powerful and evocative representation of a tumultuous storm. On a dynamic and expressive canvas, traditional Chinese motifs intertwine with contemporary touches to evoke the strength and turbulence of the unleashed nature.', 2, 52),
(256, '\"Sturm\" ist ein Kunstwerk, das traditionelle chinesische Kunst mit modernen Elementen verbindet, um eine kraftvolle und eindringliche Darstellung eines stürmischen Unwetters zu schaffen. Auf einer dynamischen und ausdrucksstarken Leinwand verweben sich traditionelle chinesische Motive mit zeitgenössischen Akzenten, um die Stärke und Turbulenz der entfesselten Natur hervorzurufen.', 3, 52),
(258, '\"Шторм\" - это произведение искусства, которое сочетает в себе традиционное китайское искусство с современными элементами, чтобы создать мощное и выразительное представление бурной бури. На динамичном и выразительном холсте традиционные китайские узоры переплетаются с современными штрихами, вызывая силу и бурю неистовой природы.', 4, 52),
(259, '“暴风雨” 是一件将中国传统艺术与现代元素结合的作品，创造了一个强大而富有表现力的暴风雨的形象。在一块动态而富有表现力的画布上，传统的中国图案与现代元素交织在一起，唤起了自然释放的力量和动荡。', 5, 52),
(260, '\"Temple\" est une œuvre qui allie l\'art traditionnel chinois à des éléments modernes pour créer une représentation impressionnante et émouvante d\'un temple ancien imprégné de spiritualité et de sérénité. Sur une toile imposante et riche en détails, des motifs traditionnels chinois se mêlent à des touches contemporaines pour évoquer la grandeur et la majesté de cet édifice sacré.', 1, 53),
(261, '\"Temple\" is an artwork that combines traditional Chinese art with modern elements to create an impressive and moving representation of an ancient temple imbued with spirituality and serenity. On an imposing canvas rich in detail, traditional Chinese motifs blend with contemporary touches to evoke the grandeur and majesty of this sacred building.', 2, 53),
(262, '\"Tempel\" ist ein Kunstwerk, das traditionelle chinesische Kunst mit modernen Elementen verbindet, um eine beeindruckende und bewegende Darstellung eines alten Tempels voller Spiritualität und Gelassenheit zu schaffen. Auf einer imposanten Leinwand, die reich an Details ist, verschmelzen traditionelle chinesische Motive mit zeitgenössischen Akzenten, um die Größe und Majestät dieses heiligen Bauwerks hervorzurufen.', 3, 53),
(263, '\"Храм\" - это произведение искусства, которое сочетает в себе традиционное китайское искусство с современными элементами, чтобы создать впечатляющее и волнующее представление о древнем храме, проникнутом духовностью и умиротворением. На внушительном холсте, богатом деталями, традиционные китайские узоры сливаются с современными штрихами, чтобы вызвать величие и величие этого священного сооружения.', 4, 53),
(264, '“寺庙” 是一件将中国传统艺术与现代元素结合的作品，创造了一个令人印象深刻而感人的古老寺庙的形象，充满了灵性和宁静。在一块富有细节的庄严画布上，传统的中国图案与现代元素融合在一起，唤起了这座神圣建筑的宏伟和庄严。', 5, 53),
(265, '\"Amitié\" est une œuvre touchante qui capture l\'essence même des liens profonds entre les êtres vivants à travers la représentation de deux chiens dans leur élément naturel. Cette scène poignante offre une vision de l\'amitié pure et inconditionnelle qui transcende les frontières de l\'espèce.', 1, 4),
(266, '\"Play and Love\" is a captivating artwork that blends oil painting and collage to explore themes of lightness, pleasure, and affection. On a canvas rich in textures and colors, figurative and abstract elements come together to create a dynamic and evocative scene.', 2, 43);

-- --------------------------------------------------------

--
-- Structure de la table `type_oeuvre`
--

DROP TABLE IF EXISTS `type_oeuvre`;
CREATE TABLE IF NOT EXISTS `type_oeuvre` (
  `id_type_oeuvre` int NOT NULL AUTO_INCREMENT,
  `libelle_type_oeuvre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_type_oeuvre`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `type_oeuvre`
--

INSERT INTO `type_oeuvre` (`id_type_oeuvre`, `libelle_type_oeuvre`) VALUES
(1, 'Contemporain'),
(2, 'Aquarelle'),
(3, 'Expressionisme'),
(4, 'Abstrait'),
(5, 'Acrylique'),
(6, 'Réalisme'),
(7, 'Peinture à huile'),
(8, 'Collage'),
(9, 'Cubisme'),
(10, 'surréalisme'),
(11, 'Traditionnel'),
(12, 'Sculpture');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `avoir_ibfk_1` FOREIGN KEY (`id_expo`) REFERENCES `exposition` (`id_expo`),
  ADD CONSTRAINT `avoir_ibfk_2` FOREIGN KEY (`id_artiste`) REFERENCES `artiste` (`id_artiste`);

--
-- Contraintes pour la table `collaborateur`
--
ALTER TABLE `collaborateur`
  ADD CONSTRAINT `collaborateur_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `collaborateur_ibfk_2` FOREIGN KEY (`id_poste`) REFERENCES `postes` (`id_poste`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`id_expo`) REFERENCES `exposition` (`id_expo`),
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`id_oeuvres`) REFERENCES `oeuvres_expo` (`id_oeuvres`),
  ADD CONSTRAINT `contenir_ibfk_3` FOREIGN KEY (`id_plan`) REFERENCES `espace` (`id_plan`);

--
-- Contraintes pour la table `exposition`
--
ALTER TABLE `exposition`
  ADD CONSTRAINT `exposition_ibfk_1` FOREIGN KEY (`id_theme`) REFERENCES `theme` (`id_theme`);

--
-- Contraintes pour la table `flashcode`
--
ALTER TABLE `flashcode`
  ADD CONSTRAINT `flashcode_ibfk_1` FOREIGN KEY (`id_langues`) REFERENCES `langues_site` (`id_langues`),
  ADD CONSTRAINT `flashcode_ibfk_2` FOREIGN KEY (`id_oeuvres`) REFERENCES `oeuvres_expo` (`id_oeuvres`);

--
-- Contraintes pour la table `oeuvres_expo`
--
ALTER TABLE `oeuvres_expo`
  ADD CONSTRAINT `oeuvres_expo_ibfk_1` FOREIGN KEY (`id_type_oeuvre`) REFERENCES `type_oeuvre` (`id_type_oeuvre`);

--
-- Contraintes pour la table `présenter`
--
ALTER TABLE `présenter`
  ADD CONSTRAINT `présenter_ibfk_1` FOREIGN KEY (`id_oeuvres`) REFERENCES `oeuvres_expo` (`id_oeuvres`),
  ADD CONSTRAINT `présenter_ibfk_2` FOREIGN KEY (`id_artiste`) REFERENCES `artiste` (`id_artiste`);

--
-- Contraintes pour la table `recueillir`
--
ALTER TABLE `recueillir`
  ADD CONSTRAINT `recueillir_ibfk_1` FOREIGN KEY (`id_expo`) REFERENCES `exposition` (`id_expo`),
  ADD CONSTRAINT `recueillir_ibfk_2` FOREIGN KEY (`id_collab`) REFERENCES `collaborateur` (`id_collab`);

--
-- Contraintes pour la table `stats`
--
ALTER TABLE `stats`
  ADD CONSTRAINT `stats_ibfk_1` FOREIGN KEY (`id_expo`) REFERENCES `exposition` (`id_expo`);

--
-- Contraintes pour la table `traduction`
--
ALTER TABLE `traduction`
  ADD CONSTRAINT `traduction_ibfk_1` FOREIGN KEY (`id_langues`) REFERENCES `langues_site` (`id_langues`),
  ADD CONSTRAINT `traduction_ibfk_2` FOREIGN KEY (`id_oeuvres`) REFERENCES `oeuvres_expo` (`id_oeuvres`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
