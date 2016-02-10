-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Server version: 5.0.41
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `forum`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `accesslevels`
-- 

CREATE TABLE IF NOT EXISTS `accesslevels` (
  `access_level` tinyint(4) NOT NULL auto_increment,
  `description` varchar(15) collate latin1_general_ci NOT NULL,
  KEY `access_level` (`access_level`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `accesslevels`
-- 

INSERT INTO `accesslevels` (`access_level`, `description`) VALUES 
(1, 'Common User'),
(2, 'Moderator'),
(3, 'Admin');

-- --------------------------------------------------------

-- 
-- Table structure for table `comments`
-- 

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL auto_increment,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(500) collate latin1_general_ci NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY  (`comment_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `comments`
-- 

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment`, `comment_date`) VALUES 
(1, 1, 4, 'Nikola Tesla was the inventor of the alternating current (AC) that powers our homes today, as well as many other revolutionary breakthroughs in our command of electromagnetism. Tesla was a bit like Iron Man, a somewhat touched but brilliant inventor and a talented showman, and his magical displays of what electricity could do dazzled the public with a world of new possibilities.', '2013-11-18 11:22:20'),
(2, 1, 4, 'The new Tesla Model S, like its namesake, presents us with an equally revolutionary breakthrough, a car literally unlike any other in the last 100 years. It is a complete game-changer, a reengineering of the automobile and the personal transportation industry from the ground up. Suddenly, it is possible to drive normally without polluting the air or adding to climate change, and to do it for one-tenth of the cost of using gas.', '2013-11-18 11:23:37');

-- --------------------------------------------------------

-- 
-- Table structure for table `country`
-- 

CREATE TABLE IF NOT EXISTS `country` (
  `code` char(3) character set latin1 collate latin1_general_ci NOT NULL,
  `name` char(52) character set latin1 collate latin1_general_ci NOT NULL,
  `continent` enum('Asia','Europe','North America','Africa','Oceania','Antarctica','South America') NOT NULL default 'Asia',
  `region` char(26) character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `country`
-- 

INSERT INTO `country` (`code`, `name`, `continent`, `region`) VALUES 
('ABW', 'Aruba', 'North America', 'Caribbean'),
('AFG', 'Afghanistan', 'Asia', 'Southern and Central Asia'),
('AGO', 'Angola', 'Africa', 'Central Africa'),
('AIA', 'Anguilla', 'North America', 'Caribbean'),
('ALB', 'Albania', 'Europe', 'Southern Europe'),
('AND', 'Andorra', 'Europe', 'Southern Europe'),
('ANT', 'Netherlands Antilles', 'North America', 'Caribbean'),
('ARE', 'United Arab Emirates', 'Asia', 'Middle East'),
('ARG', 'Argentina', 'South America', 'South America'),
('ARM', 'Armenia', 'Asia', 'Middle East'),
('ASM', 'American Samoa', 'Oceania', 'Polynesia'),
('ATA', 'Antarctica', 'Antarctica', 'Antarctica'),
('ATF', 'French Southern territories', 'Antarctica', 'Antarctica'),
('ATG', 'Antigua and Barbuda', 'North America', 'Caribbean'),
('AUS', 'Australia', 'Oceania', 'Australia and New Zealand'),
('AUT', 'Austria', 'Europe', 'Western Europe'),
('AZE', 'Azerbaijan', 'Asia', 'Middle East'),
('BDI', 'Burundi', 'Africa', 'Eastern Africa'),
('BEL', 'Belgium', 'Europe', 'Western Europe'),
('BEN', 'Benin', 'Africa', 'Western Africa'),
('BFA', 'Burkina Faso', 'Africa', 'Western Africa'),
('BGD', 'Bangladesh', 'Asia', 'Southern and Central Asia'),
('BGR', 'Bulgaria', 'Europe', 'Eastern Europe'),
('BHR', 'Bahrain', 'Asia', 'Middle East'),
('BHS', 'Bahamas', 'North America', 'Caribbean'),
('BIH', 'Bosnia and Herzegovina', 'Europe', 'Southern Europe'),
('BLR', 'Belarus', 'Europe', 'Eastern Europe'),
('BLZ', 'Belize', 'North America', 'Central America'),
('BMU', 'Bermuda', 'North America', 'North America'),
('BOL', 'Bolivia', 'South America', 'South America'),
('BRA', 'Brazil', 'South America', 'South America'),
('BRB', 'Barbados', 'North America', 'Caribbean'),
('BRN', 'Brunei', 'Asia', 'Southeast Asia'),
('BTN', 'Bhutan', 'Asia', 'Southern and Central Asia'),
('BVT', 'Bouvet Island', 'Antarctica', 'Antarctica'),
('BWA', 'Botswana', 'Africa', 'Southern Africa'),
('CAF', 'Central African Republic', 'Africa', 'Central Africa'),
('CAN', 'Canada', 'North America', 'North America'),
('CCK', 'Cocos (Keeling) Islands', 'Oceania', 'Australia and New Zealand'),
('CHE', 'Switzerland', 'Europe', 'Western Europe'),
('CHL', 'Chile', 'South America', 'South America'),
('CHN', 'China', 'Asia', 'Eastern Asia'),
('CIV', 'Cote d''Ivoire', 'Africa', 'Western Africa'),
('CMR', 'Cameroon', 'Africa', 'Central Africa'),
('COD', 'Congo, The Democratic Republic of the', 'Africa', 'Central Africa'),
('COG', 'Congo', 'Africa', 'Central Africa'),
('COK', 'Cook Islands', 'Oceania', 'Polynesia'),
('COL', 'Colombia', 'South America', 'South America'),
('COM', 'Comoros', 'Africa', 'Eastern Africa'),
('CPV', 'Cape Verde', 'Africa', 'Western Africa'),
('CRI', 'Costa Rica', 'North America', 'Central America'),
('CUB', 'Cuba', 'North America', 'Caribbean'),
('CXR', 'Christmas Island', 'Oceania', 'Australia and New Zealand'),
('CYM', 'Cayman Islands', 'North America', 'Caribbean'),
('CYP', 'Cyprus', 'Asia', 'Middle East'),
('CZE', 'Czech Republic', 'Europe', 'Eastern Europe'),
('DEU', 'Germany', 'Europe', 'Western Europe'),
('DJI', 'Djibouti', 'Africa', 'Eastern Africa'),
('DMA', 'Dominica', 'North America', 'Caribbean'),
('DNK', 'Denmark', 'Europe', 'Nordic Countries'),
('DOM', 'Dominican Republic', 'North America', 'Caribbean'),
('DZA', 'Algeria', 'Africa', 'Northern Africa'),
('ECU', 'Ecuador', 'South America', 'South America'),
('EGY', 'Egypt', 'Africa', 'Northern Africa'),
('ERI', 'Eritrea', 'Africa', 'Eastern Africa'),
('ESH', 'Western Sahara', 'Africa', 'Northern Africa'),
('ESP', 'Spain', 'Europe', 'Southern Europe'),
('EST', 'Estonia', 'Europe', 'Baltic Countries'),
('ETH', 'Ethiopia', 'Africa', 'Eastern Africa'),
('FIN', 'Finland', 'Europe', 'Nordic Countries'),
('FJI', 'Fiji Islands', 'Oceania', 'Melanesia'),
('FLK', 'Falkland Islands', 'South America', 'South America'),
('FRA', 'France', 'Europe', 'Western Europe'),
('FRO', 'Faroe Islands', 'Europe', 'Nordic Countries'),
('FSM', 'Micronesia, Federated States of', 'Oceania', 'Micronesia'),
('GAB', 'Gabon', 'Africa', 'Central Africa'),
('GBR', 'United Kingdom', 'Europe', 'British Islands'),
('GEO', 'Georgia', 'Asia', 'Middle East'),
('GHA', 'Ghana', 'Africa', 'Western Africa'),
('GIB', 'Gibraltar', 'Europe', 'Southern Europe'),
('GIN', 'Guinea', 'Africa', 'Western Africa'),
('GLP', 'Guadeloupe', 'North America', 'Caribbean'),
('GMB', 'Gambia', 'Africa', 'Western Africa'),
('GNB', 'Guinea-Bissau', 'Africa', 'Western Africa'),
('GNQ', 'Equatorial Guinea', 'Africa', 'Central Africa'),
('GRC', 'Greece', 'Europe', 'Southern Europe'),
('GRD', 'Grenada', 'North America', 'Caribbean'),
('GRL', 'Greenland', 'North America', 'North America'),
('GTM', 'Guatemala', 'North America', 'Central America'),
('GUF', 'French Guiana', 'South America', 'South America'),
('GUM', 'Guam', 'Oceania', 'Micronesia'),
('GUY', 'Guyana', 'South America', 'South America'),
('HKG', 'Hong Kong', 'Asia', 'Eastern Asia'),
('HMD', 'Heard Island and McDonald Islands', 'Antarctica', 'Antarctica'),
('HND', 'Honduras', 'North America', 'Central America'),
('HRV', 'Croatia', 'Europe', 'Southern Europe'),
('HTI', 'Haiti', 'North America', 'Caribbean'),
('HUN', 'Hungary', 'Europe', 'Eastern Europe'),
('IDN', 'Indonesia', 'Asia', 'Southeast Asia'),
('IND', 'India', 'Asia', 'Southern and Central Asia'),
('IOT', 'British Indian Ocean Territory', 'Africa', 'Eastern Africa'),
('IRL', 'Ireland', 'Europe', 'British Islands'),
('IRN', 'Iran', 'Asia', 'Southern and Central Asia'),
('IRQ', 'Iraq', 'Asia', 'Middle East'),
('ISL', 'Iceland', 'Europe', 'Nordic Countries'),
('ISR', 'Israel', 'Asia', 'Middle East'),
('ITA', 'Italy', 'Europe', 'Southern Europe'),
('JAM', 'Jamaica', 'North America', 'Caribbean'),
('JOR', 'Jordan', 'Asia', 'Middle East'),
('JPN', 'Japan', 'Asia', 'Eastern Asia'),
('KAZ', 'Kazakstan', 'Asia', 'Southern and Central Asia'),
('KEN', 'Kenya', 'Africa', 'Eastern Africa'),
('KGZ', 'Kyrgyzstan', 'Asia', 'Southern and Central Asia'),
('KHM', 'Cambodia', 'Asia', 'Southeast Asia'),
('KIR', 'Kiribati', 'Oceania', 'Micronesia'),
('KNA', 'Saint Kitts and Nevis', 'North America', 'Caribbean'),
('KOR', 'South Korea', 'Asia', 'Eastern Asia'),
('KWT', 'Kuwait', 'Asia', 'Middle East'),
('LAO', 'Laos', 'Asia', 'Southeast Asia'),
('LBN', 'Lebanon', 'Asia', 'Middle East'),
('LBR', 'Liberia', 'Africa', 'Western Africa'),
('LBY', 'Libyan Arab Jamahiriya', 'Africa', 'Northern Africa'),
('LCA', 'Saint Lucia', 'North America', 'Caribbean'),
('LIE', 'Liechtenstein', 'Europe', 'Western Europe'),
('LKA', 'Sri Lanka', 'Asia', 'Southern and Central Asia'),
('LSO', 'Lesotho', 'Africa', 'Southern Africa'),
('LTU', 'Lithuania', 'Europe', 'Baltic Countries'),
('LUX', 'Luxembourg', 'Europe', 'Western Europe'),
('LVA', 'Latvia', 'Europe', 'Baltic Countries'),
('MAC', 'Macao', 'Asia', 'Eastern Asia'),
('MAR', 'Morocco', 'Africa', 'Northern Africa'),
('MCO', 'Monaco', 'Europe', 'Western Europe'),
('MDA', 'Moldova', 'Europe', 'Eastern Europe'),
('MDG', 'Madagascar', 'Africa', 'Eastern Africa'),
('MDV', 'Maldives', 'Asia', 'Southern and Central Asia'),
('MEX', 'Mexico', 'North America', 'Central America'),
('MHL', 'Marshall Islands', 'Oceania', 'Micronesia'),
('MKD', 'Macedonia', 'Europe', 'Southern Europe'),
('MLI', 'Mali', 'Africa', 'Western Africa'),
('MLT', 'Malta', 'Europe', 'Southern Europe'),
('MMR', 'Myanmar', 'Asia', 'Southeast Asia'),
('MNG', 'Mongolia', 'Asia', 'Eastern Asia'),
('MNP', 'Northern Mariana Islands', 'Oceania', 'Micronesia'),
('MOZ', 'Mozambique', 'Africa', 'Eastern Africa'),
('MRT', 'Mauritania', 'Africa', 'Western Africa'),
('MSR', 'Montserrat', 'North America', 'Caribbean'),
('MTQ', 'Martinique', 'North America', 'Caribbean'),
('MUS', 'Mauritius', 'Africa', 'Eastern Africa'),
('MWI', 'Malawi', 'Africa', 'Eastern Africa'),
('MYS', 'Malaysia', 'Asia', 'Southeast Asia'),
('MYT', 'Mayotte', 'Africa', 'Eastern Africa'),
('NAM', 'Namibia', 'Africa', 'Southern Africa'),
('NCL', 'New Caledonia', 'Oceania', 'Melanesia'),
('NER', 'Niger', 'Africa', 'Western Africa'),
('NFK', 'Norfolk Island', 'Oceania', 'Australia and New Zealand'),
('NGA', 'Nigeria', 'Africa', 'Western Africa'),
('NIC', 'Nicaragua', 'North America', 'Central America'),
('NIU', 'Niue', 'Oceania', 'Polynesia'),
('NLD', 'Netherlands', 'Europe', 'Western Europe'),
('NOR', 'Norway', 'Europe', 'Nordic Countries'),
('NPL', 'Nepal', 'Asia', 'Southern and Central Asia'),
('NRU', 'Nauru', 'Oceania', 'Micronesia'),
('NZL', 'New Zealand', 'Oceania', 'Australia and New Zealand'),
('OMN', 'Oman', 'Asia', 'Middle East'),
('PAK', 'Pakistan', 'Asia', 'Southern and Central Asia'),
('PAN', 'Panama', 'North America', 'Central America'),
('PCN', 'Pitcairn', 'Oceania', 'Polynesia'),
('PER', 'Peru', 'South America', 'South America'),
('PHL', 'Philippines', 'Asia', 'Southeast Asia'),
('PLW', 'Palau', 'Oceania', 'Micronesia'),
('PNG', 'Papua New Guinea', 'Oceania', 'Melanesia'),
('POL', 'Poland', 'Europe', 'Eastern Europe'),
('PRI', 'Puerto Rico', 'North America', 'Caribbean'),
('PRK', 'North Korea', 'Asia', 'Eastern Asia'),
('PRT', 'Portugal', 'Europe', 'Southern Europe'),
('PRY', 'Paraguay', 'South America', 'South America'),
('PSE', 'Palestine', 'Asia', 'Middle East'),
('PYF', 'French Polynesia', 'Oceania', 'Polynesia'),
('QAT', 'Qatar', 'Asia', 'Middle East'),
('REU', 'Réunion', 'Africa', 'Eastern Africa'),
('ROM', 'Romania', 'Europe', 'Eastern Europe'),
('RUS', 'Russian Federation', 'Europe', 'Eastern Europe'),
('RWA', 'Rwanda', 'Africa', 'Eastern Africa'),
('SAU', 'Saudi Arabia', 'Asia', 'Middle East'),
('SDN', 'Sudan', 'Africa', 'Northern Africa'),
('SEN', 'Senegal', 'Africa', 'Western Africa'),
('SGP', 'Singapore', 'Asia', 'Southeast Asia'),
('SGS', 'South Georgia and the South Sandwich Islands', 'Antarctica', 'Antarctica'),
('SHN', 'Saint Helena', 'Africa', 'Western Africa'),
('SJM', 'Svalbard and Jan Mayen', 'Europe', 'Nordic Countries'),
('SLB', 'Solomon Islands', 'Oceania', 'Melanesia'),
('SLE', 'Sierra Leone', 'Africa', 'Western Africa'),
('SLV', 'El Salvador', 'North America', 'Central America'),
('SMR', 'San Marino', 'Europe', 'Southern Europe'),
('SOM', 'Somalia', 'Africa', 'Eastern Africa'),
('SPM', 'Saint Pierre and Miquelon', 'North America', 'North America'),
('STP', 'Sao Tome and Principe', 'Africa', 'Central Africa'),
('SUR', 'Suriname', 'South America', 'South America'),
('SVK', 'Slovakia', 'Europe', 'Eastern Europe'),
('SVN', 'Slovenia', 'Europe', 'Southern Europe'),
('SWE', 'Sweden', 'Europe', 'Nordic Countries'),
('SWZ', 'Swaziland', 'Africa', 'Southern Africa'),
('SYC', 'Seychelles', 'Africa', 'Eastern Africa'),
('SYR', 'Syria', 'Asia', 'Middle East'),
('TCA', 'Turks and Caicos Islands', 'North America', 'Caribbean'),
('TCD', 'Chad', 'Africa', 'Central Africa'),
('TGO', 'Togo', 'Africa', 'Western Africa'),
('THA', 'Thailand', 'Asia', 'Southeast Asia'),
('TJK', 'Tajikistan', 'Asia', 'Southern and Central Asia'),
('TKL', 'Tokelau', 'Oceania', 'Polynesia'),
('TKM', 'Turkmenistan', 'Asia', 'Southern and Central Asia'),
('TMP', 'East Timor', 'Asia', 'Southeast Asia'),
('TON', 'Tonga', 'Oceania', 'Polynesia'),
('TTO', 'Trinidad and Tobago', 'North America', 'Caribbean'),
('TUN', 'Tunisia', 'Africa', 'Northern Africa'),
('TUR', 'Turkey', 'Asia', 'Middle East'),
('TUV', 'Tuvalu', 'Oceania', 'Polynesia'),
('TWN', 'Taiwan', 'Asia', 'Eastern Asia'),
('TZA', 'Tanzania', 'Africa', 'Eastern Africa'),
('UGA', 'Uganda', 'Africa', 'Eastern Africa'),
('UKR', 'Ukraine', 'Europe', 'Eastern Europe'),
('UMI', 'United States Minor Outlying Islands', 'Oceania', 'Micronesia/Caribbean'),
('URY', 'Uruguay', 'South America', 'South America'),
('USA', 'United States', 'North America', 'North America'),
('UZB', 'Uzbekistan', 'Asia', 'Southern and Central Asia'),
('VAT', 'Holy See (Vatican City State)', 'Europe', 'Southern Europe'),
('VCT', 'Saint Vincent and the Grenadines', 'North America', 'Caribbean'),
('VEN', 'Venezuela', 'South America', 'South America'),
('VGB', 'Virgin Islands, British', 'North America', 'Caribbean'),
('VIR', 'Virgin Islands, U.S.', 'North America', 'Caribbean'),
('VNM', 'Vietnam', 'Asia', 'Southeast Asia'),
('VUT', 'Vanuatu', 'Oceania', 'Melanesia'),
('WLF', 'Wallis and Futuna', 'Oceania', 'Polynesia'),
('WSM', 'Samoa', 'Oceania', 'Polynesia'),
('YEM', 'Yemen', 'Asia', 'Middle East'),
('YUG', 'Yugoslavia', 'Europe', 'Southern Europe'),
('ZAF', 'South Africa', 'Africa', 'Southern Africa'),
('ZMB', 'Zambia', 'Africa', 'Eastern Africa'),
('ZWE', 'Zimbabwe', 'Africa', 'Eastern Africa');

-- --------------------------------------------------------

-- 
-- Table structure for table `posts`
-- 

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `title` varchar(90) collate latin1_general_ci NOT NULL,
  `post_date` datetime NOT NULL,
  `content` varchar(8000) collate latin1_general_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `posts`
-- 

INSERT INTO `posts` (`post_id`, `user_id`, `title`, `post_date`, `content`, `deleted`) VALUES 
(1, 4, 'TESLA MODEL S ACHIEVES BEST SAFETY RATING OF ANY CAR EVER TESTED', '2013-11-18 11:18:58', 'SETS NEW NHTSA VEHICLE SAFETY SCORE RECORD\r\n\r\nMONDAY, AUGUST 19, 2013\r\nPalo Alto, CA &acirc;€” Independent testing by the National Highway Traffic Safety Administration (NHTSA) has awarded the Tesla Model S a 5-star safety rating, not just overall, but in every subcategory without exception. Approximately one percent of all cars tested by the federal government achieve 5 stars across the board. NHTSA does not publish a star rating above 5, however safety levels better than 5 stars are captured in the overall Vehicle Safety Score (VSS) provided to manufacturers, where the Model S achieved a new combined record of 5.4 stars.\r\n\r\nOf all vehicles tested, including every major make and model approved for sale in the United States, the Model S set a new record for the lowest likelihood of injury to occupants. While the Model S is a sedan, it also exceeded the safety score of all SUVs and minivans. This score takes into account the probability of injury from front, side, rear and rollover accidents.\r\n\r\nThe Model S has the advantage in the front of not having a large gasoline engine block, thus creating a much longer crumple zone to absorb a high speed impact. This is fundamentally a force over distance problem &acirc;€“ the longer the crumple zone, the more time there is to slow down occupants at g loads that do not cause injuries. Just like jumping into a pool of water from a tall height, it is better to have the pool be deep and not contain rocks. The Model S motor is only about a foot in diameter and is mounted close to the rear axle, and the front section that would normally contain a gasoline engine is used for a second trunk.\r\n\r\nFor the side pole intrusion test, considered one of the most difficult to pass, the Model S was the only car in the &quot;good&quot; category among the other top one percent of vehicles tested. Compared to the Volvo S60, which is also 5-star rated in all categories, the Model S preserved 63.5 percent of driver residual space vs. 7.8 percent for the Volvo. Tesla achieved this outcome by nesting multiple deep aluminum extrusions in the side rail of the car that absorb the impact energy (a similar approach was used by the Apollo Lunar Lander) and transfer load to the rest of the vehicle. This causes the pole to be either sheared off or to stop the car before the pole hits an occupant.\r\n\r\nThe rear crash testing was particularly important, given the optional third row children''s seat. For this, Tesla factory installs a double bumper if the third row seat is ordered. This was needed in order to protect against a highway speed impact in the rear with no permanently disabling injury to the third row occupants. The third row is already the safest location in the car for frontal or side injuries.\r\n\r\nThe Model S was also substantially better in rollover risk, with the other top vehicles being approximately 50 percent worse. During testing at an independent facility, the Model S refused to turn over via the normal methods and special means were needed to induce the car to roll. The reason for such a good outcome is that the battery pack is mounted below the floor pan, providing a very low center of gravity, which simultaneously ensures exceptional handling and safety.\r\n\r\nOf note, during validation of Model S roof crush protection at an independent commercial facility, the testing machine failed at just above 4 g''s. While the exact number is uncertain due to Model S breaking the testing machine, what this means is that at least four additional fully loaded Model S vehicles could be placed on top of an owner''s car without the roof caving in. This is achieved primarily through a center (B) pillar reinforcement attached via aerospace grade bolts.\r\n\r\nThe above results do not tell the full story. It is possible to game the regulatory testing score to some degree by strengthening a car at the exact locations used by the regulatory testing machines. After verifying through internal testing that the Model S would achieve a NHTSA 5-star rating, Tesla then analyzed the Model S to determine the weakest points in the car and retested at those locations until the car achieved 5 stars no matter how the test equipment was configured.\r\n\r\nThe Model S lithium-ion battery did not catch fire at any time before, during or after the NHTSA testing. It is worth mentioning that no production Tesla lithium-ion battery has ever caught fire in the Model S or Roadster, despite several high speed impacts. While this is statistically unlikely to remain the case long term, Tesla is unaware of any Model S or Roadster occupant fatalities in any car ever.\r\n\r\nThe graphic below shows the statistical Relative Risk Score (RRS) of Model S compared with all other vehicles tested against the exceptionally difficult NHTSA 2011 standards. In 2011, the standards were revised upward to make it more difficult to achieve a high safety rating.\r\n\r\nABOUT TESLA\r\n\r\nTesla Motors'' (NASDAQ: TSLA) goal is to accelerate the world''s transition to sustainable transport with a full range of increasingly affordable electric cars. California-based Tesla designs and manufactures EVs, as well as EV powertrain components for partners such as Toyota and Mercedes. Tesla has delivered over 15,000 electric vehicles to customers in 31 countries.\r\n\r\nPRESS CONTACT\r\n\r\npress@teslamotors.com', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL auto_increment,
  `email` varchar(40) collate latin1_general_ci NOT NULL,
  `account` varchar(40) collate latin1_general_ci NOT NULL,
  `password` varchar(40) collate latin1_general_ci NOT NULL,
  `name` varchar(40) collate latin1_general_ci NOT NULL,
  `last_name` varchar(40) collate latin1_general_ci NOT NULL,
  `birth_date` date NOT NULL,
  `country_code` char(3) collate latin1_general_ci NOT NULL,
  `access_level` tinyint(1) NOT NULL default '1',
  `blocked` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `account` (`account`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`user_id`, `email`, `account`, `password`, `name`, `last_name`, `birth_date`, `country_code`, `access_level`, `blocked`) VALUES 
(1, 'admin@admmin.com', 'Admin', 'test1234', 'Admin', 'Root', '1987-11-12', 'ARG', 3, 0),
(2, 'moderator@hotmail.com', 'Moderator', 'test1234', 'Moderator', 'Helper', '1980-08-06', 'CUB', 2, 0),
(3, 'blocked@hotmail.com', 'Blocked', 'test1234', 'Crazy Name', 'Wayne', '1990-09-10', 'AUS', 1, 1),
(4, 'prueba@gmail.com', 'prueba', 'test1234', 'tester', 'probando', '2013-10-01', 'ARG', 1, 0);
